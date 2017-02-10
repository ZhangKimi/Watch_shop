<?php
	namespace Home\Controller;
	use Think\Controller;
	class CenterController extends Controller {
		public function index(){
            if(!$_SESSION['user']) {
                $this -> error("请您先登录", __MODULE__."/Login", 3);
            }
		    // 显示用户购物车购物数量
		    $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
		    // 显示导航栏
			$this -> assign("list", displayFirst());
        	$this -> assign("result", displaySecond());
        	$this -> assign("username", $_SESSION['user']['username']." 欢迎回来");
        	$mod = M("products_details");
    
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
            $info = $mod -> join('product ON products_details.pid = product.pid')
                         -> join('brand ON products_details.brandid = brand.id')
                         // 查询前3条数据
                         -> limit(0,3)
                         // 执行查询
                         -> select();
            // 将商品信息发送至前台
            $mod = M("products_details");
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
            $info1 = $mod -> join('product ON products_details.pid = product.pid')
                          -> join('brand ON products_details.brandid = brand.id')
                          // 查询3条数据
                          -> limit(5,3)
                          // 执行查询
                          -> select();
            // 将商品信息发送至前台
            $uid = $_SESSION['user']['uid'];
            $mod = M("cart");
            $res = $mod -> join('product ON cart.pid = product.pid')
                        -> join('products_details ON cart.pid = products_details.pid')
                        -> where("`uid` = $uid")
                        -> limit(2)
                        -> select();
            $num = shopCartNum($_SESSION['user']['uid']);
            $this -> assign('num',$num);
            $this -> assign('res',$res);
            $this -> assign('info',$info);
            $this -> assign("info1",$info1);
            $this -> display("index");
		}
	}