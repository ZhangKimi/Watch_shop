<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <title>Luxury Watches 后台管理系统</title>
        <!--[if lt IE 8]>
        <meta http-equiv="refresh" content="0;ie.html" />
        <![endif]-->
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
        
    </head>
    <body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden" id="move">
        <div id="wrapper">
            <!--左侧导航开始-->
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="nav-close"><i class="fa fa-times-circle"></i>
                </div>
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <span>
                                    <?php if(($userpic) != ""): ?><img alt="image" class="img-circle" src="<?php echo ($userpic); ?>" width="64px" /><?php endif; ?>
                                    <?php if(($userpic) == ""): ?><img alt="image" class="img-circle" src="/watch_shop/Public/admin/img/default.jpg" width="64px"/><?php endif; ?>
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear">
                                   <span class="block m-t-xs"><strong class="font-bold"><?php echo ($username); ?></strong></span>
                                    <span class="text-muted text-xs block">
                                        <?php if(($extent) == "1"): ?>超级管理员<?php endif; ?>
                                        <?php if(($extent) == "2"): ?>管理员<?php endif; ?>
                                    <b class="caret"></b></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Uploaduserpic">修改头像</a>
                                    </li>
                                    <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Pwdedit">修改密码</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="JavaScript:;" id="logout1">安全退出</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="logo-element">ZY</div>
                        </li>
                        <li>
                            <a href="/watch_shop/index.php/Admin/Index/main" class="J_menuItem" />
                                <i class="fa fa-home"></i>
                                <span class="nav-label">后台首页</span>
                                <!-- <span class="fa arrow"></span> -->
                            </a>
                        </li>
                        <li>
                            <a href="/watch_shop/index.php/Home/Index" target="_blank">
                                <i class="fa fa-paper-plane"></i>
                                <span class="nav-label">网站前台</span>
                                <!-- <span class="fa arrow"></span> -->
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa fa-gear"></i>
                                <span class="nav-label"><?php echo ($set); ?></span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="J_menuItem" href="/watch_shop/index.php/Admin/Webconfig">基本设置</a>
                                </li>
                                <li>
                                    <a class="J_menuItem" href="/watch_shop/index.php/Admin/Memberconfig">会员设置</a>
                                </li>
                                <li>
                                    <a class="J_menuItem" href="/watch_shop/index.php/Admin/Verifyconfig">验证码设置</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="mailbox.html"><i class="fa fa-users"></i> <span class="nav-label"><?php echo ($member); ?> </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Userlist">会员列表</a>
                                </li>
                                <li><a href="/watch_shop/index.php/Home/Register" target="_blank">会员添加</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Useredit">会员编辑</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label"><?php echo ($goods); ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Goods">商品列表</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Goodadd">商品添加</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Goodsupdate">商品编辑</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Goodstate">商品上架/下架</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Goodsdel">商品删除</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-empire"></i> <span class="nav-label"><?php echo ($brand); ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Brand">品牌列表</a></li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Brandadd">品牌添加</a></li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Brandupdate">品牌编辑</a></li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Branddel">品牌删除</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sort-amount-asc"></i> <span class="nav-label"><?php echo ($sort); ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Type">类别列表</a>
                                </li>
                                <li><a href="#">类别增加<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Typepadd">添加父类别</a>
                                        </li>
                                        <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Typeadd">添加子类别</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Typeedit">类别编辑</a>
                                </li>
                                <li><a href="#">类别删除<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Typepdel">删除父类别</a>
                                        </li>
                                        <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Typedel">删除子类别</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label"><?php echo ($order); ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Orderlist">订单列表</a>
                                </li>
                                 <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Orderupd">订单修改</a>
                                </li>
                                <li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Orderdel">订单删除</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> <span class="nav-label"><?php echo ($user); ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Adminlist">用户列表</a></li><?php endif; ?>

                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Adminpwd">重置密码</a><?php endif; ?>

                                <?php if(($extent) == "2"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Pwdedit">修改密码</a> </li><?php endif; ?>
                                
                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Adminadd">用户添加</a></li><?php endif; ?>

                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Adminedit">用户编辑</a></li><?php endif; ?>

                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Admindel">用户删除</a></li><?php endif; ?>

                                <?php if(($extent) == "1"): ?><li><a class="J_menuItem" href="/watch_shop/index.php/Admin/Adminlog">用户操作日志</a></li><?php endif; ?>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="JavaScript:;" id="logout2"><i class="fa fa-sign-out"></i> <span class="nav-label"><?php echo ($exit); ?></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--左侧导航结束-->
            <!--右侧部分开始-->
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a>
                            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                                <div class="form-group">
                                    <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown hidden-xs">
                                <a class="right-sidebar-toggle" aria-expanded="false">
                                    <i class="fa fa-tasks"></i> 主题
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row content-tabs">
                    <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                    </button>
                    <nav class="page-tabs J_menuTabs">
                        <div class="page-tabs-content">
                            <a href="JavaScript:;" class="J_menuTab" data-id="/watch_shop/index.php/Admin/Index/main">首页</a>
                        </div>
                    </nav>
                    <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                    </button>
                    <div class="btn-group roll-nav roll-right">
                        <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                        </button>
                        <ul role="menu" class="dropdown-menu dropdown-menu-right">
                            <li class="J_tabShowActive"><a>定位当前选项卡</a>
                            </li>
                            <li class="divider"></li>
                            <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                            </li>
                            <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                            </li>
                        </ul>
                    </div>
                    <a href="JavaScript:;" id="logout3" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
                </div>
                <div class="row J_mainContent" id="content-main">
                    <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="/watch_shop/index.php/Admin/Index/main" frameborder="0" data-id="/watch_shop/index.php/Admin/Index/main" id="frm" seamless></iframe>
                </div>
                <div class="footer">
                    <div class="pull-right">CopyRight &copy; 2017 <a href="http://www.lampbrother.net" target="_blank">致一科技</a>
                    </div>
                </div>
            </div>
            <!--右侧部分结束-->
              <!--右侧边栏开始-->
            <div id="right-sidebar">
                <div class="sidebar-container">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="sidebar-title">
                                <h3>
                                    <i class="fa fa-comments-o"></i> 主题设置
                                </h3>
                                <small>
                                    <i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。
                                </small>
                            </div>
                            <div class="skin-setttings">
                                <div class="title">主题设置</div>
                                <div class="setings-item">
                                    <span>收起左侧菜单</span>
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                            <label class="onoffswitch-label" for="collapsemenu">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="setings-item">
                                    <span>固定顶部</span>
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                            <label class="onoffswitch-label" for="fixednavbar">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="setings-item">
                                    <span>固定宽度</span>
                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                            <label class="onoffswitch-label" for="boxedlayout">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="title">皮肤选择</div>
                                <div class="setings-item default-skin nb">
                                    <span class="skin-name ">
                                        <a href="#" class="s-skin-0" id="skin0">默认皮肤</a>
                                    </span>
                                </div>
                                <div class="setings-item blue-skin nb">
                                    <span class="skin-name ">
                                        <a href="#" class="s-skin-1" id="skin1">蓝色主题</a>
                                    </span>
                                </div>
                                <div class="setings-item yellow-skin nb">
                                    <span class="skin-name ">
                                        <a href="#" class="s-skin-3" id="skin3">黄色主题</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--右侧边栏结束-->
        </div>
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/layer/layer.min.js"></script>
        <script src="/watch_shop/Public/admin/js/hplus.min.js?v=4.0.0"></script>
        <script type="text/javascript" src="/watch_shop/Public/admin/js/contabs.min.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/pace/pace.min.js"></script>
        <script type="text/javascript">
            //SweetAlert 的使用
            //

            
            $("#logout1").click(function() {
                swal({
                    title:"亲 , 真的要退出吗 ?",
                    text:"注销本次的登录并退出系统",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要退出！",
                    cancelButtonText:"让我再考虑一下…",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },function(isConfirm){
                    if(!isConfirm){
                        swal("已取消","您取消了退出系统操作！","error");
                        return false;
                    }else {
                        location.href = "/watch_shop/index.php/Admin/Login/dologout";
                    }
                })
            });

            $("#logout2").click(function() {
                swal({
                    title:"亲 , 真的要退出吗 ?",
                    text:"注销本次的登录并退出系统",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要退出！",
                    cancelButtonText:"让我再考虑一下…",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },function(isConfirm){
                    if(!isConfirm){
                        swal("已取消","您取消了退出系统操作！","error");
                        return false;
                    }else {
                        location.href = "/watch_shop/index.php/Admin/Login/dologout";
                    }
                })
            });

            $("#logout3").click(function() {
                swal({
                    title:"亲 , 真的要退出吗 ?",
                    text:"注销本次的登录并退出系统",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要退出！",
                    cancelButtonText:"让我再考虑一下…",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },function(isConfirm){
                    if(!isConfirm){
                        swal("已取消","您取消了退出系统操作！","error");
                        return false;
                    }else {
                        location.href = "/watch_shop/index.php/Admin/Login/dologout";
                    }
                })
            });


            var timeout1 = 1440;
            var frm = document.getElementById('frm');
            var ofline = setInterval(function(){
                timeout1--;
                if(timeout1 < 0){
                    location.href = "/watch_shop/index.php/Admin/Index/timeout";
                }
            },1000);

            window.onmousemove = function() {
                timeout1 = 1440;
            }

            window.onkeydown = function() {
                timeout1 = 1440;
            }

            frm.onmousemove = function() {
                timeout1 = 1440;
            }

            frm.onkeydown = function() {
                timeout1 = 1440;
            }
            

            var timeout = 1440;
            var offline = null;

            window.onblur = function(){
                offline = setInterval(function(){
                    timeout--;
                    if(timeout < 0){
                        clearInterval(offline);
                        location.href = "/watch_shop/index.php/Admin/Index/timeout";
                    }
                },1000);
            }
            
            window.onfocus = function(){
                clearInterval(offline);
                timeout = 1440;
            }

            $("#skin0").click(function(){
                $.post('/watch_shop/index.php/Admin/Index/changeSkin', {skin: '0'}, function(data) {
                    if(data == "1") {
                        swal("个性化设置成功", "恭喜您 , 页面变得美美哒", "success");
                    }else {
                        swal("个性化设置失败", "个性化设置没有变化是不能保存的哦", "error");
                    }
                });
            });

            $("#skin1").click(function(){
                $.post('/watch_shop/index.php/Admin/Index/changeSkin', {skin: '1'}, function(data) {
                    if(data == "1") {
                        swal("个性化设置成功", "恭喜您 , 页面变得美美哒", "success");
                    }else {
                        swal("个性化设置失败", "个性化设置没有变化是不能保存的哦", "error");
                    }
                });
            });

            $("#skin3").click(function(){
                $.post('/watch_shop/index.php/Admin/Index/changeSkin', {skin: '3'}, function(data) {
                    if(data == "1") {
                        swal("个性化设置成功", "恭喜您 , 页面变得美美哒", "success");
                    }else {
                        swal("个性化设置失败", "个性化设置没有变化是不能保存的哦", "error");
                    }
                });
            });

            window.onload = function(){
                var skin = "<?php echo ($skin); ?>";
                switch(skin) {
                    case "0":
                        $("body").removeClass("skin-1");
                        $("body").removeClass("skin-2");
                        $("body").removeClass("skin-3");
                        break;
                    case "1":
                        $("body").removeClass("skin-2");
                        $("body").removeClass("skin-3");
                        $("body").addClass("skin-1");
                        break;
                    case "3":
                        $("body").removeClass("skin-1");
                        $("body").removeClass("skin-2");
                        $("body").addClass("skin-3");
                        break;
                }
            }
        </script>
    </body>
</html>