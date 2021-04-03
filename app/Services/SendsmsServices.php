<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SendsmsServices
{
    public function sendSMS($msg, $mobile)
	{  
        $url1 = "http://sms.techinspire.in/V2/http-api.php";
        $url2 = [
            'apikey'    => 'jOIELIa0ZrWJygPq',
            'senderid'  => 'Regall',
            'number'   => $mobile,
            'message' => $msg,
            'format' => 'json'
        ];
        
        $response = Http::get($url1, $url2);
        return $response->getBody();
	}
}