<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>网站基本设置</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>网站基本设置</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <input type="hidden" name="id" value="<?php echo ($id); ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="webname" value="<?php echo ($webname); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站地址</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="webdir" value="<?php echo ($webdir); ?>">
                                        <span class="help-block m-b-none">网站URL地址,无需打http:// , 结尾需加“/”，如：/</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站关键字</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="keywords" value="<?php echo ($keywords); ?>">
                                        <span class="help-block m-b-none">如有多个关键字请使用英文半角状态的逗号分隔开 如: 大学生创业,致一科技</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站描述</label>
                                        <div class="col-sm-10">
                                            <textarea name="webcontent" rows="5" cols="30" class="form-control"><?php echo ($webcontent); ?></textarea>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站版权信息</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="copyright" value="<?php echo ($copyright); ?>">
                                        <span class="help-block m-b-none">只需要填写4位年份空格加公司名称 如: 2017 致一科技</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" id="save">保存内容</button>
                                    </div>
                                </div>
                            </div>
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
            $("#save").click(function(){
                swal({
                    title: "是否要保存网站的基础信息 ?",
                    text: "保存后刷新网站前台后会更新设置",
                    type: "info",
                    confirmButtonText: "保存",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    $.ajax({
                        url: '/watch_shop/index.php/Admin/Webconfig/configSave',
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            id: $("input[name = id]").val(),
                            webname: $("input[name = webname]").val(),
                            webdir: $("input[name = webdir]").val(),
                            keywords: $("input[name = keywords]").val(),
                            webcontent: $("input[name = webcontent]").val(),
                            copyright: $("input[name = copyright]").val()
                        },
                        dataFilter: function(data){
                            return data;
                        },
                        success: function(data) {
                            switch(data) {
                                case "1":
                                    swal({
                                        title: "保存成功",
                                        text: "系统已经保存您修改的内容",
                                        type: "success"
                                    },function(){
                                        location.href = "/watch_shop/index.php/Admin/Webconfig";
                                    });
                                    break;
                                case "0":
                                    swal("保存失败", "网络连接失败或网站属性无改变", "error");
                                    break;
                            }
                        },
                        error: function() {
                            swal("保存失败", "网络不给力 , 请检查网络设置","error");
                        }
                    });
                });
            });
        </script>
    </body>
</html>