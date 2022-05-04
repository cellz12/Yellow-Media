<?php

namespace App\Http\Requests;

use App\Http\Requests\Common\AbstractRequest;

/**
 * Class UserStoreRequest
*/
class UserStoreRequest extends AbstractRequest
{
    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'string|max:255',
            'password' => 'required|string|min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|string|min:5'
        ];
    }
}
