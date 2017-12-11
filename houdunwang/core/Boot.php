<?php

namespace houdunwang\core;

use app\home\controller\Index;

/**
 * 启动类
 */
class Boot
{
    public static function run ()
    {
//       第一步测试检测程序能否运行到这里
        //输出run来测试单一入口是否可以通过composer自动加载
        //echo 'run';
//        第二部测试载入助手函数库
        //测试程序是否运行到这里，来运行助手函数
        //将助手函数放在system/helper中
        //p(1);//打印出1这个时候如果刷新页面会报错
        //页面上会报出houdunwang\core\p()的错误表示这个文件找不到
        //解决的办法就是在composer的配置文件autoload里面的files加上system/helper.php
//        p(1);
        //在刷新页面还报错的话
        //就需要在终端执行composer dump这个命令
        //p(1);
        //再刷新页面页面上就能正常加载样式了
        //执行初始化的操作
        self ::init ();
        //执行应用运行app文件夹里面类
        //先在app/home/controller/里创建一个Index.php类文件
        //然后测试Index.php类是否能加载到
        //这里会报错：不能实例化初始到类
        //修改composer的配置文件把app添加到psr-4里
        //在执行命令：composer dump
        //这里创建app/home/controller，创建两个类
        //这里创建app/member/controller，创建1个类
        if ( isset( $_GET[ 's' ] ) ) {
            $s = $_GET[ 's' ];
            //p($_GET['s']);die;
            //将$s转为数组
            $info = explode ( '/' , $s );
            //p($info);die;
            $m = $info[ 0 ];//模块
            $c = ucfirst ( $info[ 1 ] );//控制器类
            $a = $info[ 2 ];//方法
        }else {
            //没有参数给一个默认的值
            $m = 'home';//模块
            $c = 'Index';//控制器类
            $a = 'index';//方法
        }
        //定义常量,为了在后面是使用的时候比较方便，以为define定义的常量可以不受命名空间限制
        define('MODULE',$m);
        define('CONTROLLER',$c);
        define('ACTION',$a);
        $controller = "\app\\{$m}\controller\\{$c}";
        //( new $controller ) -> $a ();
        //new $controller这个类，调用$a,把函数的第二个参数作为$a的方法
        call_user_func_array ( [ new $controller , $a ] , [] );
    }
    /**
     * 初始化框架
     */
    public static function init ()
    {
        //添加头部
        header ( 'Content-type:text/html;charset=utf8' );
        //设置时区
        date_default_timezone_set ( 'PRC' );
        //开启session
        session_id () || session_start ();
    }
}