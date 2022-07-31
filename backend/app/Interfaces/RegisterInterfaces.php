<?php

namespace App\Interfaces;

interface RegisterInterfaces {
    public function preRegister($email); //仮登録
    public function register($token,$name,$password); //本登録
}