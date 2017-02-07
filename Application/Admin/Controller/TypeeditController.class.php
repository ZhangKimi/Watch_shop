<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypeeditController extends Controller {

			//取顶级分类控制器
			public function index(){
				$Data=M("type");
				// $where['paid']=0; //先取他祖宗出来
				$list=$Data->where("`parid` = 0")->select();
				$this->assign('list',$list);
				 $this->display();
			}
			
			// 修改
			public function edit() {
				// 赋给相应的$
				$name = $_POST['name'];
				$old = $_POST['oldname'];
				$pid = $_POST['pid'];
				// 实例化type表
				$db = M('type');
				$data['name']=$name;
				// 传过来的名替换原来的名字
				$result = $db -> where("`name` = '{$old}'") ->save($data);
				
				if($result) {
					die("0");
				}else {
					die("1");
				}
			}
			
			
			// public function edit() {
				// $db = M('type');
				// $name = $_POST['name'];
				// $old = $_POST['oldname'];
				// $pid = $_POST['pid'];
				// $data['name']=$name;
				// $result = $db -> where("pid = {$pid}`name` = '{$old}'") ->save($data);

				// // $name = $_POST['name'];
				// // $old = $_POST['oldname'];
				
				// // $pid = $_POST['pid'];
				// // $parid = $_POST['parid'];
				// // $path = $_POST['path'];
				// // $result = $db->execute("update type set `name` = '{$old}',parid='{$parid}',path='{$path}' where pid='{$pid}'");
				
				// if($result) {
					// die("0");
				// }else {
					// die("1");
				// }
			// }
}