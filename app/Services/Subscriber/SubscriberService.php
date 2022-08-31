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
    * To get porduct list
    * @return array $products Product list
    */
    public function index()
    {
        return $this->subscriberDao->index();
    }
    public function store($request)
    {
        return $this->subscriberDao->store($request);
    }

    public function delete($id)
    {
        return $this->subscriberDao->delete($id);
    }
  }