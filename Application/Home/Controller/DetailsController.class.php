<?php
namespace Home\Controller;
use Think\Controller;
class DetailsController extends Controller {
    public function index(){
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示前台导航栏
        $this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
        // 显示商品
        $db = M("product");
        $result = $db -> join("LEFT JOIN products_details On product.pid = products_details.pid")
                      -> join('brand ON products_details.brandid = brand.id')
                      -> where("product.`pid` = '{$_GET['id']}'")
                      -> select();
        $mod = M ("brand");
        $info2 = $mod->select();
        $this ->assign("info2",$info2); 
        
        foreach($result as $res);
        $this -> assign("info", $res);
        $this -> assign("pid", $res['pid']);
        $this -> assign("title", $res['title']);
        $this -> assign("brandid", $res['brandid']);
        $this -> assign("price", $res['price']);
        $this -> assign("stock", $res['stock']);
        $this -> assign("bname", $res['bname']);
        $this -> assign("contents", $res['contents']);
        $this -> assign("hot", $res['hot']);
        $picurls = explode(",",$res['picurls']);
        $pic1 = $picurls[0];
        $pic2 = $picurls[1];
        $this -> assign("picurl", $res['picurl']);
        $this -> assign("pic1", $pic1);
        $this -> assign("pic2", $pic2);
        $this -> assign("title", $res['title']);
        $this -> assign("title", $res['title']);
        $this -> display("index");
    }
}