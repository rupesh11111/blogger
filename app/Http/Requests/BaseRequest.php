<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends Request {

    protected $response = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator) {
        $errors = $validator->errors();
        if (!$this->wantsJson() && (!str_contains(request()->getRequestUri(), 'api'))) {
            return parent::failedValidation($validator);
        }
        $this->response['message'] = $errors->first();
        $this->response['statusCode'] = 419;
        $this->response['status'] = 'error';
        $this->response['result'] = (object)array();
        throw new HttpResponseException(response()->json(419,$errors->first()));
    }
}
