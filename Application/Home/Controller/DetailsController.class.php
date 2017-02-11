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
        $mod = M("products_details");
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
        $res1 = $mod -> join('product ON products_details.pid = product.pid')
                      -> join('brand ON products_details.brandid = brand.id')
                        // 查询前8条数据
                      -> limit(0,4)
                        //查询条件上架商品
                      -> where("products_details.`commend` = '1'")
                        // 执行查询
                      -> select();
            // 将商品信息发送至前台
           
        
        foreach($result as $res);
        $this -> assign("info", $res);
        $this -> assign("pid", $res['pid']);
        $this -> assign("title", $res['title']);
        $this -> assign("brandid", $res['brandid']);
        $this -> assign("price", $res['price']);
        $this -> assign("stock", $res['stock']);
        $this -> assign("bname", $res['bname']);
        $this -> assign("contents", $res['contents']);
        $this -> assign("brandinfo",$res['brandinfo']);
        $this -> assign("hot", $res['hot']);
        $picurls = explode(",",$res['picurls']);
        $pic1 = $picurls[0];
        $pic2 = $picurls[1];
        $this -> assign("picurl", $res['picurl']);
        $this -> assign("pic1", $pic1);
        $this -> assign("pic2", $pic2);
        $this -> assign("title", $res['title']);
        $this -> assign("title", $res['title']);
        $this -> assign('res1',$res1);
        $this -> display("index");
    }
}