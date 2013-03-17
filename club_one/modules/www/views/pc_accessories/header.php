<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/pc_accessories/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/css/jquery.lightbox-0.5.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/pc_accessories/return-top/css/returnStyle.css" media="screen" />

<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/pc_accessories/js/java.js"></script>    

<!-- Arquivos utilizados pelo jQuery lightBox plugin -->
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/jquery/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/jquery/carousel/jquery.tinycarousel.min.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/jquery/lightbox-0.5/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/pc_accessories/return-top/js/returnTop.js"></script>
<!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->

</head>
<body>
<div id="wrap">

   <div class="header">
		<div class="logo">
			<a href="<?php echo URL::base('http') ?>">
			<img src="<?php echo Web::config('logo') != '' ? Web::config('logo') : URL::base('http').'assets/themes/pc_accessories/images/logo.gif' ?>" alt="" title="" border="0" />
			</a>
		</div>            
	<div id="menu">
		<ul> 
		<?php foreach (Web::get_catalogs('header', $cat) as $nav) { ?>
		<li class="<?php echo $nav['class'] ?>">
			<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			<?php if (isset($nav['sub_items'])) echo Web::show_sub_items($nav['sub_items'], 'articles'); ?>
		</li>
		<?php } ?>
		</ul>
	</div>     
		
		
   </div> 
