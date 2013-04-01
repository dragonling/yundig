
<link href="<?php echo Kohana::$base_url ?>assets/admin/swfupload/upload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/admin/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo Kohana::$base_url ?>assets/admin/swfupload/js/handlers.js"></script>
<script type="text/javascript">
	var <?php echo $field; ?>_swfu;
	$(document).ready(function(){
		<?php echo $field; ?>_swfu = new SWFUpload({
			// Backend Settings
			upload_url: "<?php echo URL::site('admin/common/upload')?>",
			file_post_name: "resume_file",
			post_params: {upload_path:'<?php echo $path ?>'},

			// File Upload Settings
			file_size_limit : "5 MB",	// 2MB
			file_types : "*.png;*.jpg;*.gif",
			file_types_description : "all Images",
			file_upload_limit : "10",
			file_queue_limit : "10",

			// Event Handler Settings - these functions as defined in Handlers.js
			//  The handlers are not part of SWFUpload but are part of my website and control how
			//  my website reacts to the SWFUpload events.
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,
			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,

			// Button Settings
			button_image_url : "<?php echo Kohana::$base_url ?>assets/admin/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png",
			button_placeholder_id : "<?php echo $field; ?>_spanButtonPlaceholder",
			button_width: 180,
			button_height: 18,
			button_text : '<span class="button">Select Images <span class="buttonSmall">(5 MB Max)</span></span>',
			button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
			button_text_top_padding: 0,
			button_text_left_padding: 18,
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,
			
			// Flash Settings
			flash_url : "<?php echo Kohana::$base_url ?>assets/admin/swfupload/swfupload.swf",

			custom_settings : {
				upload_target : "<?php echo $field; ?>_divFileProgressContainer",
				cancelButtonId : "btnCancel1",
				field: "<?php echo $field; ?>"
			},
			
			// Debug Settings
			debug: false
		});
	});
	
//上传成功操作
var count = 0;
function addImage(src, field) {
	var newThumb = document.createElement("div");
	var newImg   = document.createElement("img");
	var newInput = document.createElement("input");
	var myInput    = document.createElement("div");
	var altInput = document.createElement("input");
	var hrefInput = document.createElement("input");
	
	newThumb.className = 'thumb';
	
	newImg.id = field+"_image_"+ count;
	newImg.className = 'image';
	
	newInput.type = "hidden";
	newInput.id= field+"_input_"+ count;
	newInput.value= src;
	newInput.name= field+"["+count+"][src]";
	
	myInput.innerHTML =  '&nbsp;Src: <input type="text" name="'+field+'['+count+'][src]" value="'+src+'" class="normal"><br />'
						+'&nbsp;&nbsp;Alt: <input type="text" name="'+field+'['+count+'][alt]" class="normal"><br />'
						+'Href: <input type="text" name="'+field+'['+count+'][href]" class="normal">';
	
	newThumb.innerHTML = '<a href="javascript:;" onclick="removeImage($(this))" title="<?php echo I18n::get('btn_remove', 'common')?>"></a>';
	newThumb.appendChild(newImg);
	newThumb.appendChild(newInput);
	newThumb.appendChild(myInput);
	document.getElementById(field+'_thumbnails').appendChild(newThumb);
	
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

	newImg.src = src;
	
	$(".thumb").live("click",function(){
		selectImage($(this));
	});
	count++;
}

function removeImage(obj)
{
	window.confirm('Confirm Delete Image?',{call:function () {
		obj.parent().fadeOut(500, function() {
			obj.parent().remove();
		});
	}});
}
function selectImage(obj)
{
	obj.parent().find('div').removeClass('thumb_selected');
	obj.addClass('thumb_selected');
}
</script>

<div style="width: 180px; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
	<span id="<?php echo $field; ?>_spanButtonPlaceholder"></span>
</div>

<div id="<?php echo $field; ?>_divFileProgressContainer"></div>
<div id="<?php echo $field; ?>_thumbnails" class="thumbnails">
	<?php 
		if(isset($path) && $value != '')
		{
			$album_list = unserialize($value);
			echo '<script>count = '.(count($album_list)+1).';</script>';
			$k = 0;
			foreach($album_list as $v)
			{
				if( ! is_array($v) || ! isset($v['src'])) continue;
				$k++;
	?>
			
	<div class="thumb" onclick="selectImage($(this))">
		<a href="javascript:;" onclick='removeImage($(this))' title="<?php echo I18n::get('btn_remove', 'common')?>"></a>
		<img id="snapshot_image_<?php echo $k; ?>" src="<?php echo $v['src']; ?>" class="image">
		<div>
		&nbsp;Src: <input type='text' value='<?php echo $v['src']; ?>' name='<?php echo $field; ?>[<?php echo $k; ?>][src]' class="normal"><br />
		&nbsp;&nbsp;Alt: <input type='text' value='<?php echo $v['alt']; ?>' name='<?php echo $field; ?>[<?php echo $k; ?>][alt]' class="normal"><br />
		Href: <input type='text' value='<?php echo $v['href']; ?>' name='<?php echo $field; ?>[<?php echo $k; ?>][href]' class="normal">
		</div>
	</div>
	<?php 	} ?>
	<?php } ?>
	<input type='hidden' value='' name='<?php echo $field; ?>[]'>
</div>



