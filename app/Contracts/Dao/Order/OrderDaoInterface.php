<?php

namespace App\Contracts\Dao\Order;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Order
 */
interface OrderDaoInterface
{
    /**
    * To get order list
    * @param Request $request request with inputs
    * @return $orders
    */
    public function index(Request $request);

    /**
    * To show today order list
    * @return $orders
    */
    public function todayOrder();

    /**
    * To update order status 
    */
	public function statusUpdate();

    /**
    * To show pending order list
    * @return $orders
    */
	public function pendingOrder();

    /**
    * To show completed order list
    * @return $orders
    */
    public function completedOrder();

    /**
    * To delete order
    * @param string $id order id
    * @return string message success or not
    */
    public function destroy($id);

    /**
    * To show order details information
    * @return Object $orders
    */
    public function orderDeatils($id);

    /**
    * To search order information with username, start date and end date
    * @param Request $request request with inputs
    * @return $orders
    */
    public function search(Request $request);
}