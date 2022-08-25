<?php

namespace App\Contracts\Services\Feedback;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Feedback
 */
interface FeedbackServiceInterface
{
    /**
    * To get feedback list
    * @param Request $request
    * @return $feedbackList
    */
    public function showFeedbackList(Request $request);
    
    /**
    * To delete feedback by id
    * @param string $id feedback id
    */
    public function deleteFeedback($id);
        
}