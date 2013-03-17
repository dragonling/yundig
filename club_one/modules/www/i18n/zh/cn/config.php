<?php defined('SYSPATH') or die('No direct script access.');

	//---------- 权限资源集 ----------//
	
	$_lang['data_config_types']   = array('core' => '核心设置', 'site' => '一般设置', 'email' => '邮件发送设置');
	
	$_lang['column_site_name']        = '网站名';
	$_lang['column_site_title']       = '首页标题';
	$_lang['column_site_logo']        = '网站LOGO';
	$_lang['column_site_keywords']    = '首页关键词';
	$_lang['column_site_description'] = '首页简述';
	$_lang['column_site_beian']       = '备案号';
	$_lang['column_site_copyright']   = '版权信息';
	
	$_lang['column_admin_email'] = '管理员Email';
	$_lang['column_site_open']   = '网站打开还是关闭';
	$_lang['column_colse_why']   = '关闭原因';
	$_lang['column_site_style']  = '网站默认风格';
	$_lang['column_rewrite']     = '是否使用伪静态';
	$_lang['column_upload_dir']  = '上传附件目录';
	$_lang['column_debug']       = '调试模式';
	
	$_lang['column_mail_type']     = '邮件发送模式';
	$_lang['column_smtp_host']     = 'SMTP 服务器';
	$_lang['column_smtp_port']     = 'SMTP 端口,一般是25';
	$_lang['column_smtp_account']  = '邮箱帐号';
	$_lang['column_smtp_password'] = '邮箱密码';
	
	$_lang['data_open_close'] = array('1' => '开放', '0' => '关闭');
	$_lang['data_rewrite']    = array('1' => '是', '0' => '否');
	$_lang['data_mail_types'] = array('mail' => 'mail', 'smtp' => 'smtp');
	
	return $_lang;