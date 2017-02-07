<?php 

    /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/ 
	namespace Admin\Controller;
	use Think\Controller;
	class BrandaddController extends Controller {
		  public function insert(){
    
    	$mod = M("Brand");
      $mod ->create();
    	if($mod->add())
        {
    	$this->success("添加成功", "index");
    	}else
    	{
    		$this->error("添加失败", "index");
    	}

    	$this -> display("index");
    }
    }
    
   