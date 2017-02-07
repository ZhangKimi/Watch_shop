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
		
<div class="prdt"> 
		<div class="container" style="margin-left:200px;">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left" >
					<div class="product-one">
						 <?php if(is_array($info)): foreach($info as $key=>$value): ?><div class="col-md-4 product-left p-left"> 
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/watch_shop/index.php/Home/Details/index?id=<?php echo ($value['id']); ?>" class="mask"><img class="img-responsive zoom-img" 
                                src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($value['picurl']); ?>" alt=""  width="100px" /></a>
                                <div class="product-bottom">
                                    <h3><?php echo ($value['title']); ?></h3>
                                    <p> 库存量: <?php echo ($value['stock']); ?></p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">
                                    &yen; <?php echo ($value['price']); ?></span></h4>
                                </div>
                                <div class="srch">
                                   <!--  <span>-50%</span> -->
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
						
						<div class="clearfix"></div>
					</div>
					<div class="product-one">
						<!-- div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-4.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div> -->
						<div class="col-md-4 product-left p-left">
						<!-- 	<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-5.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-6.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div> -->
						<div class="clearfix"></div>
					</div>	
				</div>	
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--product-end-->

			
		
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