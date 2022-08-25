<?php

namespace App\Contracts\Dao\Home;

interface HomeDaoInterface
{
    /**
     * To get random product list
     * @return $productList
     */
    public function getRandomProductList();

    /**
     * To get random product list
     * @return $productList
     */
    public function getProductList();
    
    /**
     * To get product list by category_id
     * @return $productList
     */
    public function getProductsByCategoryId($category_id);
}