<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 仮登録で入力したメールアドレスの登録
     * @param string $email
     * @return object
     */
    public function emailRegister($email){
        return User::create([
            'email' => $email,
            'email_token' => Hash::make($email),
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
        ]);
    }

    /**
     * 仮登録で登録したメールアドレスのトークンを検索
     *  @param string $token
     *  @return object $user 検索結果
     */
    public function searchToken($token){
        $user = User::where('email_token',$token)->first();
        return $user;
    }

    /**
     * 仮登録時のトークンの確認
     *
     * @param string $token
     * @return boolean
     */
    public function exitToken($token){
        if(User::where('email_token',$token)->exists()){
            return false; //存在していたらfalse
        }
        return true;
    }

    /**
     * 登録状況確認
     *
     * @param int $status
     * @return boolean
     */
    public function checkStatus($status){
        if($status === config('userStatus.USER_STATUS.REGISTER')){
            return true; //本登録済み
        }
        elseif($status === config('userStatus.USER_STATUS.DEACTIVE')){
            return true; //退会済み
        }
        return false;
    }

    /**
     * 本会員登録
     * @param string $token
     * @param string $name
     * @param string $password
     * @return void
     */
    public function register($token,$name,$password){
        User::where('email_token',$token)
            ->update([
                'name'=>$name,
                'password' => Hash::make($password),
                'updated_at' => date('Y/m/d H:i:s'),
                'email_verified' => config('userStatus.USER_STATUS.REGISTER')
            ]);
    }
}