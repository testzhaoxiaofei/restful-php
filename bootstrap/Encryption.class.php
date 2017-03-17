<?php

namespace bootstrap;

class Encryption{

    public $key = '$75k!xxH&$EhQLmv';

    /**
     * * This was AES-128 / CBC / NoPadding encrypted.
     * * return base64_encode string
     * * @author Terry
     * * @param string $plaintext
     * * @param string $key
     * */
    public function AesEncrypt($plaintext){
        $plaintext = trim($plaintext);
        if($plaintext == ''){
            return '';
        }
        if(!extension_loaded('mcrypt')){
            throw new Exception();
        }
        $size   = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_CBC);//获取128位cbc算法大小
        $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'',MCRYPT_MODE_CBC,'');//打开模块的算法和使用模式
        $iv     = substr(md5($this->key),0,mcrypt_enc_get_iv_size($module));//设置秘钥偏移量
        mcrypt_generic_init($module,$this->key,$iv);//该函数初始化所有加密所需的缓冲区
        $encrypted = mcrypt_generic($module,trim($plaintext));//数据加密
        mcrypt_generic_deinit($module);
        mcrypt_module_close($module);

        return trim(base64_encode($encrypted));
    }

    /**
     * * This was AES-128 / CBC / NoPadding decrypted.
     * * @author Terry
     * * @param string $encrypted base64_encode encrypted string
     * * @param string $key
     * * @throws CException
     * * @return string
     * */
    public function AesDecrypt($encrypted){
        if($encrypted == ''){
            return '';
        }
        if(!extension_loaded('mcrypt')){
            throw new Exception();
        }
        $ciphertext_dec = base64_decode($encrypted);
        $module         = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'',MCRYPT_MODE_CBC,'');
        $iv             = substr(md5($this->key),0,mcrypt_enc_get_iv_size($module));
        mcrypt_generic_init($module,$this->key,$iv);
        $decrypted = mdecrypt_generic($module,$ciphertext_dec);
        mcrypt_generic_deinit($module);
        mcrypt_module_close($module);

        return rtrim($decrypted,"\0");
    }

    /**
     * * Returns the length of the given string.
     * * If available uses the multibyte string function mb_strlen.
     * * @param string $string the string being measured for length
     * * @return integer the length of the string
     * */
    private function strlen($string){
        return extension_loaded('mbstring') ? mb_strlen($string,'8bit') : strlen($string);
    }

    /**
     *  * Returns the portion of string specified by the start and length parameters.
     *    * If available uses the multibyte string function mb_substr
     *      * @param string $string the input string. Must be one character or longer.
     *       * @param integer $start the starting position
     *       * @param integer $length the desired portion length
     *       * @return string the extracted part of string, or FALSE on failure or an empty string.
     *       */
    private function substr($string,$start,$length){
        return extension_loaded('mbstring') ? mb_substr($string,$start,$length,'8bit') : substr($string,$start,$length);
    }

}
