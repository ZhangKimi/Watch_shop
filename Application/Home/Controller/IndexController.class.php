<?php
    namespace Home\Controller;
    use Think\Controller;
    class IndexController extends Controller {
        public function index(){
            // 实例化Model对象 商品详情表
            $mod = M("products_details");
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
            $info = $mod -> join('product ON products_details.pid = product.pid')
                        -> join('brand ON products_details.brandid = brand.id')
                        // 查询前8条数据
                        -> limit(0,8)
                        //查询条件上架商品
                        -> where("products_details.`offsale` = '1'")
                        // 执行查询
                        -> select();
            // 将商品信息发送至前台
            $this -> assign('info',$info);
        	// 显示用户购物车购物数量
            if(isset($_SESSION['user']['uid'])) {
                $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
            }else {
                $this -> assign("shopNum", "0");
            }
        	
        	
        	// 判断用户是否登录 如果登录允许添加购物车 没登录不允许登录购物车
            if(isset($_SESSION['user'])){
                // 如果用户登录 flag 开关等于允许添加购物车
                $flag = "allow";
            }else {
                // 用户没登录 flag 开关等于禁止添加购物车
                $flag = "deny";
            }
            
            // 显示导航栏
            // 显示父类导航
            $this -> assign("list", displayFirst());
            // 显示子类导航
            $this -> assign("result", displaySecond());
            // 向前台发送用户登录状态
            $this -> assign("flag", $flag);
            // 导入网站配置
            $this -> assign("res", webConfig());
            // 显示首页模板
            $this -> display("index");        
        }
    }