<?php
	namespace Admin\Controller;
	use Think\Controller;
	class MemberconfigController extends Controller {
		public function index() {
			// 实例化Model对象
			$db = M("memberconfig");

			// 查询设置记录
			$result = $db -> find();

			// 去掉激活邮件内容多余的空格
			$result['emailcontent'] = ltrim($result['emailcontent']);

			// 为前台模板赋值
			
			// 当前配置记录号
			$this -> assign("id", $result['id']);
			// 是否开启用户注册模块
			$this -> assign("regsw", $result['regsw']);
			// 用户审核方式
			$this -> assign("isactive", $result['isactive']);
			// 注册赠送积分数
			$this -> assign("giveintegral", $result['giveintegral']);
			// 激活邮件链接有效期
			$this -> assign("token_exptime", $result['token_exptime']);
			// 激活邮件内容
			$this -> assign("emailcontent", $result['emailcontent']);

			//显示前台模板
			$this -> display("index");
		}

		public function configSave() {
			$db = M("memberconfig");
			
			$result = $db -> save($db -> create());

			if($result) {
				die("1");
			}else {
				die("0");
			}
		}
	}