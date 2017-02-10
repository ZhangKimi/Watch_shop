<?php
    namespace Home\Controller;
    use Think\Controller;
    class ContactController extends Controller {
        public function index(){
            // 显示用户购物车购物数量
            $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
            // 显示导航栏
    	   	$this -> assign("list", displayFirst());
            $this -> assign("result", displaySecond());
            $this -> display("index");
        }

        public function add() {
            $data['cname'] = $_POST['cname'];
            $data['mobile'] = $_POST['mobile'];
            $data['email'] = $_POST['email'];
            $data['contents'] = $_POST['contents'];
            $data['addtime'] = time();
            $db = M('contact');
            $result = $db -> add($data);
            if($result) {
                die("1");
            }else {
                die('0');
            }
        }
    }