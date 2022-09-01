<?php

namespace App\Dao\FeedbackPage;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Contracts\Dao\FeedbackPage\FeedbackPageDaoInterface;

class FeedbackPageDao implements FeedbackPageDaoInterface
{
    /**
     * To save feedback
     * @param Request $request
     * @return Object $feedback saved feedback
     */
    public function saveFeedback(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required'
        ]);
        
        $feedback = new Review();
        $feedback->name    = $data['name'];
        $feedback->email   = $data['email'];
        $feedback->message = $data['message'];
        $feedback->save();

        return $feedback;
    }
}