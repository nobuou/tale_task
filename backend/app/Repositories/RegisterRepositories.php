<?php
namespace App\Repositories;

use App\Interfaces\RegisterInterfaces;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterRepositories implements RegisterInterfaces
{
    //仮登録
    public function preRegister($email){
        $preUser = User::create([
            'email' => $email,
            'email_token' => Str::random(80),
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s')
        ]);
        return $preUser;
    }

    /**
     * 本会員登録
     * @param string $token
     * @param string $name
     * @param string $password
     * @return void
     */
    public function register($token,$name,$password){
        $user = User::where('email_token',$token)
            ->update([
                'name'=>$name,
                'password' => Hash::make($password),
                'updated_at' => date('Y/m/d H:i:s'),
                'email_verified' => config('userStatus.USER_STATUS.REGISTER')
            ]);
        return $user;
    }
}