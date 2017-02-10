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
				$res = $db -> where("`parid` = '{$id}'") -> select();
				$this -> assign("type", $res);
                $mod = M('product');
                foreach($res as $val) {
                    $info[$val['pid']] = $mod -> join("products_details ON product.pid = products_details.pid")
                             -> join("brand ON products_details.brandid = brand.id")
                             -> join("RIGHT JOIN type ON products_details.typeid = type.pid")
                             -> field("product.`pid`,product.`price`,product.`title`,brand.`bname`,products_details.`picurl`,product.`stock`")
                             -> where("`typeid` = '".$val['pid']."'")
                             -> select();
                         }
                $this -> assign('info',$info);
				$this -> display("index");
            }
            // 第二种情况 用户点击子类导航 显示子类模板
            if(isset($_GET['pid'])) {
				$id = $_GET['pid'];
                $parid = $_GET['parid'];
				$db = M('type');
				$res = $db -> where("`pid` = '{$id}'") -> find();
                $result = $db -> where("`pid` = '{$parid}'") -> find();
				$this -> assign("dname",$res['name']);
                $this -> assign("pname", $result['name']);
                $this -> assign("parid", $parid);
                $mod = M('product');
                foreach($res as $val){
                    $info[$val['pid']] = $mod -> join("products_details ON product.pid = products_details.pid")
                             -> join("brand ON products_details.brandid = brand.id")
                             -> join("RIGHT JOIN type ON products_details.typeid = type.pid")
                             -> field("product.`pid`,product.`price`,product.`title`,brand.`bname`,products_details.`picurl`,product.`stock`")
                             -> where("`typeid` = '".$val['pid']."'")
                             -> select();
                         }
                $this -> assign('info',$info);                                               
				$this -> display("index1");
            }
        }
    }