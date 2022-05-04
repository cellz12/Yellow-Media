<?php

namespace App\Http\Requests;

use App\Http\Requests\Common\AbstractRequest;

/**
 * Class CompanyStoreRequest
*/
class CompanyStoreRequest extends AbstractRequest
{
    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'phone' => 'string|max:255',
            'description' => 'string'
        ];
    }
}
