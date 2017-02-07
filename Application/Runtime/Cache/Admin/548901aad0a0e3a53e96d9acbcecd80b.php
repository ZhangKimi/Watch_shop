<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 商品添加</title>
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
                            <h5>Luxury Watches - 商品添加</h5>
                        </div>
                        <div class="ibox-content">
                            <form  action='/watch_shop/index.php/Admin/Goodadd/add' target="_self" method="post" class="form-horizontal" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">商品名称</label>

                                    <div class="col-sm-10"> 
                                        <input type="text" class="form-control" name='title'>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">商品类别</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name='typeid'>
                                            <option selected="selected" id='defa' >请选择</option>
                                            <?php echo ($option); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">商品品牌</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name='brandid'>
                                            <option selected="selected" id='dis' >请选择</option>
                                            <?php echo ($brandOption); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">库存量</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='stock' />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">商品描述</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name='contents' rows="5" cols="30"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">售价</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='price' />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">优惠价</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='preprice' />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">商品入库人</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='inputer' />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否热卖</label>
                                    <div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="1" name="hot"> <i></i> 是</label>
                                            </div>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="2" checked name="hot"> <i></i> 否</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否降价</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" name="depreciate"><i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" checked name="depreciate"> <i></i> 否</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否推荐</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" name="commend"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" checked name="commend"> <i></i> 否</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否下架</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" name="offsale"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" checked name="offsale"> <i></i> 否</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否优惠</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" name="discount"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" checked name="discount"> <i></i> 否</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">商品封面图</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="input-large form-control" name='picurl[]'>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">商品详情图</label>
                                    <div class="col-sm-10">
                                        <input type="file" multiple class="input-large form-control" name='picurls[]'>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" id="submit">保存内容</button>
                                        <button class="btn btn-white" id="back">返回</button>
                                    </div>
                                </div>
                            </form>
               

        
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script> 
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script> 
        <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
        <script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
            $(function(){
                $("select[name=typeid]").change(function() {
                    $("#defa").remove();
                });
                $("select[name=brandid]").change(function() {
                    $("#dis").remove();
                });
            });
        </script>
        <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
    </body>

</html>