<?=View::factory('header')?>

<script type='text/javascript' src="<?php echo Kohana::$base_url ?>assets/admin/javascript/right.js"></script>

<div class="container">
	<div class="content_box">
	<div class="content form_content">
	
		<form name='edit_form' id='edit_form' method='post' action='<?php echo URL::site('admin/system/right/save') ?>'>
			<input type="hidden" id="id" name="id" value="<?php echo $data->id ?>" />
			<input type="hidden" id="languages_id" name="languages_id" value="<?php echo Common::language_id() ?>" />
			<table id="list_table" class="form_table">
				<col width="150px" />
				<col />
				<tbody>
					<tr>
						<th><?php echo I18n::get('right_name', 'admin')?>:</th>
						<td><input type="text" name="name" id="name" class="middle" value="<?php echo $data->name ?>"></td>
					</tr>
					<tr>
						<th><?php echo I18n::get('parent_section', 'admin')?>:</th>
						<td>
							<?php echo Form::select('parent_id', $rights, $data->parent_id); ?>
						</td>
					</tr>
					<tr>
						<th><?php echo I18n::get('right_type', 'admin')?>:</th>
						<td>
							<?php echo Form::select('type', I18n::get('data_types', 'admin'), $data->type, array('id' => 'right_type', 'onchange' => 'change_type(this.value)')) ?>
						</td>
					</tr>
					<tr>
						<th><?php echo I18n::get('right_status', 'admin')?>:</th>
						<td>
							<?php echo Form::select('status', I18n::get('data_status', 'common'), $data->status) ?>
						</td>
					</tr>
					<tr>
						<th><?php echo I18n::get('text_sort', 'admin')?>:</th>
						<td><input type="text" name="sort_order" id="sort_order" class="middle" value="<?php echo $data->sort_order ?>"></td>
					</tr>
					<tr class="right_sets">
						<th><?php echo I18n::get('right_sets', 'admin')?>:</th>
						<td>
							<table style="width: 310px;" class="border_table">
								<thead>
									<tr><th><?php echo I18n::get('right_code', 'admin')?></th><th><?php echo I18n::get('text_delete', 'common')?></th></tr>
								</thead>
								<tbody id="rightBox">
									<?php foreach ($data->right as $permission) { ?>
									<tr>
										<td><input class="middle" name="rights[]" value="<?php echo $permission ?>" type="text"></td>
										<td><label onclick="$(this).parent().parent().remove();" class="del"></label></td>
									</tr>
									<?php } ?>																						
								</tbody>
								<tfoot>
									<tr><td colSpan="2"><button class="btn" onclick="add_right();" type="button"><span class="add"><?php echo I18n::get('btn_append', 'common')?></span></button></td></tr>
								</tfoot>
							</table>
						</td>
					</tr>
					<tr class="right_sets">
							<th><?php echo I18n::get('text_append', 'common') ?>:</th>
							<td>
								<?php echo Form::select('routes', $routes, '', array('id' => 'route', 'class' => 'auto')); ?>
								<?php echo Form::select('modules', $modules, '', array('id' => 'module', 'class' => 'auto', 'onchange' => 'get_dirs(this.value)')); ?>
								<br />
								<?php echo Form::select('dirs', array(), '', array('id' => 'dir', 'class' => 'auto', 'onchange' => 'get_controllers(this.value)')); ?>
								<?php echo Form::select('controllers', array(), '', array('id' => 'controller', 'class' => 'auto', 'onchange' => 'get_actions(this.value)')); ?>
								<?php echo Form::select('actions', array(), '', array('id' => 'action', 'class' => 'auto')); ?>
								<button class="btn" onclick="append_right_to();" type="button"><span class="add"><?php echo I18n::get('btn_append', 'common')?></span></button>
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
<script>
	var get_controllers_url = '<?php echo URL::site('admin/system/right/get_controllers'); ?>';	
</script>
<?=View::factory('footer')?>
