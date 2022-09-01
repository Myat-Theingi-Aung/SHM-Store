<?php

namespace App\Contracts\Services\Subscriber;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Subscriber
 */
interface SubscriberServiceInterface
{
    /**
     * To get subscriber list
     * @return $subscribers
     */
    public function index();

    /**
     * To save subscriber
     * @param Request $validated validated values from subscriber request
     * @return Object $subscriber saved subscriber
     */
    public function store($validated);

    /**
     * To delete subscriber by id
     * @param string $id subscriber id
     * @param string $deletedSubscriberId deleted subscriber id
     */
    public function delete($id);
}   