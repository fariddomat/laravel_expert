<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use App\Models\SMSLog;

class SMS
{
    public static function sendContact($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_1'));
        self::logSMS('contact', $mobile, config('services.sms.sender_name_1'), $message, $result);
    }

    public static function sendToAdminFromContact($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_1'));
        self::logSMS('adminContact', $mobile, config('services.sms.sender_name_1'), $message, $result);
    }

    public static function sendService($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_1'));
        self::logSMS('service', $mobile, config('services.sms.sender_name_1'), $message, $result);
    }
    public static function sendToAdminFromService($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_1'));
        self::logSMS('adminService', $mobile, config('services.sms.sender_name_1'), $message, $result);
    }
    public static function sendLarid($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_2'));
        self::logSMS('larid', $mobile, config('services.sms.sender_name_2'), $message, $result);
    }
    public static function sendToAdminFromLarid($mobile, $message)
    {
        $result = self::sendSMS($mobile, $message, config('services.sms.sender_name_2'));
        self::logSMS('adminLarid', $mobile, config('services.sms.sender_name_2'), $message, $result);
    }

    private static function logSMS($type, $mobile, $senderName, $message, $result)
    {
        //log sms
        $log = new SMSLog();
        $log->type = $type;
        $log->send_to = $mobile;
        $log->sender_name = $senderName;
        $log->message = $message;
        $log->response = $result;
        $log->save();
    }

    private static function sendSMS($mobile, $message, $senderName)
    {
        $response = Http::get('https://www.hisms.ws/api.php', [
            'send_sms' => '',
            'username' => config('services.sms.username'),
            'password' => config('services.sms.password'),
            'numbers' => $mobile,
            'sender' => $senderName,
            'message' => $message,
        ]);
        $result = $response->body();
        return $result;
    }

    public static function checkMobileNumber($mobile)
    {
        if ((substr($mobile, 0, 1) == "5") ||
            (substr($mobile, 0, 2) == "05") ||
            (substr($mobile, 0, 6) == "009665") ||
            (substr($mobile, 0, 4) == "9665")
        ) {
            return true;
        } else {
            return false;
        }
    }
}
