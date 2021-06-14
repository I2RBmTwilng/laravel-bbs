<?php


namespace App\Mailer;

use App\Models\User;
use Auth;

class UserMailer extends Mailer
{
    //密码重置
    public function passwordReset($email,$token)
    {
        $data = [
            'url' => url('password/reset', $token)
        ];

        $this->sendTo('larabbs_password_reset',$email,$data);
    }

    //用户注册
    public function welcome(User $user)
    {
        $data = [
            'url' => route('email.verify',['token'=>$user->confirmation_token]),
            'name'=>$user->name
        ];
        $this->sendTo('larabbs_register',$user->email,$data);
    }
}