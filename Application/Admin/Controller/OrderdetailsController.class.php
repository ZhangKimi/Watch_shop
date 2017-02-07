<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class OrderdetailsController extends Controller {
		public function index(){
			

			
			$this -> display("index");
		}
		public function sele(){
			$uid = $_GET['id'];
			$name = $_GET['name'];
			$this->assign('name',$name);
			$mod = M('orderdetails');
			$info= $mod -> where("`uid`='$uid'") -> select();
			$this -> assign("info",$info);
			$this -> display("index");
		}
}

			
			
	
		
	
		