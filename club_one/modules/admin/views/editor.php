<script charset="utf-8" src="<?=Kohana::$base_url?>assets/admin/js/editor/kindeditor-min.js"></script>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="<?php echo $field ?>"]', {
				langType : '<?php echo isset($lang) ? $lang : 'zh_CN' ?>'
			});
	});
</script>
<textarea name="<?php echo $field ?>" style="width:90%;height:300px;"><?php echo $value ?></textarea>