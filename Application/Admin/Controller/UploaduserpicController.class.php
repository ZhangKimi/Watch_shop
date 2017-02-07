<?php
    namespace Admin\Controller;
    use Think\Controller;
    class UploaduserpicController extends Controller {
    	public function index(){
            $db = M("admin");
            $result = $db -> where("`aid` = '{$_SESSION['admin']['aid']}'") -> find();
            $this -> assign("oldpic", $result['userpic']);
    		$this -> display('index');
    	}

    	public function upload() {
    		// 配置文件上传
    		$config = array(
    			'maxSize' => 3145728,     // 设置附件上传大小
    			'SavePath' => "/Uploads/{$uid}",
    			'saveName' => "zy_{$uid}",
    			'exts' => array("jpg","png","bmp","jpeg"),     // 设置附件上传类型
			);

			/*******************华丽的分界线*******************/

    		$upload = new \Think\Upload();     // 实例化上传类

    		// 上传文件
    		$info = $upload -> upload();
    		if(!$info) { // 上传错误提示错误信息
    			die($upload -> getError());
    		}else {
    			die("上传成功");
    		}
    	}

    	public function format64() {
			$db = M("admin");

            $data['userpic'] = $_POST['imgurl'];
            $userid = $_SESSION['admin']['aid'];
            $result = $db -> where("`aid` = '{$userid}'") -> save($data);

            if($result) {
                $_SESSION['admin']['userpic'] = $data['userpic'];
                die("1");
            }else {
                die("0");
            }
            
            /*$base64 = $_POST['imgurl'];
            $page = $_POST['page'];

            $types = empty($types)? array('jpg', 'gif', 'png', 'jpeg'):$types;
            $photo = str_replace(array('_','-'), array('/','+'), $base64);
            $b64img = substr($photo, 0,100);

            if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $b64img, $matches)){
                $type = $matches[2];
                if(!in_array($type, $types)){
                    echo "图片格式不正确";
                }
                $image = str_replace($matches[1], '', $photo);
                $image = base64_decode($image);
            }

            $user = $_SESSION['admin']['aid'];
            // $url = $page."/admin/userpic/".$user;
            $url = __PUBLIC__."/admin/userpic/".$user."pic.jpg";
            // if(!is_dir($url)){
            //     mkdir($fullpath,0777,true);
            // }

			$a = file_put_contents("E:/wamp64/www/watch_shop/Public/admin/userpic/{$user}/pic.jpg", $image);//返回的是字节数
			if($a) {
				die("1");
			}else {
				die("0");
			}*/

    	}
    }
