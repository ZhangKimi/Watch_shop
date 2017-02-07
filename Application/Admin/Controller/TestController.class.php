<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TestController extends Controller {
		public function index(){
			$db = M("admin");
			for($i = 1;$i < 10;$i++){
				$user = rand(100000,999999);
				$username = $user."@qq.com";

				$data['username'] = $username;
				$data['userpass'] = md5("123456");
				$data['stat'] = 1;
				$data['extent'] = 2;
				$data['addtime'] = time();
				$db -> add($data);
			}
		}
	}
