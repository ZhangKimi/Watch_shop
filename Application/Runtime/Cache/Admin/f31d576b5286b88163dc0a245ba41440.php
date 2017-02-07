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
                            <h5>会员的订单</h5>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <!-- <th>商品id</th> -->
                                        <th>用户id</th>
                                        <th>联系人</th>
                                        <th>订单号</th>
                                        <th>电话号</th>
                                        <th>收货地址</th>
                                        <th>支付方式</th>
                                        <th>下单时间</th>
                                        <th>发货时间</th>
                                        <th>订单状态</th>
                                        <th>查看</th>
                                    </tr>
                                </thead>
                                <form action="">
                                        <input type="hidden" name="num" value="<?php echo ($value['num']); ?>">
                                        <input type="hidden" name="price" value="<?php echo ($value['price']); ?>">
                                </form>
                                <tbody>
                                <?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="gradeX">
                                        <!-- <td><?php echo ($value['id']); ?></td> -->
                                        <td><?php echo ($value['uid']); ?></td>
                                        <td name='name'><?php echo ($value['name']); ?></td>
                                        <td name="ordernumber"><?php echo ($value['ordernumber']); ?></td>
                                        <td><?php echo ($value['phone']); ?></td>
                                        <td><?php echo ($value['addr']); ?></td>
                                        <td><?php echo ($value['paymethod']); ?></td>
                                        <td><?php echo ($value['ordertime']); ?></td>
                                        <td><?php echo ($value['leavetime']); ?></td>

                                        <td>
                                        <?php if(($value['state']) == "0"): ?>新订单<?php endif; ?>  
                                        <?php if(($value['state']) == "1"): ?>已发货<?php endif; ?>  
                                        <?php if(($value['state']) == "2"): ?>已完成<?php endif; ?>  
                                        <?php if(($value['state']) == "3"): ?>无效订单<?php endif; ?>  
                                        </td>
                                        <td>
                                        <a href="/watch_shop/index.php/Admin/Orderdetails/sele?id=<?php echo ($value['uid']); ?>&name=<?php echo ($value['name']); ?>" target="_self">订单详情</a>
                                        
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
<!--         <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
    </body>
</html>