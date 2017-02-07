<?php
    /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/ 
    namespace Home\Controller;
    use Think\Controller;
    class SearchController extends Controller {
        public function index(){
            // 显示用户购物车购物数量
            $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
            // 显示导航栏
            $this -> assign("list", displayFirst());
            $this -> assign("result", displaySecond());
        	$mod = M("products_details");
        	$where = "";
            if(isset($_POST['search'])){
                $where = "`title` like '%{$_POST['search']}%'";
            }
            $info = $mod -> join("RIGHT JOIN product ON products_details.pid = product.pid")-> where($where) -> select();
            if(isset($info)){  
                $this->assign('info',$info);
            }else {
                $this->assign('info',"查找的内容不存在！！！");
            }
            $this -> display("index");
        }
    }