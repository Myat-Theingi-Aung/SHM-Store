<?php

namespace App\Contracts\Services\FeedbackPage;

use Illuminate\Http\Request;

interface FeedbackPageServiceInterface
{
    /**
     * To save feedback
     * @param Request $request
     * @return Object $feedback saved feedback
     */
    public function saveFeedback(Request $request);
}