<?php
namespace bootstrap;
/**
 * restful 接口协议下 基类
 * Class BaseController
 */

class Base
{
    public $encryption;       //AES  RSA DES ..加密方式


    public function Encrypt($result)
    {
        $this->encryption = new Encryption();//AES加密算法
        return trim($this->encryption->AesEncrypt($result));
    }

    public function Decrypt($result)
    {
        $this->encryption = new Encryption();//AES加密算法
        return trim($this->encryption->AesDecrypt($result));
    }

}

