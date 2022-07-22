<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 本登録時フォームの表示
     *  @param Illuminate\Http\Request $request
     */
    public function showForm(Request $request){
        $token = $request->token;
        if($this->user->exitToken($token)){
            return view('404Page',['message'=>'不正なパラメータです。仮登録からやり直してください']);
        }
        else{
            $user = $this->user->searchToken($token);
            if($this->user->checkStatus($user->email_verified)){
                return view('404Page',['message'=>'既に本登録済みか、退会済みです']);
            }
            else{
                return view('mainRegister',['token'=>$user->email_token,'address'=>$user->email]);
            }
        }
    }
}
