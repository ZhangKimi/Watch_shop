<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypepaddController extends Controller {
		
		//添加父类
			public function addd(){
				// 实例化type表
					  $mod = M('type');
				// 接收name这个值	赋值给$data['name']  
					  $data['name'] = $_POST['name'];
				// 赋值 parid = 0  
					  $data['parid'] = 0;
			    // 赋值path = 0，  完成拼接path
					  $data['path'] = $data['parid'].",";
				// 执行添加 把$data放到add中  赋给$result
					  $result=$mod->add($data);  
			    // 判断$result
					if($result){
						 
			    // 添加成功 跳转到Typepadd页面 跳转时间 1 秒
						  $this->success("添加成功", __MODULE__."/Typepadd",1);
					}else{
				// 添加失败 跳转到Typepadd页面 跳转时间 1 秒
						  $this->error("添加失败", __MODULE__."/Typepadd",2);
					}
				} 
			}