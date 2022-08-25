<?php

namespace App\Dao\User;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\User\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * To get user list
     * @return $userList
     */
    public function getUserList()
    {
        $userList = User::orderBy('id', 'DESC')->paginate(5);
        return $userList;
    }

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id)
    {   
        $user = User::find($id);
        return $user;
    }

    /**
     * To save user
     * @param array $validated validated values from user request
     * @return Object $user saved user
     */
    public function saveUser($validated)
    {
        $user           = new User();
        $user->name     = $validated['name'];
        $user->email    = $validated['email'];
        $user->phone    = $validated['phone'];
        $user->role     = $validated['role'];
        $user->address  = $validated['address'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        $this->storeImage($user);
        return $user;
    }

    /**
     * To update user by id
     * @param array $validated validated values from user request
     * @param string $id user id
     * @return Object $user user object
     */
    public function updateUserById($validated, $id)
    {
        $user           = User::find($id);
        $user->name     = $validated['name'];
        $user->email    = $validated['email'];
        $user->phone    = $validated['phone'];
        $user->role     = $validated['role'];
        $user->address  = $validated['address'];
        $user->password = $validated['password'] ? Hash::make($validated['password']) : $user->password;
        $user->save();

        $this->storeImage($user);
        return $user;
    }

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     */
    public function deleteUserById($id)
    {
        $user = User::find($id);
        $user->deleted_at = Carbon::now();
        $user->save();
        return $user;
    }
    
    /**
     * To store and update user photo
     * @param Object $user user object
     */
    public function storeImage($user)
    {
        if( request()->hasFile('photo') ){
            $file = request()->file('photo');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/user');
            $file->move($save_path, $save_path."/$file_name");

            $user->update([
                'photo' => $file_name,
            ]);
        }
    }
}