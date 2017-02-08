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
			$this -> assign("realname", $result['realname']);
			$this -> assign("birthday", $result['birthday']);
			$this -> assign("mobile", $result['mobile']);
			$this -> assign("email", $result['email']);
			$this -> assign("stat", $result['stat']);
			$this -> display("edit");
    	}

    	public function doedit() {
    		// 要更改用户的id
    		$id = $_POST['uid'];

    		// 用变量数组data接需要更新user表的值
    		$data['stat'] = $_POST['stat'];

			// 用变量数组info接需要更新user_details表的值
    		$info['sex'] = $_POST['sex'];
    		$info['realname'] = $_POST['realname'];
    		$date = explode("/", $_POST['birthday']);
    		$year = $date[0];
    		$month = $date[1];
    		$day = $date[2];
    		$birthday = strtotime($day."-".$month."-".$year);
    		$info['birthday'] = $birthday;
    		$info['mobile'] = $_POST['mobile'];
    		$info['email'] = $_POST['email'];

    		// 更新user表
    		$db = M('user');
    		$result = $db -> where("`uid` = '{$id}'") -> save($data);

    		// 更新user_details表
    		$mod = M('user_details');
    		$res = $mod -> where("`uid` = '{$id}'") -> save($info);

    		if($result || $res) {
    			die("1");
    		}else {
    			die("0");
    		}
    	}
	}