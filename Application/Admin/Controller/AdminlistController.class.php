<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class AdminlistController extends Controller {
		public function index(){
			$db = M('admin');      
			$result = $db -> select();
			$this -> assign("result", $result);
			$this -> display("index");
		}
	}
