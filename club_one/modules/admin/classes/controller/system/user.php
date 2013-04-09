<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  admin user manager
 *
 * @package    Kohana/Admin
 * @category   Controllers
 * @author     Dragon
 */

class Controller_System_User extends Controller_Admin{
	
	function before()
	{		
		$this->_model_name = "admin_user";	
		parent::before();
	}
	
	/**
	 * 自定义显示列信息
	 * @see Controller_Admin::columns()
	 * @example
 	    $data =  parent::columns($data);
		$data['tid']['func'] = "md5";
		$data['tid']['name'] = "字段中文";
		$data['id']['desc'] = "字段的注释部分";
		return $cols;
	 */
	function list_columns($data)
	{
		$data = parent::list_columns($data);

		$data['role_id']['func'] = 'role_name';
		$data['last_login']['func'] = 'last_login';
		$data['status']['func'] = 'toggle';

		unset($data['password']);
		unset($data['logins']);
		unset($data['created']);
		unset($data['modified']);
		unset($data['failed_login_count']);
		unset($data['reset_token']);
	
		return $data;	
	}
	
	function action_save()
	{
		
		//初始化 model配置
		$this->init();
		
		//获取 POST数据
		$data = $this->request->post();
		
		//因为需要兼容Add 与 Edit操作   为 Add操作默认pk为NULL
		$data[$this->pk] = isset($data[$this->pk]) ? $data[$this->pk] : NULL;
		
		$primary_key = $data[$this->pk];
		
		$orm = ORM::factory($this->_model_name, $primary_key);
		
		if ($data['password'] == '')
		{
			unset($data['password']);
		}
		else
		{
			$data['password'] = Auth::instance()->hash($data['password']);
		}
		
		foreach($this->columns as $k=>$v)
		{
			isset($data[$v]) ? $orm->$v = $data[$v] : '';
		}
		
		$check = $this->check_unique(array('email' => $data['email'], 'username' => $data['username']), $primary_key);
		
		if (count($check) > 0)
		{
			$errors = array();
			foreach ($check as $column => $value)
			{
				$errors[] = __(I18n::get('err_duplicate', 'common'), array(':column' => $column, ':value' => $value));
			}
			Admin::error(implode($errors, '<br />'));
			return;
		}
		$orm->save();
		$orm->reload();
		$primary_key = $orm->pk();
	
		return $primary_key;
	}
	
	/**
	 * 改写默认表单基本信息
	 * @example
	 parent::blank_form_columns($col,TRUE); //ID在添加时是否显示
	 $data['ext']['validate']['rules'] = '{}';
	 $data['ext']['validate']['message'] = '{}';
	  
	 // type 采用 Select 表单 数据来源于 type_options 方法
	 $data['type']['field'] = Form::select("type",$this->type_options(),1);
	
	 * @see Controller_Admin::blank_form_columns()
	 */
	protected function blank_form_columns($col,$return_id=FALSE)
	{
		$data = parent::blank_form_columns($col,$return_id);


		$data['role_id']['field'] = Form::select("role_id", Common_Role::instance()->get_options(), 1);
		$data['password']['field'] = Form::password("password", '', array('class'=>'half normal'));
		$data['status']['field']   = Form::select('status', I18n::get('data_status', 'common'), 1);
		$data['created']['field'] = Form::input('created', '', array('class'=>'half normal','disabled'=>'disabled'));
		$data['modified']['field'] = Form::input('modified', '', array('class'=>'half normal','disabled'=>'disabled'));

		$data['logins']['field'] = Form::input('logins', 0, array('class'=>'half normal','disabled'=>'disabled'));
		$data['last_login']['field'] = Form::input('last_login', '', array('class'=>'half normal','disabled'=>'disabled'));
		$data['reset_token']['field'] = Form::input('reset_token', '', array('class'=>'half normal','disabled'=>'disabled'));
		$data['last_failed_login']['field'] = Form::input('last_failed_login', '', array('class'=>'half normal','disabled'=>'disabled'));
		$data['failed_login_count']['field'] = Form::input('failed_login_count', '', array('class'=>'half normal','disabled'=>'disabled'));
		

		$data['created']['validate']['rules'] = '{required: false}';
		$data['modified']['validate']['rules'] = '{required: false}';
		$data['logins']['validate']['rules'] = '{required: false}';
		$data['last_login']['validate']['rules'] = '{required: false}';
		$data['reset_token']['validate']['rules'] = '{required: false}';
		$data['last_failed_login']['validate']['rules'] = '{required: false}';
		$data['failed_login_count']['validate']['rules'] = '{required: false}';
		return $data;
	}
	
	/**
	 * 改写默认表单编辑信息 基本数据继承 blank_form_columns 与 list_columns
	 * @example
	 $data = parent::full_form_columns($col,$orm);
	 $data['type']['field'] = Form::select("type",$this->type_options(),$orm->type); //转换成Select并赋值
	  
	 * @see Controller_Admin::full_form_columns()
	 */
	protected function full_form_columns($col,$orm=NULL)
	{
		$data =  parent::full_form_columns($col,$orm);
	
		
		$data['role_id']['field']  = Form::select("role_id", Common_Role::instance()->get_options(), $orm->role_id);
		$data['password']['field'] = Form::password("password", '', array('class'=>'half normal'));
		$data['status']['field']   = Form::select('status', I18n::get('data_status', 'common'), $orm->status);
		$data['created']['field'] = Form::input('created', $orm->created, array('class'=>'half normal','disabled'=>'disabled'));
		$data['modified']['field'] = Form::input('modified', $orm->modified, array('class'=>'half normal','disabled'=>'disabled'));

		$data['logins']['field'] = Form::input('logins', $orm->logins, array('class'=>'half normal','disabled'=>'disabled'));
		$data['last_login']['field'] = Form::input('last_login', self::last_login($orm), array('class'=>'half normal','disabled'=>'disabled'));
		$data['reset_token']['field'] = Form::input('reset_token', $orm->reset_token, array('class'=>'half normal','disabled'=>'disabled'));
		$data['last_failed_login']['field'] = Form::input('last_failed_login', $orm->last_failed_login, array('class'=>'half normal','disabled'=>'disabled'));
		$data['failed_login_count']['field'] = Form::input('failed_login_count', $orm->failed_login_count, array('class'=>'half normal','disabled'=>'disabled'));
		
		
		$data['password']['validate']['rules'] = '{required: false}';
		$data['created']['validate']['rules'] = '{required: false}';
		$data['modified']['validate']['rules'] = '{required: false}';
		$data['logins']['validate']['rules'] = '{required: false}';
		$data['last_login']['validate']['rules'] = '{required: false}';
		$data['reset_token']['validate']['rules'] = '{required: false}';
		$data['last_failed_login']['validate']['rules'] = '{required: false}';
		$data['failed_login_count']['validate']['rules'] = '{required: false}';
		
		return $data;
	}
	
	public static function role_name($obj, $id)
	{
		$role = Common_Role::instance()->get_role_by_id($obj->role_id);
		unset($obj);
		return $role->name;
	}
	
	public static function last_login($obj)
	{
		if ($obj->last_login == 0)
		{
			$last_login = '';
		}
		else
		{
			$last_login = date('Y-m-d H:i:s', $obj->last_login);
		}
		
		unset($obj);
		return $last_login;
	}
}