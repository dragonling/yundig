<?php echo View::factory('header') ?>
<style>
	p.details{height: 98px;overflow:hidden;}
	.new_prod_box a.ntitle{width: 120px;overflow: hidden;padding-left: 5px;text-overflow: ellipsis;}
</style>
<div class="center_content">
<div class="left_content">
	
	<div id="focus">
		<ul>
		<?php foreach (Web::get_carousel(1) as $v): ?>
			<li><a href="<?php echo $v->link =='' ? '#' : $v->link; ?>"><img src="<?php echo $v->image; ?>"/></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	
	<?php 
	/*
	foreach ($feat_product as $v) : ?>
	<div class="feat_prod_box">
	
		<div class="prod_img">
			<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>">
				<img src="<?php echo $v->thumb; ?>" alt="<?php echo htmlspecialchars($v->title) ?>" title="<?php echo htmlspecialchars($v->title) ?>" border="0" width=160 height=160 />
			</a>
		</div>
		
		<div class="prod_det_box">
			<div class="box_top"></div>
			<div class="box_center">
			<div class="prod_title" style="width: 275px;overflow: hidden;text-overflow: ellipsis;" title="<?php echo htmlspecialchars($v->title) ?>"><?php echo $v->model ?></div>
			<p class="details"><?php echo $v->desc ?></p>
			<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>" class="more">- more details -</a>
			<div class="clear"></div>
			</div>
			
			<div class="box_bottom"></div>
		</div>    
	<div class="clear"></div>
	</div>      
	<?php endforeach; 
	*/
	?>
	
	
   <div class="title">New products</div> 
   
   <div class="new_products">
   
			<?php foreach ($new_products as $v) : ?>
			<div class="new_prod_box">
				<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>" class="ntitle" title="<?php echo htmlspecialchars($v->title) ?>"><?php echo $v->model ?></a>
				<div class="new_prod_bg">
				<!--<span class="new_icon"><img src="/assets/themes/pc_accessories/images/new_icon.gif" alt="" title="" /></span>-->
				<a href="<?php echo Web::url('detail', $v->rewrite_url, $v->id); ?>"><img src="<?php echo $v->thumb; ?>" width=90 height=90 alt="<?php echo $v->title ?>" title="<?php echo htmlspecialchars($v->title) ?>" class="thumb" border="0" /></a>
				</div>
			</div>                    
			<?php endforeach; ?>
	</div> 
  
	
<div class="clear"></div>
</div><!--end of left content-->

<?php echo View::factory('righter') ?>


<div class="clear"></div>
</div><!--end of center content-->

	  

<script type="text/javascript">
	eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('$(7(){a r=$("#6").w();a c=$("#6 q G").E;a 3=0;a p;a 8="<9 l=\'B\'></9><9 l=\'8\'>";D(a i=0;i<c;i++){8+="<d></d>"};8+="</9><9 l=\'n C\'></9><9 l=\'n u\'></9>";$("#6").F(8);$("#6 .B").m("b",0.5);$("#6 .8 d").m("b",0.4).t(7(){3=$("#6 .8 d").3(s);e(3)}).z(0).A("t");$("#6 .n").m("b",0.2).x(7(){$(s).j(k,g).h({"b":"0.5"},f)},7(){$(s).j(k,g).h({"b":"0.2"},f)});$("#6 .C").v(7(){3-=1;o(3==-1){3=c-1};e(3)});$("#6 .u").v(7(){3+=1;o(3==c){3=0};e(3)});$("#6 q").m("w",r*(c));$("#6").x(7(){L(p)},7(){p=H(7(){e(3);3++;o(3==c){3=0}},I)}).A("K");7 e(3){a y=-3*r;$("#6 q").j(k,g).h({"J":y},f);$("#6 .8 d").j(k,g).h({"b":"0.4"},f).z(3).j(k,g).h({"b":"1"},f)}});',48,48,'|||index|||focus|function|btn|div|var|opacity|len|span|showPics|300|false|animate||stop|true|class|css|preNext|if|picTimer|ul|sWidth|this|mouseenter|next|click|width|hover|nowLeft|eq|trigger|btnBg|pre|for|length|append|li|setInterval|4000|left|mouseleave|clearInterval'.split('|'),0,{}))

</script>
<?php echo View::factory('footer') ?>