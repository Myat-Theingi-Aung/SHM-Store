<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UserRequestStore;
use App\Http\Requests\UserRequestUpdate;
use App\Contracts\Services\User\UserServiceInterface;

class UserController extends Controller
{
    /**
     * user interface
     *
     */
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * To show user list
     * @return $users
     * @return View user list
     */
    public function showUserList()
    {
        $users = $this->userInterface->getUserList();
        return view('admin.user.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 2);;
    }

    /**
     * To show create user view
     * @return $roles
     * @return View create user view
     */
    public function showCreateUserView()
    {
        $roles = ['user', 'admin'];
        return view('admin.user.create', compact('roles'));
    }

    /**
     * To submit create user view
     * @param array $validated validated values from user request
     * @return View user list
     */ 
    public function submitCreateUserView(UserRequestStore $request)
    {
        $validated = $request->validated();
        $this->userInterface->saveUser($validated);
        
        Toastr::success('New User Created Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.user.index');
    }

    /**
     * To show edit user view
     * @param $id user id
     * @return $roles
     * @return $user
     * @return View edit user view
     */
    public function showEditUserView($id)
    {
        $roles = ['user', 'admin'];
        $user  = $this->userInterface->getUserById($id);
        return view('admin.user.edit', compact('roles', 'user'));
    }

    /**
     * To submit edit user view
     * @param array $validated validated values from user request
     * @return View user list
     */
    public function submitEditUserView(UserRequestUpdate $request, $id)
    {
        $validated = $request->validated();
        $this->userInterface->updateUserById($validated, $id);
        Toastr::success('User Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.user.index');
    }

    /**
     * To delete user by id
     * @param $id user id
     * @return View user list
     */
    public function deleteUser($id)
    {
        $this->userInterface->deleteUserById($id);
        Toastr::success('User Deleted Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return back();
    }
}
