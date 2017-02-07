<?php  
	namespace Admin\Controller;
	use Think\Controller;
	class AdminpwdController extends Controller {
		public function index(){
			$db = M('admin');      
			$result = $db -> select();
			$this -> assign("result", $result);
			$this -> display("index");
		}

		public function restpwd() {
			$db = M("admin");
			$id = $_GET['id'];
			$result = $db -> where("`aid` = '{$id}'") -> select();
			foreach($result as $res);
			$this -> assign("username", $res['username']);
			$this -> assign("id", $res['aid']);
			$this -> display("Adminpwd/restpwd");
		}

		public function restpwdsava() {
			$id = $_POST['id'];     // 接收到要重置密码的管理员id
			$data['userpass'] = md5($_POST['userpass']);     // 将填写的密码加密处理
			$flag = null;
			$db = M("admin");
			if($db -> where("`aid` = {$id}") -> save($data)){
				$flag = true;
				$this -> success("重置成功！",__MODULE__."/Adminpwd",3);
				$this -> repwdlog($id,$flag);
			}else {
				$url = __MODULE__."/Adminpwd/restpwd?id={$id}";
				echo "<script type='text/javascript'>
					alert('重置失败，请重试！');
					location.href = '{$url}';
				</script>";
				$flag = false;
				$this -> repwdlog($id,$flag);
			}
		}

		public function repwdlog($id,$bool){
			$mod = M('admin');
			$info = $mod -> find($id);
			$data['aid'] = $_SESSION['admin']['aid'];
			if($bool){
				$data['items'] = "为{$info['username']}重置密码成功";
			}else {
				$data['items'] = "为{$info['username']}重置密码失败";
			}
			$data['opreatetime'] = time();
			$data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
			$db = M("admin_log");
			$db -> add($data);
		}

	}
