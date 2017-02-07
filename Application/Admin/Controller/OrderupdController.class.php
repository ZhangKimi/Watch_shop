<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class OrderupdController extends Controller {
		public function index(){
			$mod =M('orders');
			$info = $mod -> select();

			$this -> assign("info",$info);
			$this -> display("index");
			}

		// public function edit(){

		// 	$mod = M("orders");
		// 	$info = $mod -> find($_GET['id']);

		// 	$this -> assign("info",$info);

		// 	$this -> display('Updateorder');
		// }

		}
		
		
	
		