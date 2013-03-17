<?php defined('SYSPATH') or die('No direct access allowed.');
Route::set('admin', 'admin(/<directory>(/<controller>(/<action>(/<param>(/<id>)))))')
	->defaults(array(
		'directory' => 'dashboard',
		'controller' => 'main',
		'action'     => 'index'
	));