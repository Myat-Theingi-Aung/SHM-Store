<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Contracts\Services\Product\ProductServiceInterface;

/**
 * This is Product controller.
 * This handles Product CRUD processing.
 */
class ProductController extends Controller
{
    /**
     * product interface
     */
    private $productInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductServiceInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * To show product information
     * 
     * @return View index product
     */
    public function index(Request $request)
    {
        $products = $this->productInterface->index();
        $i = ($request->input('page', 1) - 1) * 5;

        return view('admin.product.index', compact('products','i'));
    }
    
     /**
     * To show create product view
     * 
     * @return View create product
     */
    public function create()
    {
        $data = $this->productInterface->create();

        return view('admin.product.create',compact('data'));
    }

    /**
     * To store product information
     * 
     * @return View index product
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->productInterface->store($request);

        Toastr::success('Product Create Successfully!','SUCCESS');
        return redirect()->route('admin.product.index');
    }

    /**
     * To delete product information
     * 
     * @return View index product
     */
    public function destroy($id)
    {
        $product = $this->productInterface->destroy($id);

        Toastr::success('Product Delete Successfully!','SUCCESS');
        return redirect()->route('admin.product.index');
    }

    /**
     * To show product detail information
     * 
     * @return View detail page
     */
    public function show($id)
    {
        $product = $this->productInterface->show($id);

        return view('admin.product.show',compact('product'));
    }

    /**
     * To show product edit page
     * 
     * @return View index edit
     */
    public function edit($id)
    {
        $data = $this->productInterface->edit($id);
        $categories = Category::all();

        return view('admin.product.edit',compact(['data','categories']));
    }

    /**
     * To update product information
     * 
     * @return View index product
     */
    public function update(ProductUpdateRequest $request,$id)
    {
        $product = $this->productInterface->update($request,$id);
        
        Toastr::success('Product Update Successfully!','SUCCESS');
        return redirect()->route('admin.product.index');
    }
}



