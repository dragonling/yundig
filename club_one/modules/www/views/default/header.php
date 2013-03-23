<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @$title . ' - ' . Web::config('name')?></title>
<meta name="keywords" content="<?php echo @$keywords ?>" />
<meta name="description" content="<?php echo @$description ?>" />

<link href="<?php echo URL::base('http') ?>assets/themes/default/style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/default/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/default/js/slides.min.jquery.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/default/js/lrtk.js"></script>
<script type="text/javascript" src="<?php echo URL::base('http') ?>assets/themes/default/js/jq.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	/* datatable */
	var validator = $("#login_form").validate({
		rules: {   
			email: {required: true}  ,
			password: {required: true}  ,
		}
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>

</head>

<body>
	<div class="top">
		<div class="logo"><a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/logo.gif" width="80" height="110" /></a></div>
		<div class="topright">
			 <div class="login">
			 <form id="login_form" method="post" action="<?php echo Web::url('', 'user/authorize', 1); ?>">
				<span class="denglu">登入電郵<input type="text" name="username" id="username"/></span>
				<span class="mima">密碼<input type="text" name="password" id="password" /></span>
				<a href="javascript:;" class="deng" onclick="$('#login_form').submit();"></a><a href="#" class="ji"></a>
				<span class="bo">
				<a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/f.gif" width="20" height="22" /></a>
				<a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/x.gif" width="20" height="22" /></a>
				<a href="#"><img src="<?php echo URL::base('http') ?>assets/themes/default/images/s.gif" width="20" height="22" /></a>
				</span>
			 </form>
			 </div>
			 <div class="fack">
				 <span class="good"></span>
				 <span class="fac">838,219人說這讚。</span>
				 <span class="luo"><a href="#">優惠通勝</a><a href="#">列印</a></span>
				 <span class="search"><input type="text" /><a href="#"></a></span>
			 </div>
		</div>
	</div>
	<div class="nav"> 
		<ul class="navul">
			<?php foreach (Web::get_catalogs('header', isset($cat) ? $cat : 0) as $nav) { ?>
			<li class="<?php echo $nav['class'] ?>">
				<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			</li>
			<?php } ?>
		 </ul>
		 <div class="navdiv clearfix">
			
			<?php foreach (Web::get_catalogs('header', isset($cat) ? $cat : 0) as $nav) { ?>
			<ul class="erji">
				<?php if (isset($nav['sub_items'])) { ?>
					<?php foreach ($nav['sub_items'] as $sub_nav) { ?>
					<li><a href="<?php echo $sub_nav['link']; ?>" target="<?php echo $sub_nav['target']; ?>"><?php echo $sub_nav['title']; ?></a>
					<?php 	} ?>
				<?php } else { ?>
					<li>
				<?php } ?>
			</ul>
			<?php } ?>
		 </div>
	</div>