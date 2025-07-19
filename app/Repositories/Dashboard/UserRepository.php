<?php

namespace App\Repositories\Dashboard;

use App\Models\User;

class UserRepository
{
    // get user
    public function getUser($id)
    {
        return User::find($id);
    }

    // get users
    public function getUsers()
    {
        $users = User::with('country', 'governorate', 'city')->latest()->get();
        return $users;
    }

    // store user
    public function storeUser($data)
    {
        return User::create($data);
    }

    // update user
    public function updateUser($user, $data)
    {
        return $user->update($data);
    }

    // destroy user
    public function destroyUser($user)
    {
        return $user->delete();
    }

    // change status
    public function changeStatus($user, $status)
    {
        return $user->update([
            'status' => $status,
        ]);
    }
}
