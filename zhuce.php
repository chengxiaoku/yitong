<?php

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

//绑定Home模块到当前入口文件
define('BIND_MODULE','Zhuce');

// 定义应用目录
define('APP_PATH','./Application/');

//定义目录分隔符简写形式
define("DS", DIRECTORY_SEPARATOR);
//定义网站根目录
define("ROOT_PATH", dirname(__FILE__) . DS);
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';




