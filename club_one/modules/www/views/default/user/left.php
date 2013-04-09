
<ul class="sub">
<?php foreach (Web::get_catalogs('user', isset($catalog['id']) ? $catalog['id'] : 0, 'subxuan') as $nav) { ?>
<li class="<?php echo $nav['class'] ?>">
	<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
</li>
<?php } ?>
</ul>