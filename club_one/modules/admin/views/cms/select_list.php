<?=View::factory('header')?>

<div class="headbar">
	<div class="field">
		<table class="list_table">
			<col width="70px" />
			<?php 
				foreach ($columns as $k => $col) { 
					echo ($k != 'id' && $k != 'status') ? '<col />' : '<col width="80px" />';
				}
			?>
			<thead>
				<tr>
				 	<th><input type='checkbox' onchange="$('#list_table .pk_checkbox').attr('checked', this.checked)"  class="pk_checkbox"/></th>
                	<?php foreach ($columns as $k=>$col) { ?>
                    <th><?php echo $col['name']?></th>
                    <?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="content">
	<form name='data_list' id="data_list" method='post' action=''>
		<input type="hidden" name="act" value="selected" />
		<input type="hidden" name="catalog_id" value="<?php echo $catalog_id ?>" />
		<table id="list_table" class="list_table">
			<col width="70px" />
			<?php 
				foreach ($columns as $k => $col) { 
					echo ($k != 'id' && $k != 'status') ? '<col />' : '<col width="80px" />';
				}
			?>
			<tbody id="list_table" class="list_table">
				<?php foreach ($data as $v) { ?>
                    <tr class="gradeA">
                    	<td><input type='checkbox' name='<?php echo $pk ?>[]' value='<?php echo $v->$pk ?>' class="pk_checkbox" /></td>
                   		<?php foreach ($columns as $k => $col) { ?>
                    	<td><?=$self->$col['func']($v, $k)?></td>
                    	<?php } ?>
                    </tr>
                <?php } ?>
			</tbody>			
		</table>
		<div style="background:#eee"><?php echo isset($pagination) ? $pagination : ''; ?></div>
	</form>
</div>

<?=View::factory('footer')?>
