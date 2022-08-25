<?php

namespace App\Contracts\Dao\Dashboard;

/**
 * Interface for Data Accessing Object of Dashboard
 */
interface DashboardDaoInterface
{
    /**
    * to get information
    * @return $users- total users , $products - total products , $order - total orders , $categories - total categories and $data - monthly total sales amount
    */
    public function dashboard();

}    