<?php
	namespace Home\Controller;
	use Think\Controller;
	class CollectController extends Controller {
		public function index() {
			// $data['uid'] = $_SESSION['user']['uid'];
			// $data['pid'] = $_POST['pid'];
			// $data['collecttime'] = time();

			// $db = M("collect");
			// // 先查找用户是否添加过此商品
			// $info = $db -> where("`uid` = '{$data['uid']}'") -> select();
			// // 判断是否查询到结果集
			// if($info){
				// // 查询到结果集 循环判断用户是否添加过此商品
				// foreach($info as $rows) {
					// if($rows['pid'] == $data['pid']) {
						// // 如果用户添加过此商品 停止程序运行 返回错误号: 2
						// die("2");
					// }
				// }
			// }
			// // 执行添加操作
			// $result = $db -> add($data);
			// // 判断是否添加成功
			// if($result) {
				// die("1");
			// }else {
				// die("0");
			// }
			
			$this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
		    // 显示导航栏
			$this -> assign("list", displayFirst());
        	$this -> assign("result", displaySecond());
        	$this -> assign("username", $_SESSION['user']['username']." 欢迎回来");
			$this -> display("index");
		}
	}