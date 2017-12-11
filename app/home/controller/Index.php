<?php

namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;

class Index extends Controller
{
	public function index()
	{
		//echo 'index';//能够输出index
		//第一步
		//实例化View类，调用make方法
		//在View类中找make的方法
		//如果没有make方法就会触发__call方法
		//再调用runParese方法
		//(new View())->make();
		//这个时候再触发__callStatic方法
		//再解决变量
		$a = 1;
		$data = ['name'=>'后盾人','age'=>10];
		//分配变量时候使用compact函数
		//能把数据变成什么样，打印：compact ('data')
		//函数：把变量变成数组下标
		//变量值变成下标对应的值
		//p(compact ('data','a'));die;
		//return View::with();
		return View::with(compact ('data','a'))->make();
		//获取所有数据库
		//$data = Model::getAll();
		//测试e和q方法是否有效
		//$res = Model::q('select * from student');
		//p($res);
	}

	public function add(){
		View::make();
	}

}