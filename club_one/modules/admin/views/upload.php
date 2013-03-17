<input type="hidden" name="<?=$field?>" id="_<?=$field?>" value="<?=$value?>" />
<link href="<?=Kohana::$base_url?>assets/admin/stylesheet/upload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/swfupload/fileprogress.js"></script>
<script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/swfupload/handlers.js"></script>
<script type="text/javascript">
var swfu_<?=$field?>;
$(function() {
			swfu_<?=$field?> = new SWFUpload({
				// Backend settings
				upload_url: "<?=URL::site('/admin/common/main/upload', 'http')?>",
				file_post_name: "resume_file",

				// Flash file settings
				file_size_limit : "100 MB",
				file_types : "*.*",			// or you could use something like: "*.doc;*.wpd;*.pdf",
				file_types_description : "All Files",
				file_upload_limit : 0,
				file_queue_limit : 0,

				// Event handler settings Load成功事件
				//swfupload_loaded_handler : swfUploadLoaded,
				
				file_dialog_start_handler: fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				swfupload_preload_handler : preLoad,
				swfupload_load_failed_handler : loadFailed,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : function(file, serverData)
				{
					try {
						file.id = "singlefile";	// This makes it so FileProgress only makes a single UI element, instead of one for each file
						var progress = new FileProgress(file, this.customSettings.progress_target);
						progress.setComplete();
						progress.setStatus("Complete.");
						progress.toggleCancel(false);
						//alert(serverData);
						if (serverData === " ") {
							this.customSettings.upload_successful = false;
						} else {
							this.customSettings.upload_successful = true;
							document.getElementById("_<?=$field?>").value = serverData;
						}
						
					} catch (e) {}
				},
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "<?=Kohana::$base_url?>assets/admin/images/XPButtonUploadText_61x22.png",
				button_placeholder_id : "<?=$field?>spanButtonPlaceholder",
				button_width: 61,
				button_height: 22,
				
				// Flash Settings
				flash_url : "<?=Kohana::$base_url?>assets/admin/swfupload/swfupload.swf",
				flash9_url : "<?=Kohana::$base_url?>assets/admin/swfupload/swfupload_fp9.swf",

				custom_settings : {
					progress_target : "<?=$field?>fsUploadProgress",
					upload_successful : false,
					txt_file_name:"<?=$field?>txtFileName"
				},
				
				// Debug settings
				debug: false
			});

		})
		
	

</script>

<div>
	<input type="text" id="<?=$field?>txtFileName" disabled class='half' />
	<span id="<?=$field?>spanButtonPlaceholder"></span>
	(10 MB max)
</div>
<div class="flash" id="<?=$field?>fsUploadProgress">
	<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
				The Handlers (in handlers.js) process the upload events and make the UI updates -->
</div>

<div>
	<?php 
		echo HTML::image('assets/uploads/files/'.$value, array('height' => 50));
	?>
</div>