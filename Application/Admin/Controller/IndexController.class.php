<?php
    namespace Admin\Controller;
    use Think\Controller;
    class IndexController extends Controller {
        public function index(){
            $db = M("admin");
            $result = $db -> where("`aid` = '{$_SESSION['admin']['aid']}'") -> find();
            $this -> assign("userpic", $result['userpic']);
            $this -> assign("skin", $result['skin']);
        	$this -> assign('page',"后台首页");
        	$this -> assign('set',"网站设置");
        	$this -> assign('member',"会员管理");
        	$this -> assign('goods',"商品管理");
        	$this -> assign('brand',"品牌管理");
        	$this -> assign('sort',"类别管理");
        	$this -> assign('order',"订单管理");
        	$this -> assign('scrap',"订单管理");
        	$this -> assign('user',"用户管理");
        	$this -> assign('exit',"退出登录");
            if($_SESSION['admin']){
                $this -> assign("username", $_SESSION['admin']['username']);
                $this -> assign("extent", $_SESSION['admin']['extent']);
                $this -> display("index");
            }else {
                $this -> error("您还未登录！请先登录！", __MODULE__."/Login");
            }
        }

        public function main() {

            $this -> assign("username", $_SESSION['admin']['username']);

            // 判断用户是否有头像
            if($_SESSION['admin']['userpic']){
                // 显示用户头像
                $headPic = $_SESSION['admin']['userpic'];
            }else {
                // 如果没有显示默认头像
                $headPic = __ROOT__."/Public/admin/img/default.jpg";
            }

            // 显示头像
            $this -> assign("header_pic", $headPic);
            // 用户权限
            $this -> assign("extent", $_SESSION['admin']['extent']);
            // 判断用户是否是第一次登录
            if($_SESSION['admin']['lasttime'] == 0) {
                // 如果用户第一次登录 最后一次登录时间等于登录时间
                $lasttime = time();
            }else {
                // 不是第一次 显示最后一次登陆时间
                $lasttime = $_SESSION['admin']['lasttime'];
            }
            // 显示用户最后一次登录时间
            $this -> assign("lasttime", $lasttime);
            // 显示用户登录次数
            $this -> assign("loginnum", $_SESSION['admin']['loginnum']);
            // 实例化Model对象
            $db = M("admin");
            // 查询管理员个数
            $adminNum = $db -> count();
            // 实例化Model对象
            $mod = M("ad");
            // 定义一个变量 now 等于现在的时间
            $now = time();
            // 查询过期的广告数
            $duead = $mod ->where("`duetime` < {$now}") -> count();
            // 实例化Model对象
            $reg = M("memberconfig");
            // 查询会员配置
            $result = $reg -> find();
            // 显示注册模块是否开放
            $this -> assign("regsw", $result['regsw']);
            // 显示管理员数
            $this -> assign("adminCount", $adminNum);
            // 显示过期广告数
            $this -> assign("duead", $duead);
            // 显示当前用户登录后台IP地址
            $this -> assign("addr", $_SERVER['REMOTE_ADDR']);
            // 显示服务器软件
            $this -> assign("server", $_SERVER['SERVER_SOFTWARE']);
            // 显示服务器操作系统
            $this -> assign("system", PHP_OS);
            // 显示服务器PHP版本号
            $this -> assign("version", PHP_VERSION);
            // 实例化Model对象
            $DbMysql = M();
            // 查询Mysql版本号
            $v = $DbMysql -> query("select VERSION() as ver");
            $array['mysqlver'] = $v[0]['ver'];
            // 显示Mysql版本号
            $this -> assign("myver", $array['mysqlver']);
            // 显示欢迎页
            $this -> display('Index/main');
        }

        public function timeout() {
            unset($_SESSION['admin']);
            header("Location:".__MODULE__."/Login?error=timeout");
        }

        public function changeSkin() {
            $db = M("admin");
            $data['skin'] = $_POST['skin'];
            $result = $db -> where("`aid` = '{$_SESSION['admin']['aid']}'") -> save($data);
            if($result) {
                die("1");
            }else {
                die("0");
            }
        }

        public function test() {
            dump($_SESSION);
        }
    }