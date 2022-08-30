<?php

namespace App\Dao\Product;

use App\Models\Product;
use App\Models\Category;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use App\Http\Requests\ProductImportRequest;
use App\Contracts\Dao\Product\ProductDaoInterface;

/**
 * Data accessing object for post
 */
class ProductDao implements ProductDaoInterface
{
   /**
     * To get product and category information
     * @return array $data return product and category information
     */ 
    public function index()
    {
        $data = Product::with('category')->orderBy('created_at','desc')->paginate(10);

        return $data;
    }

    /**
     * To get product and categories information
     * @return array $data return categories information, $products return product information
     */
    public function create()
    {
        $category = Category::all();
        
        return $category;
    }

    /**
     * To store product information
     * @param Request $request request with inputs
     * @return Object $product saved product
     */
    public function store($request)
    {
        $product = new Product();

        $product->category_id = $request['category_id'];
        $product->name = $request['name'];
        $product->brand = $request->brand;
        $product->original_price = $request['original_price'];
        $product->offer_price = $request['offer_price'];
        $product->photo = $request['photo'];
        $product->description = $request['description'];
        $product->save();
        $this->storeImage($product);

        return $product;
    }

    /**
    * To delete product by id
    * @param string $id product id
    */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product){
            $product->delete();
        }
    }

    /**
     * To show product detail information
     * @param string $id product id
     * @return Object $product Product Object
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return $product;
    }

    /**
     * To store old value in edit page
     * @param string $id product id
     * @return Object $product Product Object
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return $product;
    }

    /**
     * To update product by id
     * @param Request $request request with inputs
     * @param string $id product id
     * @return Object $product Product Object
     */
    public function update($request,$id)
    {
        $product =Product::find($id);

        $product->category_id = $request['category_id'];
        $product->name = $request['name'];
        $product->brand = $request->brand;
        $product->original_price = $request['original_price'];
        $product->offer_price = $request['offer_price'];
        if($request['photo']){
            $product->photo = $request['photo'];
        }     
        $product->description = $request['description'];
        $product->save();
        $this->storeImage($product);

        return $product;   
    }

    /**
     * To store and update product photo
     * @param Object $product product object
     */
    public function storeImage($product)
    {
        if(request()->hasFile('photo')){
            $file = request()->file('photo');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/product');
            $file->move($save_path, $save_path."/$file_name");

            $product->update([
                'photo' => $file_name,
            ]);
        }
    }

    /**
    * To export product information
    * 
    * @return View index product
    */
    public function export(){

        return Excel::download(new ProductExport,'products.xlsx',ExcelExcel::XLSX);
    }

    /**
    * To import product information
    * 
    * @return View index product
    */
    public function import($request){

        return Excel::import(new ProductImport, $request['file']);
    }
}