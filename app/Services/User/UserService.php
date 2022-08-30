<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    /**
    * category dao
    */
    private $userDao;
    
    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To get user list
     * @return $userList
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id)
    {   
        return $this->userDao->getUserById($id);
    }

    /**
     * To save user
     * @param array $validated validated values from user request
     * @return Object $user saved user
     */
    public function saveUser($validated)
    {
        return $this->userDao->saveUser($validated);
    }

    /**
     * To update user by id
     * @param array $validated validated values from user request
     * @param string $id user id
     * @return Object $user user object
     */
    public function updateUserById($validated, $id)
    {
        return $this->userDao->updateUserById($validated, $id);
    }

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     */
    public function deleteUserById($id)
    {
        return $this->userDao->deleteUserById($id);
    }
}