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
							<!-- <a href="/watch_shop/index.php/Home/Cart/" id="cart" onclick="return check_cart();">
								<script>
									var username = "<?php echo $_SESSION['user']['username'] ?>";
									function check_cart() {
										if(!username){
											alert("亲 , 请先登录!");
											location.href = "/watch_shop/index.php/Home/Login";
											return false;
										}
									}

									window.onload = function(){
										if(!username){
											total.innerHTML="&yen;"+0;
										}

									}
								</script> -->
							<!-- </a> -->
							<div id="cart">
								<a href="/watch_shop/index.php/Home/Cart">
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
	<link type="text/css" href="/watch_shop/Public/css/font-awesome.min.css" rel="stylesheet" />
<!-- <style type="css/text">
		.clears{ clear:both;}
	.for-liucheng{width:70%;margin:30px auto 50px auto; height:50px;padding:20px 0 0 0; position:relative;}
	.liulist{float:left;width:20%; height:7px; background:#ccc;}
	.liutextbox{ position:absolute;width:100%;left:0;top:10px;}
	.liutextbox .liutext{float:left;width:20%; text-align:center;}
	.liutextbox .liutext em{ display:inline-block;width:24px; height:24px;-moz-border-radius: 24px; -webkit-border-radius: 24px;border-radius:24px; background:#ccc; text-align:center; font-size:14px; line-height:24px; font-style:normal; font-weight:bold;color:#fff;}
	.liutextbox .liutext strong{ display:inline-block;height:26px; line-height:26px; font-weight:400;}
	.liulist.for-cur{ background:#77b852;}
	.liutextbox .for-cur em{ background:#77b852;}
	.liutextbox .for-cur strong{color:#77b852;}

</style> -->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/watch_shop/index.php/Home/Index/index">首页</a></li>
					<li class="active">登录</li>
				</ol>
			</div>
		</div>
	</div>

	
	<!--top-header-->
	<!--start-logo-->
	
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
	<div class="ckeckout-top">
			<div style="width:1150px;margin:100px;" class="cart-items">
			 <h3>我的购物袋</h3>
			
			   <!-- 遍历 -->
		   <div class="for-liucheng">
      		<div class="liulist for-cur"></div>
		    <div class="liulist for-cur"></div>
		    <div class="liulist for-cur"></div>
		    <div class="liulist"></div>
		    <div class="liulist"></div>
	        <div class="liutextbox">
		        <div class="liutext for-cur"><em>1</em><br /><strong>提交订单</strong></div>
		        <div class="liutext for-cur"><em>2</em><br /><strong>选择支付方式</strong></div>
		        <div class="liutext for-cur"><em>3</em><br /><strong>等待发货</strong></div>
		        <div class="liutext"><em>4</em><br /><strong>已发货</strong></div>
		        <div class="liutext"><em>5</em><br /><strong>订单完成</strong></div>
	        </div>
     	</div>
			<foreach>
			<div class="" >
                <ul class="">
                    <li><span>商品</span></li>
                    <li><span>产品名字</span></li>		
                    <li><span>价格</span></li>
                    <li><span>数量</span></li>
                    <li><span>交易操作</span> </li>
                    <div class="clearfix"> </div>
                </ul>
                <foreach>
                <ul class="">
                    
                        <li class=""><a href="single.html" ><img src="/watch_shop/Public/images/c-1.jpg" class="img-responsive" alt=""></a>
                        </li>
                        <!-- 从数据库取出来 -->
                        <li>11</li>
                        <li>22</li>
                        <li><span class="cost">

						<?php if((${a}) == "1"): ?>等待发货<?php endif; ?>
						<?php if((${a}) == "2"): ?>已经发货<?php endif; ?>
						<?php if((${a}) == "3"): ?>确认收货<?php endif; ?>
                        </span></li>
                    <div class=""> </div>
                </ul>
                </foreach>
                
            </div>
            </foreach>
			</div> 

		 </div>
		
	</div>
	<!-- <div class="contact">
		<div class="container"> -->
	<!-- 三级联动 -->

			
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	
	<!--end-breadcrumbs-->
	<!--contact-start-->
	
		
			
			
	<!-- 	</div>
	</div> -->
	<!--contact-end-->
	<!--map-start-->
	
	<!--map-end-->
	<!--information-starts-->
	
	<!--information-end-->
	<!--footer-starts-->
	
	<!--footer-end-->	

			
		
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