<?php


namespace App\Mailer;

use Mail;
use Naux\Mail\SendCloudTemplate;

/**
 * 邮件发送类
 *
 * Class Mailer
 * @package App\Mailer
 */
class Mailer
{
    public function sendTo($template,$email,array $data)
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message)  use($email){
            $message->from('liuzq173@163.com', 'LiuZhenqing');

            $message->to($email);
        });
    }
}