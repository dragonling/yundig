<?php 
	$articles = Web::get_articles($catalog['id'], 1, 1);
	$articles = $articles['items'];
	if (empty($articles))
	{
		Web::error('Comming soon...');
	}
	else
	{
		header('Location: '.$articles[0]->link);
	}
	die;
?>