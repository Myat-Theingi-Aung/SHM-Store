<?php

namespace App\Contracts\Services\Profile;

use Illuminate\Http\Request;

interface ProfileServiceInterface
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