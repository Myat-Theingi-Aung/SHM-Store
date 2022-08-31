<?php

namespace App\Contracts\Services\Subscriber;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Subscriber
 */
interface SubscriberServiceInterface
{
    /**
    * To get post list
    * @return $postList
    */
    public function index();
    public function store($request);
    public function delete($id);
}   