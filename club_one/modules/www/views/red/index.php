<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Web::config('title') . ' - ' . Web::config('name'); ?></title>
<meta name="keywords" content="<?php echo Web::config('keywords') ?>" />
<meta name="description" content="<?php echo Web::config('description') ?>" />

<link href="<?php echo URL::base('http') ?>assets/themes/red/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URL::base('http') ?>assets/themes/red/layout.css" rel="stylesheet" type="text/css" />
<script src="<?php echo URL::base('http') ?>assets/themes/red/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page1">
<!-- header -->
<div id="header">
	<div class="container">
<!-- .logo -->
		<div class="logo">
			<a href="<?php echo URL::base('http') ?>"><img src="<?php echo Web::config('logo') != '' ? Web::config('logo') : URL::base('http').'assets/themes/red/images/logo.gif' ?>" alt="" /></a>
		</div>
<!-- /.logo -->
		<form action="" id="search-form">
			<fieldset>
				<input type="text" class="text" /><input type="submit" value="Search" class="submit" />
			</fieldset>
		</form>
<!-- .nav -->
		<ul class="nav">
			<?php foreach (Web::get_catalog('header', $cat) as $nav) { ?>
			<li><a href="<?php echo $nav['link'] ?>" class="<?php echo $nav['class'] ?>" target="<?php echo $nav['target'] ?>"><span><?php echo $nav['title'] ?></span></a></li>
			<?php } ?>
		</ul>
<!-- /.nav -->
<!-- .extra-box --> 
		<div class="extra-box">
			<div class="inner">
				<h2>服务介绍</h2>
				<ul>
					<li><a href="#">外贸网站建设</a></li>
					<li><a href="#">网上商城建设</a></li>
					<li><a href="#">企业定制网站</a></li>
					<li><a href="#">Urban design</a></li>
					<li><a href="#">Transportation</a></li>
					<li><a href="#">Design development</a></li>
					<li><a href="#">Planning</a></li>
				</ul>
				<div class="wrapper"><a href="#" class="link1"><em><b>More Services</b></em></a></div>
			</div>
		</div>
<!-- /.extra-box -->
<!-- .intro-text -->
		<div class="intro-text">
			<h1>Accuracy<span>is the main feature</span><em>of our drawings</em></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo- re magna aliqua.</p>
			<div class="wrapper"><a href="#" class="button">View Our Works</a></div>
		</div>
<!-- /.intro-text -->
	</div>
</div>
<!-- content -->
<div id="content">
<div class="inner_copy">More <a href="http://www.cssmoban.com/">Website Templates</a> at TemplateMonster.com!</div>
	<div class="container">
		<div class="wrapper">
			<div class="aside">
				<div class="indent">
					<h3>Categories</h3>
					<ul class="list1">
						<li><a href="#">Sed ut perspiciatis</a></li>
						<li><a href="#">Unde omnisiste</a></li>
						<li><a href="#">Natus errorsit</a></li>
						<li><a href="#">Voluptatem</a></li>
						<li><a href="#">Doloremque lauda</a></li>
						<li><a href="#">Accusantium</a></li>
						<li><a href="#">Totamrem aperiam</a></li>
						<li><a href="#">Eaque ipsa quae</a></li>
						<li><a href="#">Lnventore veritatis</a></li>
						<li><a href="#">Architecto</a></li>
					</ul>
				</div>
<!-- .box -->
				<div class="box">
					<h3>Login Form</h3>
					<form action="" id="login-form">
						<fieldset>
							<div class="field"><label for="text">Username:</label><input type="text" class="text" name="text"/></div>
							<div class="field"><label for="text">Password:</label><input type="password" class="password" name="text"/></div>
							<div class="wrapper">
								<input type="submit" value="Log In" class="submit fleft" />
								<div class="fright"><input type="checkbox" name="checkbox" id="checkbox" /><label for="checkbox">Remember</label></div>
							</div>
						</fieldset>
					</form>
				</div>
<!-- /.box -->
			</div>
			<div class="mainContent">
				<div class="article">
					<h2>Welcome<em>To our Architect website page</em></h2>
					<p><strong class="txt1">Healthy Building</strong> is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution.</p> 
					<div class="img-box">
						<img src="<?php echo URL::base('http') ?>assets/themes/red/images/img1.jpg" alt="" />
						This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.
					</div>
					This website template has several pages: <a href="index.html">Home</a>, <a href="about.html">About</a>, <a href="projects.html">Projects</a> (with <a href="project.html">Project Page</a>), <a href="contacts.html">Contacts</a> (note that contact us form – doesn’t work), <a href="sitemap.html">Site Map</a>.
				</div>
				<h3>Latest Projects</h3>
				<div class="wrapper">
					<div class="col-1">
						<div class="box1">
							<p><img src="<?php echo URL::base('http') ?>assets/themes/red/images/img2.jpg" alt="" /></p>
							<h4>Project 1</h4>
							<p class="p1">At vero eos et acmus et iusto odio dignis simos duci mus.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
					<div class="col-2">
						<div class="box1">
							<p><img src="<?php echo URL::base('http') ?>assets/themes/red/images/img3.jpg" alt="" /></p>
							<h4>Project 2</h4>
							<p class="p1">Nalibero tempore cum soluta nobiest elige ndioptio.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
					<div class="col-3">
						<div class="box1">
							<p><img src="<?php echo URL::base('http') ?>assets/themes/red/images/img4.jpg" alt="" /></p>
							<h4>Project 3</h4>
							<p class="p1">Temporibus uibusdam et aut officiis debitis aut rerum.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<div id="footer">
	<div class="container">
		<a href="http://www.cssmoban.com/" target="_blank">网站模板</a> from cssMoban.com<br />
		<a href="http://www.cssmoban.com/" target="_blank">cssMoban.com</a> provided by cssMoban.com
	</div>
</div>
</body>
</html>