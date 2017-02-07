<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypeController extends Controller {

			//取顶级父类控制器  显示父类
			public function index(){
				// 实例化type这个表
				$Data=M("type");
				// 查询parid = 0 的类
				$list=$Data->where("`parid` = 0")->select();
				// 对模板变量赋值
				$this->assign('list',$list);
				$this->display();
			}
}