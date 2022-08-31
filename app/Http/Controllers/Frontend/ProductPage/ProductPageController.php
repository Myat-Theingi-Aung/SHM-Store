<?php

namespace App\Http\Controllers\Frontend\ProductPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\ProductPage\ProductPageServiceInterface;

class ProductPageController extends Controller
{
    /**
     * home interface
     *
     */
    private $productPageInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductPageServiceInterface $productPageServiceInterface)
    {
        $this->productPageInterface = $productPageServiceInterface;
    }

    /**
     * To show product page
     * @return $i
     * @return $categories
     * @return $products
     * @return View product
     */
    public function showProductPage()
    {
        $data = $this->productPageInterface->getProductList();
        $i    = (request()->input('page', 1) - 1) * 8;
        return view('product')->with([
            'i'          => $i,
            'products'   => $data[0],
            'categories' => $data[1]
        ]);
    }

    /**
     * To show product-category page
     * @return $i
     * @return $categories
     * @return $products
     * @return View product-category
     */
    public function showProductPageByCategory($category)
    {
        $data = $this->productPageInterface->getProductListByCategory($category);
        $i    = (request()->input('page', 1) - 1) * 8;
        return view('product-category')->with([
            'i'          => $i,
            'products'   => $data[0],
            'categories' => $data[1],
        ]);
    }
}
