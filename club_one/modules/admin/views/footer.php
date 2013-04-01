
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
	
<?php if (isset($message)) echo 'alert("'.$message.'");' ?>
<?php if (Arr::get($_GET, 'status', '') == 'success') { ?>
	tips('<?php echo I18n::get('alt_save_success', 'common'); ?>');
<?php } ?>
</script>

<?php if (Arr::get($_GET, 'debug', 0) == 1) echo View::factory('profiler/stats'); ?>
</body>
</html>