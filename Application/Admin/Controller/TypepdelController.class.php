<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypepdelController extends Controller {

			//取父级分类控制器
			public function index(){
				$Data=M("type");
			// type表 查询条件parid = 0 (父类id是0的) ->查询 把查询结果赋给$list
				$list=$Data->where("`parid` = 0")->select();
			// 对模板变量赋值
				$this->assign('list',$list);
				$this->display();
			}

			//删除父类 同时删除子类
			public function del(){
            $mod =  M('type');
			$pid = $_GET['id'];
			// 查询父类ID = 拼接对应 的 父类ID
				$where['parid'] = array('eq',$pid);
			// 删除子类
                $result=$mod->where($where)->delete();
			// 删除父类
                $result=$mod->delete($pid);
				if($result)
					{
						die("1");
					}else
					{
						die("0");
					}
				}        
		}