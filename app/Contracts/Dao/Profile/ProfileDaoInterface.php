<?php

namespace App\Contracts\Dao\Profile;

use Illuminate\Http\Request;

interface ProfileDaoInterface
{
    /**
     * To update current loggedin user profile
     * @param Request $request 
     * @return Object $currentLoggedInUser currentLoggedInUser object
     */
    public function changeUserProfile(Request $request);

    /**
     * To update current loggedin user password
     * @param Request $request 
     * @return Object $currentLoggedInUser currentLoggedInUser object
     */
    public function changeUserPassword(Request $request);
}