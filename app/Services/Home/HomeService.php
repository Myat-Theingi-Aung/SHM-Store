<?php

namespace App\Services\Home;

use App\Models\Product;
use App\Contracts\Dao\Home\HomeDaoInterface;
use App\Contracts\Services\Home\HomeServiceInterface;

class HomeService implements HomeServiceInterface
{
    /**
    * category dao
    */
    private $homeDao;
    
    /**
     * Class Constructor
     * @param HomeDaoInterface
     * @return
     */
    public function __construct(HomeDaoInterface $homeDao)
    {
        $this->homeDao = $homeDao;
    }

    /**
     * To get random product list
     * @return $productList
     */
    public function getRandomProductList()
    {
       return $this->homeDao->getRandomProductList();
    }

    /**
     * To get random product list
     * @return $productList
     */
    public function getProductList()
    {
        return $this->homeDao->getProductList();
    }
    
    /**
     * To get product list by category_id
     * @return $productList
     */
    public function getProductsByCategoryId($category_id)
    {
        return $this->homeDao->getProductsByCategoryId($category_id);
    }

    /**
     * To get random feedback list
     * @return $feedbackList
     */
    public function getRandomFeedbackList()
    {
        return $this->homeDao->getRandomFeedbackList();
    }
}