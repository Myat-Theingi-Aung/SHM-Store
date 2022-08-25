<?php

namespace App\Http\Controllers\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contracts\Services\Cart\CartServiceInterface;

class CartController extends Controller
{
    /**
     * cart interface
     */
    private $cartInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartInterface = $cartServiceInterface;
    }
    
    /**
     * To save user cart item
     * @return Response json msg and cartList
     */    
    public function addToCart(Request $request)
    {
        $result = $this->cartInterface->addToCart($request);
        return response()->json([
            'msg'  => $result['msg'],
            'cart' => $result['cart']
        ]);
    }

    /**
     * To show cart list page
     * @return View cart list page
     */ 
    public function viewCart()
    {
        $result = $this->cartInterface->getCart();
        if( $result['status'] ){
            return view('cart')->with([ 'cart' => $result['cart'] ]);
            return redirect(url('/'));
        }
        Toastr::info('Your Cart is Empty &nbsp;<i class="fa fa-exclamation-circle"></i>', 'INFO');
        return back();
    }

    public function updateCart(Request $request)
    {
        $result = $this->cartInterface->updateCart($request);
        return response()->json([
            'sub_total' => $result['sub_total']
        ]);
    }

    /**
     * To remove cart item
     * @param $id cart id
     * @return View cart list page
     */
    public function removeCart($id)
    {
        $result = $this->cartInterface->removeCart($id);
        if($result){
            Toastr::success('Cart Item Removed Successfully &nbsp;<i class="fa fa-exclamation-circle"></i>', 'SUCCESS');
            return back();
        }
        return redirect(url('/'));
    }

    /**
     * To delete cart
     * @return View home page
     */
    function clearCart()
    {
        $this->cartInterface->clearCart();
        return redirect(url('/'));
    }
}
