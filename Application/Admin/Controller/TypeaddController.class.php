<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class TypeaddController extends Controller {

		//添加分类信息
		 public function add()
		 {
			// 实例化type表
			 $mod =M("type");
			// 接收name这个值	赋值给$data['name'] 
			 $data['name'] = $_POST['name'];
			// 赋值 parid = 0  
			 $data['parid'] = $_POST['parid'];
			// 赋值path = 0，  完成拼接path
			 $data['path'] = '0'.",".$data['parid'].",";
			 $mod->create();
			// 执行添加 把$data放到add中  赋给$result
			$result=$mod->add($data);
			// 判断$result
			if($result)
			{
			// 添加成功 跳转到Typepadd页面 跳转时间 1 秒
				 $this->success("添加成功", __MODULE__."/Typeadd",1);
			 }else
			 {
			// 添加失败 跳转到Typepadd页面 跳转时间 1 秒
				 $this->error("添加失败", __MODULE__."/Typeadd",2);
		  }
		 } 

		// 父类下拉页面	
		public function index(){
					$db = M('type');
					$result = $db -> ORDER("concat(path,pid)") -> select();
					$str = "";
					foreach($result as $row){
						$m = substr_count($row['path'],",") - 1;
						//$nbsp是根据m的值来重复打印空格
						$nbsp = str_repeat("&nbsp;&nbsp;&nbsp;",$m * 2);
						//判断列表项是否是根类别
						//如果当前数据的pid为0，代表根类别，把disabled赋过去
						// $disabled = ($row['parid'] == 0)?"disabled":"";
						$str .= "<option value='{$row['pid']}'>";
						$str .= "{$nbsp}┣－{$row['name']}";
						$str .= "</option>";  
					}
					// dump($row);
					$this -> assign("option", $str);
					$this -> display("index");
				}


	}
	
	