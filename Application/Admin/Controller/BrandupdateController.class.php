<?php 

	/*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/ 
	namespace Admin\Controller;
	use Think\Controller;
	class BrandupdateController extends Controller {
		public function index(){
			$mod = M("Brand");
			$info= $mod ->select();
    		$this->assign('info',$info);
    		
			$this -> display("index");
	}
	

		
		
}