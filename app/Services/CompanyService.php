<?php

namespace App\Services;

use App\Models\Company;
use App\Services\interfaces\CompanyServiceInterface;

/**
 * Class CompanyService
 */
class CompanyService implements CompanyServiceInterface
{
    /**
     * @param array $attributes
     * @param int $user_id
     * @return Company
     */
    public function create(array $attributes, int $user_id): Company
    {
        return Company::create($attributes + ['creator_id' => $user_id]);
    }
}
