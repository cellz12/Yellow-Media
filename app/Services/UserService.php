<?php

namespace App\Services;

use App\Models\User;
use App\Services\interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 */
class UserService implements UserServiceInterface
{
    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes): User
    {
        $attributes['password'] = $this->generatePassword($attributes['password']);
        return User::create($attributes);
    }

    public function generatePassword(string $password): string
    {
        return Hash::make($password);
    }
}
