<?php
header('content-type:text/html;charset=UTF-8');
session_start();
error_reporting(1);
define('REDIS_HOST','127.0.0.1');//redis链接ip
define('REDIS_PORT',6379);//redis链接端口
define('REDIS_SELECT',1);//redis链接库名
define('REDIS_PASSWORD','');//redis链接密码

define('DB_HOST','127.0.0.1');//数据库链接ip
define('DB_USERNAME','root');//数据库链接用户名
define('DB_PASSWORD','');//数据库链接密码
define('DB_NAME','cms');//数据库链接库名

define('TB_APPKEY','23682543'); //淘宝的appKey
define('TB_SECRETKEY','b5322aa587feb3c619f195c78a396b59');  //淘宝授权
define('TB_PID','mm_121550831_0_0');     //阿里妈妈淘客PID

class config{
    /**
     * 链接redis
     * @return Redis
     */
    public function linkRedis(){
        $redis = new Redis();
        $redis->connect(REDIS_HOST,REDIS_PORT);
        $redis->auth(REDIS_PASSWORD);
        $redis->select(REDIS_SELECT);
        return $redis;
    }
    /**
     * 链接mysql
     * @return MysqlFun
     */
    public function linkMySql(){
        require_once(dirname(__FILE__).'/MysqlFun.class.php');
        return new MysqlFun();
    }
}

?>



