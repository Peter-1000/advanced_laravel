<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
