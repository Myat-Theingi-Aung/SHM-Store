<?php
namespace App\Contracts\Dao\Subscriber;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Subscriber
 */
interface SubscriberDaoInterface
{
    /**
    * To get subscriber list
    * @return $subscribers
    */
    public function index();
    
    public function delete($id);
}
