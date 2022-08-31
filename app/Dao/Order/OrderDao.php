<?php

namespace App\Dao\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Contracts\Dao\Order\OrderDaoInterface;

/**
 * Data accessing object for post
 */
class OrderDao implements OrderDaoInterface
{
    /**
    * To get order list
    * @param Request $request request with inputs
    * @return $orders
    */
    public function index(Request $request){
        $orders = $this->search($request);
        return $orders;
    }

    /**
    * To show today order list
    * @return $orders
    */
    public function todayOrder(){
        $orders = Order::whereDate('created_at', Carbon::today())->paginate(10);
        return $orders;
    }

    /**
    * To update order status 
    */
    public function statusUpdate(){
        $data = request()->all();
        $order = Order::where('id',$data['id'])->first();
        $order->status = $data['status'];
        $order->save();
        return $order;
    }

    /**
    * To show pending order list
    * @return $orders
    */
    public function pendingOrder(){
        $orders = Order::with('user')->where('status','0')->paginate(10);
        return $orders;
    }

    /**
    * To show completed order list
    * @return $orders
    */
    public function completedOrder(){
        $orders = Order::with('user')->where('status','1')->paginate(10);
        return $orders;
    }

    /**
    * To delete order
    * @param string $id order id
    * @return string message success or not
    */
    public function destroy($id){
        $order = Order::findOrFail($id);
        $order->deleted_at = Carbon::now();
        $order->save();
        return $order;
    }

    /**
    * To show order details information
    * @return Object $orders
    */
    public function orderDeatils($id){
        $orders = Order::with('orderItems')->where('id',$id)->first();
        return $orders;
    }

    /**
    * To search order information with username, start date and end date
    * @param Request $request request with inputs
    * @return $orders
    */
    public function search(Request $request)
    {
        $orders = Order::with('user');
        if($request->has('name') || $request->has('start_date') || $request->has('end_date')){
            if ($request['name'] != null) {
                $orders = $orders->whereHas('user',function(Builder $query){
                    $query->where('name','LIKE','%'.request()->name.'%');
                });
            }
            if ($request['start_date'] != null) {
                $orders = $orders->where('created_at', '>=', $request->start_date);
            }
            if ($request['end_date'] != null) {
                $orders = $orders->where('created_at', '<=',  $request->end_date);
            }             
        }
        return $orders->paginate(10);      
    }
}