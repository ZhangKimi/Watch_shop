<?php 

     /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/


	namespace Admin\Controller;
	use Think\Controller;
	class BranddelController extends Controller {
		public function index(){
			$mod = M("Brand");
            $info= $mod ->select();       
    		
    		$this->assign('info',$info);
    		
			$this -> display("index");
	}
	

		
		
		
		public function del()
    	{
    	$mod =  M('Brand'); 
        $mod ->select();
    	if($mod->delete($_GET['id']))
    	{
    		$this->success("删除成功", "index");
    	}else
    	{
    		$this->error("删除失败", "index");
    	}
    }
}