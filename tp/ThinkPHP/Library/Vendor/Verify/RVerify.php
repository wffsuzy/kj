<?php

require 'CCPRestSDK.php';

class RVerify {

    private $accountSid;
    private $accountToken;
    private $appId;
    private $rest;
//    const SERVER_IP = 'sandboxapp.cloopen.com';     // 沙箱地址
    const SERVER_IP = 'app.cloopen.com';     // 沙箱地址
    const SERVER_PORT = 8883;
    const SOFT_VERSION = '2013-12-26';

    public  function __construct($accountSid,$accountToken,$appId) {
        $this->accountSid = $accountSid;
        $this->accountToken = $accountToken;
        $this->appId = $appId;
        // 初始化REST SDK
        $this->rest = new REST(self::SERVER_IP,self::SERVER_PORT,self::SOFT_VERSION);
    }

    public function send_sms($to,$data,$tempId) {
        $this->rest->setAccount($this->accountSid,$this->accountToken);
        $this->rest->setAppId($this->appId);
        $result = $this->rest->sendTemplateSMS($to,$data,$tempId);
        if($result == null || $result->statusCode != 0) {
            return $result->statusMsg;
        }
        return true;
    }

} 