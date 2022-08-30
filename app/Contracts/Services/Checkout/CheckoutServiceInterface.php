<?php

namespace App\Contracts\Services\Checkout;

use Illuminate\Http\Request;

interface CheckoutServiceInterface
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