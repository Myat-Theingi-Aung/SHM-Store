<?php

namespace App\Dao\HomePage;

use App\Models\Review;
use App\Models\Product;
use App\Contracts\Dao\HomePage\HomePageDaoInterface;

class HomePageDao implements HomePageDaoInterface
{
    /**
     * To get random product list and random feedback list
     * @return $data
     */
    public function getHomePageData()
    {
        $productList  = Product::with('category')->inRandomOrder()->take(8)->get();
        $feedbackList = Review::orderBy('created_at', 'DESC')->paginate(4);
        
        return $data = [ $productList, $feedbackList ];
    }
}