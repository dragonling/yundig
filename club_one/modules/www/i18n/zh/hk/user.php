<?php defined('SYSPATH') or die('No direct script access.');

	//---------- 文字信息 ----------//
	$_login['text_login']    = '登錄';
	$_login['text_username'] = '帳  戶';
	$_login['text_password'] = '密  碼';
	$_login['text_email']    = 'Email';	
	$_login['text_remover']  = '记录登录信息';
	$_login['text_autologin']  = 'Auto Login';
	$_login['text_forgot_password']  = '找回密碼';
	
	$_login['text_logout']    = '退出';
	
	//----------   按钮  ----------//
	$_login['btn_login']   = '登錄';
	$_login['btn_send']    = '發送';
	$_login['btn_submit']  = '提交';
	$_login['btn_back']    = '返回';
	$_login['btn_forgot_password'] = '找回密碼？';
	
	//---------- 错误信息 ----------//
	$_login['err_login']     = '認證失敗';
	$_login['err_auth']      = '對不起你的權限不夠';
	
	//---------- 成功信息 ----------//
	$_login['suc_login']  = '';
	$_login['suc_logout'] = '成功退出';
	
	//---------- 提示信息 ----------//
	$_login['alt_enter_username']  = '請輸入帳戶';
	$_login['alt_enter_password']  = '請輸入密碼';
	$_login['alt_enter_email']     = '請輸入Email';
	
	//---------- 數組信息 ----------//
	$_login['data_gender']      = array(1 => '男', 0 => '女');
	$_login['data_marriage']    = array(0 => '未婚', 1 => '已婚');
	$_login['data_county']      = array(0 => '請選擇', 1 => '九龍', 2 => '油麻地');
	$_login['data_education']   = array(0 => '請選擇', 1 => '小学', 2 => '中学', 3 => '大学');
	$_login['data_profession']  = array(0 => '請選擇', 1 => 'CEO', 2 => 'CTO', 3 => 'COO');
	$_login['data_income']      = array(0 => '請選擇', 1 => '少于10000', 2 => '10000~50000', 3 => '50000~100000');
	$_login['data_family_income']    = array(0 => '請選擇', 1 => '少于10000', 2 => '10000~50000', 3 => '50000~100000');
	return $_login;