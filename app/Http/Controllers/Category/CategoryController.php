<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CategoryRequest;
use App\Contracts\Services\Category\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * category interface
     */
    private $categoryInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
        $this->categoryInterface = $categoryServiceInterface;
    }

     /**
     * To show category list
     * @return View category list
     */
    public function showCategoryList(Request $request)
    {
        $categories = $this->categoryInterface->getCategoryList();
        $i = ($request->input('page', 1) - 1) * 5;
        return view('admin.category.index', compact('categories','i'));
     
    }

    /**
     * To show create category view
     * @return View create category view
     */
    public function showCreateCategoryView()
    {
        return view('admin.category.create');
    }

    /**
     * To submit create category view
     * @param array $validated validated values from category request
     * @return View category list
     */
    public function submitCreateCategoryView(CategoryRequest $request)
    {
        $validated = $request->validated();
        $category  = $this->categoryInterface->saveCategory($validated);
        Toastr::success('New Category Created Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.category.index');
    }

    /**
     * To show edit category view
     * @param $id category id
     * @return View edit category view
     */
    public function showEditCategoryView($id)
    {
        $category = $this->categoryInterface->getCategoryById($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * To submit edit category view
     * @param array $validated validated values from category request
     * @param $id category id
     * @return View category list
     */
    public function submitEditCategoryView(CategoryRequest $request, $id)
    {
        $category = $this->categoryInterface->updateCategoryById($request, $id);
        Toastr::success('Category Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.category.index');
    }   

    /**
     * To delete category by id
     * @param $id category id
     * @return View category list
     */
    public function deleteCategory($id)
    {
        $category = $this->categoryInterface->deleteCategoryById($id);
        Toastr::success('Category Deleted Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return back();
    }
}
