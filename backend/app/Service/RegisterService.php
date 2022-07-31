<?php

namespace App\Service;

use App\Enums\ResponseType;
use App\Repositories\RegisterRepositories;

class RegisterService {
    private $registerRepository;

    public function __construct(RegisterRepositories $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    //usersテーブルに仮登録ユーザーを保存
    public function preRegister($email){
        $user = $this->registerRepository->preRegister($email);
        return $user;
    }

    //usersテーブルにに本登録の情報を更新
    public function register($token,$name,$password){
        $user = $this->registerRepository->register($token,$name,$password);
        return $user;
    }

    public function responseSuccess(){
        return response()->json([
            'result' => ResponseType::NO_ERROR,
            'message' => ResponseType::getErrorMessage(ResponseType::NO_ERROR)
        ],ResponseType::success);
    }
}