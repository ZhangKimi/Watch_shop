<?php

    /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/
    namespace Admin\Controller;
    use Think\Controller;
    class GoodaddController extends Controller {
        public function index() {
            // 显示分类
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

            $this -> display("index");
        }

        public function add() {
            // 执行图片上传
            $info[] = $this -> upload();

            if(!$info) {// 上传错误提示错误信息
                $this -> error($error);
            }else {
                foreach($info as $rows);
                // 大图片的图片名
                $bigPicName = $rows[0]['savename'];
                // 三张小图片的图片名
                $smallPicName[0] = $rows[1]['savename'];
                $smallPicName[1] = $rows[2]['savename'];
                $smallPicName[2] = $rows[3]['savename'];
                // 将三张小图的文件名通过"," 拼装成字符串
                $small = implode($smallPicName, ",");
            }

            // 添加记录商品表
            $data['title'] = $_POST['title'];
            $data['stock'] = $_POST['stock'];
            $data['addtime'] = time();
            $data['inputer'] = $_POST['inputer'];
            $data['price'] = $_POST['price'];
            $data['preprice'] = $_POST['preprice'];
            $db = M('product');
            $result = $db -> add($data);

            // 判断是否添加成功
            if($result) {
                // 添加成功 添加记录商品详情表
                $inf['pid'] = $result;
                $inf['typeid'] = $_POST['typeid'];
                $inf['brandid'] = $_POST['brandid'];
                $inf['hot'] = $_POST['hot'];
                $inf['depreciate'] = $_POST['depreciate'];
                $inf['commend'] = $_POST['commend'];
                $inf['discount'] = $_POST['discount'];
                $inf['offsale'] = $_POST['offsale'];
                $inf['hits'] = 0;
                $inf['picurl'] = $bigPicName;
                $inf['picurls'] = $small;
                $inf['contents'] = $_POST['contents'];
                // 实例化Model类 商品详情表
                $mod = M('products_details');
                $res = $mod -> add($inf);

                // 判断是否添加成功
                if($res) {
                    // 添加成功
                    $this -> success("添加成功");
                }else {
                    // 添加失败
                    $this -> error("添加失败");
                    $db -> delete($result);
                }

            }else {
                // 添加失败
            }



        }

        public function upload() {
            $upload = new \Think\Upload();// 实例化上传类
            $upload -> autoSub = false;
            $upload -> maxSize = 3145728 ;// 设置附件上传大小
            $upload -> exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload -> rootPath = "./Public/admin/Uploads";
            $upload -> savePath = "./Products/"; // 设置附件上传目录

            // 上传文件
            $info = $upload->upload();
            if(!info){
                $error = $upload -> sgetError();
                return $error;
            }else {
                return $info;
            }
        }

    }