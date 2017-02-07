<?php
    namespace Admin\Controller;
    use Think\Controller;
    class AdmineditController extends Controller {
    	public function index() {
            $db = M("admin");
            $result = $db -> select();
            $this -> assign("result", $result);
    		$this -> display('index');
    	}

        public function edit() {
            // 获取要编辑记录的id
            $id = $_GET['id'];
            // 实例化Model类
            $db = M("admin");
            // 查询aid为$id的用户信息 并用$result 储存结果集
            $result = $db -> where("`aid` = '{$id}'") -> find();
            // 向前台模板标签赋值
            $this -> assign("id", $id);
            $this -> assign("username", $result['username']);
            $this -> assign("addr", $result['allowaddr']);
            $this -> assign("extent", $result['extent']);
            $this -> assign("stat", $result['stat']);
            // 显示前台模板
            $this -> display("edit");
        }

        public function doedit() {
            $db = M("admin");
            // $data['aid'] = $_POST['aid'];
            // $data['allowaddr'] = $_POST['allowaddr'];
            // $data['extent'] = $_POST['extent'];
            // $data['stat'] = $_POST['stat'];
            $result = $db -> save($db -> create());
            if($result){
                $flag = true;
                $this -> editlog($_POST['username'],$flag);
                // $this -> success("保存成功！",__MODULE__."/Adminedit",3);
                die("1");
            }else {
                $flag = false;
                $this -> editlog($_POST['username'],$flag);
                // $this -> error("保存失败！",__MODULE__."/Adminedit",3);
                die("0");
            }
        }

        public function editlog($user, $flag) {
            $db = M("admin_log");
            $data['aid'] = $_SESSION['admin']['aid'];

            if($flag) {
                $data['items'] = "修改用户 {$user} 的属性成功"; 
            }else {
                $data['items'] = "修改用户 {$user} 的属性失败";
            }
            
            $data['opreatetime'] = time();
            $data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
            $db -> add($data);
        }
    }
