<?php  	

	/*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/
	namespace Admin\Controller;
	use Think\Controller;
	class GoodsupdateController extends Controller {
		public function index(){
            // 实例化Model对象 商品详情表
			$mod = M("products_details");
            // 用商品ID将商品详情表与商品表连接
			$info = $mod -> join('product ON products_details.pid = product.pid') 
                        // 查询所有商品结果
                         -> select();
            // 将商品结果赋值给前台模板变量
    		$this -> assign('info',$info);
            // 显示前台模板
			$this -> display("index");
	}
	

		
		
}