<?php
	namespace Admin\Controller;
    use Think\Controller;
	class UsereditController extends Controller {
		public function index() {
			// 实例化Model对象 用户表
			$db = M('user');
			// 将用户表与用户详情表建立连接通过用户ID
			$result = $db -> join("user_details ON user.uid = user_details.uid")
						  // 将所有用户查询
					      -> select();
	      	// 向前台用户信息模板变量赋值
			$this -> assign("result", $result);
			// 显示前台模板
    		$this -> display('index');
    	}

    	public function edit() {
    		// 获取传递用户id的值
    		$id = $_GET['id'];
    		// 实例化Model对象 用户表
    		$db = M('user');
    		// 将用户表与用户详情表建立连接通过用户ID
    		$result = $db -> join("user_details ON user.uid = user_details.uid")
    					// 通过用户ID 查询指定用户的信息
    					-> where("user.`uid` = '{$id}'")
    					-> find();
			$this -> assign("id", $id);
			$this -> assign("username", $result['username']);
			$this -> assign("sex", $result['sex']);
			$this -> assign("mobile", $result['mobile']);
			$this -> assign("email", $result['email']);
			$this -> assign("stat", $result['stat']);
			$this -> display("edit");
    	}
	}