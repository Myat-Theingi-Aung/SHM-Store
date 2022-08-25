<?php

namespace App\Http\Controllers\Home;


use App\Models\Product;
<<<<<<< HEAD
use App\Models\Review;
=======
use App\Models\Category;
>>>>>>> 79e57b9485a1acb082b7afe268f616bbff125f17
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Home\HomeServiceInterface;

class HomeController extends Controller
{
    /**
     * home interface
     *
     */
    private $homeInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeServiceInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;
    }

    /**
     * To show home page
     * @return $products
     * @return View user list
     */
    public function showHomePage()
    {
<<<<<<< HEAD
        $products = Product::with('category')->take(8)->inRandomOrder()->get();
        $reviews =  Review::take(4)->inRandomOrder()->get();
        return view('home', compact('products','reviews'));
=======
        $products = $this->homeInterface->getRandomProductList();
        return view('home', compact('products'));
>>>>>>> 79e57b9485a1acb082b7afe268f616bbff125f17
    }

    /**
     * To show about page
     * @return View about
     */
    public function showAboutPage()
    {
        return view('about');
    }
<<<<<<< HEAD
    public function feedback()
    {
        return view('feedback');
    }
    public function product()
    {
        return view('product');
=======

    /**
     * To show product page
     * @return $categories
     * @return $products
     * @return View product
     */
    public function showProductPage()
    {
        $categories = Category::has('products')->get();
        $products   = $this->homeInterface->getProductList();
        return view('product', compact('products','categories'));
    }
    
    /**
     * To show product-category page
     * @return $categories
     * @return $products
     * @return View product-category
     */
    public function showProductPageByCategory($category_id) 
    {
        $categories = Category::has('products')->get();
        $products   = $this->homeInterface->getProductsByCategoryId($category_id);
        return view('product-category', compact('categories','products'));
>>>>>>> 79e57b9485a1acb082b7afe268f616bbff125f17
    }
}
