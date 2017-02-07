<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo ($title); ?></title>
		<link href="/watch_shop/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
		<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
								<script>
									var username = "<?php echo $_SESSION['user']['username'] ?>";
									function check_cart() {
										if(!username){
											alert("亲 , 请先登录!");
											location.href = "/watch_shop/index.php/Home/Login";
											return false;
										}
									}

									// window.onload = function(){
									// 	if(!username){
									// 		total.innerHTML="&yen;"+0;
									// 	}

									// }
								</script> 
							 <!-- </a> -->
							<div id="cart">
								<a href="/watch_shop/index.php/Home/Cart" onclick="return check_cart();">
									<img src="/watch_shop/Public/images/cart-1.png" alt="" />
									<span id="myCart">我的购物车</span>
									<span class="badge"><?php echo ($shopNum); ?><span>	
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
								<a href="/watch_shop/index.php/Home/List" id="<?php echo ($value['pid']); ?>"><?php echo ($value['name']); ?></a>			
								<!-- 遍历 子类-->
									<div class="mepanel">
										<div class="row">
											<div class="col1 me-one">
												<ul>
													<?php if(is_array($result)): foreach($result as $key=>$val): if(is_array($val)): foreach($val as $key=>$res): if(($res['parid'] == $value['pid'])): ?><li><a href="<?php echo ($res['pid']); ?>"><?php echo ($res['name']); ?></a></li><?php endif; endforeach; endif; endforeach; endif; ?>
												</ul>
											</div>
										</div>
									</div>
								</li><?php endforeach; endif; ?>	
							<!--<li class="grid"><a href="typo.html">Blog</a>
							</li>-->
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
							<input type="text" name='search' placeholder="搜索" />
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
	
		<!--banner-ends--> 
		<!--Slider-Starts-Here-->
					<script src="/watch_shop/Public/js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider4").responsiveSlides({
				        auto: true,
				        pager: true,
				        nav: true,
				        speed: 500,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>
				<!--End-slider-script-->
		<!--about-starts-->
		
    <link type="text/css" href="/watch_shop/Public/css/cart.css" rel="stylesheet" />
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="/watch_shop/index.php/Home/Index/index">首页</a></li>
                    <li class="active">提交订单</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="account-top heading" style="margin-top: 20px; margin-bottom: 30px">
        <h2>提交订单</h2>
    </div>
    <div class="for-liucheng">
        <div class="liulist for-cur"></div>
        <div class="liulist"></div>
        <div class="liulist"></div>
        <div class="liulist"></div>
        <div class="liulist"></div>
        <div class="liutextbox">
            <div class="liutext for-cur"><em>1</em><br /><strong>提交订单</strong></div>
            <div class="liutext"><em>2</em><br /><strong>选择支付方式</strong></div>
            <div class="liutext"><em>3</em><br /><strong>等待发货</strong></div>
            <div class="liutext"><em>4</em><br /><strong>已发货</strong></div>
            <div class="liutext"><em>5</em><br /><strong>订单完成</strong></div>
        </div>
    </div>
    <div id="recaddress" align="center">
        <h3 style="text-align: left; margin-left: 120px;">收货地址</h3>
        <table cellspacing="0" cellpadding="10" width="82%">
            <tr>
                <td style="width: 10px;">
                    <input type="radio" name="recaddr" value="1" />
                </td>
                <td style="width: 700px;">
                    <label>张世龙 辽宁省沈阳市沈北新区蒲昌路19号阳光经典大厦4楼兄弟连IT教育 110000 15524192580</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="cart">
        <div id="shoplist" align="center">
            <table cellspacing="0" cellpadding="10" width="85%">
                <tr bgcolor="#F2F2F2" style="height: 35px;">
                    <th style="padding-left: 10px; width: 500px;">商品名称</th>
                    <th style="text-align:center; width: 120px;">价格(元)</th>
                    <th style="text-align:center; width: 160px;">数量</th>
                    <th style="text-align:center;">小计(元)</th>
                </tr>
                <!--此处遍历商品 -->
                <tr class="list">
                    <td style="padding-left: 10px;">
                        <img src="/watch_shop/Public/admin/Uploads/Products/587eea261808c.jpg" width="45px" />
                        <span id="title">百达翡丽Nautilus系列诞生四十周年</span>
                        <br /><span id="attribute"><label>品牌:</lable>百达翡丽</span>
                    </td>
                    <td align="center">2188.00</td>
                    <td align="center">1</td>
                    <td id="showTotal" align="center">3999</td>
                </tr>
                <tr style="height: 80px;" bgcolor="#F2F2F2">
                    <td colspan="3"></td>
                    <td colspan="2" style="padding-left: 10px; padding-right: 10px;" align="right" valign="middle">
                        <span id="displayTotal">总计： <label id="total">&yen; 3880.00</label></span>
                    </td>
                </tr>
            </table>
        </div>

			
		
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
						<p>Copyright &copy; 2017.致一科技 All rights reserved.</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--footer-end-->	
	</body>
</html>