<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class AdminlogController extends Controller {
		public function index(){
			$db = M('admin_log');     
			$result = $db -> join('admin ON admin_log.aid = admin.aid') -> select();
			$this -> assign("result", $result);
			$this -> display("index");
		}
	}
