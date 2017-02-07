<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypedelController extends Controller {

			//取顶级分类控制器
			public function index(){
				$Data=M("type");
				// $where['paid']=0; //先取他祖宗出来
				$list=$Data->where("`parid` = 0")->select();
				$this->assign('list',$list);
				 $this->display();
			}
			
			

			// 删除子类
			public function dell()
				{
				// 传过来的ID赋给$id
				$id = $_POST['id'];
				$mod =  M('type');  
				// 删除 pid 的语句
				$result = $mod -> where("`pid` = '{$id}'") -> delete();
				if($result)
				{
					die("1");
				}else
				{
					die("0");
				}
			}

}