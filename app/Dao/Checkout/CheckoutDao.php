<?php

namespace App\Dao\Checkout;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Mail\OrderVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\Checkout\CheckoutDaoInterface;

class CheckoutDao implements CheckoutDaoInterface
{
    /**
     * To get checkout data
     * @return Array $checkoutData
     */
    public function getCheckoutData()
    {
        $user = auth()->user();
        $cart = session()->get('cart');

        return $checkoutData = [
            'user' => $user,
            'cart' => $cart
        ];
    }

    /**
     * To save checkout data
     * @param Request $request
     * @return Boolean checkout data is save or not
     */
    public function saveCheckoutData(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
            'total_amt' => 'required'
        ]);

        DB::beginTransaction();
        try{
            $user_id = auth()->id();

            // Update User Info
            $user = User::find($user_id);
            $user->name    = $data['name'];
            $user->email   = $data['email'];
            $user->phone   = $data['phone'];
            $user->address = $data['address'];
            $user->save();

            // Store Order
            $order = new Order();
            $order->user_id   = $user_id;
            $order->total_amt = $data['total_amt'];
            $order->save();

            // Store Order Items
            $cart = session()->get('cart');
            foreach($cart as $item){
                $product = Product::where('id', $item['id'])->select('id', 'original_price', 'offer_price')->first();
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->offer_price ?? $product->original_price,
                    'qty'        => $item['qty']
                ]);
            }
            DB::commit();
            Mail::to($user->email)->send(new OrderVoucher($user,$order,$cart));
            session()->forget('cart');
            return true;
        }catch(\Exception $e){
            DB::rollback();
            return false;
        }
    }
}
