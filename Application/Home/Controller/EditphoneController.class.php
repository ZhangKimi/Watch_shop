<?php
	namespace Home\Controller;
	use Think\Controller;
	class EditphoneController extends Controller {
		public function index() {

			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}
			
			$uid = $_SESSION['user']['uid'];
			$db = M('user_details');
			$result = $db -> field("mobile") -> where("`uid` = '{$uid}'") -> find();

			$mobile = $result['mobile'];
			if(!$mobile) {
				$remind = "您是第一次绑定手机 , 无需输入当前绑定手机号码";
			}else {
				$mob1 = substr($mobile,0,3);
				$mob2 = "****";
				$mob3 = substr($mobile,7,4);
				$mobile = $mob1.$mob2.$mob3;
				$remind = "您当前绑定的手机号码为: ";
			}
			$this -> assign("currentMobile", $mobile);
			$this -> assign("remind", $remind);
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
						$this -> assign("remind", "恭喜您 , 手机号码修改成功");
						$this -> assign("btn", "finish");
						break;
					case 'fail':
						$this -> assign("remind", "很抱歉 , 手机号码修改失败 , 可能您的新手机号码与手机号码一致");
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

		public function checkMobile() {
			$uid = $_SESSION['user']['uid'];
			$mobile = $_POST['mobile'];

			$db = M('user_details');
			$result = $db -> where("`uid` = '{$uid}'") -> find();
			if($result) {
				if($result['mobile'] == "") {
					die('1');
				}else {
					if($mobile == $result['mobile']) {
						die('1');
					}else {
						die('0');
					}
				}
			}else {
				die('0');
			}
		}

		public function isExsistMobile() {
			$mobile = $_POST['mobile'];
			$db = M('user_details');
			$result = $db -> where("`mobile` = '{$mobile}'") -> find();

			if($result) {
				die('1');
			}else {
				die('0');
			}
		}

		public function doedit() {
			$uid = $_SESSION['user']['uid'];
			$data['mobile'] = $_POST['mobile'];

			$db = M('user_details');
			$result = $db -> where("`uid` = '{$uid}'") -> save($data);

			if($result) {
				die('1');
			}else {
				die('0');
			}
			
		}
	}