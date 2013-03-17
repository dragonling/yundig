<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo I18n::get('text_admin_system', 'common') ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/admin/stylesheet/stylesheet.css" />

<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/artDialog.source.js?skin=default"></script>
<script src="<?php echo Kohana::$base_url ?>assets/admin/artDialog4.1.6/plugins/iframeTools.source.js"></script>
<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/common.js"></script>

<script>
	if(top !== self) {
		top.location = self.location;
	}

	function forgot_password()
	{
		$('#login_form').slideUp(300);
		$('#forgot_password_form').slideDown(400);
	}
	function back_login()
	{
		$('#login_form').slideDown(500);
		$('#forgot_password_form').slideUp(200);
	}
</script>
</head>
<body id="login">
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="#"><img src="<?php echo Kohana::$base_url; ?>assets/admin/images/logo.gif" width="303" height="43" /></a>
			</div>
		</div>
		<div id="wrapper" class="clearfix">
					<div class="login_box">
						<div class="login_title"><?php echo I18n::get('text_login', 'login'); ?></div>
						<div class="login_cont">
							<form id="login_form" action="<?php echo URL::site('/admin/common/main/authorize') ?>" method="post">
								<table class="form_table">
									<col width="90px" />
									<col />
									<tr>
										<th valign="middle"><?php echo I18n::get('text_username', 'login'); ?>：</th>
										<td><input class="normal" type="text" name="username" alt="<?php echo I18n::get('alt_enter_username', 'login') ?>" /></td>
									</tr>
									<tr>
										<th valign="middle"><?php echo I18n::get('text_password', 'login'); ?>：</th>
										<td><input class="normal" type="password" name="password" alt="<?php echo I18n::get('alt_enter_password', 'login') ?>" /></td>
									</tr>
									<tr class="low">
										<th></th>
										<td>
											<input type="checkbox" id="remember" class="" value="1" name="remember"/>
											<label class="choice" for="remember"><?php echo I18n::get('text_autologin', 'login') ?></label>
										</td>
									</tr>
									<tr>
										<th valign="middle"></th>
										<td>
											<input class="submit" type="submit" value="<?php echo I18n::get('btn_login', 'login'); ?>" />
											<input class="submit" type="button" value="<?php echo I18n::get('btn_forgot_password', 'login'); ?>" onclick="forgot_password()"  />
										</td>
									</tr>
								</table>
							</form>
							<form action='<?php echo URL::site('/admin/common/main/change_language')?>' method="get" style="float:right;">
								<?php echo $languages; ?>
							</form>
							<form id="forgot_password_form" action="<?php echo URL::site('/admin/common/main/forgot') ?>" method="post" style="display:none;">
							<table class="form_table">
								<col width="90px" />
								<col />
								<tr>
									<th valign="middle"><?php echo I18n::get('text_username', 'login'); ?>：</th><td><input class="normal" type="text" name="admin_name" alt="<?php echo I18n::get('alt_enter_username', 'login'); ?>" /></td>
								</tr>
								<tr>
									<th valign="middle"><?php echo I18n::get('text_email', 'login'); ?>：</th><td><input class="normal" type="text" name="email" alt="<?php echo I18n::get('alt_enter_email', 'login'); ?>" /></td>
								</tr>
								<tr class="low">
									<th></th>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th valign="middle"></th>
									<td>
										<input class="submit" type="submit" value="<?php echo I18n::get('btn_send', 'login'); ?>" />
										<input class="submit" type="button" value="<?php echo I18n::get('btn_back', 'login'); ?>" onclick="back_login()"  />
									</td>
								</tr>
							</table>
							</form>
						</div>
						
					</div>
				</div>
		<div id="footer"></div>
	</div>
</body>
</html>

<?php  if (isset($message)): ?>
<script>
	tips("<?php echo $message ?>");
</script>
<?php endif; ?>