
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
	
</script>

<?php if (Arr::get($_GET, 'debug', 0) == 1) echo View::factory('profiler/stats'); ?>
</body>
</html>