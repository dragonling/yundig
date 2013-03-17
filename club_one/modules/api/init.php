<?php defined('SYSPATH') or die('No direct script access.');

// Catch-all route for Codebench classes to run

Route::set('api', 'api(/<directory>(/<controller>(/<action>(/<param>))))',array('param'=>'.*'))
	->defaults(array(
		'controller' => 'main',
		'action' => 'index',
		'directory'  => '',
		));
if (strpos($_SERVER['HTTP_HOST'], 'api') !== FALSE)
{
	Route::set('default', '<directory>(/<controller>(/<action>(/<param>)))',array('param'=>'.*'))
	->defaults(array(
		'controller' => 'main',
		'action' => 'index',
		'directory'  => '',
		));
}
