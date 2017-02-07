<?php
    namespace Admin\Controller;
    use Think\Controller;
    class AdminaddController extends Controller {
    	public function index() {
    		$this -> display('index');
    	}

    	public function add() {
            $data['username'] = $_POST['username'];
            $data['userpass'] = md5($_POST['userpass']);
            $data['stat'] = $_POST['stat'];
            $data['extent'] = $_POST['extent'];
            $data['allowaddr'] = $_POST['allowaddr'];
            $data['addtime'] = time();
            $db = M("admin");
            $result = $db -> add($data);
            if($result) {
                $flag = true;
                $this -> success("添加成功!",__MODULE__."/Adminadd",3);
                $this -> addlog($data['username'], $data['extent'], $flag);
            }else {
                $flag = false;
                $this -> error("添加失败 , 网络不给力!",__MODULE__."/Adminadd",3);
                $this -> addlog($data['username'], $data['extent'], $flag);
            }
    	}

    	public function check_user() {
    		$username = $_POST['username'];
	        $db = M('admin');
	        $result = $db -> where("`username` = '{$username}'") -> select();
	        if($result) {
	            die("1");
	        }else {
	            die("0");
	        }
    	}

        public function addlog($user, $extent,$flag){
            if($flag){

                switch($extent){
                    case 1:
                        $extent = "超级管理员";
                        break;
                    case 2:
                        $extent = "管理员";
                        break;
                }
                $data['aid'] = (int)$_SESSION['admin']['aid'];
                $data['items'] = "添加了新成员 , 用户名为{$user}权限为{$extent}";
                $data['opreatetime'] = time();
                $data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
                $db = M("admin_log");
                $db -> add($data);
            }else {
                $data['aid'] = (int)$_SESSION['admin']['aid'];
                $data['items'] = "添加新成员失败";
                $data['opreatetime'] = time();
                $data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
                $db = M("admin_log");
            }

            
        }
    }
