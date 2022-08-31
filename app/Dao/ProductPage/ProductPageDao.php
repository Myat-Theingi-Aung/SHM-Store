<?php

namespace App\Dao\ProductPage;

use App\Models\Product;
use App\Models\Category;
use App\Contracts\Dao\ProductPage\ProductPageDaoInterface;

class ProductPageDao implements ProductPageDaoInterface
{
    /**
     * To get product list and category list
     * @return $data
     */
    public function getProductList()
    {
        $categories  = Category::has('products')->get();
        $products    = Product::with('category')->orderBy('created_at','desc')->paginate(8);
        return $data = [ $products, $categories];
    }
    
    /**
     * To get product list by category and category list
     * @return $data
     */
    public function getProductListByCategory($category)
    { 
        $category = Category::where('name', ucwords(str_replace('-', ' ', $category)))->first();
        $products    = Product::where('category_id', $category->id)->orderBy('created_at','desc')->paginate(4);
        $categories  = Category::has('products')->get();
        return $data = [ $products, $categories];
    }
}