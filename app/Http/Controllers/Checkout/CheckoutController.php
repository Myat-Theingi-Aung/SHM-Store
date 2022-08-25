<?php

namespace App\Http\Controllers\Checkout;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    public function showCheckoutView()
    {
        $user = auth()->user();
        $cart = session()->get('cart');
        return view('checkout', compact('user', 'cart'));
    }

    public function submitCheckoutView(Request $request)
    {   
        //dd($request->all());
        DB::beginTransaction();
        try{
            $user_id = auth()->id();

            // Update User Info
            $user = User::find($user_id);
            $user->email   = $request['email'];
            $user->phone   = $request['phone'];
            $user->address = $request['address'];
            $user->save();

            // Store Order
            $order = new Order();
            $order->user_id   = $user_id;
            $order->total_amt = $request['total_amt'];
            $order->save();

            // Store Order Items
            $cart = session()->get('cart');
            //dd($cart);
            foreach($cart as $item){
                $product = Product::where('id', $item['id'])->select('id', 'offer_price')->first();
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->offer_price,
                    'qty'        => $item['qty']
                ]);
            }

            DB::commit();
            session()->forget('cart');
            Toastr::success('Your Order Submitted Successfully &nbsp;<i class="fa fa-check-circle"></i>', 'SUCCESS');
            return redirect()->route('home');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error($e->getMessage(), 'ERROR');
            return back();
        }
    }
}
