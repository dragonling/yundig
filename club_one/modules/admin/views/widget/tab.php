<?php foreach ($tabs as $name => $data) { ?>
<ul class='tab <?php echo $name ?>' name='<?php echo $name ?>'>
	<?php foreach ($data as $v) { ?>
	<li class="tab_title <?php echo $v['name'] . ' ' . $v['selected'] ?>">
		<a href="<?php echo (isset($v['link']) && $v['link'] != '') ? $v['link'] : "javascript:select_tab('{$name}', '{$v['name']}')" ?>"><?php echo $v['title']; ?></a>
	</li>
		<?php 
			if ((! isset($v['link']) || $v['link'] == '') && $v['selected'] != '')
			{
				echo "<script>$(function() {select_tab('{$name}', '{$v['name']}');})</script>";
			}
		?>
	<?php }?>
</ul>
<?php } ?>
