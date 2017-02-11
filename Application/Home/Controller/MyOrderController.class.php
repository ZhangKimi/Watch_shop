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
    	
// $this -> display('index2');
        
        
            
    }
    public function add(){
        //在购物车表根据uid查询对应数据和地址中根据
//         die(dump($_POST));
        $time = time();
        $uid = $_SESSION['user']['uid'];
        $db = M('cart');
        $add = M('revaddr');
        $res = $add -> find($_POST['recaddr']);
        $data['addr'] = $res['province'].$res['city'].$res['area'].$res['addr'];
        $data['phone'] = $res['mobile'];
        $data['name'] = $res['rname'];
        $data['ordernumber'] = rand(111111,999999);
        $data['paytime'] = $time;
        $data['uid'] = $uid;
        $data['paymethod'] = $_POST['fk'];
       
        $order = M('orders');
        $info = $order -> add($data);
        if($info){
            $cart = $db -> where("`uid`={$uid}") -> select();
            $orderdetails = M('orderdetails');
            foreach($cart as $v){
                $det['pid'] = $v['pid'];
                $det['orderid'] = $info;
                $det['name'] = $v['name'];
                $det['price'] = $v['price'];
                $det['num'] = $v['num'];
//                 die(dump($det));
                $orderdetails -> add($det);
                $goods[] = $det;
            }
            
        }
        $de = M('cart');
        $de -> where("`uid` = {$uid}") -> delete();
        $this->assign('data',$data);
        header("Location:".__MODULE__."/MyOrder/success?id={$info}");
        
        //获取我的订单
            /* $re = $order -> table("orders a,orderdetails b") -> where("b.orderid={$info}") -> select();
            echo $order->getLastSql();
            die(dump($re)); */
//         $mod = M('orders');
//         $info = $mod -> select();
        
//         $db = M('orderdetails');
//         $value=$db->where("`orderid`={$_GET['id']}")->select();
//         $this -> assign('info',$value);
//         die(dump($goods));
            
//             $this->assign('goods',$goods);
//             $this -> display('index2');
        
     }
    public function success() {
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示导航栏
        $this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
        
        // 接收刚付款后的订单号
        $order_id = $_GET['id'];
        
        $db = M('orders');
        $info = $db -> find($order_id);
        // 向前台模板传送订单数据
        $this -> assign("info", $info);
        // 根据订单数据获取订单详情
        $mod = M('orderdetails');
        // 根据订单id查询订单详情信息
        $orderDetails = $mod -> where("`orderid` = '{$order_id}'") -> select();
        $this -> assign("orderDetails", $orderDetails);
        // $info => 订单数据            $result => 订单详情数据(已购买商品 ...)
        $this -> display("index2");
    }

}