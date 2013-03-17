
       
              
       <div class="footer">
        <div class="right_footer t_c">
			<?php foreach (Web::get_catalogs('header', $cat) as $nav) { ?>
			<a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a>
			<?php } ?> 
        </div>
		<div class="clear"></div>
		<div class="right_footer" style="padding-left:25px;">
			<?php echo Web::config('copyright'); ?>
		</div>
       </div>
<a href="#" class="gotop" title="go top"></a>
</div>
<script type="text/javascript">
$(function(){
	$(".gotop").returnTop();
})	
</script>

</body>
</html>