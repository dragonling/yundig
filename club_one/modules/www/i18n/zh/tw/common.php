<?php defined('SYSPATH') or die('No direct script access.');

	//---------- 文字信息 ----------//
	$_common['text_home']       = '首页';	
	$_common['text_admin_system']  = '后台管理系统';
	$_common['text_greetings']  = '您好  <font color=blue>:username</font>, 当前身份  <font color=blue>:role_name</font>';	
	$_common['text_controller'] = '操作';	
	$_common['text_append']     = '新增';	
	$_common['text_edit']       = '编辑';	
	$_common['text_delete']     = '删除';	
	$_common['text_root']       = '根节点';	
	$_common['text_all']        = '全部';	
	$_common['text_select_route']      = '选择路由...';	
	$_common['text_select_module']     = '选择模型...';	
	$_common['text_select_dir']        = '选择目录...';	
	$_common['text_select_controller'] = '选择控制器...';	
	$_common['text_select_action']     = '选择方法...';	
	$_common['text_default_language']  = '预设';
	$_common['msg_feeback_success']    = '发送成功！';
	$_common['msg_feeback_fail']       = '错误: Email 和 内容不能为空';
	
	//---------- 成功信息 ----------//
	$_common['suc_clear_cache'] = '清除缓存成功';
	
	//---------- 提示信息 ----------//
	$_common['alt_iebrowser']  = '不支持IE6浏览器 建议使用IE9 Firefox or Chrome';
	$_common['alt_edit']       = '编辑';
	$_common['alt_delete']     = '删除';
	$_common['alt_required']     = '必填';
	$_common['alt_update_success']     = '更新完成!';
	$_common['alt_comfirn_delete']     = '确定删除？ 删除后将无法恢复!';
	$_common['alt_toggle_success']     = '状态更新成功';
	$_common['alt_toggle_fail']        = '状态更新失败';
	

	//---------- 错误提示信息 ----------//
	$_common['err_input_param']        = '传入参数错误';
	$_common['err_duplicate']		   = '<b>:column</b> : <font color="red">:value</font> 已经存在';
	
	//----------   按钮  ----------//
	$_common['btn_append']      = '新增';
	$_common['btn_select_all']  = '全选';
	$_common['btn_save']        = '保存';
	$_common['btn_reset']       = '重置';
	$_common['btn_close']       = '关闭';
	$_common['btn_refresh']     = '刷新';
	$_common['btn_back']	    = '返回';
	$_common['btn_delete']	    = '删除';
	$_common['btn_remove']	    = '删除';
	$_common['btn_lot_delete']  = '批量删除';
	$_common['alt_confirm_lot_delete']  = '确定批量删除？';
	
	$_common['data_status'] = array(0 => '停用', 1 => '启用');
	return $_common;