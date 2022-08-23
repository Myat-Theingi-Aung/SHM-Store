<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    /**
     * To get user list
     * @return $userList
     */
    public function getUserList();

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id);

    /**
     * To save user
     * @param array $validated validated values from user request
     * @return Object $user saved user
     */
    public function saveUser($validated);

    /**
     * To update user by id
     * @param array $validated validated values from user request
     * @param string $id user id
     * @return Object $user user object
     */
    public function updateUserById($validated, $id);

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     */
    public function deleteUserById($id);
}