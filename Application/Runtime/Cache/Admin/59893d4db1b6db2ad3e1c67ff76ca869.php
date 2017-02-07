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
          <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
            <script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>会员订单删除</h5>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <!-- <th>商品id</th> -->
                                        <th>用户id</th>
                                        <th>联系人</th>
                                        <th>订单号</th>
                                        
                                        <th>收货地址</th>
                                        <th>下单时间</th>
                                        <th>发货时间</th>
                                        <th>查看</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="gradeX">
                                        <!-- <td><?php echo ($value['gid']); ?></td> -->
                                        <td><?php echo ($value['uid']); ?></td>
                                        <td><?php echo ($value['name']); ?></td>
                                        <td><?php echo ($value['ordernumber']); ?></td>
                                        
                                        <td class="center"><?php echo ($value['addr']); ?></td>
                                        <td class="center"><?php echo ($value['paytime']); ?></td>
                                        <td class="center"><?php echo ($value['leavetime']); ?></td>
                                        <td>
                                        <a href="" tpl="<?php echo ($value['id']); ?>" id="del" onclick="return false;" target="_self">删除</a>
                                        
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
        <script>
            $('a[tpl]').click(function(){
                var id = $(this).attr("tpl");
                swal({
                    title:"您确定要删除该分类吗",
                    text:"删除后将无法恢复，请谨慎操作！",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要删除！",
                    cancelButtonText:"让我再考虑一下…",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },function(isConfirm){
                    if(isConfirm){
                        // swal(id,"success");
                        $.ajax({
                            url: "/watch_shop/index.php/Admin/Orderdel/del",
                            type: 'POST',
                            dataType: 'text',
                            data: {id: id},
                            dataFilter:function(data){
                                return data;
                            },
                            success:function(data){
                                switch(data) {
                                    case "1":
                                        swal("删除成功！","您已经永久删除了这条信息。","success");
                                        $("#del"+id).remove();
                                        hearder('Location.href');
                                        break;
                                    case "0":
                                        swal("删除失败！","请刷新后重试。","error");
                                        break;
                                }
                            },
                            error:function(){
                                swal("网络不给力！","网络不给力 , 请检查网络设置。","error");
                            }
                        });
                    }else{
                        swal("已取消","您取消了删除操作！","error");
                    }
                })
            });
        </script>
        <!-- <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
    </body>
</html>