<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail(string $email): ?User
    {
        return User::where(['email' => $email])->first();
    }
}
