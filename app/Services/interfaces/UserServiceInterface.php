<?php

namespace App\Services\interfaces;

interface UserServiceInterface
{
    public function create(array $attributes);

    public function generatePassword(string $password): string;
}
