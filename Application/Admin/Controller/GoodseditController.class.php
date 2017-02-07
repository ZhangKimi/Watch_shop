<?php 

     /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/   

	namespace Admin\Controller;
	use Think\Controller;
	class GoodseditController extends Controller {
        public function edit()
    {
        $mod = new \Think\Model("products_details");
        $info = $mod->find($_GET['id']);
        $this->assign('info', $info);
        foreach($info as $row){
                $m = substr_count($row['path'],",") - 1;
                //$nbsp是根据m的值来重复打印空格
                $nbsp = str_repeat("&nbsp;&nbsp;&nbsp;",$m * 2);
                //判断列表项是否是根类别
                //如果当前数据的pid为0，代表根类别，把disabled赋过去
                $disabled = ($row['parid'] == 0)?"disabled":"";
                $str .= "<option {$disabled} value='{$row['id']}'>";
                $str .= "{$nbsp}|--{$row['name']}";
                $str .= "</option>";  
            }
            // dump($row);
            $this -> assign("option", $str);

            // 显示品牌
            $mod = M("brand");
            $res = $mod -> select();
            $string = "";
            foreach($res as $value) {
                $string .= "<option value='{$value['id']}'>{$value['bname']}</option>";
            }
            $this -> assign("brandOption", $string);
        $this->display('index');
}
public function update(){
            $mod = M('products_details');        
            $mod -> join('product ON products_details.pid = product.pid')->create();
            //dump($mod->save());
            if(($mod->save()))
            {
            $this->success("修改成功", "../Goodsupdate/index" );
            }else
            {
            $this->error("修改失败", "edit?id={$_GET['id']}");
            }
        
    }

}