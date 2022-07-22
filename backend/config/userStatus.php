<?php
//会員の登録状態
return [
    // 0:仮登録 1:本登録済 2:メール認証済 3:退会済
    'USER_STATUS' => ['PRE_REGISTER' => 0, 'REGISTER' => 1, 'MAIL_AUTHED' => 2, 'DEACTIVE' => 3]
];
?>