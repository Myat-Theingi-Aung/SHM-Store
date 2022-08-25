<?php

namespace App\Services\Checkout;

use Illuminate\Http\Request;
use App\Contracts\Dao\Checkout\CheckoutDaoInterface;
use App\Contracts\Services\Checkout\CheckoutServiceInterface;

class CheckoutService implements CheckoutServiceInterface
{
    private $checkoutDao;

    public function __construct(CheckoutDaoInterface $checkoutDao)
    {
        $this->checkoutDao = $checkoutDao;
    }

    public function getCheckoutData()
    {
        return $this->checkoutDao->getCheckoutData();
    }

    public function saveCheckoutData(Request $request)
    {   
        return $this->checkoutDao->saveCheckoutData($request);
    }
}