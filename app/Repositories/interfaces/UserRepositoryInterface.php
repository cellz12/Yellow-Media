<?php

namespace App\Repositories\interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email): ?User;
}
