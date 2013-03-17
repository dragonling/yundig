<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo I18n::get('text_admin_system', 'common') ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/stylesheet/stylesheet.css" />
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/artdialog/skin/default.css" />

<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/artdialog/artdialog.min.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/common.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/menu.js"></script>
<script type="text/javascript" SRC="<?=Kohana::$base_url?>assets/admin/javascript/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script>
var base_url = '<?php echo Kohana::$base_url ?>';

</script>
</head>
<body>
	<div class="colgroup leading" id="frame_0">
		<div class="column width3 first">
			<h3>您好! <a href="#"><?=Auth::instance()->get_user()->username?></a></h3>
		</div>
		<div class="column width3">
			<h4>上次登录</h4>
			<p>
				<?=date("Y-m-d H:i:s",Auth::instance()->get_user()->last_login)?> 共登陆 <?=Auth::instance()->get_user()->logins?>次<br />
				<?if(Auth::instance()->get_user()->last_failed_login):?>
					最后一次登陆失败：
					<?=Auth::instance()->get_user()->last_failed_login?>
				<?endif;?><br/>
				<?if(Auth::instance()->get_user()->failed_login_count):?>
					失败登陆次数：
					<?=Auth::instance()->get_user()->failed_login_count?>
				<?endif;?>				
			</p>
		</div>
	</div>
</body>
</html>