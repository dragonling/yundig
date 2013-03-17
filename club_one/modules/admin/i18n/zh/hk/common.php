<?php defined('SYSPATH') or die('No direct script access.');

	//---------- 文字信息 ----------//
	$_common['text_home']       = '首頁';	
	$_common['text_admin_system']  = '后臺管理系統';
	$_common['text_greetings']  = '你好  <font color=blue>:username</font>, 當前身份  <font color=blue>:role_name</font>';	
	$_common['text_controller'] = '操作';	
	$_common['text_append']     = '新增';	
	$_common['text_edit']       = '編輯';	
	$_common['text_delete']     = '刪除';	
	$_common['text_root']       = '根節點';	
	$_common['text_all']        = '全部';	
	$_common['text_select_route']      = '選擇路由...';	
	$_common['text_select_module']     = '選擇模型...';	
	$_common['text_select_dir']        = '選擇目錄...';	
	$_common['text_select_controller'] = '選擇控制器...';	
	$_common['text_select_action']     = '選擇方法...';	
	$_common['text_default_language']  = '預設';
	
	//---------- 成功信息 ----------//
	$_common['suc_clear_cache'] = '清除緩存成功';
	
	//---------- 提示信息 ----------//
	$_common['alt_iebrowser']  = '不支持IE6以下瀏覽器 建議使用IE9 Firefox or Chrome';
	$_common['alt_edit']       = '編輯';
	$_common['alt_delete']     = '刪除';
	$_common['alt_required']     = '必填';
	$_common['alt_update_success']     = '更新完成';
	$_common['alt_comfirn_delete']     = '確定刪除？ 刪除后無法修復!';
	$_common['alt_toggle_success']     = '狀態更新成功';
	$_common['alt_toggle_fail']        = '狀態更新失敗';
	

	//---------- 错误提示信息 ----------//
	$_common['msg_cannot_modify']      = '不能修改/刪除';
	$_common['err_input_param']        = '傳入參數錯誤';
	$_common['err_duplicate']		   = '<b>:column</b> : <font color="red">:value</font> 已經存在';
	
	//----------   按钮  ----------//
	$_common['btn_append']      = '新增';
	$_common['btn_select_all']  = '全選';
	$_common['btn_save']        = '保存';
	$_common['btn_reset']       = '重置';
	$_common['btn_close']       = '關閉';
	$_common['btn_refresh']     = '刷新';
	$_common['btn_back']	    = '返回';
	$_common['btn_return']	    = '返回';
	$_common['btn_pick']	    = '選擇';
	$_common['btn_delete']	    = '刪除';
	$_common['btn_remove']	    = '刪除';
	$_common['btn_lot_delete']  = '批量刪除';
	$_common['alt_confirm_lot_delete']  = '確定批量刪除?';
	
	$_common['data_target'] = array('_self' => '本窗口', '_blank' => '新窗口', '_iframe' => 'iFrame', '_ajax' => 'Ajax');
	$_common['data_status'] = array(0 => '停用', 1 => '啟用');
	$_common['data_yes_no'] = array(0 => '否', 1 => '是');
	$_common['data_on_down'] = array(0 => '下線', 1 => '上線');
	return $_common;