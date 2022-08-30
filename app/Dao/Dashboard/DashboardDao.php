<?php

namespace App\Dao\Dashboard;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Contracts\Dao\Dashboard\DashboardDaoInterface;

/**
 * Data accessing object for dashboard
 */
class DashboardDao implements DashboardDaoInterface
{
   /**
     * To get all data
     * @return array $data return monthly sales amoung and $users- total users , $products - total products , $order - total orders , $categories - total categories
     */ 
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
        )
        ->orderBy('year', 'desc')
        ->groupBy('month','year')->limit(6)
         ->get();
         $data = [];
        
        foreach($orderCountByMonth  as $row) {
            $data['label'][] = $row->month;
            $data['data'][] = (int) $row->sales_volume;
        }
    
        $data['chart_data'] = json_encode($data);

        $dataList = [
            'users'      => $users,
            'products'   => $products,
            'categories' => $categories,
            'orders'  => $orders,
            'data'    => $data
        ];

        return $dataList;
    }

}