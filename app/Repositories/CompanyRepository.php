<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\interfaces\CompanyRepositoryInterface;

/**
 * Class CompanyRepository
 */
class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * @param int $user_id
     * @param array $fields
     * @return array
     */
    public function getAllByUserId(int $user_id, array $fields = []): array
    {
        $query = Company::where(['creator_id' => $user_id]);
        if ($fields) {
            $query->select($fields);
        }

        return $query->get()->toArray();
    }
}
