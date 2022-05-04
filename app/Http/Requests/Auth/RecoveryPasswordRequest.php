<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Common\AbstractRequest;

class RecoveryPasswordRequest extends AbstractRequest
{
    protected function getRules(): array
    {
        return [
            'email' => 'required|string|email'
        ];
    }
}
