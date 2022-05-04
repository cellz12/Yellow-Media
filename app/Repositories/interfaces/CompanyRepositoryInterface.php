<?php

namespace App\Repositories\interfaces;

interface CompanyRepositoryInterface
{
    public function getAllByUserId(int $user_id, array $fields = []);
}
