<?php
	namespace Home\Controller;
	use Think\Controller;
	class UserinfoController extends Controller {
		public function index(){
		    // 显示用户购物车购物数量
		    $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
		    // 显示导航栏
			$this -> assign("list", displayFirst());
        	$this -> assign("result", displaySecond());
        	$this -> assign("username", $_SESSION['user']['username']." 欢迎回来");
			$this -> display("index");
		}
	}