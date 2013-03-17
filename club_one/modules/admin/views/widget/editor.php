<textarea name="<?php echo $field ?>" id="<?php echo $field ?>" style="width:100%;height:400px;"><?php echo $value ?></textarea>

<script charset="utf-8" src="/assets/admin/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/admin/kindeditor/lang/<?php echo isset($lang) ? $lang : 'zh_CN' ?>.js"></script>
<script>
	KindEditor.ready(function(K) {
		K.create('#<?php echo $field ?>', {
			langType : '<?php echo isset($lang) ? $lang : 'zh_CN' ?>'
		});
	});
</script>