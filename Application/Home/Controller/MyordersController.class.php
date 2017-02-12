<?php
	namespace Home\Controller;
	use Think\Controller;
	class MyordersController extends Controller {
		public function index() {
			$uid = $_SESSION['user']['uid'];
			
			$mod = M('orders');
			$info = $mod -> where("`uid` = '{$uid}'") -> select();
					     
			$this -> assign("info", $info);
			$this -> display("index");
		}
	}