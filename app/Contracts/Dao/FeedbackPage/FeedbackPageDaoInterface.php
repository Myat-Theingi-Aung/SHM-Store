<?php

namespace App\Contracts\Dao\FeedbackPage;

use Illuminate\Http\Request;

interface FeedbackPageDaoInterface
{
    /**
     * To save feedback
     * @param Request $request
     * @return Object $feedback saved feedback
     */
    public function saveFeedback(Request $request);
}