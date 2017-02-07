<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class UpdateorderController extends Controller {
		public function index(){

			$mod=M('orders');

			$info = $mod -> select();
			

			$this -> display("index");
		}
		public function edit(){

			$mod = M("orders");
			$info = $mod -> find($_GET['id']);
			// die(dump($info));

			$this -> assign("info",$info);

			$this -> display('index');
		}
		public function update(){
			$mod = M('orders');
			$username=$_POST['name'];
			$this -> assign("username",$username);
			// die(dump($_POST));
			
			$data['id'] = $_POST['id'];
			$data['name']=$_POST['name'];
			$data['phone']=$_POST['phone'];
			$data['addr']=$_POST['addr'];
			$data['state']=$_POST['state'];
			$res= $mod->save($data);

			if($res)
			{
				$this->success("成功","../Orderupd/index/");
			}else{
				$this->error('失败',"edit?id={$_POST['id']}");
			}

		}
	}