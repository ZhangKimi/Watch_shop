<?php
	namespace Home\Controller;
	use Think\Controller;
	class EditpwdController extends Controller {
		public function index() {
			
			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}
			
			$this -> display("stepone");
		}

		public function stepTwo() {
			if(empty($_GET['extent'])) {
				$this -> error("非法操作", __MODULE__."/Editpwd",2);
			}else {
				if($_GET['extent'] != "allow") {
					$this -> error("非法操作", __MODULE__."/Editpwd",2);
				}
			}

			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}

			$this -> display("steptwo");
		}

		public function stepThree() {
			if(empty($_GET['extent'])) {
				$this -> error("非法操作", __MODULE__."/Editpwd",2);
			}else {
				if($_GET['extent'] != "allow") {
					$this -> error("非法操作", __MODULE__."/Editpwd",2);
				}
			}

			if(isset($_GET['remind'])) {
				switch($_GET['remind']) {
					case 'success':
						$this -> assign("remind", "恭喜您 , 密码修改成功");
						$this -> assign("btn", "finish");
						break;
					case 'fail':
						$this -> assign("remind", "很抱歉 , 密码修改失败 , 可能您的新密码与原密码一致");
						$this -> assign("btn", "back");
						break;
				}
			}
			$this -> display("stepthree");
		}

		public function checkPwd() {
			$uid = $_SESSION['user']['uid'];
			$userpass = md5($_POST['userpass']);
			$db = M("user");
			$result = $db -> where("`uid` = '{$uid}' AND `userpass` = '{$userpass}'") -> find();
			if($result) {
				die('1');
			}else {
				die('0');
			}
		}

		public function doedit() {
			$uid = $_SESSION['user']['uid'];
			$data['userpass'] = md5($_POST['userpass']);

			$db = M('user');
			$result = $db -> where("`uid` = '{$uid}'") -> save($data);

			if($result) {
				die('1');
			}else {
				die('0');
			}
		}
	}