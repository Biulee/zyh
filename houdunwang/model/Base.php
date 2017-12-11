<?php
namespace houdunwang\model;

use Exception;
use PDO;

class Base
{
	private static $pdo = null;

	public function __construct ()
	{
		//连接数据库
		if(is_null(self::$pdo)){
			$this -> connect ();
		}
	}
	public function getAll()
	{
		echo 'getAll';
	}

	//连接数据库
	private function connect ()
	{
		try{
            //这里的c是数据库的地址
			$dsn = c('database.driver').":host".c('database.host').";dbname=".c('database.dbname');
			//这是数据库的用户名
			$user = c('database.user');
			//这是密码
			$password = c('database.password');
			//链接数据库
			self::$pdo = new PDO($dsn,$user,$password);
		}catch (Exception $e){
			//输出错误属性
			exit($e ->getMessage ());
		}
	}
	//执行有结果的查询
	public function q($sql)
	{
		try{
			//执行sql语句
			$res = self::$pdo -> query($sql);
			//将结果return出来
			return $res -> fetchAll (PDO::FETCH_ASSOC);
		}catch (Exception $e){
			die($e -> getMessage ());
		}
	}
	//执行sql语句
	public function e ($sql)
	{
		try{
			return self::$pdo -> exec ($sql);
		}catch (Exception $e){
			//输出错误的信息
			die($e -> getMessage ());
		}
	}

}