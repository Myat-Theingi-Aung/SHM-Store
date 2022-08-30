<?php

namespace App\Services\ProductPage;

use App\Models\Product;
use App\Models\Category;
use App\Contracts\Dao\ProductPage\ProductPageDaoInterface;
use App\Contracts\Services\ProductPage\ProductPageServiceInterface;

class ProductPageService implements ProductPageServiceInterface
{
    /**
     * homePage dao
     */
    private $productPageDao;

    /**
     * Class Constructor
     * @param ProductPageDaoInterface
     * @return
     */
    public function __construct(ProductPageDaoInterface $productPageDao)
    {
        $this->productPageDao = $productPageDao;
    }

    /**
     * To get product list and category list
     * @return $data
     */
    public function getProductList()
    {
        return $this->productPageDao->getProductList();
    }
    
    /**
     * To get product list by category_id and category list
     * @return $data
     */
    public function getProductListByCategoryId($category_id)
    { 
        return $this->productPageDao->getProductListByCategoryId($category_id);
    }
}