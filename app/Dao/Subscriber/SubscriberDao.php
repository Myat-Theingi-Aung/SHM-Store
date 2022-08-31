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

	/**
     * To delete subscriber by id
     * @param string $id subscriber id
     * @param string $deletedSubscriberId deleted subscriber id
     */
	public function delete($id)
	{
		$subscriber = Subscriber::findOrFail($id);
		if ($subscriber) {
			$subscriber->delete();
		}
	}
	
	/**
     * To save subscriber
     * @param Request $validated validated values from subscriber request
     * @return Object $subscriber saved subscriber
     */
	public function store($validated)
	{
		$subscriber = new Subscriber();

		$subscriber->email = $validated['email'];
		$subscriber->save();

		return $subscriber;
	}
}
