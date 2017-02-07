<?php
    namespace Home\Controller;
    use Think\Controller;
    class OrderController extends Controller {
        public function index(){
        	$uid = $_SESSION['user']['uid'];
    		$mod = M('cart');
    		$info = $mod -> where("`uid`='$uid'") -> select();
    		// dump($info);
    		$this ->assign('info',$info);
    		// 显示用户购物车购物数量
    		$this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
    		// 显示导航栏
        	$this -> assign("list", displayFirst());
            $this -> assign("result", displaySecond());
            $this -> display("index");
        }

    }