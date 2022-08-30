<?php

namespace App\Contracts\Dao\HomePage;

interface HomePageDaoInterface
{
    /**
     * To get random product list and random feedback list
     * @return $productList
     */
    public function getHomePageData();
}