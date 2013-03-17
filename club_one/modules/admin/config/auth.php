<?php defined('SYSPATH') or die('No direct access allowed.');
 
return array(
	'driver'       => 'orm',
    'hash_method'  => 'sha256',
    'hash_key'     => 'Never gonna give you up',
    'lifetime'     => 3600*24*7,
    'session_key'  => 'auth_admin_user',
    'session_type' => 'native',
	// Username/password combinations for the Auth File driver
	'users' => array(
		// 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),
);  