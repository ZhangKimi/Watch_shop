<?php
    namespace Admin\Controller;
    use Think\Controller;
    class UserlistController extends Controller {
    	public function index(){
    		$db = M("user_details");
    		$result = $db -> join("RIGHT JOIN user on user_details.uid = user.uid") -> select();
    		$this -> assign("result", $result);
    		$this -> display("index");
    	}

    	public function details() {
    		$id = $_GET['id'];
            $user = $_GET['user'];
    		$username = $_GET['user'];
    		$this -> assign("username", $username);

    		$db = M("user_details");
    		$info = $db -> where("`uid` = '{$id}'") -> select();
    		$this -> assign("info", $info);
    		$this -> display("details");
    	}

	}