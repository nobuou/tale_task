<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class preRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($address,$token)
    {
        $this->address = $address;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('preRegister@example.com','tale_task管理者')
        ->to($this->address)
        ->subject('仮登録完了メール')
        ->view('mail.preRegisterEmail',['token'=>$this->token]);
    }
}
