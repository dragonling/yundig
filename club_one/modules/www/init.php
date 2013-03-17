<?php defined('SYSPATH') or die('No direct access allowed.');

// 图片
Route::set('assets', 'assets/(<file>).(<ext>)', array('file' => '(.*)', 'ext' => '(jpg|png|gif)'))
	->defaults(array(
		'controller' => 'image',
		'action'     => 'index'
	));
	

$ext = '.html';
	
Route::set('cn', 'cn(/<action>(/<param>(/<id>)))('.$ext.')')
	->defaults(array(
		'controller' => 'cn',
		'action'     => 'index'
	));
Route::set('cn_list', 'cn_list(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'cn',
		'action'     => 'list'
	));
Route::set('cn_detail', 'cn_detail(/<id>)('.$ext.')')
	->defaults(array(
		'controller' => 'cn',
		'action'     => 'detail'
	));
Route::set('cn_articles', 'cn_articles(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'cn',
		'action'     => 'articles'
	));
Route::set('cn_article', 'cn_article(/<cat>(/<id>))('.$ext.')')
	->defaults(array(
		'controller' => 'cn',
		'action'     => 'article'
	));
	

Route::set('hk', 'hk(/<action>(/<param>(/<id>)))('.$ext.')')
	->defaults(array(
		'controller' => 'hk',
		'action'     => 'index'
	));
Route::set('hk_list', 'hk_list(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'hk',
		'action'     => 'list'
	));
Route::set('hk_detail', 'hk_detail(/<id>)('.$ext.')')
	->defaults(array(
		'controller' => 'hk',
		'action'     => 'detail'
	));	
Route::set('hk_articles', 'hk_articles(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'hk',
		'action'     => 'articles'
	));
Route::set('hk_article', 'hk_article(/<cat>(/<id>))('.$ext.')')
	->defaults(array(
		'controller' => 'hk',
		'action'     => 'article'
	));
	
	
Route::set('list', 'list(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'main',
		'action'     => 'list'
	));
Route::set('detail', 'detail(/<id>)('.$ext.')')
	->defaults(array(
		'controller' => 'main',
		'action'     => 'detail'
	));
Route::set('articles', 'articles(/<cat>(/<page>))('.$ext.')')
	->defaults(array(
		'controller' => 'main',
		'action'     => 'articles'
	));
Route::set('article', 'article(/<cat>(/<id>))('.$ext.')')
	->defaults(array(
		'controller' => 'main',
		'action'     => 'article'
	));
Route::set('www', '(<controller>(/<action>(/<param>(/<id>))))('.$ext.')')
	->defaults(array(
		'controller' => 'main',
		'action'     => 'index'
	));
