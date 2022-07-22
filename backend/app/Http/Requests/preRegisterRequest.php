<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class preRegisterRequest extends FormRequest
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
            'email' => 'required|email:dns,strict,spoof'
        ];
    }

    public function attributes()
    {
        return ['email'=>'メールアドレス'];
    }

    public function messages()
    {
        return [
            'email.required'=>':attributeの入力をお願いします',
            'email.email'=>':attributeの形式が正しくありません'
        ];
    }
}
