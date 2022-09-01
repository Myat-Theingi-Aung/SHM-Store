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
