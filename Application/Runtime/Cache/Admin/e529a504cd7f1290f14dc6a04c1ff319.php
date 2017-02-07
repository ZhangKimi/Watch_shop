<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 添加管理员</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Luxury Watches - 添加管理员</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" action="/watch_shop/index.php/Admin/Adminadd/add" method="POST">
                                <div class="form-group" id="usergroup">
                                    <label class="col-sm-2 control-label">用户名</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" id="user" class="form-control">
                                        <span class="help-block m-b-none" id="usermess">以电子邮件作为用户名</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="pwdgroup">
                                    <label class="col-sm-2 control-label">密 &nbsp;&nbsp;码</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="pwd" name="userpass">
                                        <input type="checkbox" name="show1" id="show1"/> <label>显示密码</label>
                                        <span class="help-block m-b-none" id="pwdmess">6-16位，英文、数字、!@#=?_.符号组成</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="repwdgroup">
                                    <label class="col-sm-2 control-label">确认密码</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="repwd">
                                        <input type="checkbox" name="show2" id="show2"/> <label>显示密码</label>
                                        <span class="help-block m-b-none" id="repwdmess">6-16位，英文、数字、!@#=?_.符号组成</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group" id="ipgroup">
                                        <label class="col-sm-2 control-label">限制登录IP地址
                                            <br /><small class="text-navy">不填写则不限制IP地址</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="allowaddr" id="addr" class="form-control">
                                            <span class="help-block m-b-none" id="ipmess">如需对管理员登录IP地址限制，请在此填写IP地址</span>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户权限</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" name="extent"> <i></i> 超级管理员</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" checked value="2" name="extent"> <i></i> 管理员</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户状态</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" checked name="stat"> <i></i> 正常状态</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="0" name="stat"> <i></i> 禁用状态</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" onclick="return check_form();">保存内容</button>
                                        <!-- <button class="btn btn-white" type="submit">取消</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
        <script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});

            // 正则表达式
                 
            // 用户名正则 -- 电子邮件 --
            var p1 = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+\.){1,63}[a-z0-9]+$/;
            // 密码正则 -- 6-16位，英文、数字、!@#=?_.符号组成 --
            var p2 = /^[A-Za-z0-9\.\\w_=\!\@\#\?]{6,16}$/;
            // IP地址正则
            var p3 = /^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/

            // -------------------------------------------------------------
            var show1 = document.getElementById("show1");
            var show2 = document.getElementById("show2");

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
            // -------------------------------------------------------------
            // 用户判断
            // 判断用户名是否为空
            
            $("#user").blur(function() {
                if ($("#user").val() == "") {
                    $("#usergroup").removeClass('has-error');
                    $("#usergroup").addClass('has-warning');
                    $("#usermess").html("用户名不可以为空！");
                }else {
                    if(!p1.test($("#user").val())) {
                        $("#usergroup").removeClass('has-warning');
                        $("#usergroup").addClass('has-error');
                        $("#usermess").html("用户名格式不正确！");
                    }else {
                        $.ajax({
                            url: '/watch_shop/index.php/Admin/Adminadd/check_user',
                            type: 'POST',
                            dataType: 'text',
                            data: {username: $("#user").val()},
                            dataFilter:function(data){
                                return data;
                            },
                            success:function(data){
                                switch(data) {
                                    case '1':
                                        $("#usergroup").removeClass('has-warning');
                                        $("#usergroup").addClass('has-error');
                                        $("#usermess").html("用户名已存在！");
                                        userflag = false;
                                        break;
                                    case '0':
                                        $("#usergroup").removeClass('has-warning');
                                        $("#usergroup").removeClass('has-error');
                                        $("#usergroup").addClass('has-success');
                                        $("#usermess").html("验证通过");
                                        userflag = true;
                                        break;
                                }
                            },
                            error:function(){
                                $("#user").removeClass('success');
                                $("#user").addClass('error');
                                $("#user").val("");
                                $("#user").attr('placeholder', '网络开小差 , 请刷新稍后再试！');
                            }
                        });
                    }
                }
            });
            
            // -------------------------------------------------------------
            
            // 密码判断
            $("#pwd").blur(function() {
                if($("#pwd").val() == ""){
                    $("#pwdgroup").addClass('has-warning');
                    $("#pwdgroup").removeClass('has-error');
                    $("#pwdgroup").removeClass('has-success');
                    $("#pwdmess").html("密码不可以为空！");
                }else {
                    if(!p2.test($("#pwd").val())){
                        $("#pwdgroup").removeClass('has-warning');
                        $("#pwdgroup").removeClass('has-success');
                        $("#pwdgroup").addClass('has-error');
                        $("#pwdmess").html("密码格式不正确！");
                    }else {
                        $("#pwdgroup").removeClass('has-warning');
                        $("#pwdgroup").removeClass('has-error');
                        $("#pwdgroup").addClass('has-success');
                        $("#pwdmess").html("验证通过");
                    }
                }
            });
             
            // ------------------------------------------------------------- 

            // 确认密码判断
            $("#repwd").blur(function() {
                if($("#repwd").val() == ""){
                    $("#repwdgroup").addClass('has-warning');
                    $("#repwdgroup").removeClass('has-error');
                    $("#repwdgroup").removeClass('has-success');
                    $("#repwdmess").html("确认密码不可以为空！");
                }else {
                    if(!p2.test($("#repwd").val())){
                        $("#repwdgroup").removeClass('has-warning');
                        $("#repwdgroup").removeClass('has-success');
                        $("#repwdgroup").addClass('has-error');
                        $("#repwdmess").html("确认密码格式不正确！");
                    }else {
                        if($("#repwd").val() != $("#pwd").val()){
                            $("#repwdgroup").removeClass('has-warning');
                            $("#repwdgroup").removeClass('has-success');
                            $("#repwdgroup").addClass('has-error');
                            $("#repwdmess").html("两次密码输入不一致！");
                        }else {
                            $("#repwdgroup").removeClass('has-warning');
                            $("#repwdgroup").removeClass('has-error');
                            $("#repwdgroup").addClass('has-success');
                            $("#repwdmess").html("验证通过");
                        }
                    }
                }
            });

            // ------------------------------------------------------------- 
            
            // IP地址验证
            $("#addr").blur(function() {
                if($("#addr").val() == "") {
                    $("#ipgroup").removeClass('has-success');
                    $("#ipgroup").removeClass('has-error');
                    $("#ipmess").html("如需对管理员登录IP地址限制，请在此填写IP地址")
                }else {
                    if(!p3.test($("#addr").val())) {
                        $("#ipgroup").removeClass('has-success');
                        $("#ipgroup").addClass('has-error');
                        $("#ipmess").html("请填写正确的IP地址！");
                    }else {
                        $("#ipgroup").removeClass('has-error');
                        $("#ipgroup").addClass('has-success');
                        $("#ipmess").html("验证通过");
                    }
                }
            });
            

            // ------------------------------------------------------------- 
            // 提交判断
             
            function check_form() {

                if ($("#user").val() == "") {
                    $("#usergroup").removeClass('has-error');
                    $("#usergroup").addClass('has-warning');
                    $("#usermess").html("用户名不可以为空！");
                    return false;
                }

                if(!p1.test($("#user").val())) {
                    $("#usergroup").removeClass('has-warning');
                    $("#usergroup").addClass('has-error');
                    $("#usermess").html("用户名格式不正确！");
                    return false;
                }

                if(!userflag) {
                    $("#usergroup").removeClass('has-warning');
                    $("#usergroup").addClass('has-error');
                    $("#usermess").html("用户名已存在！");
                    return false;
                }

                if($("#pwd").val() == ""){
                    $("#pwdgroup").addClass('has-warning');
                    $("#pwdgroup").removeClass('has-error');
                    $("#pwdgroup").removeClass('has-success');
                    $("#pwdmess").html("密码不可以为空！");
                    return false;
                }

                if(!p2.test($("#pwd").val())){
                    $("#pwdgroup").removeClass('has-warning');
                    $("#pwdgroup").removeClass('has-success');
                    $("#pwdgroup").addClass('has-error');
                    $("#pwdmess").html("密码格式不正确！");
                    return false;
                }

                if($("#repwd").val() == ""){
                    $("#repwdgroup").addClass('has-warning');
                    $("#repwdgroup").removeClass('has-error');
                    $("#repwdgroup").removeClass('has-success');
                    $("#repwdmess").html("确认密码不可以为空！");
                    return false;
                }

                if(!p2.test($("#repwd").val())){
                    $("#repwdgroup").removeClass('has-warning');
                    $("#repwdgroup").removeClass('has-success');
                    $("#repwdgroup").addClass('has-error');
                    $("#repwdmess").html("确认密码格式不正确！");
                    return false;
                }

                if($("#repwd").val() != $("#pwd").val()){
                    $("#repwdgroup").removeClass('has-warning');
                    $("#repwdgroup").removeClass('has-success');
                    $("#repwdgroup").addClass('has-error');
                    $("#repwdmess").html("两次密码输入不一致！");
                    return false;
                }

                if($("#addr").val()){
                   if(!p3.test($("#addr").val())) {
                        $("#ipgroup").removeClass('has-success');
                        $("#ipgroup").addClass('has-error');
                        $("#ipmess").html("请填写正确的IP地址！");
                        return false;
                    } 
                }
            }
        </script>
        <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
    </body>

</html>