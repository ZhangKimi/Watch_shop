<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 商品管理</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico"> 
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <!-- Data Tables -->
        <link href="/watch_shop/Public/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>商品列表</h5>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>商品编号</th>
                                        <th>商品名称</th>
                                        <th>商品图片</th>
                                        <th>库存数量</th>
                                        <th>入库人</th>
                                        <th>添加时间</th>
                                        <th>售价</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="gradeX">
	                                        <td><?php echo ($value["pid"]); ?></td>
	                                        <td><?php echo ($value["title"]); ?></td>
	                                        <td><img src="/watch_shop/Public/admin/Uploads/Products/<?php echo ($value["picurl"]); ?>" width='50' style='border:1px #eee solid'/></td>
	                                        <td class="center"><?php echo ($value["stock"]); ?></td>
	                                        <td class="center"><?php echo (date("Y-m-d H:i:s",$value["addtime"])); ?></td>
	                                        
	                                        <td class="center"><?php echo ($value["inputer"]); ?></td>
	                                        <td class="center"><?php echo ($value["price"]); ?></td>
                                            <td>
                                    <a href="/watch_shop/index.php/Admin/Goodsdel/del?id=<?php echo ($value['id']); ?>">删除</a>
                                        </td>
                                    	</tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/plugins/jeditable/jquery.jeditable.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
        <script>
            $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
        </script>
        <!-- <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
    </body>
</html>