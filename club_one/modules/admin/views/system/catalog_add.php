<?=View::factory('header')?>

<script type="text/javascript">
$(document).ready(function(){
	
	/* setup navigation, content boxes, etc... */
	//Administry.setup();
	
	/* datatable */
	var validator = $("#edit_form").validate({
		rules: {
			<?php foreach($columns as $k=>$v):?>
            <?=$k?>: <?=$v['validate']['rules']?>  ,    
            <?php endforeach;?>			
		},
		messages: {
			<?php foreach($columns as $k=>$v):?>
            <?=$k?>:<?=$v['validate']['message']?>  ,    
            <?php endforeach;?>		
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		//submitHandler: function() {
		//	swfu.startUpload();
			//$("#vlcform").trigger('submit');
	//	},
		// set new class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>

<div class="container">
	<div class="content_box" style="overflow-y: auto;">
	<div class="content form_content" style="">
	
		<form name='edit_form' id='edit_form' method='post' action='<?php echo $pre_uri.'/save/'.$self->request->param('param') ?>'>
			<input type="hidden" id="language_id" name="language_id" value="<?php echo Common::language_id() ?>" />
			<table id="catalog_types_tabs" class="form_table catalog_types_tabs">
				<col width="150px" />
				<col />
				<?php foreach ($group_columns as $group_name => $group) :?>
				<tbody class="tab_content " id="<?php echo $group_name; ?>" style="<?php echo isset($first_group) ? 'display:none' : $first_group = 1; ?>">
					<?php foreach($group as $k => $v):?>
				
					<tr class="_<?php echo $k ?>">
						<th><?=$v['name']?>:</th>
						<td><?=$v['field']?><small><?=$v['desc']?></small></td>
					</tr>
					
					<?php endforeach;?>
				</tbody>
				<?php endforeach;?>
				<tfoot>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="submit" id='submit_btn'><span><?php echo I18n::get('btn_save', 'common') ?></span></button>
							<button type="reset" class="submit"><span><?php echo I18n::get('btn_reset', 'common') ?></span></button>
							<a href="<?php echo $pre_uri.'/list/'.$self->request->param('param') ?>">
								<button type="button" class="submit" onclick="window.location='<?php echo $pre_uri.'/list/'.$self->request->param('param') ?>'"><span><?php echo I18n::get('btn_back', 'common') ?></span></button>
							</a>
						</td>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>
	</div>
</div>
<?=View::factory('footer')?>
