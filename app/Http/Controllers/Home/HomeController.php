<?php

namespace App\Http\Controllers\Home;


use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

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

    public function storeFeedback(Request $request)
    {
        $review = new Review();
        $review->name    = $request['name'];
        $review->email   = $request['email'];
        $review->message = $request['message'];
        $review->save();

        Toastr::success('Thank Your For Your Feedback', 'SUCCESS');
        return redirect(url('/'));
    }

    public function product()
    {
        return view('product');
    }
    
}
