<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Common\AbstractRequest;

class SignInRequest extends AbstractRequest
{
    protected function getRules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string|min:5'
        ];
    }
}
