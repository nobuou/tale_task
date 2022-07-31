<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\PreRegisterRequest as AuthPreRegisterRequest;
use App\Http\Requests\Auth\RegisterRequest as AuthRegisterRequest;
use App\Mail\preRegisterMail;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class Register extends Controller
{
    /**
     * 仮登録
     *
     * @param AuthPreRegisterRequest $request
     * @return void
     */
    public function preRegister(AuthPreRegisterRequest $request){
        $validated = $request->validated();
        $userService = app()->make('registerUser');
        $user = $userService->preRegister($validated['email']);
        $this->sendMail($user['email'],$user['email_token']);
        return $userService->responseSuccess();
    }

    /**
     * 本登録用メール送信
     *
     * @param string $email
     * @param string $token
     */
    private function sendMail($email,$token){
        Mail::send(new preRegisterMail($email,$token));
    }

    //本登録
    public function register(AuthRegisterRequest $request){
        $validated = $request->validated();
        $userService = app()->make('registerUser');
        $user = $userService->register($validated['mailToken'],$validated['userName'],$validated['password']);
        Mail::send(new RegisterMail($validated['mailAddress']));
        return $userService->responseSuccess();
    }
}
