<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProductRequest;
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
    public function index()
    {
        $products = $this->productInterface->index();

        return view('admin.product.index',compact('products'));
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

        return redirect()->route('admin.product.index')->with('status',"Product create successfully!");
    }

    /**
     * To delete product information
     * 
     * @return View index product
     */
    public function destroy($id)
    {
        $product = $this->productInterface->destroy($id);

        return redirect()->route('admin.product.index')->with('status','product delete successfully!');
    }

    /**
     * To show product edit page
     * 
     * @return View index edit
     */
    public function edit($id)
    {
        $product = $this->productInterface->edit($id);

        return view('admin.product.edit',compact('product'));
    }

    /**
     * To update product information
     * 
     * @return View index product
     */
    public function update(ProductUpdateRequest $request,$id)
    {
        $product = $this->productInterface->update($request,$id);
        
        return redirect()->route('product.index')->with('status','product update successfully!');
    }
}



