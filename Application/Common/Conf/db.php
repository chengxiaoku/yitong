<?php
/**
 * 数据库配置信息
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/12
 * Time: 21:29
 */

return array(
    'DB_TYPE'   => 'mysql',     // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'ytjz',   // 数据库名
    'DB_USER'   => 'root',      // 用户名
    'DB_PWD'    => 'root',    // 密码
    'DB_PORT'   => 3306,        // 端口
    'DB_PARAMS' =>  array(),    // 数据库连接参数
    'DB_PREFIX' => 'tbl_',       // 数据库表前缀
    'DB_CHARSET'=> 'utf8',      // 字符集
    'DB_DEBUG'  =>  TRUE,       // 数据库调试模式 开启后可以记录SQL日志
);
