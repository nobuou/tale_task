<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ResponseType extends Enum
{
    //HTTPステータスコード
    const success = 200;
    const badRequest = 400;
    const unAuth = 401; //未認証

    //エラーコードとエラーメッセージ
    const NO_ERROR = 0;
    const PARAM_ERROR = 1;
    const DB_ERROR = 2;
    const NOT_EXISTS_ERROR = 3;
    const EXISTS_ERROR = 4;
    const AUTH_ERROR = 5;
    const TOKEN_AUTH_ERROR = 6;
    const UNKNOWN_ERROR = 9;

    const ERROR_DITAIL = [
        self::NO_ERROR => '正常終了',
        self::PARAM_ERROR => 'パラメータエラー',
        self::DB_ERROR => 'データベース関連のエラー',
        self::NOT_EXISTS_ERROR => '存在しない',
        self::EXISTS_ERROR => '重複エラー',
        self::AUTH_ERROR => '認証エラー',
        self::TOKEN_AUTH_ERROR => 'トークン認証エラー',
        self::UNKNOWN_ERROR => '未定義のエラー'
    ];

    public static function getErrorMessage($code){
        return ResponseType::ERROR_DITAIL[$code];
    }
}
