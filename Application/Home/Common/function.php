<?php

	/************************************************************
     * 函数名称: sendMail
     * 函数功能: 发送电子邮件
     * 形参列表: $to 目的地址 $title 邮件标题  $content 邮件内容
     * 返 回 值: TRUE 发送成功  FALSE 发送失败
     * E - mail: kimi_zhang@hlts.pub
     ************************************************************/

    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailerAutoload'); 
        //实例化    
        $mail = new PHPMailer();
        // 启用SMTP
        $mail -> IsSMTP();
        // SMTP服务器的名称
        $mail -> Host = C('MAIL_HOST');
        // 启用SMTP认证
        $mail -> SMTPAuth = C('MAIL_SMTPAUTH');
        // SMTP服务器用户名
        $mail -> Username = C('MAIL_USERNAME');
        // 管理员邮箱的密码
        $mail -> Password = C('MAIL_PASSWORD');
        // 发件人地址(管理员邮箱)
        $mail -> From = C('MAIL_FROM');
        // 发件人签名
        $mail -> FromName = C('MAIL_FROMNAME');
        // 收件人签名
        $mail -> AddAddress($to,"尊敬的客户");
        // 设置每行字符长度
        $mail -> WordWrap = 50;
        // 是否HTML格式邮件 TRUE: HTML格式; FALSE: TXT格式
        $mail -> IsHTML(C('MAIL_ISHTML'));
        // 设置邮件编码
        $mail -> CharSet=C('MAIL_CHARSET');
        // 邮件主题
        $mail -> Subject =$title;
        // 邮件正文内容
        $mail -> Body = $content;
        // 这是为了避免邮件正文不支持HTML的备用显示文字
        $mail -> AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端";
        // 返回邮件发送状态
        return($mail -> Send());
    }

    /************************************************************
     * 函数名称: displayFirst
     * 函数功能: 显示导航的父分类
     * 形参列表: 无
     * 返 回 值: $result 所有父分类的数组
     * E - mail: kimi_zhang@hlts.pub
     ************************************************************/
    function displayFirst() {
        $db = M('type');
        $result = $db -> where("`parid` = '0'") -> select();
        return $result;
    }
	
	/************************************************************
     * 函数名称: displaySeconed
     * 函数功能: 显示导航中父分类的子分类
     * 形参列表: 无
     * 返 回 值: $rows 所有子分类的数组
     * E - mail: kimi_zhang@hlts.pub
     ************************************************************/
    function displaySecond() {
        $db = M('type');
        $res = displayFirst();
        foreach($res as $list){
            $id = $list['pid'];
            $rows[] = $db -> where("`parid` = '{$id}'") -> select();
        }
        return $rows;
    }
    
    /*************************************************
     * 函数名称:  shopCartNum
     * 函数功能:  查询当前用户购物车购物数
     * 形参列表:  $id 用户id
     * 返  回  值:  $cartNum 用户购物数量
     * E - mail: admin@hlts.pub
     *************************************************/
    function shopCartNum($id){
        $db = M("cart");
        $cartNum = $db -> where("`uid` = '{$id}'") -> count();
        return $cartNum;
    }

    /*************************************************
     * 函数名称:  reduceStock
     * 函数功能:  减库存
     * 形参列表:  $pid 商品id  $dnum 减掉数量
     * 返  回  值: true 减库存成功 false 减库存失败
     * E - mail: admin@hlts.pub
     *************************************************/
    function reduceStock($pid, $dnum = 1) {
        $db = M('product');
        $result = $db -> where("`pid` = '{$pid}'") -> setDec('stock',$dnum);
        if($result) {
            return true;
        }else {
            return false;
        }
    }
    
    /*************************************************
     * 函数名称: webConfig
     * 函数功能: 加载网站配置
     * 形参列表: 无
     * 返  回  值: $result 网站配置
     * E - mail: admin@hlts.pub
     *************************************************/
    function webConfig() {
        $db = M('webconfig');
        $result = $db -> find();
        return $result;
    }