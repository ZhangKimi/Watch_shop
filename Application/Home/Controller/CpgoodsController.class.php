<?php
namespace Home\Controller;
use Think\Controller;
class CpgoodsController extends Controller {
    public function index(){
	   	$this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
    	$mod = M("products_details");
        $info= $mod -> join('product ON products_details.pid = product.pid')->limit(0,10)->select();
        $this->assign('info',$info);

		$this -> display("index");

        	
    	}
	
    
}