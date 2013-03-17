<?=View::factory('header')?>

<div class="container">
	<div class="content_box">
	<div class="content form_content">
	
		<form name='edit_form' id='edit_form' method='post' action='<?php echo URL::site('admin/system/setting/save') ?>'>
			<input type="hidden" id="language_id" name="language_id" value="<?php echo Common::language_id() ?>" />
			<input type="hidden" id="m" name="m" value="<?php echo $data['module'] ?>" />
			<table id="config_tabs" class="form_table config_tabs list_table">
				<col width="150px" />
				<col />
				<tbody class="tab_content" id="type_core">
					<tr>
						<th> <?php echo I18n::get('column_admin_email', 'config') ?>: </th>
						<td> <input type="text" name="data[admin_email]" id="data[admin_email]" class="normal" value="<?php echo $data['admin_email'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_open', 'config') ?>: </th>
						<td> <?php echo Form::radios('data[is_open]', I18n::get('data_open_close', 'config'), $data['is_open']) ?> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_colse_why', 'config') ?>: </th>
						<td> <textarea name="data[colse_why]" id="data[colse_why]" class="normal"><?php echo $data['colse_why'] ?></textarea> </td>
					</tr>	
					<tr>
						<th> <?php echo I18n::get('column_rewrite', 'config') ?>: </th>
						<td> <?php echo Form::radios('data[rewrite]', I18n::get('data_rewrite', 'config'), $data['rewrite']) ?> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_upload_dir', 'config') ?>: </th>
						<td> <input type="text" name="data[upload_dir]" id="data[upload_dir]" class="normal" value="<?php echo $data['upload_dir'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_debug', 'config') ?>: </th>
						<td> <?php echo Form::radios('data[debug]', I18n::get('data_rewrite', 'config'), $data['debug']) ?> </td>
					</tr>					
				</tbody>
				<tbody class="tab_content" id="type_site" style="display:none">
					<tr>
						<th> <?php echo I18n::get('column_site_name', 'config') ?>: </th>
						<td> <input type="text" name="data[name]" id="data[site_name]" class="normal" value="<?php echo $data['name'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_title', 'config') ?>: </th>
						<td> <input type="text" name="data[title]" id="data[title]" class="normal" value="<?php echo $data['title'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_logo', 'config') ?>: </th>
						<td> 
							<?php echo View::factory('widget/upload', array('field' => 'logo', 'value' => isset($data['logo']) ? $data['logo'] : '', 'path' => '/assets/images/')); ?>
						</td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_keywords', 'config') ?>: </th>
						<td> <input type="text" name="data[keywords]" id="data[keywords]" class="normal" value="<?php echo $data['keywords'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_description', 'config') ?>: </th>
						<td> <textarea name="data[description]" id="data[description]" class="normal"><?php echo $data['description'] ?></textarea> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_beian', 'config') ?>: </th>
						<td> <input type="text" name="data[beian]" id="data[beian]" class="normal" value="<?php echo $data['beian'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_site_copyright', 'config') ?>: </th>
						<td> <textarea name="data[copyright]" id="data[copyright]" class="normal"><?php echo $data['copyright'] ?></textarea> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_about_us', 'config') ?>: </th>
						<td> <textarea name="data[about_us]" id="data[about_us]" class="normal"><?php echo $data['about_us'] ?></textarea> </td>
					</tr>
				</tbody>
				<tbody class="tab_content" id="type_email" style="display:none">
					<tr>
						<th> <?php echo I18n::get('column_mail_type', 'config') ?>: </th>
						<td> <?php echo Form::radios('data[mail_type]', I18n::get('data_mail_types', 'config'), $data['mail_type']) ?> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_smtp_host', 'config') ?>: </th>
						<td> <input type="text" name="data[smtp_host]" id="data[smtp_host]" class="normal" value="<?php echo $data['smtp_host'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_smtp_port', 'config') ?>: </th>
						<td> <input type="text" name="data[smtp_port]" id="data[smtp_port]" class=" normal" value="<?php echo $data['smtp_port'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_smtp_account', 'config') ?>: </th>
						<td> <input type="text" name="data[smtp_account]" id="data[smtp_account]" class="normal" value="<?php echo $data['smtp_account'] ?>" /> </td>
					</tr>
					<tr>
						<th> <?php echo I18n::get('column_smtp_password', 'config') ?>: </th>
						<td> <input type="text" name="data[smtp_password]" id="data[smtp_password]" class="normal" value="<?php echo $data['smtp_password'] ?>" /> </td>
					</tr>
				</tbody>
				<tbody class="tab_content" id="type_service" style="display:none">
					<tr>
						<th> QQ: </th>
						<td>
							<input name="data[customer_service][qq]" id="data[customer_service][qq]" class="half" value="<?php echo $data['customer_service']['qq'] ?>"></input>
							<small><?php echo I18n::get('alt_customer_service', 'config'); ?></small>
						</td>
					</tr>
					<tr>
						<th> Skype: </th>
						<td> <input name="data[customer_service][skype]" id="data[customer_service][skype]" class="half" value="<?php echo $data['customer_service']['skype'] ?>"></input>
							<small><?php echo I18n::get('alt_customer_service', 'config'); ?></small>
						</td>
					</tr>
					<tr>
						<th> Msn: </th>
						<td> <input name="data[customer_service][msn]" id="data[customer_service][msn]" class="half" value="<?php echo $data['customer_service']['msn'] ?>"></input>
							<small><?php echo I18n::get('alt_customer_service', 'config'); ?></small>
						</td>
					</tr>
					<tr>
						<th> Email: </th>
						<td> <input name="data[customer_service][email]" id="data[customer_service][email]" class="half" value="<?php echo $data['customer_service']['email'] ?>"></input>
							<small><?php echo I18n::get('alt_customer_service', 'config'); ?></small>
						</td>
					</tr>
					<tr>
						<th> Tel: </th>
						<td> <input name="data[customer_service][tel]" id="data[customer_service][tel]" class="half" value="<?php echo $data['customer_service']['tel'] ?>"></input>
							<small><?php echo I18n::get('alt_customer_service', 'config'); ?></small>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="submit" id='submit_btn'><span><?php echo I18n::get('btn_save', 'common') ?></span></button>
							<button type="reset" class="submit"><span><?php echo I18n::get('btn_reset', 'common') ?></span></button>
							<a href="<?php echo $pre_uri?>/list">
								<button type="button" class="submit" onclick="window.location='<?php echo $pre_uri?>/list'"><span><?php echo I18n::get('btn_back', 'common') ?></span></button>
							</a>
						</td>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>
	</div>
</div>
<script type='text/javascript'>
	//¸ôÐÐ»»É«
	$(".list_table tr::nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);
	
</script>

<?=View::factory('footer')?>
