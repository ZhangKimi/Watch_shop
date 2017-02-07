<?php 

    /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/ 
	namespace Admin\Controller;
	use Think\Controller;
	class BrandeditController extends Controller {
        public function edit()
    {
        $mod = new \Think\Model("Brand");
        $info = $mod->find($_GET['id']);
        $this->assign('info', $info);
        $this->display('index');
}
public function update(){
            $mod = M('Brand');        
            $mod ->create();
            //dump($mod->save());
            if(($mod->save()))
            {
            $this->success("修改成功", "../Brandupdate/index" );
            }else
            {
            $this->error("修改失败", "edit?id={$_GET['id']}");
            }
        
    }

}