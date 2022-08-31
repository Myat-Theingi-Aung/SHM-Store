<?php

namespace App\Contracts\Services\ProductPage;

interface ProductPageServiceInterface
{
    /**
     * To get product list and category list
     * @return $data
     */
    public function getProductList();
    
    /**
     * To get product list by category and category list
     * @return $data
     */
    public function getProductListByCategory($category);
}