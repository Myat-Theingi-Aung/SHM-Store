<?php

namespace App\Contracts\Services\Dashboard;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Dashboard
 */
interface DashboardServiceInterface
{
    /**
    * to get information
    * @return $users- total users , $products - total products , $order - total orders , $categories - total categories and $data - monthly total sales amount
    */
    public function dashboard();

}  