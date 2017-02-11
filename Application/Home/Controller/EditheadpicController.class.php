<?php
	namespace Home\Controller;
	use Think\Controller;
	class EditheadpicController extends Controller {
		public function index() {
			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login",3);
			}

			if($_SESSION['user']['headpic']) {
				$this -> assign("oldpic", $_SESSION['user']['headpic']);
			}
			
			$this -> display("index");
		}

		public function format64() {
			$db = M("user_details");

	        $data['headpic'] = $_POST['imgurl'];
	        $userid = $_SESSION['user']['uid'];
	        $result = $db -> where("`uid` = '{$userid}'") -> save($data);

	        if($result) {
	            $_SESSION['user']['headpic'] = $data['headpic'];
	            die("1");
	        }else {
	            die("0");
	        }
        }
	}