<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'protocol' => 'smtp',
	'from'     => 'service@konasi.com',
	'sender'   => 'Konasi',
	
	'smtp' => array
	(
		'hostname' => 'smtp.exmail.qq.com',
		'username' => 'service@konasi.com',
		'password' => 'ling123456',
		'port'     => 25,
	),
);