<?php
/**
 * 
 * 后台Admin登陆验证
 * @author Shunnar
 *
 */
class Common_Auth{
	
	protected static $_instance;
	
	protected $_session;
	
	public function __construct($config = array())
	{
		// Save the config in the object
		$this->_config = array('session_key'=>'adminsessions',
							   'session_type'=>'native',							
		);

		$this->_session = Session::instance($this->_config['session_type']);
	}
	
	/**
	 * 
	 * 实例化Auth方法
	 */
	public static function instance()
	{
		if ( ! isset(Common_Auth::$_instance))
		{
			Common_Auth::$_instance = new Common_Auth;
		}

		return Common_Auth::$_instance;
	}
	
	/**
	 * Attempt to log in a user by using an ORM object and plain-text password.
	 *
	 * @param   string   username to log in
	 * @param   string   password to check against
	 * @param   boolean  enable autologin
	 * @return  boolean
	 */
	public function login($username, $password, $remember = FALSE)
	{
		if (empty($password) || empty($username))
			return FALSE;

		return $this->_login($username, $password, $remember);
	}
	
	
	public function get_user()
	{
		return $this->_session->get($this->_config['session_key'],NULL);
	}
	public function logged_in($role = NULL)
	{
		return ($this->get_user() !== NULL);
	}
	
	protected function _login($username, $password, $remember)
	{
		if (is_string($password))
		{
			// Create a hashed password
			$password = $this->encryt($password);
		}
		
		$username = trim($username);
		$user = ORM::factory('admin_user');
		$user->where('username', '=', $username)->find();
		
		if (isset($user->username) AND $user->password === $password)
		{
			// Complete the login
			$this->_session->set($this->_config['session_key'], $username);
			$user->last_login = time();
			$user->save();
			return TRUE;
		}

		// Login failed
		return FALSE;
	}
	
	private function encryt($str)
	{
		return md5($str);
	}
	/**
	 * Compare password with original (plain text). Works for current (logged in) user
	 *
	 * @param   string  $password
	 * @return  boolean
	 */
	public function check_password($password)
	{
		$username = $this->get_user();

		if ($username === FALSE)
		{
			return FALSE;
		}

		return ($password === $this->password($username));
	}
}