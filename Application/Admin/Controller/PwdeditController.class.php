<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class PwdeditController extends Controller {
		public function index(){
			$db = M('admin');      
			$this -> assign("username", $_SESSION['admin']['username']);
			$this -> assign("id", $_SESSION['admin']['aid']);
			$this -> display("index");
		}



		public function pwdsava() {
			$id = $_POST['id'];     // 接收到要重置密码的管理员id
			$data['userpass'] = md5($_POST['userpass']);     // 将填写的密码加密处理
			$flag = null;
			$db = M("admin");
			if($db -> where("`aid` = {$id}") -> save($data)){
				$flag = true;
				$this -> pwdlog($id,$flag);
				$this -> success("修改成功！",__MODULE__."/Pwdedit",3);
			}else {
				$url = __MODULE__."/Pwdedit?id={$id}";
				$flag = false;
				$this -> pwdlog($id,$flag);
				echo "<script type='text/javascript'>
					alert('修改失败，请重试！');
					location.href = '{$url}';
				</script>";
			}
		}

		public function pwdlog($id,$bool){
			$mod = M('admin');
			$info = $mod -> find($id);
			$data['aid'] = $id;
			if($bool){
				$data['items'] = "修改密码成功";
			}else {
				$data['items'] = "修改密码失败";
			}
			$data['opreatetime'] = time();
			$data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
			$db = M("admin_log");
			$db -> add($data);
		}
		
	}
