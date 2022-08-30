<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contracts\Services\Order\OrderServiceInterface;

/**
 * This is Order controller.
 * This handles Order List,Details and Destroy processing. 
 */
class OrderController extends Controller
{
    /**
     * order interface
     */
    private $orderInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OrderServiceInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }

    /**
    * To get order list
    * @param Request $request request with inputs
    * @return $orders , $i - number
    */
    public function index(Request $request){
        $orders = $this->orderInterface->index($request);
        $i = ($request->input('page', 1) - 1) * 10;
        return view('admin.order.index',compact('orders','request','i'));
    }

    /**
    * To show today order list
    * @return $orders
    */
    public function todayOrder(){
        $orders = $this->orderInterface->todayOrder();
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.todayOrder',compact('orders','i'));
    }

    /**
    * To update order status 
    */
    public function statusUpdate(){
        $this->orderInterface->statusUpdate();
        return response()->json(['success' => true]);
    }

    /**
    * To show pending order list
    * @return $orders
    */
    public function pendingOrder(){
        $orders = $this->orderInterface->pendingOrder();
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.pendingOrder',compact('orders','i'));
    }

    /**
    * To show completed order list
    * @return $orders
    */
    public function completedOrder(){
        $orders = $this->orderInterface->completedOrder();
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.completeOrder',compact('orders','i'));
    }

    /**
    * To delete order
    * @param string $id order id
    * @return string message success or not
    */
    public function destroy($id){
        $order = $this->orderInterface->destroy($id);
        Toastr::success('Order Delete Successfully!','SUCCESS');
        return redirect()->route('admin.order.index');
    }

    /**
    * To show order details information
    * @return Object $orders
    */
    public function orderDeatils($id){
        $order = $this->orderInterface->orderDeatils($id);
        return view('admin.order.show',compact('order'));
    }

}
