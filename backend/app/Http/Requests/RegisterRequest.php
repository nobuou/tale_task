<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'userName'=>'ユーザー名',
            'password'=>'パスワード',
            'rePassword'=>'確認用パスワード'
        ];
    }
    
    public function messages()
    {
        return [
            'userName.required'=>':attributeの入力をお願いします',
            'userName.max6'=>':attributeは最大６文字までです',
            'password.required'=>':attributeの設定は必須です',
            'password.regex'=>':attributeは半角英数８文字以下にしてください',
            'rePassword.required'=>':attributeを入力してください',
            'rePassword.same'=>':attributeが一致しません',
            'rePassword.regex'=>':attributeは半角英数８文字以下で入力してください',
            'mailToken.required'=>'登録できません。仮登録からやり直してください',
            'mailToken.exists'=>'不正なパラメーターが含まれています。仮登録からやりなおしてください',
            'mailAddress.required'=>'アドレスが不明です'
        ];
    }
}
