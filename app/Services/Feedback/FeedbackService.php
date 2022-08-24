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
    public function index()
    {
        return $this->feedbackDao->index();
    }


    /**
    * To store feedback
    * @param Request $validated request with inputs
    * @return Object $feedback saved feedback
    */
    public function store($validated)
    {
        return $this->feedbackDao->store($validated);
    }

    /**
    * To destroy feedback by id
    * @param string $id feedback id
    * @return string $message message success or not
   */
    public function destroy($id)
    {
        return $this->feedbackDao->destroy($id);
    }

    /**
    * To show feedback details view
    * @param $feedback feedback information
    * @return array feedback show view
    */
    public function show($id)
    {
        return $this->feedbackDao->show($id);
    }
    
}