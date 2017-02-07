<?php
    /*************************************************
     * Author: Yang Sen
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: yangsen5464@163.com
     *************************************************/
	namespace Admin\Controller;
	use Think\Controller;
	class GoodstateController extends Controller{
        // 页面显示
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

    /******************************************************
     * 函数名称: modify
     * 函数功能: 执行状态更改操作
     * 形参列表: $_POST['offsale'] 改变后商品状态
     * 返 回 值: 无
     * E - mail: yangsen5464@163.com
     ******************************************************/
    public function modify() {
        if(!$_POST) {
            // 网络连接失败 因为POST没有成功传值 直接失败
            $this -> error("{$str}失败 , 网络不给力请检查网络设置",__MODULE__."/Goodstate");
        }else {
            // 接收到POST传值
            $data['pid'] = $_POST['pid'];
            $data['offsale'] = $_POST['offsale'];
            // 实例化Model对象 商品详情表
            $db = M('products_details');
            // 执行更新操作
            $result = $db ->where("`pid` = '{$data['pid']}'") -> save($data);
            // 组织提示语句
            $str = "";
            switch($data['offsale']) {
                case "1":
                    $str = "上架";
                    break;
                case "0":
                    $str = "下架";
                    break;
            }
            // 判断是否更新成功
            if($result) {
                // 操作成功
                $this -> success("{$str}成功",__MODULE__."/Goodstate");
            }else {
                // 更新失败 数据库执行更新失败
                // $this -> error("{$str}失败 , 服务器繁忙请稍后再试",__MODULE__."/Goodstate");
            }
        }
    }
}
