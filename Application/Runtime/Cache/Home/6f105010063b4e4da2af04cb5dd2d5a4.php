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


		
	<link type="text/css" href="/watch_shop/Public/css/cart.css" rel="stylesheet" />
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/watch_shop/index.php/Home/Index/index">首页</a></li>
					<li class="active">我的购物车</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="account-top heading" style="margin-top: 20px; margin-bottom: 30px">
		<h2>我的购物车</h2>
	</div>
	<div class="cart">
     	<div id="shoplist" align="center">
     		<table cellspacing="0" cellpadding="10" width="85%">
     			<tr bgcolor="#F2F2F2" style="height: 35px;">
     				<th style="text-align:center; width: 50px;"><input type="checkbox" class="all" /></th>
     				<th style="padding-left: 10px; width: 500px;">商品名称</th>
     				<th style="text-align:center; width: 120px;">价格(元)</th>
     				<th style="text-align:center; width: 160px;">数量</th>
     				<th style="text-align:center;">小计(元)</th>
     				<th style="text-align:center;">操作</th>
     			</tr>
     			<!--此处遍历商品 -->
     			<?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="list" pro="<?php echo ($value['id']); ?>">
     				<td align="center"><input type="checkbox" class="chooseProduct"/></td>
     				<td style="padding-left: 10px;">
     					<input type="hidden" name="pid" value="<?php echo ($value['pid']); ?>" />
						<img src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($value['pic']); ?>" width="45px" />
						<span id="title"><?php echo ($value['name']); ?></span>
						<br /><span id="attribute"><label>品牌:</lable><?php echo ($value['bname']); ?></span>
     				</td>
     				<td align="center" class="price" proID="<?php echo ($value['id']); ?>"><?php echo ($value['price']); ?></td>
     				<td align="center">  
					  	<div class="input-group spinner" proID="<?php echo ($value['id']); ?>">  
					    	<input type="text" class="form-control" value="1" data-max="10" data-min="1" data-step="1" proID="<?php echo ($value['id']); ?>">  
					    	<div class="input-group-btn-vertical" id="number" proID="<?php echo ($value['id']); ?>">
					      		<button class="btn btn-default" id="plus" proID="<?php echo ($value['id']); ?>" type="button"><i class="fa fa-caret-up"></i></button>  
					      		<button class="btn btn-default" id="reduce" proID="<?php echo ($value['id']); ?>" type="button"><i class="fa fa-caret-down"></i></button>  
					    	</div>  
					  	</div>  
     				</td>
     				<td id="showTotal" align="center" proID="<?php echo ($value['id']); ?>" class="tTotal"><?php echo ($value['price']); ?></td>
     				<td align="center"><a class="del" proID="<?php echo ($value['id']); ?>">删除</a></td>
     			</tr><?php endforeach; endif; ?>
     			<tr style="height: 80px;" bgcolor="#F2F2F2">
     				<td align="center"><input type="checkbox" class="all"/></td>
     				<td colspan="3"><a href="#">删除选中商品</a></td>
     				<td colspan="2" style="padding-left: 10px; padding-right: 10px;" align="right" valign="middle">
     					<span id="displayTotal">总计： <label id="total"></label></span>
 					</td>
     			</tr>
     		</table>
     	</div>
     	<div id="footer">
			<span class="label label-default" id="backbtn">返回首页</span>
			<span class="label label-danger" id="pay">去结算</span>
 		</div>
	</div>
	<div class="commend" align="center">
		<div id="commend_title"><label>猜你喜欢</label></div>
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
	<script>
		(function ($) {  
			$("#plus[proID]").on('click', function() {
				var proNum = $(this).attr("proID");
	    		$("input[proID ='"+proNum+"']").val(parseInt($("input[proID = '"+proNum+"']").val(), 10) + 1);
	    		$("#showTotal[proID = '"+proNum+"']").html(parseInt($(".price[proID = '"+proNum+"']").html()) * parseInt($("input[proID = '"+proNum+"']").val()));
	    		$("#total").html(showTotalPrice()+".00");
		  	});
		  	$("#reduce[proID]").on('click', function() {
		  		var proNum = $(this).attr("proID");
		  		if($("input[proID ='"+proNum+"']").val() > 1){
		    		$("input[proID ='"+proNum+"']").val( parseInt($("input[proID = '"+proNum+"']").val(), 10) - 1);
		    		$("#showTotal[proID = '"+proNum+"']").html(parseInt($(".price[proID = '"+proNum+"']").html()) * parseInt($("input[proID = '"+proNum+"']").val()));
		    		$("#total").html(showTotalPrice()+".00");
		    	}
		  	});
		  	$("input[proID]").blur(function() {
		  		var proNum = $(this).attr("proID");
		  		if(!($("input[proID = '"+proNum+"']").val()) || $("input[proID = '"+proNum+"']").val() == 0){
		  			$("input[proID = '"+proNum+"']").val(1);
		  			$("#showTotal[proID = '"+proNum+"']").html(parseInt($(".price[proID = '"+proNum+"']").html()) * parseInt($("input[proID = '"+proNum+"']").val()));
		  			$("#total").html(showTotalPrice()+".00");
		  		}
		  		$("#showTotal[proID = '"+proNum+"']").html(parseInt($(".price[proID = '"+proNum+"']").html()) * parseInt($("input[proID = '"+proNum+"']").val()));
		  		$("#total").html(showTotalPrice()+".00");
		  	});
		})(jQuery);
		
		$("#backbtn").click(function(){
			location.href = "/watch_shop/index.php/Home/Index";
		});
		
		var flag = 0;
		var num = 0;
		var chooseProducts = document.getElementsByClassName("chooseProduct");
		var all = document.getElementsByClassName("all");
		$(".all").click(function(){
			num = flag % 2;
			switch(num) {
				case 0:
					for(var i = 0;i< all.length;i++) {
						all[i].checked = true;
					}
					for(var j = 0;j < chooseProducts.length;j++){
						chooseProducts[j].checked = true;
					}
					break;
				case 1:
					for(var i = 0;i< all.length;i++) {
						all[i].checked = false;
					}
					for(var j = 0;j < chooseProducts.length;j++){
						chooseProducts[j].checked = false;
					}
					break;
			}
			flag++;
		});
		
		$("#total").html(showTotalPrice()+".00");
		
		function showTotalPrice(){
			var money = 0;
			var totalPrice = document.getElementsByClassName('tTotal');
			for(var i = 0;i < totalPrice.length;i++) {
				money += Number(totalPrice[i].innerHTML);
			}
			return money;
		}

		$(".del[proID]").click(function(){
			var did = $(this).attr("proID");
			$.ajax({
				url: '/watch_shop/index.php/Home/Cart/cartDel',
				type: 'POST',
				dataType: 'text',
				data: {pid: $("input[name='pid'][proID="+did+"]").val()},
				dataFilter: function(data) {
					return data;
				},
				success: function(data) {
					switch(data) {
						case '1':
							break;
						case '0':
							break;
					}
				},
				error: function() {
					swal("删除失败","网络开小差~ 请亲检查网络设置","error");
				}
			});
		});
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