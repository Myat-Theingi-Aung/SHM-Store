<?php

namespace App\Contracts\Services\Cart;

use Illuminate\Http\Request;

interface CartServiceInterface
{
    public function getCart();
    
    public function addToCart(Request $request);
   
    public function updateCart(Request $request);
 
    public function removeCart($id);

    public function clearCart();
}
