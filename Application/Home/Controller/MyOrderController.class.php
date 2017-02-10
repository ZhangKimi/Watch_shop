<?php
namespace Home\Controller;
use Think\Controller;
class MyOrderController extends Controller {
    public function index(){
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示导航栏
    	$this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
    	$this -> assign("a","1");
        
        
            
    }
    public function add(){
        //插入数据向数据库
        $time = time();
        $info = M('orders');
        $data['uid'] = $_SESSION['user']['uid'];
        $data['ordernumber'] = rand(111111,999999);
        $data['paymethod'] =$_POST['zf'];
        $data['ordertime'] = $time;
        $data['paytime'] = $time;
        $data['addr'] = $_POST['addre'];
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['pid'] = $_POST['pid'];
        $res = $info ->data($data) -> add();
        if($res){
            $id = $res;
            $inf['id'] = $id;
            $inf['pid'] = $_POST['pid'];
            $db = M('orderdetails');
            $inf['uid'] = $_SESSION['user']['uid'];
            $inf['price'] = $_POST['total'];
            $inf['name'] = $_POST['rname'];
            $inf['num'] = $_POST['num'];
        
            $result=$db -> add($inf);
            /*   echo $db ->getLastSql();
             die(dump($result));  */
            if($result) {
                $uid = $_SESSION['user']['uid'];
                $de = M('cart');
                $de -> where("`uid` = $uid") -> delete();
                // 添加成功
                redirect(__MODULE__.'/MyOrder',2,'正在结算.');
            }else {
                // 添加失败
                $this -> error("添加失败",'index');
        
            }
        
        }else {
            // 添加失败
            $this -> error("添加失败");
        }
    }
    

}