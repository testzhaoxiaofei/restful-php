<?php

class Route extends \bootstrap\Base
{
    private $_resourceName;// 请求的资源名称
    private $_allowResources = []; //允许请求的支援列表
    private $_requestMethod;  //请求方法
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
    public $req;          //返回

    public function __construct($resource)
    {
        $this->_allowResources = $resource;
        $this->run();
    }

    /**
     * 主要操类目
     */
    private function run()
    {
        try {
            $this->_setupRequestMethod();
            $this->_setupResource();
            $this->_routeFile();
        } catch (Exception $e) {
            $this->echoResult(['code' => $e->getCode(), 'msg' => $e->getMessage(), 'interfaceNumber' => 1, 'data' => []], $e->getCode());
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
        $resource = array_reverse(explode('/', $_SERVER['REQUEST_URI']));
        $this->_resourceName = empty($resource[1]) ? $resource[0] : $resource[1];
        if (!in_array($this->_resourceName, $this->_allowResources)) {
            throw new Exception('请求的资源不被允许', 400);
        }
    }

    /**F
     * 引入文件
     */
    private function _routeFile()
    {
        $arr = array_reverse(explode('/', $_SERVER['REQUEST_URI']));
        $file = dirname(__FILE__) . '\..\app\\' . $arr[1] . '.php';

        if (!file_exists($file)) {
            $file = (dirname(__FILE__) . '\..\app\\' . $arr[1] . '.class.php');
            include($file);
        } else {
            include($file);
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
//        echo json_encode($result);
        echo($this->Encrypt(json_encode($result)));
    }
}