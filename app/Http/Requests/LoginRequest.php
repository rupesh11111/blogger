<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'email'         => 'required|email|unique:users,email',
            'password'      => 'requried|min:6'
        ];
    }
}
