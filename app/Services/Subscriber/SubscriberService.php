<?php

namespace App\Services\Subscriber;

use Illuminate\Http\Request;
use App\Contracts\Dao\Subscriber\SubscriberDaoInterface;
use App\Contracts\Services\Subscriber\SubscriberServiceInterface;

/**
 * Service class for subscriber.
 */
class SubscriberService implements SubscriberServiceInterface
{
    /**
     * porduct dao
     */
    private $subscriberDao;

    /**
     * Class Constructor
     * @param SubscriberDaoInterface
     * @return
     */
    public function __construct(SubscriberDaoInterface $subscriberDao)
    {
        $this->subscriberDao = $subscriberDao;
    }

    /**
     * To get subscriber list
     * @return $subscribers
     */
    public function index()
    {
        return $this->subscriberDao->index();
    }

    /**
     * To save subscriber
     * @param Request $validated validated values from subscriber request
     * @return Object $subscriber saved subscriber
     */
    public function store($validated)
    {
        return $this->subscriberDao->store($validated);
    }

    /**
     * To delete subscriber by id
     * @param string $id subscriber id
     * @param string $deletedSubscriberId deleted subscriber id
     */
    public function delete($id)
    {
        return $this->subscriberDao->delete($id);
    }
  }