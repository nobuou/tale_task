<?php

namespace App\Http\Requests;

use App\Enums\ResponseType;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status' => ResponseType::PARAM_ERROR,
            'message' => ResponseType::getErrorMessage(ResponseType::PARAM_ERROR),
            'error' => $validator->errors()->toArray()
        ];
        throw new HttpResponseException(response()->json($data,ResponseType::badRequest));
    }
}
