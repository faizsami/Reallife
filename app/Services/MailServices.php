<?php

namespace App\Services;

use Mail;

class MailServices
{
    public function sendmail($sub, $to, $name, $user_id, $password, $template)
    {
        $data = array('name' => $name, 'user_id' => $user_id, 'password' => $password);

        $send = Mail::send($template, $data, function($message) use($to, $name, $sub) {
            $message->to($to, $name);
            $message->subject($sub);
            $message->from('regallifeindia@gmail.com','Regal Life India');
            //  $message->cc('neeraj@techinspire.online', 'Haxways.com');
            $message->replyTo('regallifeindia@gmail.com', 'Regal Life India');
        });

        if($send)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}