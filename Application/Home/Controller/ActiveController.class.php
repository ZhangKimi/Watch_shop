<?php
namespace Home\Controller;
use Think\Controller;
class ActiveController extends Controller {
    public function index() {
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示导航栏
	   	$this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
    	// 实例化Model对象 -> 会员配置(memberconfig)表
    	if($_SESSION['user']['stat'] != "2"){
    		$this -> error("您的账户已激活<br />无需再次激活",__MODULE__."/Index",3);
    	}else {
    		$mod = M("memberconfig");
	    	// 加载会员设置
	    	$res = $mod -> find();

	    	// 获取当前待激活用户的信息
	    	$uid = $_SESSION['user']['uid'];
	    	$username = trim($_SESSION['user']['username']);
	    	$userpass = trim($_SESSION['user']['userpass']);
	    	$registtime = trim($_SESSION['user']['registtime']);
	    	$email = trim($_SESSION['user']['email']);
	    	// 生成激活码和有效时间
	    	$token = md5($username.$userpass.$registtime.rand(1000,9999));
	    	$token_exptime = $res['token_exptime'];

	    	// 向前台模板过期时间变量赋值
	    	$this -> assign("token_exptime", $token_exptime);

	    	// 实例化Model对象 -> 用户(user)表
	    	$db = M("user");
	    	// 将token 和 token_exptime 添加到变量$data里面
	    	$data['token'] = $token;
	    	$data['token_exptime'] = time()+60*60*$token_exptime;
	    	// 将token 和 token_exptime 更新到当前登录用户的表中
	    	$result = $db -> where("`uid` = '{$_SESSION['user']['uid']}'") -> save($data);

	    	// 将激活码创建为链接形式
	    	$token = "http://192.168.13.19".__MODULE__."/Active/mailCheck?verify={$token}";
	    	// 激活码邮件时间
	    	$date = date("Y.m.d",time());
	    	// 将激活码邮件内容中的变量替换
	    	$res['emailcontent'] = preg_replace("/[\$]username/",$username,$res['emailcontent']);
	    	$res['emailcontent'] = preg_replace("/[\$]token_exptime/",$token_exptime,$res['emailcontent']);
	    	$res['emailcontent'] = preg_replace("/[\$]token/",$token,$res['emailcontent']);
	    	$res['emailcontent'] = preg_replace("/[\$]date/",$date,$res['emailcontent']);
	    	$res['emailcontent'] = html_entity_decode($res['emailcontent']);
	    	
	    	// 设置邮件标题
	    	$emailTitle = "用户账号激活";
	    	// 发送并判断状态
	    	if(SendMail($email,$emailTitle,$res['emailcontent'])){
	            $this -> assign("email", $_SESSION['user']['email']);
	            $this -> display("index");
	            // $this->success('发送成功！',__MODULE__."/Login",3);
	    	}
    	}
    }

    public function mailCheck() {
    	if(isset($_GET['verify'])) {
    		$db = M("user");
    		$result = $db -> where("`uid` = '{$_SESSION['user']['uid']}'") -> find();
    		if(time() > (int)$result['token_exptime']) {
    			$this -> error("验证码已超时请重新申请",__MODULE__."/Login",3);
    		}else {
    			if($_GET['verify'] == $result['token']) {
    				if($result['stat'] == "1") {
    					$this -> error("您的账户已激活 , 无需再次激活",__MODULE__."/Index",3);
    				}else {
    					$data['stat'] = "1";
	    				$res = $db -> where("`uid` = '{$_SESSION['user']['uid']}'") -> save($data);
	    				if($res) {
	    					$this -> success("激活成功 , 请登录!",__MODULE__."/Login",3);
	    				}else {
	    					$this -> error("激活失败 , 网络不给力请重试",__MODULE__."/Login",3);
	    				}
    				}
    			}
    		}
    	}
    }
}