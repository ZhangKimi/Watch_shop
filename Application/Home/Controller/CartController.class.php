<?php
	namespace Home\Controller;
	use Think\Controller;
	class CartController extends Controller {
	    public function index() {
	    	$db = M("cart");
	    	$uid = $_SESSION['user']['uid'];
	    	$info = $db -> join("brand ON brand.id = cart.bid")
	    				-> where("`uid` = '{$uid}'")
	    	            -> select();
	    	// 显示用户购物车购物数量
	    	$num = shopCartNum($_SESSION['user']['uid']);
	    	$this -> assign("shopNum", $num);
	    	// 显示导航
          	$this -> assign("list", displayFirst());
          	$this -> assign("result", displaySecond());
          	for($j = 0; $j < count($info);$j++) {
                $info[$j]['id'] = $j + 1;
          	}
          	$this -> assign("info", $info);
          	$this -> display("index");
	    }
        
	    public function addOne() {
	        $db = M("cart");
	        $data['uid'] = $_SESSION['user']['uid'];
	        $data['pid'] = $_POST['pid'];
	        $data['num'] = 1;
	        $data['pic'] = $_POST['pic'];
	        $data['price'] = $_POST['price'];
	        $data['name'] = $_POST['name'];
	        $data['bid'] = $_POST['bid'];
	        $result = $db -> add($data);
	        if($result) {
	        	$res = reduceStock($data['pid'], 1);
	        	if($res) {
	        		die('1');
	        	}else {
	        		die('0');
	        	}
	        }else {
	        	die('0');
	        }
	    }

	    public function cartDel() {
	    	$pid = $_POST['pid'];
	    	$uid = $_SESSION['user']['uid'];

	    	$db = M('cart');
	    	$result = $db -> where("`uid` = '{$uid}' AND `pid` = '{$pid}'") -> delete();
	    	if($result) {
	    		die("1");
	    	}else {
	    		die("0");
	    	}
	    }
	}