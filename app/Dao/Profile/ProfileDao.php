<?php

namespace App\Dao\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Profile\ProfileDaoInterface;

class ProfileDao implements ProfileDaoInterface
{
    /**
     * To update current loggedin user profile
     * @param Request $request 
     * @return Object $currentLoggedInUser currentLoggedInUser object
     */
    public function changeUserProfile(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.auth()->id(),
            'phone'    => 'nullable',
            'address'  => 'nullable',
            'photo'    => 'sometimes|image|mimes:jpeg,png,jpg',
            'password' => 'nullable',
        ]);

        $authUser = User::find(auth()->id());
        $authUser->name     = $data['name'];
        $authUser->email    = $data['email'];
        $authUser->phone    = $data['phone'];
        $authUser->address  = $data['address'];
        $authUser->password = auth()->user()->password;
        $authUser->save();

        $this->storeImage($authUser);
        
        return $authUser;
    }

    /**
     * To update current loggedin user password
     * @param Request $request 
     * @return Object $currentLoggedInUser currentLoggedInUser object
     */
    public function changeUserPassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'password'     => 'required|min:8|confirmed',
        ]);

        $currentPassword = auth()->user()->password;

        if( Hash::check( $data['old_password'], $currentPassword ) ){
            if( !Hash::check($data['password'], $currentPassword) ){
                $user = User::find(auth()->id());
                $user->password = Hash::make( $data['password'] );
                $user->save();

                return $msg_bag = [
                    "status" => "success",
                    "msg"    => "Password Changed Successfully &nbsp;<i class='far fa-check-cirlce'></i>"
                ];
            }else{

                return $msg_bag = [
                    "status" => "error",
                    "msg"    => "New Password Cannot be Same as Old Password &nbsp;<i class='far fa-check-cirlce'></i>"
                ];
            }
        }else{
            
            return $msg_bag = [
                "status" => "error",
                "msg"    => "Current Password Does Not Match &nbsp;<i class='far fa-check-cirlce'></i>"
            ];
        }
    }

    /**
     * To store and update current loggedin user photo
     * @param Object $currentLoggedInUser currentLoggedInUser object
     */
    public function storeImage($authUser)
    {
        if( request()->hasFile('photo') ){
            $file = request()->file('photo');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/user');
            $file->move($save_path, $save_path."/$file_name");

            $authUser->update([
                'photo' => $file_name,
            ]);
        }
    }
}