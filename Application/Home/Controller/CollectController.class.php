<?php
	namespace Home\Controller;
	use Think\Controller;
	class CollectController extends Controller {
		public function index() {

			
			$this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
		    // 显示导航栏
			$this -> assign("list", displayFirst());
        	$this -> assign("result", displaySecond());
        	$this -> assign("username", $_SESSION['user']['username']." 欢迎回来");
        	$uid = $_SESSION['user']['uid'];
        	$mod = M("collect");
            $info = $mod ->join('product ON collect.pid = product.pid')
                         ->join('products_details ON collect.pid = products_details.pid')
                         ->where("`uid` = $uid")
                         ->select();
            $mod = M("products_details");
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
        	$info1 = $mod -> join('product ON products_details.pid = product.pid')
                          -> join('brand ON products_details.brandid = brand.id')
                        //查询条件上架商品
                          -> where("products_details.`hot` = '1'")
                        // 执行查询
                         -> select();
            // 将商品信息发送至前台
            $this ->assign('info',$info);
            $this ->assign('info1',$info1);
			$this -> display("index");
		}
		
		public function add() {
			$data['uid'] = $_SESSION['user']['uid'];
			$data['pid'] = $_POST['pid'];
			$data['collecttime'] = time();

			$db = M("collect");
			// 先查找用户是否添加过此商品
			$info = $db -> where("`uid` = '{$data['uid']}'") -> select();
			// 判断是否查询到结果集
			if($info){
				// 查询到结果集 循环判断用户是否添加过此商品
				foreach($info as $rows) {
					if($rows['pid'] == $data['pid']) {
						// 如果用户添加过此商品 停止程序运行 返回错误号: 2
						die("2");
					}
				}
			}
			// 执行添加操作
			$result = $db -> add($data);
			// 判断是否添加成功
			if($result) {
				die("1");
			}else {
				die("0");
			}
		}
	}