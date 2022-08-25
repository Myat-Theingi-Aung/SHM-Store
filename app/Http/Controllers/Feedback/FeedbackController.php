<?php

namespace App\Http\Controllers\Feedback;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;

class FeedbackController extends Controller
{
     /**
     * feedback interface
     */
    private $feedbackInterface;

    /**
     * Create a new controller instance.
     * @param FeedbackServiceInterface $feedbackServiceInterface
     * @return void
     */
    public function __construct(FeedbackServiceInterface $feedbackServiceInterface)
    {
        $this->feedbackInterface = $feedbackServiceInterface;
    }

    /**
     * To show feedback list
     * @return View feedback list
     */
    public function showFeedbackList(Request $request) 
    {
        $feedbacks = $this->feedbackInterface->showFeedbackList($request);
        return view('admin.feedback.index', compact('feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * To delete feedback by id
     * @param $id feedback id
     * @return View feedback list
     */
    public function deleteFeedback($id) 
    {
        $this->feedbackInterface->deleteFeedback($id); 
        Toastr::success('Feedback Deleted Successfully', 'SUCCESS');
        return back();
        
    }
}
