<?php

namespace App\Http\Controllers\Home;


use App\Models\Product;
use App\Models\Category;
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
        $products = Product::with('category')->latest()->take(6)->orderBy('created_at', 'DESC')->get();
        return view('home', compact('products'));
    }
    public function about()
    {
        return view('about');
    }
    public function home()
    {
        return view('home');
    }
    public function product()
    {
        $categories = Category::has('products')->get();
        $products = Product::with('category')->orderBy('created_at', 'DESC')->get();
        return view('product', compact('products','categories'));
    }
    public function getProductsByCategory($category_id) 
    {
        $categories = Category::has('products')->get();
        $products = Product::where('category_id',$category_id)->get();
        return view('product-category', compact('products','categories'));
    }
}
