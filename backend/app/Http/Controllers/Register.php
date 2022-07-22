<?php

namespace App\Http\Controllers;

use App\Http\Requests\preRegisterRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\preRegisterMail;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Register extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function preRegister(preRegisterRequest $request){
        $validated = $request->validated();
        $emailInfo = $this->user->emailRegister($validated['email']);
        Mail::send(new preRegisterMail($emailInfo['email'],$emailInfo['email_token']));
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();
        $this->user->register($validated['mailToken'],$validated['userName'],$validated['password']);
        Mail::send(new RegisterMail($validated['mailAddress']));
    }
}
