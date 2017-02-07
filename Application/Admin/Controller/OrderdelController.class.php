<?php  
namespace Admin\Controller;
	use Think\Controller;
	class OrderdelController extends Controller {
		public function index(){
			$mod = M('orders');
			$info = $mod->select();
			// dump($info);
			$this->assign('info',$info);
			$this -> display("index");
			}
		public function del(){
			$id = $_POST['id'];
			$mod = M('orders');
			$res=$mod -> where("`id`='$id'") -> delete();
				if($res){
					die('1');
					// $this -> error("删除成功","../Orderdel/index");
				}else{
					die('0');
					// $this -> success("删除失败","../Orderdel/index");
				}
			}
		
		}
	
		