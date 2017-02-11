<?php
	namespace Home\Controller;
	use Think\Controller;
	class EdituserinfoController extends Controller {
		public function index() {
			// 判断用户是否登录
			if(!$_SESSION['user']) { // 用户未登录
				// 未登录禁止访问 重定向至登录页面
				$this -> error("请您先登录",__MODULE__."/Login", 3);
			}
			// 获取当前登录用户ID
			$uid = $_SESSION['user']['uid'];
			// 实例化模型层 用户表
			$db = M('user');
			// 通过用户ID(uid) 与用户详情表建立连接 并查询当前登录用户的信息
			$result = $db -> join("user_details ON user.uid = user_details.uid")
						  -> where("user.`uid` = '{$uid}'")
						  -> find();
		  	$this -> assign("realname", $result['realname']);

		  	// 隐藏处理用户的Email
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
				// 控制修改和设置
				$this -> assign("isMobile", '1');
				// 向前台模板手机号码变量赋值
				$this -> assign("mobile", $mobile);
			}else { //未设置手机号码
				$this -> assign("mobile", "<font color='#F00'>未设置</font>");
				$this -> assign("isMobile", "0");
			}

			$this -> assign("sex", $result['sex']);

			// 获取会员生日
			if($result['birthday']) {
				$date = date("Y-n-j", $result['birthday']);
				$date = explode("-", $date);
				$year = $date[0];
				$month = $date[1];
				$day = $date[2];

				$this -> assign("year", $year);
				$this -> assign("month", $month);
				$this -> assign("day", $day);
			}
				

			// 头像
			if($result['headpic']) {
				$this -> assign("isHeadPic", "1");
				$this -> assign("headpic", $result['headpic']);
			}else {
				$this -> assign("isHeadPic", "0");
			}
			$this -> display("index");
		}
		public function doedit(){
	    	$uid = $_SESSION['user']['uid'];
	    	$data['realname'] = $_POST['realname'];
	    	$data['sex'] = $_POST['sex'];
	    	$year = $_POST['year'];
	    	$month = $_POST['month'];
	    	$day = $_POST['day'];
			$data['birthday'] = strtotime($day."-".$month."-".$year);
	    	$db = M("user_details");
	    	$result = $db -> where("`uid` = '{$uid}'") -> save($data);
	    	if($result) {
	    		die('1');
	    	}else {
	    		die('0');
	    	}
	    }
	}