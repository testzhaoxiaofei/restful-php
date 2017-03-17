<?php
/**
 * 接口路由
 */
$route = [
    'index',
    'user',
    'get'
];

require_once (dirname(__FILE__).'/bootstrap/Route.class.php');
new Route($route);
