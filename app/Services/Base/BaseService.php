<?php

namespace App\Services\Base;

use Illuminate\Support\Facades\Mail;

/**
 * Class BaseService.
 */
class BaseService
{
    public function getIp(): ?string
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    public function sendEmail(Array $data, String $emailContent, String $subject): void
    {
        Mail::send($emailContent, $data, static function ($message) use ($data, $subject) {
            $message->from(@config('app.mail_from'), @config('app.name'));
            $message->to($data['email'], $data['name']);
            $message->replyTo(@config('app.mail_from'), @config('app.name'));
            $message->subject($subject);
        });
    }
}
