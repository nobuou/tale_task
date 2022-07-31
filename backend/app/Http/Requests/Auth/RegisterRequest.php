<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'userName'=>'required|max:6',
            'password'=>'required|regex:/^[a-zA-Z0-9]{1,8}$/',
            'rePassword'=>'required|same:password|regex:/^[a-zA-Z0-9]{1,8}$/',
            'mailToken' => 'required|exists:users,email_token',
            'mailAddress'=> 'required'
        ];
    }
}
