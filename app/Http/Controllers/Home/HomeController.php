<?php

namespace App\Http\Controllers\Home;


use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
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
        $products = $this->homeInterface->getRandomProductList();
        return view('home', compact('products'));
    }

    /**
     * To show about page
     * @return View about
     */
    public function showAboutPage()
    {
        return view('about');
    }

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
    }

    public function cart()
    {
        return view('cart');
    }

    public function feedback()
    {
        return view('feedback');
    }
}
