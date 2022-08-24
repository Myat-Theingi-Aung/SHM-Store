<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role','user')->count();
        $products = Product::count();
        $categories = Category::count();
        $orders = Order::count();

        $orderCountByMonth = Order::select( 
            DB::raw('YEAR(created_at) AS year'), 
            DB::raw('DATE_FORMAT(created_at, "%M") AS month'),
            DB::raw('SUM(total_amt) AS sales_volume')
        )->whereYear('created_at', date('Y')) 
         ->groupBy('month','year')
         ->get();
        
        $data = [];
        
        foreach($orderCountByMonth  as $row) {
            $data['label'][] = $row->month;
            $data['data'][] = (int) $row->sales_volume;
        }
    
        $data['chart_data'] = json_encode($data);

        return view('admin.dashboard',compact('users','products','categories','orders'),$data);
    }

    public function line()
    {
        $orderCountByMonth = Order::select( 
            DB::raw('YEAR(created_at) AS year'), 
            DB::raw('DATE_FORMAT(created_at, "%M") AS month'),
            DB::raw('SUM(total_amt) AS sales_volume')
        )->whereYear('created_at', date('Y')) 
         ->groupBy('month','year')
         ->get();
        
        $data = [];
        
        foreach($orderCountByMonth  as $row) {
            $data['label'][] = $row->month;
            $data['data'][] = (int) $row->sales_volume;
        }
    
        $data['chart_data'] = json_encode($data);
        return view('bar', $data);
    }

}


