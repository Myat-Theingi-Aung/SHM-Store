<?php

namespace App\Dao\Feedback;

use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Feedback\FeedbackDaoInterface;
use App\Models\Review;

/**
 * Data accessing object for post
 */
class FeedbackDao implements FeedbackDaoInterface
{
   /**
     * To get feedback information
     * @return array $data return feedback information
     */ 
    public function index()
    {
        
    }

    
    /**
     * To store feedback information
     * @param Request $request request with inputs
     * @return Object $feedback saved feedback
     */
    public function store($request)
    {
        
    }

    /**
    * To delete feedback by id
    * @param string $id feedback id
    */
    public function destroy($id)
    {
        
    }

    /**
     * To show feedback detail information
     * @param string $id feedback id
     * @return Object $feedback Feedback Object
     */
    public function show($id)
    {
        
    }

}