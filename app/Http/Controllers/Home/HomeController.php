<?php

namespace App\Http\Controllers\Home;


use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('category')->take(8)->inRandomOrder()->get();
        $reviews =  Review::take(4)->inRandomOrder()->get();
        return view('home', compact('products','reviews'));
    }
    public function about()
    {
        return view('about');
    }
    public function feedback()
    {
        return view('feedback');
    }
    public function product()
    {
        return view('product');
    }
    public function cart()
    {
        return view('cart');
    }
}
