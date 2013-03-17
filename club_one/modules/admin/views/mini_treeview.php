<?=View::factory('header')?>

<div class="headbar">
	<div class="field">
		<table class="list_table">
			<col width="40px" />
			<?php 
				foreach ($columns as $k => $col)
				{
					switch ($k) {
						case 'id':
						case 'pk':
						case 'sort_order':
						case 'status':
							echo '<col width="80px" />';
							break;
						default:
							echo '<col />';
							break;
					}
				} 
			?>
			<thead>
				<tr>
				 	<th><input type='checkbox' onchange="$('#list_table .id_checkbox').attr('checked', this.checked)" /></th>
                    <?php foreach ($columns as $k => $col) { ?>
                    <th><?php echo $col['name']?></th>
                    <?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
	<form name='list_form' id='list_form' method='post' action='<?php echo $action_url ?>'>
		<input type="hidden" name="act" value="list_form"/>
		<table id="list_table" class="list_table">			
			<col width="40px" />
			<?php 
				foreach ($columns as $k => $col)
				{
					switch ($k) {
						case 'id':
						case 'pk':
						case 'sort_order':
						case 'status':
							echo '<col width="70px" />';
							break;
						default:
							echo '<col />';
							break;
					}
				} 
			?>
			<tbody id="list_table" class="list_table">
				<?php foreach ($data as $v) { ?>
					<tr class="<?php if ($v->sub_number == 0) echo 'tree_root' ?> parent_id_<?php echo $v->parent_id ?>" id="<?php echo $v->pk ?>" fade="fadeIn" ondblclick="toggle_subitems(this.id, $(this).attr('fade'))">
						<td><input type='checkbox' name='id[]' value='<?php echo $v->pk ?>' <?php echo $v->checked; ?> class="id_checkbox" /></td>
						
						<?php foreach ($columns as $k => $col) { ?>
						<?php 	if ($k == 'title' || $k == 'name') { ?>
						
						<td id="permission_name_<?php echo $v->pk ?>" style="padding-left:<?php echo $v->sub_number*25 ?>px;">
							<img class="operator" src="/assets/admin/images/close.gif" onclick="toggle_subitems(<?php echo $v->pk ?>, $('#<?php echo $v->pk ?>').attr('fade'))" />
							<?php echo $v->$k ?>
						</td>						
						<?php 	} else {?>						
						<td><?php echo $v->$k ?></td>						
						<?php 	} ?>	                    
	                    <?php } ?>
					</tr>
                <?php } ?>
			</tbody>
		</table>
	</form>
</div>
<?=View::factory('footer')?>
