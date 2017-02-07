<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 注册</title>


    <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
    <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    <!--<script>if(window.top !== window.self){ window.top.location = window.location;}</script>-->

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">ZY</h1>

            </div>
            <h3>亲爱的管理员 ^_^</h3>
            <p>请您创建一个ZY子分类</p>
			
			    <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
				<script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
				<script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
			
            <form class="m-t" role="form" action="/watch_shop/index.php/Admin/Typeadd/add" method="post" target="_self">
			

			
			<!-- 父分类下拉 -->
				<label>父分类</label> 
				<select class="form-control" name="parid"><?php echo ($option); ?></select>
			
				<!-- <?php if(is_array($list)): foreach($list as $key=>$value): ?>-->
				
				<!-- <option value="<?php echo ($value['pid']); ?>" >┣ <?php echo ($value['name']); ?></option>  -->
				
				
		
				<!--<?php endforeach; endif; ?> -->
				<!-- </select>  -->
			<!-- 添加隐藏域 -->
						<!-- <input type = "hidden" name = "parid" value = "<?php echo ($info['parid']); ?>"> -->
						<input type = "hidden" name="pid" value = "<?php echo ($info['pid']); ?>">
						<input type = "hidden" name="path">
			
                <div class="form-group" >
<input type="text" class="form-control" placeholder="请输入子类名" required="" name="name" value="<?php echo ($info['name']); ?>">
                </div>
                
<!-- 			<script type="text/javascript">
				$("input[type='text']").change( function() {
								  if($("#box").val() == ""){
					
									}
								});
			</script> -->
				
                <button type="submit" class="btn btn-primary block full-width m-b">提 交</button>

                

            </form>

			
        </div>
    </div>

	
	
	
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <!-- <script type="text/javascript" src="/watch_shop/Public/admin/js/stats.js" charset="UTF-8"></script> -->
</body>

</html>