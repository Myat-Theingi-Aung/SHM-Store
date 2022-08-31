<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contracts\Services\Checkout\CheckoutServiceInterface;

class CheckoutController extends Controller
{
    /**
     * checkout interface
     */
    private $checkoutInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CheckoutServiceInterface $checkoutServiceInterface)
    {
        $this->checkoutInterface = $checkoutServiceInterface;
    }

    /**
     * To show checkout view
     * @return View checkout view
     */
    public function showCheckoutView()
    {
        $data = $this->checkoutInterface->getCheckoutData();
        
        return view('checkout')->with([ 'user' => $data['user'], 'cart' => $data['cart'] ]);
    }
    
    /**
     * To submit checkout view
     * @param Request $request
     * @return View home or back
     */
    public function submitCheckoutView(Request $request)
    {   
        $result = $this->checkoutInterface->saveCheckoutData($request);
        if( $result ){
            Toastr::success('Your Order Submitted Successfully!', 'SUCCESS');

            return redirect()->route('home');
        }else{
            Toastr::error('Order Submitted Failed!', 'ERROR');

            return back();
        }
    }
}
