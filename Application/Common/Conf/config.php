<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'   => 'pdo', // 数据库类型
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '962464', // 密码
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_DSN'    => 'mysql:host=localhost;dbname=watch;charset=UTF8;', // PDO连接数据库DSN

	// 打开调试窗
	'SHOW_PAGE_TRACE' =>  true,
	/* 邮件系统配置 */
	// smtp服务器的名称
	'MAIL_HOST' =>'smtp.ym.163.com',
	//启用smtp认证
    'MAIL_SMTPAUTH' =>TRUE, 
    // smtp服务器用户名
    'MAIL_USERNAME' =>'kimi_zhang@hlts.pub',
    // 发送邮件的管理员地址
    'MAIL_FROM' =>'kimi_zhang@hlts.pub',
    // 发件人签名
    'MAIL_FROMNAME'=>'致一科技管理团队',
    // 管理员邮箱密码
    'MAIL_PASSWORD' =>'flzx_3QC',
    // 设置邮件编码
    'MAIL_CHARSET' =>'utf-8',
    // 是否HTML格式邮件 TRUE: HTML格式; FALSE: TXT格式
    'MAIL_ISHTML' => TRUE,
    /* 邮件系统配置结束 */
    // 设置默认时区
    'DEFAULT_TIMEZONE' => 'PRC',
);