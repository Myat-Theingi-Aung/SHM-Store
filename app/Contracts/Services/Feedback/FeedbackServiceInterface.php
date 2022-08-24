<?php

namespace App\Contracts\Services\Feedback;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Feedback
 */
interface FeedbackServiceInterface
{
    /**
    * To get post list
    * @return $postList
    */
    public function index();

    /**
    * To store feedback
    * @param Request $request request with inputs
    * @return Object $product store feedback
    */
	public function store(Request $request);

    /**
    * To delete feedback by id
    * @param string $id feedback id
    * @return string $message message success or not
    */
	public function destroy($id);

    /**
    * To show feedback details
    * @param string $id feedback id
    * @return Object $feedback to show feedback details
    */
    public function show($id);

    
}