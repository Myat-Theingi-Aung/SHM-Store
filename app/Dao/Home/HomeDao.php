<?php

namespace App\Dao\Home;

use App\Models\Review;
use App\Models\Product;
use App\Contracts\Dao\Home\HomeDaoInterface;

class HomeDao implements HomeDaoInterface
{
    /**
     * To get random product list
     * @return $productList
     */
    public function getRandomProductList()
    {
        $productList = Product::with('category')->inRandomOrder()->take(6)->get();
        return $productList;
    }

    /**
     * To get random product list
     * @return $productList
     */
    public function getProductList()
    {
        $productList = Product::with('category')->orderBy('created_at','desc')->paginate(8);
        return $productList;
    }
    
    /**
     * To get product list by category_id
     * @return $productList
     */
    public function getProductsByCategoryId($category_id)
    {
        $productList = Product::where('category_id', $category_id)->get();
        return $productList;
    }

    /**
     * To get random feedback list
     * @return $feedbackList
     */
    public function getRandomFeedbackList()
    {
        $feedbackList = Review::inRandomOrder()->take(4)->get();
        return $feedbackList;
    }
}