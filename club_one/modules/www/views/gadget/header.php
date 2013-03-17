<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/gadget/templatemo_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL::base('http') ?>assets/themes/gadget/styles/styles.css" />
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/gadget/scripts/slideitmoo-1.1.js"></script>

</head>
<body>

<div id="templatemo_site_title_bar_wrapper">

	<div id="templatemo_site_title_bar">
    
    	<div id="site_title">
            <h1><a href="http://www.cssmoban.com" target="_parent">
                <!--
                Gadget Website
                <span>free css template</span>
                -->
                <img src="<?php echo URL::base('http') ?>assets/themes/gadget/images/templatemo_logo.png" alt="Gadget Site" /><span>free css template</span>
            </a></h1>
        </div>
        
        <div id="search_box">
            <form action="#" method="get">
                <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>
        
        <div id="templatemo_menu">
                <ul>
				  <?php 
					$h_catalog = Web::get_catalog('header');
					for ($k = 0, $count = count($h_catalog); $k < $count; $k++) {
					$class = ($k == 0 ? 'first' : ($k+1 == $count ? 'last' : ''));
					$nav = $h_catalog[$k];
				  ?>
				  <li><a href="<?php echo $nav['link'] ?>" class="<?php echo ($nav['current_controller'] == $self->request->controller()) ? 'current' : '' ?> <?php echo $class ?>" target="<?php echo $nav['target'] ?>"><span></span><?php echo $nav['title'] ?></a></li>
				  <?php } ?>
          		</ul>
		</div> <!-- end of menu -->
    
    </div>
    
</div>

<div id="templatemo_content">