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
        $mod = M ("products_details");
        $info = $mod -> join('product ON products_details.pid = product.pid') 
                     -> find($_GET['id']);
        $this->assign('info', $info);
         $db = M('type');
        $result = $db -> ORDER("concat(path,pid)") -> select();
        $str = "";
        foreach($result as $row){
            $m = substr_count($row['path'],",") - 1;
            //$nbsp是根据m的值来重复打印空格
            $nbsp = str_repeat("&nbsp;&nbsp;&nbsp;",$m * 2);
            //判断列表项是否是根类别
            //如果当前数据的pid为0，代表根类别，把disabled赋过去
            $disabled = ($row['parid'] == 0)?"disabled":"";
            $str .= "<option {$disabled} value='{$row['pid']}'>";
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
            $this -> display('index');
    }
    //     public function update{
    //         $mod = M('products_details');     
    //         $mod -> join('product ON products_details.pid = product.pid')
    //              -> join('type ON products_details.typeid = type.pid')
    //              -> join("brand ON products_details.brandid = brand.id")
    //              -> create();
    //         if(($mod->save()))
    //         {
    //         $this->success("修改成功", "../Goodsupdate/index" );
    //         }else{
    //         $this->error("修改失败", "edit?id={$_GET['id']}");
    //         }
    // }
        public function update() {
            $data['pid'] = $_POST['pid'];
            $data['title'] = $_POST['title'];
            $data['stock'] = $_POST['stock'];
            $data['inputer'] = $_SESSION['admin']['username'];
            $data['price'] = $_POST['price'];
            $data['preprice'] = $_POST['preprice'];
            // $db = M('product');
            // $result = $db -> save($data); 
            // if($result){
            // $pid = $result;
            //$inf['pid'] = $_POST['pid']; 
            $inf['typeid'] = $_POST['typeid'];
            $inf['brandid'] = $_POST['brandid'];
            $inf['hot'] = $_POST['hot'];
            $inf['depreciate'] = $_POST['depreciate'];
            $inf['commend'] = $_POST['commend'];
            $inf['discount'] = $_POST['discount'];
            $inf['offsale'] = $_POST['offsale'];
            $inf['hits'] = 0;
            $inf['picurl'] = $_POST['picurl']; 
            $inf['picurls'] = $_POST['picurls'];
            $inf['contents'] = $_POST['contents'];
            $mod = M('product');
            $result = $mod -> where("'pid' = '{$pid}'")->save($data);  
            $mod = M('products_details');
            $res = $mod ->where("'pid' = {$pid}'")->save($inf);
            if(($mod->save()))
            {
            $this->success("修改成功", "../Goodsupdate/index");
            }else{
            $this->error("修改失败", "edit?id={$_GET['id']}");
            }
          }
        }
    
