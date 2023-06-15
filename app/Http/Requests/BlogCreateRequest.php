<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class BlogCreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title'         => 'required|string',
            'description'   => 'requried|string'
        ];
    }
}
