<div class="t_l location">&nbsp;
<?php
	foreach ($location as $v)
	{
		echo " <a href='{$v['link']}'>{$v['title']}</a> >>";
	}
?>
<?php if (isset($request_referrer)) { ?>
<a href="<?php echo $request_referrer; ?>" class="location_return"><< <?php echo i18n::get('btn_return', 'common');?></a>
<?php } ?>
</div>