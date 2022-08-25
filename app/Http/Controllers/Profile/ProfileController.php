<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\Profile\ProfileServiceInterface;

class ProfileController extends Controller
{
    /**
     * profile interface
     *
     */
    private $profileInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfileServiceInterface $profileServiceInterface)
    {
        $this->profileInterface = $profileServiceInterface;
    }

    /**
     * To show user profile
     * @return $authUser
     * @return View user profile view
     */
    public function showUserProfile()
    {
        $authUser = auth()->user();
        return view('admin.profile.index', compact('authUser'));
    }

    /**
     * To show edit user profile view
     * @return $authUser
     * @return View edit user profile view
     */
    public function showEditProfileView()
    {
        $authUser = auth()->user();
        return view('admin.profile.edit', compact('authUser'));
    }

    /**
     * To submit edit user profile view
     * @param Request $request
     * @return View user profile view
     */
    public function submitEditProfileView(Request $request)
    {
        $this->profileInterface->changeUserProfile($request);
        Toastr::success('Your Profile Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.user.profile');
    }

    /**
     * To show edit user profile view
     * @param Request $request
     * @return View user profile view
     */
    public function updateUserPassword(Request $request)
    {
        $msg_bag = $this->profileInterface->changeUserPassword($request);
        if( $msg_bag['status'] == 'success' ){
            Toastr::success($msg_bag['msg'], 'SUCCESS');
            Auth::logout();
        }else{
            Toastr::error($msg_bag['msg'], '403, ACCESS DENIED');
        }
        return back();
    }
}
