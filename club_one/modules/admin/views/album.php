<link href="<?=Kohana::$base_url?>assets/admin/css/upload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?=Kohana::$base_url?>assets/admin/swfupload/album_handlers.js"></script>
<script type="text/javascript">
		var albumUpload;
		window.onload = function () {
			albumUpload = new SWFUpload({
				// Backend Settings
				upload_url: "<?=URL::site('admin/common/upload')?>",
				//post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},
				file_post_name: "resume_file",
				// File Upload Settings
				file_size_limit : "2 MB",	// 2MB
				file_types : "*.png;*.jpg;*.gif",
				file_types_description : "JPG Images",
				file_upload_limit : 0,

				// Event Handler Settings - these functions as defined in Handlers.js
				//  The handlers are not part of SWFUpload but are part of my website and control how
				//  my website reacts to the SWFUpload events.
				swfupload_preload_handler : _preLoad,
				swfupload_load_failed_handler : _loadFailed,
				file_queue_error_handler : _fileQueueError,
				file_dialog_complete_handler : _fileDialogComplete,
				upload_progress_handler : _uploadProgress,
				upload_error_handler : _uploadError,
				upload_success_handler : _uploadSuccess,
				upload_complete_handler : _uploadComplete,

				// Button Settings
				button_image_url : "<?=Kohana::$base_url?>assets/admin/img/SmallSpyGlassWithTransperancy_17x18.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 180,
				button_height: 18,
				button_text : '<span class="button">选择图片[多选]<span class="buttonSmall">(2 MB Max)</span></span>',
				button_text_style : '.button { font-family: "微软雅黑", Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
				button_text_top_padding: 0,
				button_text_left_padding: 18,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,
				
				// Flash Settings
				flash_url : "<?=Kohana::$base_url?>assets/admin/swfupload/swfupload.swf",
				flash9_url : "<?=Kohana::$base_url?>assets/admin/swfupload/swfupload_fp9.swf",

				custom_settings : {
					upload_target : "divFileProgressContainer"
				},
				
				// Debug Settings
				debug: false
			});
		};
		
	//上传成功操作
	var count = 0;
	function addImage(src) {
		var newImg = document.createElement("img");
		var newInput = document.createElement("input");

		newImg.style.margin = "5px";
		newImg.id = "<?=$field?>"+"_image_"+ count;
	//newImg.ondblclick= "removeImage(this.id)";
		
		newInput.type = "hidden";
		newInput.id= "<?=$field?>"+"_input_"+ count;
		newInput.value= src;
		newInput.name= "<?=$field?>[]";
		
		
		document.getElementById("thumbnails").appendChild(newImg);
		document.getElementById("thumbnails").appendChild(newInput);
		
		
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

		newImg.src = '/assets/uploads/'+src;
		$("#"+newImg.id).live("click",function(){
			removeImage(newImg.id,newInput.id);
		});
		count++;
	}
	
	function removeImage(imgId,inputId)
	{
		if(confirm("确定要移除这张图片吗"))
		{
			$("#"+imgId).remove();
			$("#"+inputId).remove();
		}
	}
	</script>





		<div style="width: 180px; height: 18px; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
			<span id="spanButtonPlaceholder"></span>
		</div>

	<div id="divFileProgressContainer" style="height: 75px;"></div>
	<div id="thumbnails">
	<?if(isset($path) && $value != ''):?>
	<?foreach(explode(',',$value) as $k => $v):?>
	<div style="float:left;">
	<button type="button" onclick="removeImage("snapshot_image_<?=(100-$k)?>","snapshot_input_<?=(100-$k)?>")">X<button>
	<img style="margin: 5px; opacity: 1; " id="snapshot_image_<?=(100-$k)?>" src="<?=$path?>/<?=$v?>" onclick=''>
	<input type='hidden' value='<?=$v?>' name='<?=$field?>[]' id="snapshot_input_<?=(100-$k)?>">
	</div>
	<?endforeach;?>
	<?endif;?>
	</div>
	


