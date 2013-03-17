<?php
	isset($path) ? '' : $path = Kohana::$base_url.'assets/uploads/files/';
?>

<link href="<?php echo Kohana::$base_url ?>assets/admin/swfupload/upload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/admin/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/admin/swfupload/js/handlers_upload.js"></script>
<script type="text/javascript">
	var upload<?php echo $field?>;

	$(document).ready(function(){
		upload<?php echo $field?> = new SWFUpload({
			// Backend Settings
			upload_url: "<?php echo URL::site('admin/common/upload')?>",
			file_post_name: "resume_file",
			post_params: {upload_path:'<?php echo $path ?>'},

			// File Upload Settings
			file_size_limit : "102400",	// 100MB
			file_types : "*.*",
			file_types_description : "All Files",
			file_upload_limit : "0",
			file_queue_limit : "1",

			// Event Handler Settings (all my handlers are in the Handler.js file)
			file_queue_error_handler : uploadFileQueueError,
			file_dialog_complete_handler : uploadFileDialogComplete,
			upload_progress_handler : uploadFileUploadProgress,
			upload_error_handler : uploadFileError,
			upload_success_handler : <?php echo $field?>Success,
			upload_complete_handler : uploadFileComplete,
			
			// Button Settings
			button_image_url : "<?php echo Kohana::$base_url ?>assets/admin/swfupload/images/XPButtonUploadText_61x22.png",
			button_placeholder_id : "<?php echo $field?>_spanButtonPlaceholder",
			button_width: 61,
			button_height: 22,
			
			// Flash Settings
			flash_url : "<?php echo URL::base('http') ?>assets/admin/swfupload/swfupload.swf",
			

			custom_settings : {
				progressTarget : "<?php echo $field?>_divFileProgressContainer",
				cancelButtonId : "btnCancel1"
			},
			
			// Debug Settings
			debug: false
		});
	});
	

function <?php echo $field?>Success(file, serverData) {
	try {
		<?php echo $field?>AddImage(serverData);
		var progress = new FileProgress(file,  this.customSettings.upload_target);
		progress.setComplete();
		progress.setStatus("Complete.");
		progress.toggleCancel(false);

	} catch (ex) {
		this.debug(ex);
	}
}
function <?php echo $field?>AddImage(src) {
	var newImg = document.createElement("img");
	newImg.style.width = "80px";
	newImg.style.height = "80px";
	document.getElementById("<?php echo $field?>_img").innerHTML = '';
	document.getElementById("<?php echo $field?>_img").appendChild(newImg);
	if (newImg.filters) {
		try {
			newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
		}
	} else {
		newImg.style.opacity = 0;
	}

	newImg.onload = function () {
		fadeIn(newImg, 0);
	};
	
	var file_types = 'gif, jpg, jpeg, png, bmp';
	var arr = src.split('.');
	if (file_types.indexOf(arr[arr.length-1]) != -1)
	{
		newImg.src = src;
	}
	else
	{
		newImg.src = "<?php echo Kohana::$base_url ?>assets/admin/images/file.png";
	}
	
	$('#_<?php echo $field?>').val(src);
	$('#<?php echo $field?>_show').show(300);	
}
function removeImage2(name)
{
	$('#_'+name).val('');
	$('#'+name+'_show').hide(300);	
}
</script>
<div id="<?php echo $field?>_upload">
	<input type="text"  id="_<?php echo $field?>" name="<?php echo $field?>" class='half normal' />
	<span id="<?php echo $field?>_spanButtonPlaceholder"></span>
</div>
<div id="<?php echo $field?>_divFileProgressContainer"></div>
<div id="<?php echo $field?>_show" class="upload_show">
	<a href="javascript:;" onclick="removeImage2('<?php echo $field?>')"></a>
	<div id="<?php echo $field?>_img"></div>
</div>
<?php if ( ! empty($value)) { ?>
	<script><?php echo $field?>AddImage('<?php echo $value ?>');</script>
<? } ?>

