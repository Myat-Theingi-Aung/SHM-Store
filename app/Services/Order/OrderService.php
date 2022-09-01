<?php

namespace App\Services\Order;

use Illuminate\Http\Request;
use App\Contracts\Dao\Order\OrderDaoInterface;
use App\Contracts\Services\Order\OrderServiceInterface;

/**
 * Service class for Order.
 */
class OrderService implements OrderServiceInterface
{
    /**
    * order dao
    */
    private $orderDao;

    /**
    * Class Constructor
    * @param orderDaoInterface
    * @return
    */
    public function __construct(OrderDaoInterface $orderDao)
    {
        $this->orderDao = $orderDao;
    }

    /**
    * To get order list
    * @param Request $request request with inputs
    * @return $orders
    */
    public function index(Request $request){
        return $this->orderDao->index($request);
    }

    /**
    * To show today order list
    * @return $orders
    */
    public function todayOrder(){
        return $this->orderDao->todayOrder();
    }

    /**
    * To update order status 
    */
	public function statusUpdate(){
        return $this->orderDao->statusUpdate();
    }

    /**
    * To show pending order list
    * @return $orders
    */
	public function pendingOrder(){
        return $this->orderDao->pendingOrder();
    }

    /**
    * To show completed order list
    * @return $orders
    */
    public function completedOrder(){
        return $this->orderDao->completedOrder();
    }

    /**
    * To delete order
    * @param string $id order id
    * @return string message success or not
    */
    public function destroy($id){
        return $this->orderDao->destroy($id);
    }

    /**
    * To show order details information
    * @param string $id order id
    * @return $orders
    */
    public function orderDeatils($id){
        return $this->orderDao->orderDeatils($id);
    }

    /**
    * To search order information with username, start date and end date
    * @param Request $request request with inputs
    * @return $orders
    */
    public function search(Request $request){
        return $this->orderDao->search($request);
    }

}