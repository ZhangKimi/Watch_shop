<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class AdmindelController extends Controller {
		public function index(){
			$db = M('admin');      
			$result = $db -> select();
			$this -> assign("result", $result);
			$this -> display("index");
		}

		public function del() {
			$id = $_POST['id'];
			$db = M("admin");
			$result = $db -> where("`aid` = '{$id}'") -> delete();
			
			if($result) {
				die("1");
			}else {
				die("0");
			}

		}
	}
