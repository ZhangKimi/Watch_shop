<?php
	namespace Admin\Controller;
	use Think\Controller;
	class VerifyconfigController extends Controller {
		public function index() {
			// 实例化Model对象
			$db = M("verifyconfig");

			// 查询设置记录
			$result = $db -> find();

			// 为前台模板赋值
			
			// 当前配置记录号
			$this -> assign("id", $result['id']);
			// 是否使用混淆曲线
			$this -> assign("curve", $result['useCurve']);
			// 是否使用杂点
			$this -> assign("noise", $result['useNoise']);
			// 是否使用中文验证码
			$this -> assign("usezh", $result['useZh']);
			// 是否使用背景图片
			$this -> assign("useImgBg", $result['useImgBg']);
			// 验证码位数
			$this -> assign("fontLength", $result['length']);
			// 验证码字体大小
            $this -> assign("fontSize", $result['fontSize']);
			//显示前台模板
			$this -> display("index");
		}

		public function settingSava() {
			$db = M("verifyconfig");
			
			$result = $db -> save($db -> create());

			if($result) {
				die("1");
			}else {
				die("0");
			}
		}
	}