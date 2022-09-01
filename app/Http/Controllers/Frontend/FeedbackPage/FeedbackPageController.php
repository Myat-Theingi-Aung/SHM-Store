<?php

namespace App\Http\Controllers\Frontend\FeedbackPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Contracts\Services\FeedbackPage\FeedbackPageServiceInterface;

class FeedbackPageController extends Controller
{
    /**
     * feedbackPage dao
     */
    private $feedbackPageInterface;

    /**
     * Class Constructor
     * @param ProductPageDaoInterface
     * @return
     */
    public function __construct(FeedbackPageServiceInterface $feedbackPageServiceInterface)
    {
        $this->feedbackPageInterface = $feedbackPageServiceInterface;
    }

    /**
     * To show feedback page
     * @return View feedback form
     */
    public function showFeedbackPage()
    {
        return view('feedback');
    }
    
    /**
     * To store feedback data
     * @param Request $request
     * @return View home
     */
    public function storeFeedback(Request $request)
    {
        $this->feedbackPageInterface->saveFeedback($request);
        Toastr::success('Thanks You For Your Feedback', 'SUCCESS');
        
        return redirect()->route('home');
    }
}
