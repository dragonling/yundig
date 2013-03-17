<?php defined('SYSPATH') or die('No direct script access.');

	//---------- 文字信息 ----------//
	$_lang['text_home']       = '首頁';	
	$_lang['text_admin_system']  = '后臺管理系統';
	$_lang['text_greetings']  = '你好  <font color=blue>:username</font>, 當前身份  <font color=blue>:role_name</font>';	
	$_lang['text_controller'] = '操作';	
	$_lang['text_append']     = '新增';	
	$_lang['text_edit']       = '編輯';	
	$_lang['text_delete']     = '刪除';	
	$_lang['text_root']       = '根節點';	
	$_lang['text_all']        = '全部';	
	$_lang['text_bind_catalog']      = '綁定目錄';	
	$_lang['text_select_route']      = '選擇路由...';	
	$_lang['text_select_module']     = '選擇模型...';	
	$_lang['text_select_dir']        = '選擇目錄...';	
	$_lang['text_select_controller'] = '選擇控制器...';	
	$_lang['text_select_action']     = '選擇方法...';	
	$_lang['text_default_language']  = '預設';
	
	//---------- 成功信息 ----------//
	$_lang['suc_clear_cache'] = '清除緩存成功';
	
	//---------- 提示信息 ----------//
	$_lang['alt_iebrowser']  = '不支持IE6以下瀏覽器 建議使用IE9 Firefox or Chrome';
	$_lang['alt_edit']       = '編輯';
	$_lang['alt_delete']     = '刪除';
	$_lang['alt_required']     = '必填';
	$_lang['alt_update_success']     = '更新完成';
	$_lang['alt_comfirn_delete']     = '確定刪除？ 刪除后無法修復!';
	$_lang['alt_toggle_success']     = '狀態更新成功';
	$_lang['alt_toggle_fail']        = '狀態更新失敗';
	

	//---------- 错误提示信息 ----------//
	$_lang['msg_cannot_modify']      = '不能修改/刪除';
	$_lang['err_input_param']        = '傳入參數錯誤';
	$_lang['err_duplicate']		   = '<b>:column</b> : <font color="red">:value</font> 已經存在';
	$_lang['alt_confirm_lot_delete']  = '確定批量刪除?';
	
	//----------   按钮  ----------//
	$_lang['btn_append']      = '新增';
	$_lang['btn_select_all']  = '全選';
	$_lang['btn_save']        = '保存';
	$_lang['btn_reset']       = '重置';
	$_lang['btn_close']       = '關閉';
	$_lang['btn_refresh']     = '刷新';
	$_lang['btn_back']	    = '返回';
	$_lang['btn_return']	    = '返回';
	$_lang['btn_pick']	    = '選擇';
	$_lang['btn_delete']	    = '刪除';
	$_lang['btn_remove']	    = '刪除';
	$_lang['btn_lot_delete']  = '批量刪除';
	
	//----------   数组数据  ----------//
	$_lang['option_plases_select']  = '請選擇...';
	
	
	
	//----------   数组数据  ----------//
	$_lang['data_target'] = array('_self' => '本窗口', '_blank' => '新窗口', '_iframe' => 'iFrame', '_ajax' => 'Ajax');
	$_lang['data_status'] = array(0 => '停用', 1 => '啟用');
	$_lang['data_yes_no'] = array(0 => '否', 1 => '是');
	$_lang['data_on_down'] = array(0 => '下線', 1 => '上線');
	$_lang['data_config_types']   = array('core' => '核心設置', 'base' => '一般設置', 'email' => '郵件發送設置');
	$_lang['data_types']     = array(1 => '目錄節點', 2 => '列表', 3 => '操作/功能');
	$_lang['data_status']    = array(0 => '停用', 1 => '啟用');
	$_lang['data_save_return']    = array('request_referrer' => '上一頁', 'list' => '列表頁', 'self' => '本頁');
	
	//---------- 权限资源集 ----------//
	$_lang['right_name']     = '權限名';
	$_lang['parent_section'] = '父節點';
	$_lang['right_type']     = '類型';
	$_lang['right_status']   = '狀態';
	$_lang['text_sort']      = '排序';
	$_lang['right_sets']     = '權限集合';
	$_lang['right_append']   = '添加權限';
	$_lang['right_code']     = '權限';
	$_lang['text_save_return']  = '保存后返回';
	
	
	return $_lang;