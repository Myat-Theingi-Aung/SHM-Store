<?php

namespace App\Contracts\Services\HomePage;

interface HomePageServiceInterface
{
    /**
     * To get random product list and random feedback list
     * @return $productList
     */
    public function getHomePageData();
}