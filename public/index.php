<?php
/**
 * composer初始化项目
 * 单一入口文件
 * 自动生成vendor目录执行的命令：composer dump
 */
require_once '../vendor/autoload.php';
//刷新页面后类无法找到
//这里就需要修改composer的配置文件composer.json
//需要手动加入autoload这一项
//autoload里需要两个元素files(自动加载文件)/psr-4
//"psr-4":{
//    "houdunwang\\":"houdunwang\\",去除houdunwang目录加载类
//            "app\\":"app\\"

//在项目的根目录下执行：composer dump
//调用启动类run方法
\houdunwang\core\Boot::run();
