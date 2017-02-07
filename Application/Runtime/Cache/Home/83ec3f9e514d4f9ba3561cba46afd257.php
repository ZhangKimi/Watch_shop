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


		
    <style type="text/css">
        div,table{
            margin:0 auto;
          }
        a{
            color:#337AB7; text-decoration:none; cursor:pointer;
          }
        a:hover{
            color:#ff4e00; text-decoration:none; cursor:pointer;
          }
          img{
        border:0;
          }

        .m_top_bg{
            width:100%; height:14px; background-color:#ff4e00;
        }
        .m_logo{
            width:150px; height:508px; overflow:hidden; float:left; margin-top:38px;
        }

        .m_ipt{
            width:295px; height:40px; line-height:40px\9; overflow:hidden; color:#337AB7; font-size:14px; font-family:"Microsoft YaHei"; float:left; padding:0 10px; border:0;
        }

        .m_content{
            width:1210px; overflow:hidden; margin-top:20px;
        }
        .m_left{
            width:211px; overflow:hidden; padding:5px; float:left; margin-right: 25px;
        }
        .left_n{
            height:35px; line-height:35px; overflow:hidden; background:url(../images/m_t.png) no-repeat 31px center; background-color:#ff4e00; color:#FFF; font-size:16px; text-indent:68px; margin-bottom:10px;
        }
        .left_m{
            overflow:hidden; background-color:#FFF; padding-bottom:20px; margin-bottom:10px; -webkit-box-shadow:0 0 5px #e0e0e0; -moz-box-shadow:0 0 5px #e0e0e0; box-shadow:0 0 5px #e0e0e0;
        }
        .left_m_t{
            height:35px; line-height:35px; overflow:hidden; color:#3e3e3e; font-size:16px; text-indent:68px; margin-bottom:10px; border-bottom:1px solid #e2e2e2;
        }

        .left_m ul li{
            height:28px; line-height:28px; overflow:hidden; color:#3e3e3e; text-indent:68px;
        }
        .left_m ul li a{
            color:#3e3e3e;
        }
        .left_m ul li a:hover, .left_m ul li a.now{
            color:#ff4e00;
        }

        .m_right{
            width:870px; height:auto !important; min-height:737px; height:737px; background-color:#FFF; float:left; display:inline; margin:5px; padding-bottom:50px; -webkit-box-shadow:0 0 5px #e0e0e0; -moz-box-shadow:0 0 5px #e0e0e0; box-shadow:0 0 5px #e0e0e0;
        }
        .m_des{
            width: 830px;border: 1px solid #000;overflow:hidden; margin-top:45px; padding-bottom:30px; margin-bottom:20px; border-bottom:1px dotted #b6b6b6; padding: 0px;line-height:22px;
        }
        .m_user{
            height:20px; line-height:20px; overflow:hidden; color:#3e3e3e; font-size:14px; font-weight:bold;
        }
        .m_notice{
            height:35px; line-height:35px; overflow:hidden; background:url(../images/n_not.png) no-repeat left center; padding-left:32px;
        }
        .mem_t{
            width:830px; height:50px; line-height:50px; overflow:hidden; color:#333333; font-size:16px;
        }
        .mem_tit{
            width:930px; height:50px; line-height:50px; overflow:hidden; color:#333333; font-size:16px;
        }

        .user_pic {
            float: left;
            margin: 15px 20px;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 100%;
            border: 2px solid #FFF;
        }

        .user_message {
            float: left;
            margin: 5px 10px 10px 20px;
        }
        
        #user_details {
            margin: 30px;
            width: 800px;
            height: 700px;
        }

        table.mon_tab{
            width: 830px;
            margin-bottom:20px;
            background-color:#f6f6f6;
        }
        table.mon_tab tr td{
            border-collapse:collapse; border-bottom:1px solid #FFF;
        }
        table.mon_tab tr td span{
            font-weight:bold; font-family:"宋体"; color:#ff4e00;
        }

        table.acc_tab{
            background-color:#f6f6f6; font-family:"宋体";
        }
        table.acc_tab tr td{
            border-collapse:collapse; border-bottom:1px dotted #b6b6b6; padding:7px 25px;
        }
        table.acc_tab tr td.td_l{
            background-color:#f7ece8; width:110px; font-family:"Microsoft YaHei";
        }
        table.acc_tab tr td.b_none{
            border-bottom:0;
        }
    </style>  
    <body class="gray-bg">
        <div class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-main">
                    <ol class="breadcrumb">
                        <li><a href="index.html">首页</a></li>
                        <li class="active">个人中心</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--Begin 用户中心 Begin -->
        <div class="register">
            <div class="container">
                <div class="register-top heading">
                    <h2>个人中心</h2>
                </div>
                <div class="m_content">
                    <div class="m_left">
                        <!-- <div class="left_n">管理中心222</div> -->
                            <div class="left_m">
                                <div class="left_m_t t_bg1">订单中心</div>
                                <ul>
                                  <li><a href="Member_Order.html">我的订单</a></li>
                                    <li><a href="Member_Address.html">收货地址</a></li>
                                    
                                </ul>
                            </div>
                            <div class="left_m">
                              <div class="left_m_t t_bg2">会员中心</div>
                                <ul>
                                  <li><a href="Member_User.html" class="now">用户信息</a></li>
                                    <li><a href="Member_Collect.html">我的收藏</a></li>
                                    <li><a href="#">管理收货地址</a></li>
                                </ul>
                            </div>
                            <div class="left_m">
                              <div class="left_m_t t_bg3">账户中心</div>
                                <ul>
                                  <li><a href="Member_Safe.html">修改资料</a></li>
                                    <li><a href="Member_Packet.html">修改密码</a></li>
                                </ul>
                            </div>
                            <!-- <div class="left_m">
                              <div class="left_m_t t_bg4">分销中心</div>
                                <ul>
                                  <li><a href="Member_Member.html">我的会员</a></li>
                                    <li><a href="Member_Results.html">我的业绩</a></li>
                                    <li><a href="Member_Commission.html">我的佣金</a></li>
                                    <li><a href="Member_Cash.html">申请提现</a></li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="m_right">
                            <div class="row  border-bottom white-bg dashboard-header">
                                <div class="col-sm-12">
                                    <blockquote class="text-warning" style="font-size:14px; height: 150px; background: #F5F8FA;">
                                        <div class="user_pic">
                                            <img src="/watch_shop/Public/images/1024.jpg" width="100px" height="100px" />
                                        </div>
                                        <div class="user_message">
                                            <h4><?php echo ($username); ?></h4>
                                            <h5>当前积分 : <label>0</lable></h5>
                                            <h5>
                                                <label>订单提醒 :</label> 待付款(<label><a href="">0</a></label>)&nbsp;&nbsp;
                                                待发货(<label><a href="">0</a></label>)&nbsp;&nbsp;
                                                待收货(<label><a href="">0</a></label>)&nbsp;&nbsp;
                                                待评价(<label><a href="">0</a></label>)&nbsp;&nbsp;
                                                售后(<label><a href="">0</a></label>)&nbsp;&nbsp;
                                            </h5>
                                            <h5>
                                                <label><a href="">我的收藏</a></label>&nbsp;&nbsp;
                                                <label><a href="">我的收货地址</a></label>&nbsp;&nbsp;
                                            </h5>
                                        </div>
                                    </blockquote>
                                    <hr width="80%" style="border: dashed #ddd;clear: left;margin-top: 20px;"/>
                                    <div class="commend" align="center">
                                        <div id="commend_title">
                                            <label>猜你喜欢</label>
                                        </div>
                                        <div class="goods">
                                            <ul>
                                                <li>
                                                    <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" id="goods_img" />
                                                    <span id="proName"><label>Calvin Klein 花裤衩 ^_-</label></span>
                                                    <span id="stock">库存量: 900</span>
                                                    <span id="add">
                                                        <img src="/watch_shop/Public/images/cart-2.png" /><label>&yen; 2899.00</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" id="goods_img" />
                                                    <span id="proName"><label>Calvin Klein 花裤衩 ^_-</label></span>
                                                    <span id="stock">库存量: 900</span>
                                                    <span id="add">
                                                        <img src="/watch_shop/Public/images/cart-2.png" /><label>&yen; 2899.00</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" id="goods_img" />
                                                    <span id="proName"><label>Calvin Klein 花裤衩 ^_-</label></span>
                                                    <span id="stock">库存量: 900</span>
                                                    <span id="add">
                                                        <img src="/watch_shop/Public/images/cart-2.png" /><label>&yen; 2899.00</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" id="goods_img" />
                                                    <span id="proName"><label>Calvin Klein 花裤衩 ^_-</label></span>
                                                    <span id="stock">库存量: 900</span>
                                                    <span id="add">
                                                        <img src="/watch_shop/Public/images/cart-2.png" /><label>&yen; 2899.00</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" id="goods_img" />
                                                    <span id="proName"><label>Calvin Klein 花裤衩 ^_-</label></span>
                                                    <span id="stock">库存量: 900</span>
                                                    <span id="add">
                                                        <img src="/watch_shop/Public/images/cart-2.png" /><label>&yen; 2899.00</label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

			
		
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