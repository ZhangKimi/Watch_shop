<?php
	namespace Home\Controller;
	use Think\Controller;
	class UserinfoController extends Controller {
		public function index(){

			if(!$_SESSION['user']){
				$this -> error("请先登录", __MODULE__."/Login", 3);
			}

			$uid = $_SESSION['user']['uid'];
		    $db = M("user");
		    $result = $db -> join("user_details ON user.uid = user_details.uid")
		    			  -> where("user.`uid` = '{$uid}'")
		    			  -> find();
			if($result['realname']) {
				$this -> assign("realname", $result['realname']);
			}else {
				$this -> assign("realname", "<font color='#F00'>未设置</font>");
			}

			if($result['sex']) {
				switch($result['sex']) {
					case '1':
						$this -> assign("sex", '男');
						break;
					case '2':
						$this -> assign("sex", '女');
						break;
				}
			}else {
				$this -> assign("sex", "<font color='#F00'>未设置</font>");
			}

			if($result['birthday']) {
				$this -> assign("birthday", date("Y-m-d", $result['birthday']));
			}else {
				$this -> assign("birthday", "<font color='#F00'>未设置</font>");
			}

			// 处理邮箱 用*号隐藏部分邮箱
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
			
			// 判断是否设置手机号码
			if($result['mobile']) { // 设置手机号码
				// 截取手机号码前3位
				$mob1 = substr($result['mobile'],0,3);
				// 将手机号码第4-7位用星号代替
				$mob2 = "****";
				// 截取手机号码后4位
				$mob3 = substr($result['mobile'],-4);
				// 生成加密后的手机号码
				$mobile = $mob1.$mob2.$mob3;
				// 控制下方是否绑定
				$this -> assign("isMobile", '1');
				// 向前台模板手机号码变量赋值
				$this -> assign("mobile", $mobile);
			}else { //未设置手机号码
				$this -> assign("mobile", "<font color='#F00'>未设置</font>");
				$this -> assign("isMobile", "0");
			}
			$this -> assign("registtime", $result['registtime']);

			$this -> display("index");
		}
	}