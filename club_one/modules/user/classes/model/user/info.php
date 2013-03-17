<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default auth user
 *
 * @package    Kohana/User
 * @author     Kohana Team
 */
class Model_User_Info extends ORM {

	protected $_table_name = 'user_info';
	
	protected $_primary_key = 'id';
	
	var $values = array();
	/**
	 * A user has many tokens and roles
	 *
	 * @var array Relationhips
	 */
	 
	public function set_value($data = NULL)
	{
		$this->values += $data;
		return $this;
	}
	
	public function rules()
	{
		return array(
			'phone' => array(
				array('not_empty'),
			),
			'first_name' => array(
				array('not_empty'),
			),
			'spare_email' => array(
				array('email'),
			),
		);
	}
	
	/**
	 * Create a new user
	 *
	 * Example usage:
	 * ~~~
	 * $user = ORM::factory('user')->create_user($_POST, array(
	 *	'username',
	 *	'password',
	 *	'email',
	 * );
	 * ~~~
	 *
	 * @param array $values
	 * @param array $expected
	 * @throws ORM_Validation_Exception
	 */
	public function create_user($values, $expected)
	{
		return $this->values($values, $expected)->create();
	}
	
	/**
	 * Update an existing user
	 *
	 * [!!] We make the assumption that if a user does not supply a password, that they do not wish to update their password.
	 *
	 * Example usage:
	 * ~~~
	 * $user = ORM::factory('user')
	 *	->where('username', '=', 'kiall')
	 *	->find()
	 *	->update_user($_POST, array(
	 *		'username',
	 *		'password',
	 *		'email',
	 *	);
	 * ~~~
	 *
	 * @param array $values
	 * @param array $expected
	 * @throws ORM_Validation_Exception
	 */
	public function update_user($values, $expected = NULL)
	{
		$extra_validation = Validation::factory($values);
		print_r($extra_validation);
		return $this->values($values, $expected)->update($extra_validation);
	}
	
	public function save(Validation $validation = NULL)
	{
		return $this->loaded() ? $this->update_user($this->values, $validation) : $this->create_user($this->values, $validation);
	}
}