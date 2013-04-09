
<ul class="sub">
<?php foreach (Web::get_catalogs($catalog['parent_id'], $catalog['id'], 'subxuan') as $nav) { ?>
<li class="<?php echo $nav['class'] ?>">
	<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
</li>
<?php } ?>
</ul>