<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * ORM Auth driver.
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Auth_ORM extends Auth {

	/**
	 * Checks if a session is active.
	 *
	 * @param   mixed    $role Role name string, role ORM object, or array with role names
	 * @return  boolean
	 */
	public function logged_in($role = NULL)
	{
		// Get the user from the session
		$user = $this->get_user();

		if ( ! $user)
			return FALSE;

		if ($user instanceof Model_Auth_Admin_User AND $user->loaded())
		{
			// If we don't have a roll no further checking is needed
			if ( ! $role)
				return TRUE;

			if (is_array($role))
			{
				// Get all the roles
				$roles = ORM::factory('auth_admin_role')
							->where('name', 'IN', $role)
							->find_all()
							->as_array(NULL, 'id');

				// Make sure all the roles are valid ones
				if (count($roles) !== count($role))
					return FALSE;
			}
			else
			{
				if ( ! is_object($role))
				{
					// Load the role
					$roles = ORM::factory('auth_admin_role', array('name' => $role));

					if ( ! $roles->loaded())
						return FALSE;
				}
			}

			return $user->has('roles', $roles);
		}
	}

	/**
	 * Logs a user in.
	 *
	 * @param   string   username
	 * @param   string   password
	 * @param   boolean  enable autologin
	 * @return  boolean
	 */
	protected function _login($user, $password, $remember)
	{
		if ( ! is_object($user))
		{
			$username = $user;

			// Load the user
			$user = ORM::factory('auth_admin_user');
			$user->where($user->unique_key($username), '=', $username)->find();
		}
		if (is_string($password))
		{
			// Create a hashed password
			$password = $this->hash($password);
		}
		// If the passwords match, perform a login
		if ($user->password === $password)
		{
			if ($remember === TRUE)
			{
				// Token data
				$data = array(
					'admin_user_id'    => $user->id,
					'expires'    => time() + $this->_config['lifetime'],
					'user_agent' => sha1(Request::$user_agent),
				);

				// Create a new autologin token
				$token = ORM::factory('auth_admin_user_token')
							->values($data)
							->create();

				// Set the autologin cookie
				Cookie::set('authautologin', $token->token, $this->_config['lifetime']);
			}
			
			
			// Finish the login
			$this->complete_login($user);
			
			return TRUE;
		}

		// Login failed
		return FALSE;
	}
	/**
	 * Forces a user to be logged in, without specifying a password.
	 *
	 * @param   mixed    username string, or user ORM object
	 * @param   boolean  mark the session as forced
	 * @return  boolean
	 */
	public function force_login($user, $mark_session_as_forced = FALSE)
	{
		if ( ! is_object($user))
		{
			$username = $user;

			// Load the user
			$user = ORM::factory('auth_admin_user');
			$user->where($user->unique_key($username), '=', $username)->find();
		}

		if ($mark_session_as_forced === TRUE)
		{
			// Mark the session as forced, to prevent users from changing account information
			$this->_session->set('auth_forced', TRUE);
		}

		// Run the standard completion
		$this->complete_login($user);
	}

	/**
	 * Logs a user in, based on the authautologin cookie.
	 *
	 * @return  mixed
	 */
	public function auto_login()
	{
		if ($token = Cookie::get('authautologin'))
		{
			// Load the token and user
			$token = ORM::factory('auth_admin_user_token', array('token' => $token));

			if ($token->loaded() AND $token->user->loaded())
			{
				if ($token->user_agent === sha1(Request::$user_agent))
				{
					// Save the token to create a new unique token
					$token->save();

					// Set the new token
					Cookie::set('authautologin', $token->token, $token->expires - time());

					// Complete the login with the found data
					$this->complete_login($token->user);

					// Automatic login was successful
					return $token->user;
				}

				// Token is invalid
				$token->delete();
			}
		}

		return FALSE;
	}

	/**
	 * Gets the currently logged in user from the session (with auto_login check).
	 * Returns FALSE if no user is currently logged in.
	 *
	 * @return  mixed
	 */
	public function get_user($default = NULL)
	{
		$user = parent::get_user($default);

		if ( ! $user)
		{
			// check for "remembered" login
			$user = $this->auto_login();
		}

		return $user;
	}

	/**
	 * Log a user out and remove any autologin cookies.
	 *
	 * @param   boolean  completely destroy the session
	 * @param	boolean  remove all tokens for user
	 * @return  boolean
	 */
	public function logout($destroy = FALSE, $logout_all = FALSE)
	{
		// Set by force_login()
		$this->_session->delete('auth_forced');

		if ($token = Cookie::get('authautologin'))
		{
			// Delete the autologin cookie to prevent re-login
			Cookie::delete('authautologin');

			// Clear the autologin token from the database
			$token = ORM::factory('auth_admin_user_token', array('token' => $token));

			if ($token->loaded() AND $logout_all)
			{
				ORM::factory('auth_admin_user_token')->where('admin_user_id', '=', $token->admin_user_id)->delete_all();
			}
			elseif ($token->loaded())
			{
				$token->delete();
			}
		}

		return parent::logout($destroy);
	}

	/**
	 * Get the stored password for a username.
	 *
	 * @param   mixed   username string, or user ORM object
	 * @return  string
	 */
	public function password($user)
	{
		if ( ! is_object($user))
		{
			$username = $user;

			// Load the user
			$user = ORM::factory('auth_admin_user');
			$user->where($user->unique_key($username), '=', $username)->find();
		}

		return $user->password;
	}

	/**
	 * Complete the login for a user by incrementing the logins and setting
	 * session data: user_id, username, roles.
	 *
	 * @param   object  user ORM object
	 * @return  void
	 */
	protected function complete_login($user)
	{
		$user->complete_login();
		
		return parent::complete_login($user);
	}

	/**
	 * Compare password with original (hashed). Works for current (logged in) user
	 *
	 * @param   string  $password
	 * @return  boolean
	 */
	public function check_password($password)
	{
		$user = $this->get_user();

		if ( ! $user)
			return FALSE;

		return ($this->hash($password) === $user->password);
	}

	/**
	 * Get Role from the session.
	 * Returns NULL if no user is currently logged in.
	 *
	 * @return  mixed
	 */
	public function get_role($language_id = 0)
	{
		$role = $this->_get_role($language_id);
		
		if ( ! $role)
		{
			$role = ORM::factory('admin_roles')->where('id', '=', $this->get_user()->role_id)->where('status', '=', 1)->find();			
			$role = $this->bind_language('admin_roles', $role, $language_id);	

			$this->set_role((object)$role->as_array(), $language_id);	
		}
		
		return $role;
	}

	/**
	 * Get Rights from the session.
	 * Returns NULL if no user is currently logged in.
	 *
	 * @return  mixed
	 */
	public function get_rights($language_id = 0)
	{
		$rights = $this->_get_rights($language_id);
		
		if ( ! $rights)
		{
			$role = ORM::factory('admin_roles')->where('id', '=', $this->get_user()->role_id)->find();
			if ($role->super_admin == 1)
			{
				$rights = ORM::factory('admin_rights')->where('status', '=', 1)->find_all()->as_array('id');
			}
			elseif (trim($role->rights) != '')
			{
				$rights = ORM::factory('admin_rights')->where('id', 'in', explode(',', $role->rights))->where('status', '=', 1)->find_all()->as_array('id');
			}
			$rights = $this->bind_language('admin_rights', $rights, $language_id);
			$data = array();
			foreach ($rights as $k => $v)
			{
				$data[$k] = (object) $v->as_array();
			}
			$this->set_rights($data, $language_id);
		}
	
		return $rights;
	}
	/**
	 * Get Rights Keys from the session.
	 * Returns NULL if no user is currently logged in.
	 *
	 * @return  mixed
	 */
	public function get_rights_keys()
	{
		$rights_kyes = $this->_get_rights_keys();
		
		if ( ! $rights_kyes)
		{
			$rights = $this->get_rights();
			foreach ($rights as $k => $v)
			{
				if (strpos($v->right, ',') === FALSE)
				{
					$rights_kyes[$v->right] = $v->pk();
				}
				else
				{
					foreach (explode(',', $v->right) as $r)
					{
						$rights_kyes[$r] = $v->pk();
					}
				}
				
			}
			$this->set_rights_keys($rights_kyes);
		}		
		return $rights_kyes;
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

} // End Auth ORM