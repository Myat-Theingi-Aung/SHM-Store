<?php

namespace App\Dao\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Contracts\Dao\Cart\CartDaoInterface;

class CartDao implements CartDaoInterface
{
    /**
     * To get cart list
     * @return $result array
     */
    public function getCart()
    {
        if( session()->has('cart') && count(session()->get('cart')) > 0 ){
            $cart = session()->get('cart');
            return $result = [
                'status' => true,
                'cart'   => $cart
            ];
        }
        return $result = [
            'status' => false
        ];
    }

    /**
     * To get cart list
     * @param Request $request
     * @return $result array
     */
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $cart    = session()->get('cart');

        if( isset($cart[$id]) ){
            return $result = [
                'msg'  => 'error',
                'cart' => $cart,
            ];
        }

        $cart[$id] = $product->toArray();
        $cart[$id]['price'] = $product->offer_price ?? $product->original_price;
        $cart[$id]['qty']   = 1;
        session()->put('cart', $cart);
        return $result = [
            'msg'  => 'success',
            'cart' => $cart,
        ];
    }

    /**
     * To get cart list
     * @param Request $request
     * @return $result array
     */
    public function updateCart(Request $request)
    {
        $data = $request->all();

        $cart = session()->get('cart');
        $cart[$data['id']]['qty'] = $data['qty'];

        $tt_price  = $cart[$data['id']]['offer_price'] * $data['qty'];
        $sub_total = number_format($tt_price);

        session()->put('cart', $cart);
        return $result = [
            'sub_total' => $sub_total
        ];
    }

    /**
     * To remove cart item
     * @param $id cart id
     * @return $status
     */
    public function removeCart($id)
    {
        $cart = session()->get('cart');
        unset( $cart[$id] );
        session()->put('cart', $cart);
        return count(session()->get('cart')) > 0 ? $status = true : $status = false;
    }

    /**
     * To delete cart
     */
    function clearCart()
    {
        session()->forget('cart');
    }
}