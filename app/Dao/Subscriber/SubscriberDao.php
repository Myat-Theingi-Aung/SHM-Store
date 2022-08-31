<?php

namespace App\Dao\Subscriber;

use App\Models\Subscriber;
use App\Contracts\Dao\Subscriber\SubscriberDaoInterface;





/**
 * Data accessing object for post
 */
class SubscriberDao implements SubscriberDaoInterface
{
   /**
     * To get subscriber 
     * @return array $subscriber return subscriber 
     */ 
    public function index()
    {
        $subscriber = Subscriber::all();
        return $subscriber;
    }
    public function delete($id){
      $subscriber = Subscriber::findOrFail($id);
      if($subscriber){
          $subscriber->delete();
      }
    }
    public function store($request)
    {
        $subscriber = new Subscriber();

        $subscriber->email=$request['email'];
        $subscriber->save();
        return $subscriber;
    }
  }