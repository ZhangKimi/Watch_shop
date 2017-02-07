<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Luxury Watches - 商品修改</title>
   <!--  <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术"> -->

    <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico"> 
    <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Luxury Watches - 商品修改</h5>
                        <div class="ibox-tools">
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form  action='/watch_shop/index.php/Admin/Goodsedit/update' method="post" class="form-horizontal">
                        
                        <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
                       
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品编号</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="pid" value="<?php echo ($info['pid']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">商品名称</label>

                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" name='title' value="<?php echo ($info['title']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品品牌</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name='brandid' value="<?php echo ($info['brandid']); ?>">
                                        <option selected="selected" id="dis" ></option>
                                         <?php echo ($brandOption); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">商品类别</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name='typeid' value="<?php echo ($info['typeid']); ?>">
                                        <option selected="selected" id="defa" ></option>
                                        <?php echo ($option); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">库存量</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='stock' value="<?php echo ($info['stock']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">访问量</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='hits' value="<?php echo ($info['hits']); ?>">
                                </div>
                            </div>
                        <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">商品描述</label>
                                <div class="col-sm-10">
                                    <input type="textarea" class="form-control" name='contents' value="<?php echo ($info['contents']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">售价</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='price' value="<?php echo ($info['price']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">优惠价</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='preprice' value="<?php echo ($info['preprice']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">添加时间</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='addtime' value="<?php echo ($info['addtime']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">添加人</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='inputer' value="<?php echo ($info['inputer']); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否热卖
                                </label>

                                <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1"  checked="" <?php if(($info['hot']) == "1"): ?>checked<?php endif; ?> name="hot"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($info['hot']) == "2"): ?>checked<?php endif; ?> name="hot"> <i></i> 否</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否降价
                                </label>

                                
                            <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1"  checked="" <?php if(($info['depreciate']) == "1"): ?>checked<?php endif; ?> name="depreciate"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($info['depreciate']) == "2"): ?>checked<?php endif; ?> name="depreciate"> <i></i> 否</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否推荐
                                </label>

                                
                            <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1"  checked="" <?php if(($info['commend']) == "1"): ?>checked<?php endif; ?> name="commend"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($info['commend']) == "2"): ?>checked<?php endif; ?> name="commend"> <i></i> 否</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否下架
                                </label>

                            <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1"  checked="" <?php if(($info['offsale']) == "1"): ?>checked<?php endif; ?> name="offsale"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($info['offsale']) == "2"): ?>checked<?php endif; ?> name="offsale"> <i></i> 否</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否优惠
                                </label>
                            <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1"  checked="" <?php if(($info['discount']) == "1"): ?>checked<?php endif; ?> name="discount"> <i></i> 是</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($info['discount']) == "2"): ?>checked<?php endif; ?> name="discount"> <i></i> 否</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">商品封面图</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" multiple= name='picurl' value=''>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">商品详情图</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name='picurls' value=''>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
           

    
    <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script> 
    <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script> 
    <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>