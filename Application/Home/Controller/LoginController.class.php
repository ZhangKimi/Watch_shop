<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        // 显示用户购物车购物数量
        $this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
        // 显示导航栏
        $this -> assign("list", displayFirst());
        $this -> assign("result", displaySecond());
        $this -> assign("title", "登录 - 丹尼尔·惠灵顿");
        $this -> display("index");
    }

    public function dologin(){
        // 接收POST传来的的用户名
        $user = $_POST['username'];
        // 接收POST传来的密码
        $pwd = md5($_POST['userpass']);

        // 实例化Model对象
        $db = M("user_details");
        // 通过用户id 将用户表与用户详情表进行连接
        $db -> join("RIGHT JOIN user On user_details.uid = user.uid");
        // 在数据库中查找用户输入的用户名或邮箱
        $result = $db -> where("`username` = '{$user}' OR `email` = '{$user}'") -> find();
        // 判断用户所输入的用户名或密码是否存在
        if($result) {
            // 如果存在 , 判断用户输入密码是否正确
            if($pwd == $result['userpass']) {
                // 如果相等 , 判断用户状态
                switch($result['stat']) {
                    case "0":
                        $this -> error("系统检测您的用户存在异常操作<br />已将用户禁用",__MODULE__."/Login",3);
                        break;
                    case "1":
                        // 将用户登录信息和状态储存在SESSION中
                        $_SESSION['user'] = $result;
                        // 跳转至网站首页
                        $this -> success("登录成功！ {$result['username']} 欢迎回来",__MODULE__."/Index",3);
                        break;
                    case "2":
                        // 将用户登录信息和状态储存在SESSION中
                        $_SESSION['user'] = $result;
                        // 跳转至邮箱绑定页
                        $this -> success("登录成功！<br />您的用户需要完成邮件验证后才能正常使用",__MODULE__."/Active",3);
                        break;
                    case "3":
                        $this -> error("您的账户非法操作 , 已被系统禁用！",__MODULE__."/Login",3);
                        break;
                }
            }else {
                // 如果不相等
                $this -> error("密码不正确 , 请重新输入！",__MODULE__."/Login",3);
            }
            
        }else {
            //如果不存在
            $this -> error("用户名或邮箱不存在",__MODULE__."/Login",3);
        }
        
    }

    public function dologout(){
        unset($_SESSION['user']);
        $this -> success("退出登录成功",__MODULE__."/Index");
    }
}