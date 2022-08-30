<?php

namespace App\Services\HomePage;

use App\Contracts\Dao\HomePage\HomePageDaoInterface;
use App\Contracts\Services\HomePage\HomePageServiceInterface;

class HomePageService implements HomePageServiceInterface
{
    /**
     * homePage dao
     */
    private $homePageDao;

    /**
     * Class Constructor
     * @param HomePageDaoInterface
     * @return
     */
    public function __construct(HomePageDaoInterface $homePageDao)
    {
        $this->homePageDao = $homePageDao;
    }

    /**
     * To get random product list
     * @return $productList
     */
    public function getHomePageData()
    {
       return $this->homePageDao->getHomePageData();
    }
}