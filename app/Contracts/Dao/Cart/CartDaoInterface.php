<?php

namespace App\Contracts\Dao\Cart;

use Illuminate\Http\Request;

interface CartDaoInterface
{   
    public function getCart();
    
    public function addToCart(Request $request);

    public function updateCart(Request $request);

    public function removeCart($id);

    function clearCart();
}
