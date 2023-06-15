<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class SignupRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name'                  => "required|string",
            'phone'                 => "nullable|string|min:15",
            'email'                 => 'required|email',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ];
    }
}
