<?php

namespace App\Services\FeedbackPage;

use Illuminate\Http\Request;
use App\Contracts\Dao\FeedbackPage\FeedbackPageDaoInterface;
use App\Contracts\Services\FeedbackPage\FeedbackPageServiceInterface;

class FeedbackPageService implements FeedbackPageServiceInterface
{
    /**
     * homePage dao
     */
    private $feedbackPageDao;

    /**
     * Class Constructor
     * @param FeedbackPageDaoInterface
     * @return
     */
    public function __construct(FeedbackPageDaoInterface $feedbackPageDao)
    {
        $this->feedbackPageDao = $feedbackPageDao;
    }

    /**
     * To save feedback
     * @param Request $request
     * @return Object $feedback saved feedback
     */
    public function saveFeedback(Request $request)
    {
       return $this->feedbackPageDao->saveFeedback($request);
    }
}