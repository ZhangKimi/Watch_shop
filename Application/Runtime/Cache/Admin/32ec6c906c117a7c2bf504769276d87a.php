<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches 后台管理系统 - 登录</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
        <!--[if lt IE 8]>
        <meta http-equiv="refresh" content="0;ie.html" />
        <![endif]-->
        <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
        <style>
            #metion {
                width: 300px;
                height: 41px;
                border: 1px solid #800000;
                border-radius: 5px;
                padding-top: 10px;
                color: #000000;
                background: #FFC0CB;
            }
        </style>
    </head>

    <body class="gray-bg">
        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div>
                    <h1 class="logo-name">ZY</h1>
                </div>
                <input type="hidden" id="dis" value="<?php echo ($dis); ?>" />
                <h3>欢迎使用 Luxury Watches后台管理系统</h3>
                <div id="metion"><img src="/watch_shop/Public/admin/img/s_error.png" width="16" />&nbsp;登录超时 (1440 秒未活动)，请重新登录。</div>
                <form class="m-t" role="form" action="/watch_shop/index.php/Admin/Login/dologin" method="post" target="_self">
                    <div class="form-group">
                        <input type="email" class="form-control" name="username" placeholder="用户名" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="userpass" placeholder="密码" required>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </form>
            </div>
        </div>
        <p class="text-muted text-center">Copyright &copy; 2017.沈阳兄弟连教育咨询有限公司 All rights reserved.</p>

        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <!-- <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
        <script type="text/javascript">
            if($("#dis").val()){
                $("#metion").css('display', 'block');
            }else {
                $("#metion").css('display', 'none');
            }
        </script>
    </body>
</html>