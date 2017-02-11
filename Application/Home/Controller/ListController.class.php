<?php
    namespace Home\Controller;
    use Think\Controller;
    class ListController extends Controller {
        public function index(){
            // 显示用户购物车购物数量
            $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
            // 显示导航栏
        	$this -> assign("list", displayFirst());
            $this -> assign("result", displaySecond());
            
            // 第二种情况 用户点击子类导航 显示子类模板
            if(isset($_GET['pid'])) {
				$typeid = $_GET['pid'];
                $parid = $_GET['parid'];
				$db = M('type');
				$res = $db -> where("`pid` = '{$typeid}'") -> find();
                $result = $db -> where("`pid` = '{$parid}'") -> find();
				$this -> assign("dname",$res['name']);
                $this -> assign("pname", $result['name']);
                $this -> assign("parid", $parid);
                $mod = M('product');
                $info = $mod -> join("products_details ON product.pid = products_details.pid")
                             -> join("brand ON products_details.brandid = brand.id")
                             -> where("`typeid` = '{$typeid}'")
                             -> select();
                $this -> assign('info',$info);                                               
				$this -> display("index1");
            }
        }
    }