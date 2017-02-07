<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo ($res['webname']); ?></title>
		<link href="/watch_shop/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link type="text/css" href="/watch_shop/Public/css/font-awesome.min.css" rel="stylesheet" />
		<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
		<script src="/watch_shop/Public/js/jquery-1.11.0.min.js"></script>
		<!--Custom-Theme-files-->
		<!--theme-style-->
		<link href="/watch_shop/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />	
		<!--//theme-style-->
		<link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
		<script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="<?php echo ($res['webcontent']); ?>" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--start-menu-->
		<script src="/watch_shop/Public/js/simpleCart.min.js"> </script>
		<link href="/watch_shop/Public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="/watch_shop/Public/js/memenu.js"></script>
		<script>
			$(document).ready(function(){
				$(".memenu").memenu();
			});
		</script>	
		<!--dropdown-->
		<script src="/watch_shop/Public/js/jquery.easydropdown.js"></script>
		<style>
			#banner {
				color: #FFF;
				padding: 15px;
			}
			#myCart a {
				color: #FFF !important;
				text-decoration: none !important;
			}
			
			#myCart {
				float: left;
				margin-left: 5px;
				display: block;
				line-height: 32px;
				color: #FFF;
			}

			#cart {
				width: 150px;
				height: 35px;
			}

			#cart img {
				float: left;
				margin-top: 8px;
			}
			.badge {
				margin-top: 8px;
				margin-left: 8px;
			}
			
			.bcolor {
				border: 1px solid #73B6E1 !important;
			}
		</style>	
	</head>
	<body> 
		<!--top-header-->
		<div class="top-header">
			<div class="container">
				<div class="top-header-main">
					<h5>
						<div class="col-md-6 top-header-left">
							
							<div id="banner"></div>
							<script>
								var status = "<?php echo $_SESSION['user']['stat'] ?>";
								var username = "<?php echo $_SESSION['user']['username'] ?>";

								if(status == "1") {
									$("#banner").html("<a href='/watch_shop/index.php/Home/Usercenter'>"+username+"</a> &nbsp;<a href='/watch_shop/index.php/Home/Login/dologout'>注&nbsp;&nbsp;销</a>");
								}else {
									$("#banner").html("<a href='/watch_shop/index.php/Home/Login'>登&nbsp;&nbsp;录</a> &nbsp; <a href='/watch_shop/index.php/Home/Register'>注&nbsp;&nbsp;册</a>");
								}
							</script>
						</div>
					</h5>
					<div class="col-md-6 top-header-left">
						<div class="cart box_1">
							<!-- <a href="/watch_shop/index.php/Home/Cart/" id="cart" onclick="return check_cart();"> -->
								
							 <!-- </a> -->
							<div id="cart">
								<a href="#" id="cart">
									<img src="/watch_shop/Public/images/cart-1.png" alt="" />
									<span id="myCart">我的购物车</span>
									<span class="badge"><?php echo ($shopNum); ?></span>
									<script>
										// 获取用户登录状态
										var username = "<?php echo $_SESSION['user']['username'] ?>";
										// 我的购物车 点击事件
										$("#cart").click(function(){
											// 如果用户没登陆
											if(!username){
												// Sweet Alert 提示登录
												swal({
								                    title: "亲 , 请先登录",
								                    text: "登录之后才可以查看购物车哦",
								                    type: "info",
								                    confirmButtonText: "去登录"
								                },function(){
								                	// 点击去登录跳转至登录页面
								                    location.href = "/watch_shop/index.php/Home/Login";
								                });
											// 如果用户已经登录
											}else {
												// 正常跳转至购物车页面
												location.href = "/watch_shop/index.php/Home/Cart";
											}
										});
									</script> 
								</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--top-header-->
		<!--start-logo-->
		<div class="logo">
			<a href="/watch_shop/index.php/Home/Index"><h1>Luxury Watches</h1></a>
		</div>
		<!--start-logo-->
		<!--bottom-header-->
		<div class="header-bottom">
			<div class="container">
				<div class="header">
					<div class="col-md-9 header-left">
					<div class="top-nav">
						<ul class="memenu skyblue">
							<li class="active"><a href="/watch_shop/index.php/Home/Index">首页</a></li>
							<!-- 遍历  父类-->
							<?php if(is_array($list)): foreach($list as $key=>$value): ?><li class="grid">
								<a href="/watch_shop/index.php/Home/List?tid=<?php echo ($value['pid']); ?>"><?php echo ($value['name']); ?></a>			
								<!-- 遍历 子类-->
									<div class="mepanel">
										<div class="row">
											<div class="col1 me-one">
												<ul>
													<?php if(is_array($result)): foreach($result as $key=>$val): if(is_array($val)): foreach($val as $key=>$res): if(($res['parid'] == $value['pid'])): ?><li>
																	<a href="/watch_shop/index.php/Home/List?pid=<?php echo ($res['pid']); ?>"><?php echo ($res['name']); ?></a>
																</li><?php endif; endforeach; endif; endforeach; endif; ?>
												</ul>
											</div>
										</div>
									</div>
								</li><?php endforeach; endif; ?>
							<!--<li class="grid"><a href="typo.html">Blog</a></li>-->
							<li class="grid"><a href="/watch_shop/index.php/Home/Contact">联系我们</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--Search Start -->
				<div class="col-md-3 header-right"> 
					<form action="/watch_shop/index.php/Home/Search" method="post">
						<div class="search-bar">
							<input type="text" name='search' placeholder="搜索" id="search"/>
							<input type="submit" value="" name=''>
						</div>
					</form>
				</div>
				<!--Search end -->
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--bottom-header-->
		<!--banner-starts-->
		<script>
			$("#search").focus(function(){
				$("#search").addClass("bcolor");

			});
			
			$("#search").blur(function(){
				$("#search").removeClass("bcolor");
			});
		</script>
		<!--banner-ends--> 
		<!--Slider-Starts-Here-->
		<script src="/watch_shop/Public/js/responsiveslides.min.js"></script>


		
	<style>
		.account-left {
			margin-left: 28%;
		}

		.submit {
			margin-left: 29.5%;
		}
		.error {
			border: 2px solid #F00 !important;
		}
		.success {
			border: 2px solid #7AB61E !important;
		}
		.account-left span {
			line-height: 10px;
		}
		#verify_code {
			width: 361px;
		}
		#code {
			margin-left: 5px;
			margin-bottom: 4px;
			border: 1px solid #000;
			height: 38px;
		}
	</style>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">首页</a></li>
					<li class="active">会员注册</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>会员注册</h2>
			</div>
			<form action="/watch_shop/index.php/Home/Register/doregist" method="post">
				<div class="register-main">
					<div class="col-md-6 account-left">
						<input placeholder="用户名" id="user" type="text" name="username" />
						<br /><div id="mess1"></div><br />
						<input placeholder="密码" id="pwd" type="password" name="userpass" />
						<br /><input type="checkbox" name="show1" id="show1"/> <label>显示密码</label>
						<br /><div id="mess2"></div><br />
						<input placeholder="确认密码" id="repwd" type="password" name="repass" />
						<br /><input type="checkbox" name="show2" id="show2"/> <label>显示密码</label>
						<br /><div id="mess3"></div><br />
						<input placeholder="电子邮箱" id="email" type="text" name="email" />
						<br /><div id="mess4"></div><br />
						<input placeholder="验证码" id="verify_code" type="text" name="verify" />
						<img id="code" src="/watch_shop/index.php/Home/Register/verify" />
						<br /><div id="mess5"></div><br />
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="address submit">
					<input type="submit" id="submit" value="确认提交">
				</div>
			</form>
		</div>
	</div>
	<!--register-end-->
	<script type="text/javascript">
		var reg1 = /^[\w]{6,16}$/;     // 用户名正则
		var reg2 = /^[A-Za-z0-9\.\\w_=\!\@\#\?]{6,16}$/;     // 密码正则
		// 邮箱正则
		var reg3 = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+\.){1,63}[a-z0-9]+$/;  

		var flag = null;
		var emailFlag = null;
		var userflag = null;

		$(function(){
			// 显示密码
			var show1 = document.getElementById('show1');
		    show1.onclick = function() {
		        if(show1.checked == true) {
		        	$("#pwd").removeAttr("type");
		            $("#pwd").attr("type","text");
		        }else {
		        	$("#pwd").removeAttr("type");
		            $("#pwd").attr("type","password");
		        }
		    }

		    var show2 = document.getElementById('show2');
		    show2.onclick = function() {
		        if(show2.checked == true) {
		        	$("#repwd").removeAttr("type");
		            $("#repwd").attr("type","text");
		        }else {
		        	$("#repwd").removeAttr("type");
		            $("#repwd").attr("type","password");
		        }
		    }

			// 验证码点击重新获取
			$("#code").click(function() {
				$("#code").attr('src', '/watch_shop/index.php/Home/Register/verify?id='+Math.random());
			});

			// 正则验证部分
			

			// 用户名部分
			$("#user").focus(function() {
				$("#user").attr('placeholder', '由6~16位字母、数字、下划线组成 , 不区分大小写');
			});

			$("#user").blur(function() {
				
				$("#user").attr('placeholder', '用户名');

				if($("#user").val() == ""){
					$("#mess1").html("用户名不可以为空");
					$("#user").removeClass('success');
					$("#user").addClass('error');
					$("#mess1").css('color', '#F00');

				}else {

					if(!reg1.test($("#user").val())){
						$("#mess1").html("用户名格式不正确");
						$("#user").removeClass('success');
						$("#user").addClass('error');
						$("#mess1").css('color', '#F00');
					}else {
						$.ajax({
							url: '/watch_shop/index.php/Home/Register/check_user',
							type: 'POST',
							dataType: 'text',
							data: {username: $("#user").val()},
							dataFilter:function(data){
								return data;
							},
							success:function(data){
								switch(data) {
									case '1':
										$("#mess1").html("用户名已存在！");
										$("#user").removeClass('success');
										$("#user").addClass('error');
										$("#mess1").css('color', '#F00');
										userflag = false;
										break;
									case '0':
										$("#mess1").html("用户名可用！");
										$("#user").addClass('success');
										$("#mess1").css('color', '#7AB61E');
										userflag = true;
										break;
								}
							},
							error:function(){
								$("#mess1").html("网络开小差~请稍后再试！");
								$("#mess1").css('color', '#F00');
								userflag = false;
							}
						});
					}
				}
			});

			// 密码部分
			$("#pwd").focus(function() {
				$("#pwd").attr('placeholder', '由6-16位字符，可由英文、数字、!@#=?_.符号组成');
			});

			$("#pwd").blur(function() {
				$("#pwd").attr('placeholder', '密码');

				if($("#pwd").val() == ""){
					$("#mess2").html("密码不可以为空！");
					$("#pwd").removeClass('success');
					$("#pwd").addClass('error');
					$("#mess2").css('color', '#F00');
				}else {
					if(!reg2.test($("#pwd").val())){
						$("#pwd").attr('class', 'error');
						$("#mess2").html("密码格式不正确！");
						$("#pwd").removeClass('success');
						$("#mess2").css('color', '#F00');
					}else {
						$("#mess2").html("通过");
						$("#mess2").css('color', '#7AB61E');
						$("#pwd").removeAttr('error');
						$("#pwd").addClass('success');
					}
				}
			});

			// 确认密码
			$("#repwd").focus(function() {
				$("#repwd").attr('placeholder', '由6-16位字符，可由英文、数字、!@#=?_.符号组成');
			});

			$("#repwd").blur(function() {
				$("#pwd").attr('placeholder', '确认密码');

				if($("#repwd").val() == ""){
					$("#mess3").html("确认密码不可以为空！");
					$("#repwd").removeClass('success');
					$("#repwd").addClass('error');
					$("#mess3").css('color', '#F00');
				}else {
					if(!reg2.test($("#repwd").val())){
						$("#repwd").attr('class', 'error');
						$("#mess3").html("确认密码格式不正确！");
						$("#repwd").removeClass('success');
						$("#mess3").css('color', '#F00');
					}else {
						if($("#repwd").val() != $("#pwd").val()){
							$("#mess3").html("两次密码不一致！");
							$("#mess3").css('color', '#F00');
							$("#repwd").addClass('error');
						}else {
							$("#mess3").html("通过");
							$("#mess3").css('color', '#7AB61E');
							$("#repwd").removeAttr('error');
							$("#repwd").addClass('success');
						}
					}
				}
			});

			// 邮箱验证
			$("#email").blur(function(){
				if($("#email").val() == ""){
					$("#mess4").html("电子邮箱不可以为空");
					$("#mess4").css('color', '#F00');
					$("#email").removeClass('success');
					$("#email").addClass('error');
				}else {
					if(!reg3.test($("#email").val())) {
						$("#mess4").html("电子邮箱格式不正确");
						$("#mess4").css('color', '#F00');
						$("#email").removeClass('success');
						$("#email").addClass('error');
					}else {
						$.ajax({
							url: '/watch_shop/index.php/Home/Register/check_email',
							type: 'POST',
							dataType: 'text',
							data: {email: $("#email").val()},
							dataFilter:function(data){
								return data;
							},
							success:function(data){
								switch(data) {
									case '1':
										$("#mess4").html("该邮箱已经注册过 , 已有账号 ? <a href='/watch_shop/index.php/Home/Login'>登录</a>");
										$("#email").removeClass('success');
										$("#email").addClass('error');
										$("#mess4").css('color', '#F00');
										emailFlag = false;
										break;
									case '0':
										$("#mess4").html("电子邮箱可用");
										$("#email").removeClass('error');
										$("#email").addClass('success');
										$("#mess4").css('color', '#7AB61E');
										emailFlag = true;
										break;
								}
							},
							error:function(){
								$("#mess4").html("网络开小差~请稍后再试！");
								$("#mess4").css('color', '#F00');
								emailFlag = false;
							}
						});
					}
				}
			});

			// 验证码验证
			$("#verify_code").change(function() {

				if($("#verify_code").val() == ""){
					$("#mess5").html("验证码不可以为空");
					$("#verify_code").removeClass('success');
					$("#verify_code").addClass('error');
					$("#mess5").css('color', '#F00');
				}else {
					$.ajax({
						url: '/watch_shop/index.php/Home/Register/check_code',
						type: 'POST',
						dataType: 'text',
						data: {verify: $("#verify_code").val()},
						dataFilter:function(data){
							return data;
						},
						success:function(data){
							switch(data) {
								case '1':
									$("#mess5").html("通过");
									$("#verify_code").removeClass('error');
									$("#verify_code").addClass('success');
									$("#mess5").css('color', '#7AB61E');
									flag = true;
									break;
								case '0':
									$("#mess5").html("验证码不正确！");
									$("#verify_code").removeClass('success');
									$("#verify_code").addClass('error');
									$("#mess5").css('color', '#F00');
									flag = false;
									break;
							}
						},
						error:function(){
							$("#mess5").html("网络开小差~请稍后再试！");
							$("#mess5").css('color', '#F00');
						}
					});
				}
			});
			

			

				
			// 提交验证
			$("#submit").click(function() {
				return check_form();
			});

			// 检验表单

		});

		function check_form(){

			if($("#user").val() == ""){
				$("#mess1").html("用户名不可以为空");
				$("#user").removeClass('success');
				$("#user").addClass('error');
				$("#mess1").css('color', '#F00');
				return false;
			}

			if(!reg1.test($("#user").val())){
				$("#mess1").html("用户名格式不正确");
				$("#user").removeClass('success');
				$("#user").addClass('error');
				$("#mess1").css('color', '#F00');
				return false;
			}

			if(!userflag){
				$("#mess1").html("用户名已存在！");
				$("#user").removeClass('success');
				$("#user").addClass('error');
				$("#mess1").css('color', '#F00');
				return false;
			}

			if($("#repwd").val() == ""){
				$("#mess3").html("确认密码不可以为空！");
				$("#repwd").removeClass('success');
				$("#repwd").addClass('error');
				$("#mess3").css('color', '#F00');
				return false;
			}

			if(!reg2.test($("#pwd").val())){
				$("#pwd").attr('class', 'error');
				$("#mess2").html("密码格式不正确！");
				$("#pwd").removeClass('success');
				$("#mess2").css('color', '#F00');
				return false;
			}

			if($("#repwd").val() == ""){
				$("#mess3").html("确认密码不可以为空！");
				$("#repwd").removeClass('success');
				$("#repwd").addClass('error');
				$("#mess3").css('color', '#F00');
				return false;
			}

			if(!reg2.test($("#repwd").val())){
				$("#repwd").attr('class', 'error');
				$("#mess3").html("确认密码格式不正确！");
				$("#repwd").removeClass('success');
				$("#mess3").css('color', '#F00');
				return false;
			}

			if($("#repwd").val() != $("#pwd").val()){
				$("#mess3").html("两次密码不一致！");
				$("#mess3").css('color', '#F00');
				$("#repwd").addClass('error');
				return false;
			}

			if($("#email").val() == ""){
				$("#mess4").html("电子邮箱不可以为空");
				$("#mess4").css('color', '#F00');
				$("#email").removeClass('success');
				$("#email").addClass('error');
				return false;
			}

			if(!reg3.test($("#email").val())) {
				$("#mess4").html("电子邮箱格式不正确");
				$("#mess4").css('color', '#F00');
				$("#email").removeClass('success');
				$("#email").addClass('error');
				return false;
			}

			if(!emailFlag) {
				$("#mess4").html("该邮箱已经注册过 , 已有账号 ? <a href='/watch_shop/index.php/Home/Login'>登录</a>");
				$("#email").removeClass('success');
				$("#email").addClass('error');
				$("#mess4").css('color', '#F00');
				return false;
			}

			if($("#verify_code").val() == ""){
				$("#mess4").html("验证码不可以为空");
				$("#verify_code").removeClass('success');
				$("#verify_code").addClass('error');
				$("#mess4").css('color', '#F00');
				return false;
			}

			if(!flag) {
				$("#mess4").html("验证码不正确！");
				$("#verify_code").removeClass('success');
				$("#verify_code").addClass('error');
				$("#mess4").css('color', '#F00');
				return false;
			}
		}
	</script>

			
		
		<!--information-starts-->
		<div class="information">
			<div class="container">
				<div class="infor-top">
					<div class="col-md-3 infor-left">
						<h3>合作单位</h3>
						<ul>
							<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
							<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
							<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
						</ul>
					</div>
					<div class="col-md-3 infor-left">
						<h3>商品信息</h3>
						<ul>
							<li><a href="#"><p>Specials</p></a></li>
							<li><a href="#"><p>New Products</p></a></li>
							<li><a href="#"><p>Our Stores</p></a></li>
							<li><a href="contact.html"><p>Contact Us</p></a></li>
							<li><a href="#"><p>Top Sellers</p></a></li>
						</ul>
					</div>
					<div class="col-md-3 infor-left">
						<h3>我的账户</h3>
						<ul>
							<li><a href="account.html"><p>个人中心</p></a></li>
							<li><a href="#"><p>My Credit slips</p></a></li>
							<li><a href="#"><p>My Merchandise returns</p></a></li>
							<li><a href="#"><p>My Personal info</p></a></li>
							<li><a href="#"><p>My Addresses</p></a></li>
						</ul>
					</div>
					<div class="col-md-3 infor-left">
						<h3>关于我们</h3>
						<h4>沈阳兄弟连教育咨询有限公司,
							<span>辽宁省沈阳市沈北新区蒲昌路19号阳光经典大厦.</h4>
						<h5>+86 155 2419 2580</h5>	
						<p><a href="mailto:admin@hlts.pub">admin@hlts.pub</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--information-end-->
		<!--footer-starts-->
		<div class="footer">
			<div class="container">
				<div class="footer-top">
					<div class="col-md-6 footer-left">
						
					</div>
					<div class="col-md-6 footer-right">					
						<p>Copyright &copy; 2017.<?php echo ($result['copyright']); ?> All rights reserved.</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--footer-end-->	
	</body>
</html>