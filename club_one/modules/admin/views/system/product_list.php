<?=View::factory('header')?>

<div class="headbar">
	<div class="operating">
		<?php if ($self->auth_rights('admin/'.$self->request->directory().'/'.$self->request->controller().'/add/'.$self->request->param('param')) !== FALSE ) { ?>
		<a href="javascript:;">
		<button class="operating_btn" type="button" onclick="selectWindow('/admin/product/main/select_list?catalog_id=<?php echo $catalog_id; ?>', 'select_article_url', '/admin/product/main/selected')"><span class="addition"><?php echo I18n::get('btn_append', 'common') ?></span></button></a>
		<?php } ?>
		<?php if ($self->auth_rights('admin/'.$self->request->directory().'/'.$self->request->controller().'/del/'.$self->request->param('param')) !== FALSE ) { ?>
		<a href="javascript:void(0)" onclick="$('.list_table .pk_checkbox').attr('checked', true)"><button class="operating_btn" type="button"><span class="sel_all"><?php echo I18n::get('btn_select_all', 'common') ?></span></button></a>
		<a href="javascript:void(0)" onclick="delModel({msg:'<?php echo I18n::get('alt_confirm_lot_delete', 'common') ?>'});"><button class="operating_btn" type="button"><span class="delete"><?php echo I18n::get('btn_lot_delete', 'common') ?></span></button></a>		
		<?php } ?>
		<a href="javascript:void(0)" onclick="window.location=window.location"><button class="operating_btn" type="button"><span class="refresh"><?php echo I18n::get('btn_refresh', 'common') ?></span></button></a>
	</div>
	<div class="field">
		<table class="list_table">
			<col width="70px" />
			<?php 
				foreach ($columns as $k => $col) { 
					echo ($k != 'id' && $k != 'status') ? '<col />' : '<col width="80px" />';
				}
			?>			
			<col width="100px" />
			<thead>
				<tr>
				 	<th><input type='checkbox' onchange="$('#list_table .pk_checkbox').attr('checked', this.checked)"  class="pk_checkbox"/></th>
                	<?php foreach ($columns as $k=>$col) { ?>
                    <th><?php echo $col['name']?></th>
                    <?php } ?>
                    <th><?php echo I18n::get('text_controller', 'common') ?></th> 
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
	<form name='admin_list' id="data_list" method='post' action='<?php echo URL::site('admin/'.$self->request->directory().'/'.$self->request->controller().'/del/'.$self->request->param('param')) ?>'>
		<table id="list_table" class="list_table">
			<col width="70px" />
			<?php 
				foreach ($columns as $k => $col) { 
					echo ($k != 'id' && $k != 'status') ? '<col />' : '<col width="80px" />';
				}
			?>			
			<col width="100px" />
			<tbody id="list_table" class="list_table">
				<?php foreach ($data as $v) { ?>
                    <tr class="gradeA">
                    	<td><input type='checkbox' name='<?php echo $pk ?>[]' value='<?php echo $v->$pk ?>' class="pk_checkbox" /></td>
                   		<?php foreach ($columns as $k => $col) { ?>
                    	<td><?=$self->$col['func']($v, $k)?></td>
                    	<?php } ?>
                   	 	<td><?=$self->handle($v->$pk)?></td>
                    </tr>
                <?php } ?>
			</tbody>			
		</table>
		<div style="background:#eee"><?php echo isset($pagination) ? $pagination : ''; ?></div>
	</form>
</div>

<?=View::factory('footer')?>
