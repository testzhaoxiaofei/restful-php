<?php
use inc\PhpAES;
use vendor\taobao;

/**
 * 1: 资源路径 （URI）
 * 2：HTTP动词
 * 3：过滤信息
 * 4：状态吗
 * 5：错误处理 需要配合http 状态码实现
 * 6：返回结果处理
 *   restful 协议
 *  Class GetGoods
 */
class GetGoods
{
    private $_redis;
    private $_mysql;
    private $_config;
    private $_c;   //权限验证
    private $_requestMethod;  //请求方法
    private $_resourceName;// 请求的资源名称
    private $_id;//请求的资源ID
    private $_allowResources; //允许请求的支援列表
    private $_allowRequestMethods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS']; //允许请求的HTTP方法

    //常用的状态码
    protected $statusCodes = [
        '200' => 'ok',
        '204' => 'No Content',
        '400' => 'Bad Request',
        '401' => 'Unauthorized',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '405' => 'Method Not All',
        '500' => 'Service Internal Error',
    ];

    public $phpAES;       //AES
    public $code;         //接口号
    public $req;         //返回

    public function __construct()
    {
//        $this->phpAES = new PhpAES();//AES加密算法
//        $this->_config = new config();//配置文件

//        $this->_redis = $this->_config->linkRedis();    //redis配置信息
//        $this->_mysql = $this->_config->linkMySql();    //mysql 配置信息
//
//        vendor\taobao\TopSdk::tbInit();                 //淘宝客信息
//        $this->_c = new TopClient;
//        $this->_c->appkey = TB_APPKEY;
//        $this->_c->secretKey = TB_SECRETKEY;

//        $_POST['data'] = 'BhHKUtF8q7Fqa/2tJOZJxJDdhx1OOGHDhT0plRjaflBJELrra5PJ5yhNf3Fh83MdL1kFAC1HoAWEQnEi55G7NRhIRf3Qk0uPEddk4hMaV9tVkFYP0nqo4V8xvzzTBjhrLNrYp/cRDrOipfLFoB93aq9ghrKYbN5y5dBcsFQHCQUD5fMBFNOwYjY4AvQ6YQhCXQSGu8yIDxgJETVAHTTKxICoNaEcImAbucapBOVyLkBC0HbKfHWGApQA6/BzMWefcINqfhv2UoYKbqgjLjIGcBC3pr39U5A/fwEkB3/Yf9I=';
//        $data = json_decode($this->phpAES->AesDecrypt(trim($_POST['data'])), true);
//        var_dump($data);
//        $this->run();
    }

    /**
     * 主要操类目
     */
    private function run()
    {
        try {
            $this->_setupRequestMethod();
            $this->_setupResource();
            $this->_setupId();
        }catch(Exception $e){
            $this->echoResult(['error'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }


    /**
     * 初始化请求方法
     */
    public function _setupRequestMethod()
    {
        $this->_requestMethod = $_SERVER['REQUEST_METHOD'];
        if (!in_array($this->_requestMethod, $this->_allowRequestMethods)) {
            throw new Exception('请求方法不被允许', 405);
        }
    }

    /**
     * 初始化请求资源
     */
    private function _setupResource()
    {

    }

    /**
     * 初始化请求的资源ID
     */
    private function _setupId()
    {

    }

    /**
     * 输出返回结果
     * @param $result
     */
    public function echoResult($result)
    {
        echo '<pre/>';
          var_dump($result);
//        echo trim($this->phpAES->AesEncrypt(json_encode($result)));
    }

    /**
     * 析构函数
     */
    public function __destruct()
    {
//        if ($this->_redis) {
//            $this->_redis->close();
//        }
//
//        if ($this->_mysql) {
//            $this->_mysql->dbClose();
//        }
    }
}

$UserInfo = new GetGoods();
