<?php

namespace App\Dao\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Product\ProductDaoInterface;
use App\Models\Category;

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
        $data = Product::with('category')->get();

        return $data;
    }

    /**
     * To get product and categories information
     * @return array $data return categories information, $products return product information
     */
    public function create()
    {
        //$data = Product::with('category')->get();
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
        //dd($request->all());
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

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->original_price = $request->original_price;
        $product->offer_price = $request->offer_price;
        $product->photo = $request->photo;
        $product->description = $request->description;
        $product->update();
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
            $save_path = public_path('uploads/prodcut');
            $file->move($save_path, $save_path."/$file_name");

            $product->update([
                'photo' => $file_name,
            ]);
        }
    }
}