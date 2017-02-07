<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 商品分类</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico"> 
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <!-- Data Tables -->
        <link href="/watch_shop/Public/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
		<style>
		.error{
				border: 2px color #F00 !important;
				<!-- border: 2px solid #F00 !important; -->
				}
				
		.success{
				border: 2px solid #B0E11E !important;
				}

		</style>
		
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
             <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>修改类别</h5>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
		<script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/plugins/jeditable/jquery.jeditable.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="/watch_shop/Public/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
                                <thead>
                                    <tr>
                                        <th>分类id</th>
                                        <th style="text-align:left;">分类名称</th>
                                        <th>分类id号</th>
                                        <th>分类路径</th>
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
											<td align="center" as="as"><?php echo ($vo["pid"]); ?></td>
											<td align="left">
<input class="form-control" type="text" asd="11" required="" name="name" value="<?php echo ($vo["name"]); ?>">
											</td>
											<td align="center"><?php echo ($vo["parid"]); ?></td>
											<td align="center"><?php echo ($vo["path"]); ?></td>	
										  </tr>
											  <!--子分类-->
											  <?php $_result=SidType($vo['pid']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
												  <td align="center"><?php echo ($vo["pid"]); ?></td>
												  <td align="left">
<input class="form-control" type="text" ad="<?php echo ($vo["pid"]); ?>" required="" name="name" value="<?php echo ($vo["name"]); ?>">
												  </td>
												  <td align="center"><?php echo ($vo["parid"]); ?></td>
												  <td align="center"><?php echo ($vo["path"]); ?></td>
												</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
			<!-- js 父-->
	<script type="text/javascript">
	
		var old = null;
			$(function(){
				// 父判断修改部分 $("div[asd]")
				$("input[asd]").focus(function(){
					old = $(this).val();
				});
				
				$("input[asd]").blur(function(){

					if($(this).val() == ""){
					
						$(this).addClass('error');
						$(this).removeClass('success');
						$(this).attr("placeholder", "类别不可以为空");

					}else {
							$(this).addClass('success');
							$(this).removeClass('error');
							<!-- AJax -->
							$.ajax({
								url: '/watch_shop/index.php/Admin/Typeedit/edit',
								type: 'POST',
								dataType: 'text',
								data: {name: $(this).val() , oldname: old,,
								dataFilter:function(data){
									return data;
								},
								success:function(data){
									switch(data) {
										case '1':
											$(this).addClass('error');
											$(this).removeClass('success');
											
											userflag = false;
											break;
										case '0':

											$(this).addClass('success');

											userflag = true;
											break;
									}
								},
							});
								
						}
					});
			});
	</script>	

			<!-- js 子-->
	<script type="text/javascript">
	
		var old = null;
			$(function(){
				// 父判断修改部分 $("div[ad]")
				$("input[ad]").focus(function(){
					old = $(this).val();
				});
				
				$("input[ad]").blur(function(){

					if($(this).val() == ""){
					
						$(this).addClass('error');
						$(this).removeClass('success');
						$(this).attr("placeholder", "类别不可以为空");

					}else {
							$(this).addClass('success');
							$(this).removeClass('error');
							<!-- AJax -->
							$.ajax({
								url: '/watch_shop/index.php/Admin/Typeedit/edit',
								type: 'POST',
								dataType: 'text',
								data: {name: $(this).val() , oldname: old},
								dataFilter:function(data){
									return data;
								},
								success:function(data){
									switch(data) {
										case '1':
											$(this).addClass('error');
											$(this).removeClass('success');
											
											userflag = false;
											break;
										case '0':

											$(this).addClass('success');

											userflag = true;
											break;
									}
								},
							});
								
						}
					});
			});
	</script>			
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <script>
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