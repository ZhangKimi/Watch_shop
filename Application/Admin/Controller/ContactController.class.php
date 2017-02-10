<?php
	namespace Admin\Controller;
	use Think\Controller;
	class ContactController extends Controller {
		public function index() {
			$db = M('contact');
			$result = $db -> select();
			$this -> assign("result", $result);
			$this -> display("index");
		}

		public function details() {
			$id = $_GET['id'];
			$db = M('contact');
			$result = $db -> find($id);
			$this -> assign("cname", $result['cname']);
			$this -> assign("mobile", $result['mobile']);
			$this -> assign("email", $result['email']);
			$this -> assign("contents", $result['contents']);
			$this -> assign("addtime", $result['addtime']);
			$this -> display("show");
		}
	}