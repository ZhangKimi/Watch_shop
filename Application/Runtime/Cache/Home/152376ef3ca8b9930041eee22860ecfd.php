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


		
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="index.html">首页</a></li>
                    <li class="active">商品详情</li>
                </ol>
            </div>
        </div>
    </div>
    <style>
        a.add-collect {
            background: #000 none repeat scroll 0 0;
            color: #FFF;
            display: inline-block;
            font-size: 1.15em;
            margin-top: 2em;
            padding: 0.4em 0.8em;
            text-decoration: none;
            margin-left: 5px;
        }

        a.add-collect:hover {
            background: #73b6e1 none repeat scroll 0 0;
            transition: all 0.5s ease 0s;
            text-decoration: none;
            color: #FFF;
        	cursor: pointer;
        }

    </style>
    <script>
        $(function() {
            var menu_ul = $('.menu_drop > li > ul'),
                menu_a  = $('.menu_drop > li > a');
            
            menu_ul.hide();
        
            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });
        
        });
     function fun(){
        alert($('#id').val())
        $.ajax({
        url:"/watch_shop/index.php/Home/Cart/insertOne?pid=<?php echo ($pid); ?>",
        type:"POST",
        dataType:'text',
        data:
        {
        id:$('#id').val(),
        num:$('#num').val(),
        // uid:$('#uid').val(),
        price:$('#price').val(),
        name:$('#name').val(),
        pic:$('#pic').val(),
        pid:$('#pid').val(),
        bname:$('#bname').val(),
          },
            dataFilter:function(data){
            return data;
          },
              success:function(data)
            {
             switch(data)
                 {
                    case "1":
                    alert('添加成功!','index')
                    break;
                    case "0":
                    alert('添加失败','index')
                    break;
                 }
            },
             error:function(data)
            {
                 alert('失败','index')
            }
              });
           }
        
    </script>
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">  
                        <div class="flexslider">
                            <ul class="slides">
                            <!-- 商品图片 -->
                                <li data-thumb="/watch_shop/Public/admin/Uploads/Products/<?php echo ($pic1); ?>">
                                    <div class="thumb-image"> <img src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($pic1); ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="/watch_shop/Public/admin/Uploads/Products/<?php echo ($picurl); ?>">
                                     <div class="thumb-image"> <img src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($picurl); ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="/watch_shop/Public/admin/Uploads/Products/<?php echo ($pic2); ?>">
                                   <div class="thumb-image"> <img src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($pic2); ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li> 
                              </ul>
                        </div>
                            
                        <!-- <input type="hidden" id="uid" value="$_SESSION['uid']"> -->
                        <input type="hidden" id="pid" value="<?php echo ($pid); ?>" >
                        <input type="hidden" id='name' value="<?php echo ($title); ?>">
                        <input type="hidden" id="id" value="<?php echo ($id); ?>">
                        <input type="hidden" id="name" value="<?php echo ($title); ?>">
                        <!-- <input type="hidden" id="uid" value="<?php echo ($value['uid']); ?>"> -->
                        <input type="hidden" id="pic" value="<?php echo ($picurl); ?>">
                        <input type="hidden" id="price" value="<?php echo ($price); ?>">
                        <input type="hidden" id="bname" value="<?php echo ($bname); ?>">
                            
                        <!-- FlexSlider -->
                        <script src="/watch_shop/Public/js/imagezoom.js"></script>
                        <script defer src="/watch_shop/Public/js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="/watch_shop/Public/css/flexslider.css" type="text/css" media="screen" />

                        <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                          $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                          });
                        });
                        </script>
                    </div>  
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?php echo ($title); ?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                <div class="review">
                                    <a href='#'>  
                                        <?php if(($hot) == "1"): ?><td>热卖</td><?php endif; ?>
                                        <?php if(($hot) == "0"): ?><td>普通</td><?php endif; ?></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <h5 class="item_price" style="border: none !important;">&yen; <?php echo ($price); ?></h5>
                            <div class="available">
                          
                            <ul>
                             <span>品牌名称:  <?php echo ($bname); ?></span>
                             </ul>
                             <div class="clearfix"> </div>
                             </div>
                            <ul class="tag-men">
                                <li><span>库存量: <?php echo ($stock); ?></span>
                                <li>
                                	<span>购买数量:&nbsp;
                                 		<input type="number" id="num" value='1' min='1' max="<?php echo ($stock); ?>" style="width:50px ">
                                 	</span>
								</li>
                            </ul>
                            <a id="cart" type='submit' href="#" class="add-cart item_add" onclick="fun()" style="width: 125px;">加入到购物车</a>
                            <a id="collect" class="add-collect">收藏此商品</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                <li class="item1"><a href="#"><img src="/watch_shop/Public/images/arrow.png" alt="">商品描述</a>
                    <ul>
                        <li class="subitem1"><a href="#"><?php echo ($contents); ?></a></li>
                    </ul>
                </li>
                <li class="item3">
                    <a href="#">
                        <img src="/watch_shop/Public/images/arrow.png" alt="">商品评价
                    </a>
                    <ul>
                        <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                        <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                        <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                    </ul>
                </li>
            </ul>
                </div>
                <div class="latestproducts">
                    <div class="product-one">
                    <?php if(is_array($info1)): foreach($info1 as $key=>$value): ?><div class="col-md-4 product-left p-left"> 
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/watch_shop/index.php/Home/Details/index?id=<?php echo ($value['id']); ?>" class="mask"><img class="img-responsive zoom-img" src="/watch_shop/Public/Uploads/<?php echo ($value['picurl']); ?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><?php echo ($value['title']); ?></h3>
                                    <p> 库存量: <?php echo ($value['stock']); ?></p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ <?php echo ($value['price']); ?></span></h4>
                                </div>
                                <div class="srch">
                                  <!--   <span>-50%</span> -->
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                <div class="col-md-3 single-right">
                    <div class="w_sidebar">
                        <section  class="sky-form">
                            <h4>Catogories</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
                                </div>
                                <div class="col col-4">                             
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>           
                                </div>
                            </div>
                        </section>
                        <section  class="sky-form">
                            <h4>品牌</h4>
                            
                            <div class="row1 row2 scroll-pane">
                            <?php if(is_array($info2)): foreach($info2 as $key=>$value): ?><div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i><?php echo ($value['bname']); ?></label>
                                </div><?php endforeach; endif; ?>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--end-single-->
    <script>
        var uid = "<?php echo $_SESSION['user']['uid']?>";
        $("#collect").click(function() {
            if(uid) {
                $.ajax({
                    url: '/watch_shop/index.php/Home/Collect',
                    type: 'POST',
                    dataType: 'text',
                    data: {pid: $("#pid").val()},
                    dateFilter: function(data) {
                        return data;
                    },
                    success: function(data) {
                        switch(data) {
                            case '1':
                                swal("添加成功","您已经成功的将商品添加到您的收藏","success");
                                break;
                            case '0':
                                swal("添加失败","服务器繁忙请过会儿再试","error");
                                break;
                            case '2':
                                swal("添加失败","您已经添加过此商品","error");
                                break;
                        }
                    },
                    error: function() {
                        swal("添加失败","网络不给力请检查网络设置","error");
                    }
                });
            }else {
                swal({
                    title: "亲 , 请先登录",
                    text: "登录之后才可以添加收藏哦",
                    type: "info",
                    confirmButtonText: "去登录"
                },function(){
                    location.href = "/watch_shop/index.php/Home/Login";
                });
            }
                
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