<?php

namespace App\Dao\Category;

use Carbon\Carbon;
use App\Models\Category;
use App\Contracts\Dao\Category\CategoryDaoInterface;

class CategoryDao implements CategoryDaoInterface
{
    /**
     * To get category list
     * @return $categoryList
     */
    public function getCategoryList()
    {
        $categoryList = Category::orderBy('created_at','desc')->paginate(5);
        return $categoryList;
    }

    /**
     * To get category by id
     * @param string $id category id
     * @return Object $category category object
     */
    public function getCategoryById($id)
    {   
        $category = Category::find($id);
        return $category;
    }

    /**
     * To save category
     * @param array $validated validated values from category request
     * @return Object $category saved category
     */
    public function saveCategory($validated)
    {
        $category = new Category();
        $category->name = $validated['name'];
        $category->save();
        return $category;
    }

    /**
     * To update category by id
     * @param array $validated validated values from category request
     * @param string $id category id
     * @return Object $category category object
     */
    public function updateCategoryById($validated, $id)
    {
        $category = Category::find($id);
        $category->name = $validated['name'];
        $category->save();
        return $category;
    }

    /**
     * To delete category by id
     * @param string $id category id
     * @param string $deletedCategoryId deleted category id
     */
    public function deleteCategoryById($id)
    {
        $category = Category::find($id);
        $category->deleted_at = Carbon::now();
        $category->save();
        return $category;
    }
}