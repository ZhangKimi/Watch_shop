<?php
	namespace Admin\Controller;
	use Think\Controller;
	class WebconfigController extends Controller {
		public function index() {
			$db = M("webconfig");
			$result = $db -> find();

			$this -> assign("id", $result['id']);
			$this -> assign("webname", $result['webname']);
			$this -> assign("webdir", $result['webdir']);
			$this -> assign("keywords", $result['keywords']);
			$this -> assign("webcontent", $result['webcontent']);
			$this -> assign("copyright", $result['copyright']);

			$this -> display("index");
		}

		public function configSave() {
			$db = M("webconfig");
			if(!$_POST['webdir']){
				$_POST['webdir'] = "/";
			}
			$result = $db -> save($db -> create());

			if($result) {
				die("1");
			}else {
				die("0");
			}
		}
	}