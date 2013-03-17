<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @$title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo @$keywords ?>" />
<meta name="description" content="<?php echo @$description ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/default/style.css" />

<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/jquery/jquery-1.8.2.js"></script>
</head>
<body>
<div id="wrap">

   <div class="header">
		<div class="logo">
			<a href="<?php echo URL::base('http') ?>">
			<img src="<?php echo Web::config('logo') != '' ? Web::config('logo') : URL::base('http').'assets/themes/default/images/logo.gif' ?>" alt="" title="" border="0" />
			</a>
		</div>            
	<div id="menu">
		<ul> 
		<?php foreach (Web::get_catalogs('header', isset($cat) ? $cat : 0) as $nav) { ?>
		<li class="<?php echo $nav['class'] ?>">
			<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			<?php if (isset($nav['sub_items'])) echo Web::show_sub_items($nav['sub_items'], 'articles'); ?>
		</li>
		<?php } ?>
		</ul>
	</div>     
		
		
   </div> 
