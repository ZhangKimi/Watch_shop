<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示导航栏
        $this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
        // 实例化Model对象 -> 会员配置表
        $db = M("memberconfig");
        // 实例化Model对象 -> 网站配置表
        $mod = M("webconfig");
        // 加载网站配置
        $res = $mod -> find();
        // 加载会员配置查询会员注册功能是否关闭
        $result = $db -> where("`regsw` = '2'") -> find();
        // 如果会员功能关闭 执行错误页面跳转
        if($result) {
            $this -> error("注册功能关闭, 请稍后再试",__MODULE__."/Index",3);
        }
    	$this -> assign("title","会员注册 - {$res['webname']}");
        $this -> display("index");
    }

    public function doregist(){
        // 实例化Model对象 -> User表
    	$db = M('user');
        // 用变量$data 将用户名和密码接到
        $data['username'] = $_POST['username'];
        $data['userpass'] = md5($_POST['userpass']);
        
        // 实例化Model对象 -> 会员设置表
        $mod = M("memberconfig");
        //查找会员设置
        $res = $mod -> find();
        // 新增加用户状态等于会员配置状态
        $data['stat'] = $res['isactive'];
        // 执行SQL语句 将变量$data 的内容添加到表中
        if($res['isactive'] == "2") {
            $data['token'] = md5($data['username'].$data['userpass'].time());
            $data['token_exptime'] = time()*60*60*$res['token_exptime'];
        }else {
            $data['token'] = "free";
            $data['token_exptime'] = 0;
        }

        $result = $db -> add($data);
        // 判断是否添加成功
        if($result){
            // 添加成功 实例化Model对象 -> 用户详情表
            $DbMysql = M("user_details");
            // 查找用户详情表中是否存在这个用户的记录

            // 如果该用户详情不存在 用变量$info 将email的值接到
            $info['uid'] = $result;
            $info['email'] = $_POST['email'];
            $info['integrale'] = $res['giveintegral'];
            $info['registtime'] = time();
            $info['headpic'] = "";
            // 新增一条该用户的记录将email添加进去
            $fruit = $DbMysql -> add($info);
            if($fruit) {
                // 新增成功
                if($res['isactive'] == "2") {
                    $_SESSION['user'] = $data;
                    $_SESSION['user']['uid'] = $result;
                    $_SESSION['user']['email'] = $info['email'];
                    header("Location:".__MODULE__."/Active");
                }else {
                    $_SESSION['user'] = $data;
                    $this -> success("注册成功 , {$data['username']}欢迎加入我们！",__MODULE__."/Index",3);
                }
            }else {
                // 增加失败 将刚刚新增到用户(user)表中的记录删除
                $db -> delete($result);
                // 错误跳转
                $this -> error("网络开小差~数据传输失败，请稍后再试！",__MODULE__."/Register",3);
            }
        }else {
            // 在用户(user)表增加新用户失败
            $this -> error("请勿重复提交！请尝试登录",__MODULE__."/Login",3);
        }
    }

    // 生成验证码
    public function verify(){
    	// 初始化Model对象 验证码设置表
        $db = M('verifyconfig');
        // 加载验证码设置
        $config = $db -> find();
        // 通过验证码设置 实例化验证码类
    	$verify = new \Think\Verify($config);
    	$verify -> entry();
    }


    // 调用验证码校验方法
    public function check_code(){
        $vCode = $this -> check_verify($_POST['verify']);
        if($vCode){
            die("1");
        }else {
            die("0");
        }
    }

    // 验证码校验
    public function check_verify($code, $id = '') {
        $verify = new \Think\Verify();
        return $verify -> check($code, $id);
    }

    // 用户名校验
    public function check_user($username) {
        $username = $_POST['username'];
        $db = M('user');
        $result = $db -> where("`username` = '{$username}'") -> find();
        if($result) {
            die("1");
        }else {
            die("0");
        }
    }

    // 邮箱校验
    public function check_email() {
        $email = $_POST['email'];
        $db = M("user_details");
        $result = $db -> where("`email` = '{$email}'") -> find();
        if($result) {
            die("1");
        }else {
            die("0");
        }
    }
}

