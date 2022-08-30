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
     * To get product list by category_id and category list
     * @return $data
     */
    public function getProductListByCategoryId($category_id)
    { 
        $products    = Product::where('category_id', $category_id)->get();
        $categories  = Category::has('products')->get();
        return $data = [ $products, $categories];
    }
}