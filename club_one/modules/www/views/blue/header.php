<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="Home page - free business website template available at TemplateMonster.com for free download."/>
<link href="<?php echo URL::base('http') ?>assets/themes/blue/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URL::base('http') ?>assets/themes/blue/layout.css" rel="stylesheet" type="text/css" />
<script src="<?php echo URL::base('http') ?>assets/themes/blue/maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>

<body id="page1" onload="new ElementMaxHeight();">
   <!-- header -->
   <div id="header">
      <div class="container">
         <div class="row-1">
            <div class="logo"><a href="/"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/logo.jpg" /></a></div>
            <ul class="top-links">
               <li><a href="/"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon1.jpg" /></a></li>
               <li><a href="#"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon2.jpg" /></a></li>
               <li><a href="contactus"><img alt="" src="<?php echo URL::base('http') ?>assets/themes/blue/images/top-icon3.jpg" /></a></li>
            </ul>
         </div>
         <div class="row-2">
         	<!-- nav box begin -->
            <div class="nav-box">
            	<div class="left">
               	<div class="right">
                  	<ul>
						<?php 
							$h_catalog = Web::get_catalog('header');
							for ($k = 0, $count = count($h_catalog); $k < $count; $k++)
							{							
								$nav = $h_catalog[$k];
								$class = ($nav['current_controller'] == $self->request->controller()) ? 'current' : '';
								if ($class == 'current' && $k+1 == $count)
								{
									$class = 'last-current';
								}
								elseif ($k == 0)
								{
									$class = 'first';
								}								
						?>
						<li><a href="<?php echo $nav['link'] ?>" class="<?php echo $class ?>" target="<?php echo $nav['target'] ?>"><em><b><?php echo $nav['title'] ?></em></b></a></li>
						<?php } ?>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- nav box end -->
         </div>
      </div>
   </div>
   <!-- content -->
   <div id="content">
      <div class="container">      	
		<!-- main-banner-small begin -->
        <div class="main-banner-small">
			<div class="inner">
				<h1>Even the biggest success Starts with a first step</h1>
			</div>
        </div>
        <!-- main-banner-small end -->