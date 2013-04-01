<?php 
	$articles = Web::get_articles($catalog['id'], 1, 1);
	$articles = $articles['items'];
	header('Location: '.$articles[0]->link);
	die;
?>