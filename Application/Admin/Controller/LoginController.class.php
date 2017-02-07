<?php
	/*************************************************
     * Author: Kimi.Zhang
     * File Name: LoginController.class.php
     * CopyRight: 2017 致一科技
     * E - mail: admin@hlts.pub
     *************************************************/

	namespace Admin\Controller;
	use Think\Controller;
	class LoginController extends Controller {
		// 页面显示方法
	    public function index(){
	    	// 如果没设置error变量 将true 赋值给前台模板的dis变量
	    	// 将登录超时框隐藏
	    	if(isset($_GET['error'])){
	    		$this -> assign('dis', true);
	    	}
	    	
	    	// 显示前台模板
	    	$this -> display("index");
	    }

	    /******************************************************
    	 * 函数名称: dologin
    	 * 函数功能: 执行用户登录判断
    	 * 形参列表: 无
    	 * 返 回 值: 无
    	 * E - mail: admin@hlts.pub
    	 ******************************************************/
	    public function dologin(){
	    	// 用户输入用户名
	    	$user = $_POST['username'];
	    	// 用户输入密码
	    	$pwd = $_POST['userpass'];
	    	// 实例化Model对象 管理员表
	    	$db = M('admin');
	    	// 查询表中是否存在用户输入的用户名
	    	$rows = $db -> where("`username` = '{$user}'") -> find();
    		// 如果存在
	    	if($rows) {
	    		// 匹配用户输入的密码与查询用户密码是否一致
	    		if($rows['userpass'] == md5($pwd)) {
	    			// 匹配成功 判断用户是否被限制登录IP地址
	    			if($rows['allowaddr']){
	    				// 如果用户设置了限制IP地址 匹配用户登录IP地址与设置的IP地址是否一致
	    				if($rows['allowaddr'] == $_SERVER['REMOTE_ADDR']){
	    					// 匹配成功 判断用户状态
    						if($rows['stat'] == 1) {
    							// 如果状态为 1: 正常 将用户信息储存到管理员SESSION中
		    					$_SESSION['admin'] = $rows;
		    					// 添加操作日志
    							$this -> reclog();
    							// 修改登录次数
			    				$this -> loginCount();
			    				// 记录登录时间 然后将上一次登录时间更新
			    				$this -> loginTime();
			    				// 登录成功跳转至管理员首页
			    				$this -> success("登陆成功,{$rows['username']}欢迎回来！",__MODULE__."/Index");
			    			}else {
			    				// 状态不为 1: 禁用 错误提示 禁止登录 跳转至登录页面
			    				$this -> error("您的账户已被禁用无法登录，请联系管理员！",__MODULE__."/Login",3);
			    			}
	    				}else {
	    					// IP匹配不一致 错误提示 禁止登录 跳转至登录页面
	    					$this -> error("您的IP地址无法登录后台系统",__MODULE__."/Login",3);
	    				}
	    			}else {
	    				// 没设置IP地址限制 判断用户状态
	    				if($rows['stat'] == 1) {
	    					// 如果状态为 1: 正常 将用户信息储存到管理员SESSION中
	    					$_SESSION['admin'] = $rows;
	    					// 添加操作日志
	    					$this -> reclog();
	    					// 修改登录次数
	    					$this -> loginCount();
	    					// 记录登录时间 然后将上一次登录时间更新
		    				$this -> loginTime();
		    				// 登录成功跳转至管理员首页
		    				$this -> success("登陆成功,{$rows['username']}欢迎回来！",__MODULE__."/Index");
		    			}else {
		    				// 状态不为 1: 禁用 错误提示 禁止登录 跳转至登录页面
		    				$this -> error("您的账户已被禁用无法登录，请联系管理员！",__MODULE__."/Login",3);
		    			}
	    			}
	    			
	    		}else {
	    			// 密码不匹配 错误提示 禁止登录 跳转至登录页面
	    			$this -> error("密码不正确！",__MODULE__."/Login",3);
	    		}

	    	}else {
	    		// 如果没有在表中找到用户名 错误提示 禁止登录 跳转至登录页面
	    		$this -> error("账户不存在！",__MODULE__."/Login",3);
	    	}
	    }

	    /******************************************************
    	 * 函数名称: dologout
    	 * 函数功能: 退出用户登录
    	 * 形参列表: 无
    	 * 返 回 值: 无
    	 * E - mail: admin@hlts.pub
    	 ******************************************************/
	    public function dologout(){
	    	// 将管理员登录状态注销
	    	unset($_SESSION['admin']);
	    	// 将页面跳转至登录页面
        	$this -> success("退出登录成功",__MODULE__."/Login");
	    }

	    /******************************************************
    	 * 函数名称: reclog
    	 * 函数功能: 日志记录用户登录操作
    	 * 形参列表: 无
    	 * 返 回 值: 无
    	 * E - mail: admin@hlts.pub
    	 ******************************************************/

	    public function reclog(){
	    	$db = M("admin_log");
	    	$data['aid'] = (int)$_SESSION['admin']['aid'];
	    	$data['items'] = "登录后台管理系统";
	    	$data['opreatetime'] = time();
	    	$data['loginaddr'] = $_SERVER['REMOTE_ADDR'];
	    	$db -> add($data);
	    }

	    /******************************************************
    	 * 函数名称: loginCount
    	 * 函数功能: 为当前用户的登录次数加一
    	 * 形参列表: 
    	 * 返 回 值: 
    	 * E - mail: admin@hlts.pub
    	 ******************************************************/
	    public function loginCount(){
	    	// 实例化Model对象 管理员表
	    	$db = M("admin");
	    	// 执行ThinkPHP 更新登录次数 + 1
	    	$result = $db -> where("`aid` = '{$_SESSION['admin']['aid']}'") 
	    				  -> setInc('loginnum');
	    }

	    /******************************************************
    	 * 函数名称: loginTime
    	 * 函数功能: 记录本次登陆时间 , 更新最后一次登陆时间
    	 * 形参列表: 
    	 * 返 回 值: 
    	 * E - mail: admin@hlts.pub
    	 ******************************************************/
	    public function loginTime($result){
	    	// 实例化Model对象
	    	$db = M("admin");
	    	// 查询到用户信息
	    	$result = $db -> where("`aid` = '{$_SESSION['admin']['aid']}'") -> find();
	    	
	    	// 让$data['lasttime'] 等于登录时间(上一次登录时的时间)
	    	$data['lasttime'] = $result['logintime'];
	    	// 让$data['login'] 等于当前时间(本次登录时间)
	    	$data['logintime'] = time();
	    	// 根据管理员ID 执行数据更新s
	    	$db -> where("`aid` = '{$result['aid']}'") -> save($data);
	    }
	}