<?php

namespace App\Services\Feedback;

use Illuminate\Http\Request;
use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;

/**
 * Service class for feedback.
 */
class FeedbackService implements FeedbackServiceInterface
{
    /**
    * feedback dao
    */
    private $feedbackDao;

    /**
    * Class Constructor
    * @param FeedbackDaoInterface
    * @return
    */
    public function __construct(FeedbackDaoInterface $feedbackDao)
    {
        $this->feedbackDao = $feedbackDao;
    }

    /**
    * To get feedback list
    * @return array $feedbacks Feedback list
    */    
    public function showFeedbackList(Request $request) 
    {
        return $this->feedbackDao->showFeedbackList($request);
    }

    /**
    * To destroy feedback by id
    * @param string $id feedback id
    * @return string $message message success or not
    */
    public function deleteFeedback($id) 
    {
        return $this->feedbackDao->deleteFeedback($id);
    }
    
}