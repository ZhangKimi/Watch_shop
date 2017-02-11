<?php
	namespace Home\Controller;
	use Think\Controller;
	class EditemailController extends Controller {
		public function index() {
			
			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}
			$this -> display("stepone");
		}

		public function stepTwo() {
			if(empty($_GET['extent'])) {
				$this -> error("非法操作", __MODULE__."/Editemail",2);
			}else {
				if($_GET['extent'] != "allow") {
					$this -> error("非法操作", __MODULE__."/Editemail",2);
				}
			}

			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}

			$this -> display("steptwo");
		}

		public function stepThree() {
			if(empty($_GET['extent'])) {
				$this -> error("非法操作", __MODULE__."/Editemail",2);
			}else {
				if($_GET['extent'] != "allow") {
					$this -> error("非法操作", __MODULE__."/Editemail",2);
				}
			}

			if(!$_SESSION['remind']) {
				switch($_GET['remind']){
					case 'success':
						$this -> assign("remind","恭喜您，邮箱地址修改成功");
						$this -> assign("btn","finish");
						break;
					case 'fail':
						$this -> assign("remind","很抱歉，邮箱地址修改失败，可能您的新邮箱地址与邮箱地址不一致");
						$this -> assign("btn","back");
						break;
				}
			}

			$this -> display("stepThree");
		}	
		
		// public function stepThree() {
			// if(empty($_GET['extent'])) {
				// $this -> error("非法操作", __MODULE__."/Editpwd",2);
			// }else {
				// if($_GET['extent'] != "allow") {
					// $this -> error("非法操作", __MODULE__."/Editpwd",2);
				// }
			// }

			// if(isset($_GET['remind'])) {
				// switch($_GET['remind']) {
					// case 'success':
						// $this -> assign("remind", "恭喜您 , 密码修改成功");
						// $this -> assign("btn", "finish");
						// break;
					// case 'fail':
						// $this -> assign("remind", "很抱歉 , 密码修改失败 , 可能您的新密码与原密码一致");
						// $this -> assign("btn", "back");
						// break;
				// }
			// }
			// $this -> display("stepthree");
		// }

		
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
		
		public function checkEmail() {
			$uid = $_SESSION['user']['uid'];
			$email = $_POST['email'];

			$db = M('user_details');
			$result = $db -> where("`uid` = '{$uid}' AND `email` = '{$email}'") -> find();

			if($result) {
				die('1');
			}else {
				die('0');
			}
		}
		
		public function doedit() {
			$uid = $_SESSION['user']['uid'];
			$data['email'] = $_POST['email'];

			$db = M('user_details');
			$result = $db -> where("`uid` = '{$uid}'") -> save($data);

			if($result) {
				die('1');
			}else {
				die('0');
			}
		}
		
		public function inExsistEmail() {
			$email = $_POST['email'];
			$db = M('user_details');
			$result = $db -> where("`email` = '{$email}'") -> find();

			if($result) {
				die('1');
			}else {
				die('0');
			}
		}
	}