<?php

namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\view\View;

class Index extends Controller {
	public function index(){
		return View::make();
	}
}