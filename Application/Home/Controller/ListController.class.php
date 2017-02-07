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
            

            /* 显示List页面 此处分为两种情况 */
            // 第一种情况 用户点击父类导航 显示父类模板
            if(isset($_GET['tid'])) {
				$id = $_GET['tid'];
				$db = M('type');
				$res = $db -> where("`pid` = '{$id}'") -> find();
				$this -> assign("tname", $res['name']);
				
				$res = $db -> where("`parid` = '{$id}'") -> find();
				$this -> assign("dname", $res['name']);
				
				$this -> display("index");
            }
            // 第二种情况 用户点击子类导航 显示子类模板
            if(isset($_GET['pid'])) {
				$id = $_GET['pid'];
				$db = M('type');
				$res = $db -> where("`pid` = '{$id}'") -> find();
				$this -> assign("",$res['name']);
				$this -> display("index1");
            }
        }
    }