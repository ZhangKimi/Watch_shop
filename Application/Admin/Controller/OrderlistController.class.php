<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class OrderlistController extends Controller {
		public function index(){
			$mod = M('orders');
			$info = $mod -> select();
			// $name = $info['']['name'];
			$this -> assign("info",$info);
			// $this -> assign('name',$name);

			$this -> display("index");
			}
	
		
	
	}	
	
		