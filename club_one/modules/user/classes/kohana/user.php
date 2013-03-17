<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * User authorization library. Handles user login and logout, as well as secure
 * password hashing.
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2010 Kohana Team
 * @license    http://kohanaframework.org/license
 */
abstract class Kohana_User {

	// Auth instances
	protected static $_instance;

	/**
	 * Singleton pattern
	 *
	 * @return Auth
	 */
	public static function instance()
	{
		if ( ! isset(User::$_instance))
		{
			// Load the configuration for this type
			$config = Kohana::$config->load('user');

			if ( ! $type = $config->get('driver'))
			{
				$type = 'file';
			}

			// Set the session class name
			$class = 'User_'.ucfirst($type);

			// Create a new session instance
			User::$_instance = new $class($config);
		}

		return User::$_instance;
	}

	protected $_session;

	protected $_config;

	/**
	 * Loads Session and configuration options.
	 *
	 * @return  void
	 */
	public function __construct($config = array())
	{
		// Save the config in the object
		$this->_config = $config;

		$this->_session = Session::instance($this->_config['session_type']);
	}

	abstract protected function _login($username, $password, $remember);

	abstract public function password($username);

	abstract public function check_password($password);

	/**
	 * Gets the currently logged in user from the session.
	 * Returns NULL if no user is currently logged in.
	 *
	 * @return  mixed
	 */
	public function get_user($default = NULL)
	{
		return $this->_session->get($this->_config['session_key'], $default);
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
		if (empty($password))
			return FALSE;

		return $this->_login($username, $password, $remember);
	}

	/**
	 * Log out a user by removing the related session variables.
	 *
	 * @param   boolean  completely destroy the session
	 * @param   boolean  remove all tokens for user
	 * @return  boolean
	 */
	public function logout($destroy = FALSE, $logout_all = FALSE)
	{
		if ($destroy === TRUE)
		{
			// Destroy the session completely
			$this->_session->destroy();
		}
		else
		{
			// Remove the user from the session
			$this->_session->delete($this->_config['session_key']);

			// Regenerate session_id
			$this->_session->regenerate();
		}

		// Double check
		return ! $this->logged_in();
	}

	/**
	 * Check if there is an active session. Optionally allows checking for a
	 * specific role.
	 *
	 * @param   string   role name
	 * @return  mixed
	 */
	public function logged_in($role = NULL)
	{
		return (bool)($this->get_user() !== NULL);
	}

	/**
	 * Creates a hashed hmac password from a plaintext password. This
	 * method is deprecated, [User::hash] should be used instead.
	 *
	 * @deprecated
	 * @param   string  plaintext password
	 */
	public function hash_password($password)
	{
		return $this->hash($password);
	}

	/**
	 * Perform a hmac hash, using the configured method.
	 *
	 * @param   string  string to hash
	 * @return  string
	 */
	public function hash($str)
	{
		if ( ! $this->_config['hash_key'])
			throw new Kohana_Exception('A valid hash key must be set in your auth config.');

		return hash_hmac($this->_config['hash_method'], $str, $this->_config['hash_key']);
	}

	protected function complete_login($user)
	{
		// Regenerate session_id
		$this->_session->regenerate();

		// Store username in session
		$this->_session->set($this->_config['session_key'], $user);

		return TRUE;
	}
	
	function set_role($role, $language_id = 0)
	{
		$this->_session->set($this->_config['session_key'].'_role_'.$language_id, $role);
	}
	protected function _get_role($language_id = 0, $default = NULL)
	{
		return $this->_session->get($this->_config['session_key'].'_role_'.$language_id, $default);
	}
	
	
	/**
	 * Bind language for the orm data
	 *
	 * @param   string  completely destroy the session
	 * @param	array   remove all tokens for user
	 * @param	int     remove all tokens for user
	 * @return  array
	 */
	public static function bind_language($model_name, $data, $language_id = 0)
	{
		if ($language_id == 0) return $data;
		
		if (method_exists($data, 'pk'))
		{
			$orm = ORM::factory($model_name . '_language');					
			$data_lang = $orm->where($orm->foreign_key(), '=', $data->pk())
			           ->where('language_id', '=', $language_id)
					   ->find()
					   ->as_array();
			
			if ($data_lang[$orm->primary_key()] != '')
			{
				foreach ($data_lang as $key => $value)
				{
					if ($key != $orm->primary_key() && isset($data->$key))
					{
						$data->$key = $value;
					}
				}
			}
		}
		else
		{
			$pks = array();
			foreach ($data as $v)
			{
				$pks[] = $v->pk();
			}
			
			$orm = ORM::factory($model_name . '_language');
			$data_lang = $orm->where($orm->foreign_key(), 'in', $pks)
							 ->where('language_id', '=', $language_id)
							->find_all()
							->as_array($orm->foreign_key());
			$new_data = array();
			foreach ($data as $k => $v)
			{
				if (isset($data_lang[$v->pk()]))
				{
					$l = $data_lang[$v->pk()]->as_array();
					foreach ($l as $key => $value)
					{
						if ($key != $v->primary_key() && isset($v->$key))
						{
							$v->$key = $value;							
						}
					}
				}
				$new_data[$k] = $v;
			}
			$data = $new_data;
		}
		return $data;	
	}

} // End Auth
