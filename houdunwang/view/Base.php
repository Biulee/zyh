<?php
namespace houdunwang\view;

use houdunwang\core\Controller;

class Base{
	private $data = [];//储存的变量
	private $file = '';//模板文件
	/**
	 * 显示模板文件
	 */
	public function make(){
		//p (MODULE);
		//P(CONTROLLER);
		//P(ACTION);
		//include '../app/home/view/index/index.html';
		//include '../app/'.MODULE.'/view/'.strtolower (CONTRLLER).'/'.ACTION.'.php';
		$this->file = '../app'.MODULE.'view'.strtolower (CONTROLLER).'/'.ACTION.'.'.c('view.suffix');
		return $this;
	}
	//分配变量
	public function with($var = []){
		//p ($var);die;
		$this->data = $var;
		return $this;
	}
	public function __toString ()
	{
		//p ($this->data);die;
		//把键名变成变量
		extract ($this->data);
		//会产生变量名，名字就是with给的名字
		//p ($data);
		//p ($a);
		//die;
		//加载模板文件
		if($this->file){
			include $this->file;
		}
		return '';
	}
}
