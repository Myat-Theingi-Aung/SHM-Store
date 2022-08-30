<?php

namespace App\Http\Controllers\Order;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = $this->search($request);
        $i = ($request->input('page', 1) - 1) * 10;
        return view('admin.order.index',compact('orders','request','i'));
    }

    public function todayOrder(){
        $orders = Order::whereDate('created_at', Carbon::today())->paginate(10);
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.todayOrder',compact('orders','i'));

    }

    public function statusUpdate(){
        $data = request()->all();
        $order = Order::where('id',$data['id'])->first();
        $order->status = $data['status'];
        $order->save();
        return response()->json(['success' => true]);
    }

    public function pendingOrder(){
        $orders = Order::with('user')->where('status','0')->paginate(10);
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.pendingOrder',compact('orders','i'));
    }

    public function completedOrder(){
        $orders = Order::with('user')->where('status','1')->paginate(10);
        $i = (request()->input('page', 1) - 1) * 10;
        return view('admin.order.completeOrder',compact('orders','i'));
    }

    public function destroy($id){
        $order = Order::findOrFail($id);
        if($order){
            $order->delete();
        }
    }

    public function orderDeatils($id){
        $order = Order::with('orderItems')->where('id',$id)->first();
        return view('admin.order.show',compact('order'));
    }

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
