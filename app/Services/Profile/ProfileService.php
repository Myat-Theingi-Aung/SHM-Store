<?php

namespace App\Services\Profile;

use Illuminate\Http\Request;
use App\Contracts\Dao\Profile\ProfileDaoInterface;
use App\Contracts\Services\Profile\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface
{
    private $profileDao;

    public function __construct(ProfileDaoInterface $profileDao)
    {
        $this->profileDao = $profileDao;
    }

    public function changeUserProfile(Request $request)
    {
        return $this->profileDao->changeUserProfile($request);
    }

    public function changeUserPassword(Request $request)
    {
        return $this->profileDao->changeUserPassword($request);
    }
}