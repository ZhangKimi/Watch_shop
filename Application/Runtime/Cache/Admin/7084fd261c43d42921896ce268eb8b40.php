<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 商品分类</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico"> 
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
		        <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <!-- Data Tables -->
        <link href="/watch_shop/Public/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
			<script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
             <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>删除子类别</h5>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>分类id</th>
                                        <th style="text-align:left;">分类名称</th>
                                        <th>分类id号</th>
                                        <th>分类路径</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="gradeX">
                                        <td><?php echo ($value['pid']); ?></td>
										<td><?php echo ($value['name']); ?></td>
										<td><?php echo ($value['parid']); ?></td>
										<td><?php echo ($value['path']); ?></td>
								    </tr><?php endforeach; endif; ?>	
										<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
											<td align="center"><?php echo ($vo["pid"]); ?></td>
											<td align="left">┣ <?php echo ($vo["name"]); ?></td>
											<td align="center"><?php echo ($vo["parid"]); ?></td>
											<td align="center"><?php echo ($vo["path"]); ?></td>
											<td align="center"></td>
										  </tr>
											  <!--子分类-->
											  <?php $_result=SidType($vo['pid']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr" id="del<?php echo ($vo["pid"]); ?>">
												  <td align="center"><?php echo ($vo["pid"]); ?></td>
												  <td align="left">┗━ <?php echo ($vo["name"]); ?></td>
												  <td align="center"><?php echo ($vo["parid"]); ?></td>
												  <td align="center"><?php echo ($vo["path"]); ?></td>
													<td align="center">
	
													<a href="#" target="_self" tpl="<?php echo ($vo["pid"]); ?>" onclick="return false;" title="删除该分类">删除</a> 

													</td>
												</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

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
		<!-- 删除点击特效 -->
            $("a[tpl]").click(function () {
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
                            url: "/watch_shop/index.php/Admin/typedel/dell",
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
		
		
		
		
		
		
		
            $(document).ready(function(){
                // $(".dataTables-example").dataTable();
                var oTable=$("#editable").dataTable();
                oTable.$("td").editable(
                    "../example_ajax.php",
                    {
                        "callback":function(sValue,y){
                            var aPos=oTable.fnGetPosition(this);
                            oTable.fnUpdate(sValue,aPos[0],aPos[1])
                        },

                        "submitdata":function(value,settings){
                            return{
                                "row_id":this.parentNode.getAttribute("id"),
                                "column":oTable.fnGetPosition(this)[2]
                            }
                        },
                        "width":"90%","height":"100%"
                    }
                )
            });

			function fnClickAddRow(){
                $("#editable").dataTable().fnAddData(
                    [
                        "Custom row",
                        "New row",
                        "New row",
                        "New row",
                        "New row"
                    ]
                )
            };
			
			
        </script>
        <!-- <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
    </body>
</html>