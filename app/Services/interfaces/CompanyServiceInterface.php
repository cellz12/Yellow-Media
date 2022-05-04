<?php

namespace App\Services\interfaces;

interface CompanyServiceInterface
{
    public function create(array $attributes, int $user_id);
}
