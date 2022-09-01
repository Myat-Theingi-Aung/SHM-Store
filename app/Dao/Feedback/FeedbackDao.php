<?php

namespace App\Dao\Feedback;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Contracts\Dao\Feedback\FeedbackDaoInterface;

/**
 * Data accessing object for post
 */
class FeedbackDao implements FeedbackDaoInterface
{
    /**
     * To get feedback information
     * @return array $data return feedback information
     */ 
    public function showFeedbackList(Request $request)
    {
        $feedbacks = Review::orderBy('created_at','desc')->paginate(5);
        
        return $feedbacks;
    }

    /**
    * To delete feedback by id
    * @param string $id feedback id
    */
    public function deleteFeedback($id)
    {
        $feedback = Review::find($id);
        $feedback->delete();
    }
    
}