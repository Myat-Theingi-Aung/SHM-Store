<?php

namespace App\Contracts\Dao\Checkout;

use Illuminate\Http\Request;

interface CheckoutDaoInterface
{
    /**
     * To get checkout data
     * @return $checkoutData
     */
    public function getCheckoutData();

    /**
     * To save checkout data
     * @param Request $request
     */
    public function saveCheckoutData(Request $request);
}