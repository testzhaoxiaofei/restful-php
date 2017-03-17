<?php

/**
 * 自动加载
 * Class Loader
 */
class Loader
{
    public static function loadClass($class)
    {
        //自动加载注册目录
        $include_dir = [
            'vendor\taobao',
        ];
        //设置包含目录
        set_include_path(get_include_path() . PATH_SEPARATOR .implode(PATH_SEPARATOR, $include_dir));
        $file = $class . '.class.php';
        include_once($file);
    }
}
spl_autoload_register(array('Loader', 'loadClass'));
?>