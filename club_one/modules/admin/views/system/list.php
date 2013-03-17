<?=View::factory('header')?>
<script>
	function toggle_subrights(id)
	{
		if($('#'+id).attr('rel') == 'fadeIn')
		{			
			$('.parent_id_'+id).each(function (i) {
				$('.parent_id_'+this.id).fadeOut(200);
			});
			$('.parent_id_'+id).fadeOut(200);
			$('#'+id).attr('rel', 'fadeOut');
		}
		else
		{
			$('.parent_id_'+id).each(function (i) {
				$('.parent_id_'+this.id).fadeIn(200);
			});
			$('.parent_id_'+id).fadeIn(200);
			$('#'+id).attr('rel', 'fadeIn');	
		}
	}
</script>
<div class="headbar">
	<div class="operating">
		<?php if ($self->auth_rights('admin/'.$self->request->directory().'/'.$self->request->controller().'/add/'.$self->request->param('param')) !== FALSE ) { ?>
		<a href="<?php echo URL::site('admin/'.$self->request->directory().'/'.$self->request->controller().'/add/'.$self->request->param('param')) ?>">
		<button class="operating_btn" type="button"><span class="addition"><?php echo I18n::get('btn_append', 'common') ?></span></button></a>
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
			<col width="70px" />
			<col/>
			<col width="70px" />
			<col width="100px" />
			<thead>
				<tr>
				 	<th><input type='checkbox' onchange="$('#list_table .id_checkbox').attr('checked', this.checked)" /></th>
                    <th><?php echo $columns['id']['name']?></th>
                    <th><?php echo $columns['name']['name']?></th>
                    <th><?php echo $columns['status']['name']?></th>
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
			<col width="70px" />
			<col/>
			<col width="70px" />
			<col width="100px" />
			<tbody id="list_table" class="list_table">
				<?php foreach ($data as $v) { ?>
					<tr <?php if ($v->sub_number == 0) echo 'class="tree_root"' ?> class="parent_id_<?php echo $v->parent_id ?>" id="<?php echo $v->id ?>" rel="fadeIn" ondblclick="toggle_subrights(this.id)">
						<td><input type='checkbox' name='id[]' value='<?php echo $v->id ?>' class="id_checkbox" /></td>
						<td><?php echo $v->id ?></td>
						<td>
							<span id="permission_name_<?php echo $v->id ?>" style="margin-left:<?php echo $v->sub_number*25 ?>px;"><?php echo $v->name ?></span>				
						</td>
						<td><?php echo $v->status ?></td>
						<td><?=$self->handle($v->$pk)?></td>
					</tr>
                <?php } ?>
			</tbody>
		</table>
	</form>
</div>

<script type='text/javascript'>
	//隔行换色
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
