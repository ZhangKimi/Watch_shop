<?php
	namespace Home\Controller;
	use Think\Controller;
	class EditemailController extends Controller {
		public function index() {
			
			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",2);
			}
			$uid = $_SESSION['user']['uid'];
			$db = M('user_details');
			$result = $db -> field("email") -> where("`uid` = '{$uid}'") -> find();
			preg_match("/.*?@/",$result['email'],$res1);
			// 用正则表达式获取邮箱头部去掉@符号
			$mail1 = rtrim($res1[0], "@");
			// 截取邮箱头部前2个字符
			$mailHead = substr($mail1,0,2);
			// 截取邮箱头部后2个字符
			$mailFooter = substr($mail1,-2);
			// 设置隐藏符号
			$mail2 = "****";
			// 获取邮箱域名包括@符号
			preg_match("/@.*?$/", $result['email'],$res2);
			$mail3 = $res2[0];
			// 生成加密后的邮箱字符串
			$email = $mailHead.$mail2.$mailFooter.$mail3;
			// 向前台模板电子邮箱变量赋值
			$this -> assign("email", $email);
			
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