<?php
	namespace Home\Controller;
	use Think\Controller;
	class AddrmanageController extends Controller {
		public function index() {

			$flag = null;

			if(!$_SESSION['user']) {
				$this -> error("请先登录", __MODULE__."/Login", 3);
			}

			$db = M('revaddr');
			$id = $_SESSION['user']['uid'];
			$hadNum = $db -> where("`uid` = '{$id}'") -> count();

			$residue = 20 - $hadNum;
			$result = $db -> where("`uid` = '{$id}'") -> select();
			
			if(!$hadNum) {
				$flag = "empty";
			}else {
				$flag = "have";
			}

			for($i = 0;$i < count($result);$i++) {
				$mob1 = substr($result[$i]['mobile'],0,3);
				$mob2 = "****";
				$mob3 = substr($result[$i]['mobile'],7,4);
				$result[$i]['mobile'] = $mob1.$mob2.$mob3;
			}

			$mod1 = M('province');
			$info1 = $mod1 -> select();
			$this -> assign("province", $info1);

			$this -> assign("flag", $flag);
			$this -> assign("had", $hadNum);
			$this -> assign("residue", $residue);
			$this -> assign("addr", $result);
			$this -> display("index");
		}

		public function showCity() {
			$code = $_POST['code'];
			$db = M('city');
			$info = $db -> where("`provincecode` = '{$code}'") -> select();
			$info = json_encode($info);
			die($info);
		}

		public function showArea() {
			$code = $_POST['code'];
			$db = M('area');
			$info = $db -> where("`citycode` = '{$code}'") -> select();
			$info = json_encode($info);
			die($info);
		}

		public function add() {
			
			if(!$_POST) {
				$this -> error("请填写完整",__MODULE__."/Addrmanage",3);
			}

			$uid = $_SESSION['user']['uid'];

			$province = $_POST['province'];
			$city = $_POST['city'];
			$area = $_POST['area'];

			$mod1 = M('province');
			$info1 = $mod1 -> field("`name`") -> where("`code` = '{$province}'") -> find();
			$data['province'] = $info1['name'];

			$mod2 = M('city');
			$info2 = $mod2 -> field("`name`") -> where("`code` = '{$city}'") -> find();
			$data['city'] = $info2['name'];

			$mod3 = M('area');
			$info3 = $mod3 -> field("`name`") -> where("`code` = '{$area}'") -> find();
			$data['area'] = $info3['name'];

			$data['uid'] = $uid;
			$data['addr'] = $_POST['addr'];
			$data['postcode'] = $_POST['postcode'];
			$data['rname'] = $_POST['rname'];
			$data['mobile'] = $_POST['mobile'];

			

			$db = M('revaddr');
			$addrNum = $db -> where("`uid` = '{$uid}'") -> count();
			
			if($addrNum > 20) {
				$this -> error("收货地址已经达到上限 , 添加失败", __MODULE__."/Addrmanage", 3);
			}else {
				$result = $db -> add($data);
				if($result) {
					$this -> success("添加成功",__MODULE__."/Addrmanage", 2);
				}else {
					// $this -> error("网络连接失败 , 请检查网络设置", __MODULE__."/Addrmanage", 3);
				}
			}
		}

		public function del() {
			$id = $_POST['id'];

			$db = M('revaddr');
			$result = $db -> delete($id);

			if($result) {
				die("1");
			}else {
				die("0");
			}
		}

		public function setDefaAddr() {
			$uid = $_SESSION['user']['uid'];
			$id = $_GET['id'];

			$info['defa'] = 0;

			$data['defa'] = 1;
			$db = M('revaddr');
			$check = $db -> where("`uid` = '{$uid}'") -> save($info);

			if($check) {
				$result = $db -> where("`uid` = '{$uid}' AND `id` = '{$id}'") -> save($data);
				if($result) {
					$this -> success("设置成功", __MODULE__."/Addrmanage", 3);
				}else {
					$this -> error("设置失败 , 网络连接失败请检查网络设置", __MODULE__."/Addrmanage", 3);
				}
			}else {
				$this -> error("修改失败 , 初始化数据失败", __MODULE__."/Addrmanage", 3);
			}
		}
	}