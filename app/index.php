<?php
use bootstrap\Base;

class GetGoods extends Base
{
    private $_redis;
    private $_mysql;
    private $_config;
    private $_c;   //权限验证
    //常用的状态码
    protected $statusCodes = [
        '200' => 'ok',
    ];

    public $phpAES;       //AES
    public $code;         //接口号
    public $req;         //返回

    public function __construct()
    {

        $this->_config = new config();//配置文件
        $this->_redis = $this->_config->linkRedis();    //redis配置信息
        $this->_mysql = $this->_config->linkMySql();    //mysql 配置信息
        TopSdk::topInit();                              //淘宝客接口启动
        $this->_c = new TopClient();
        $this->_c->appkey = TB_APPKEY;
        $this->_c->secretKey = TB_SECRETKEY;
        $_POST['data'] = 'BhHKUtF8q7Fqa/2tJOZJxJDdhx1OOGHDhT0plRjaflBJELrra5PJ5yhNf3Fh83MdL1kFAC1HoAWEQnEi55G7NRhIRf3Qk0uPEddk4hMaV9tVkFYP0nqo4V8xvzzTBjhrLNrYp/cRDrOipfLFoB93aq9ghrKYbN5y5dBcsFQHCQUD5fMBFNOwYjY4AvQ6YQhCXQSGu8yIDxgJETVAHTTKxICoNaEcImAbucapBOVyLkBC0HbKfHWGApQA6/BzMWefcINqfhv2UoYKbqgjLjIGcBC3pr39U5A/fwEkB3/Yf9I=';
        $data = json_decode($this->Decrypt(trim($_POST['data'])), true);
        $this->run();
    }

    /**
     * 主要操类目
     */
    private function run()
    {
        try {
            $this->echoResult(['data'=>'11111111']);
        }catch(Exception $e){
            $this->echoResult(['code'=>$e->getCode(),'msg' => $e->getMessage(),'interfaceNumber'=>1,'data'=>[]], $e->getCode());
        }
    }

    /**
     * 输出返回结果
     * @param $result
     */
    public function echoResult($result, $code = '0')
    {
        if ($code > 0 && $code != 204 && $code != 200) {
            header("HTTP/1.1 " . $code . " " . $this->statusCodes[$code]);
        }
        echo '<pre/>';
        var_dump($result);

//        echo json_encode($result);
//        echo $this->Encrypt(json_encode($result));
    }
    /**
     * 析构函数
     */
    public function __destruct()
    {
        if ($this->_redis) {
            $this->_redis->close();
        }

        if ($this->_mysql) {
            $this->_mysql->dbClose();
        }
    }
}

$UserInfo = new GetGoods();