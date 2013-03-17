
        <div class="right_content">
        	<div class="languages_box">
            <span class="red">Languages:</span>
			<?php foreach (Common_Main::languages() as $v) { ?>
            <a href="<?php echo URL::query(array('language_id' => $v->id)); ?>"><img src="<?php echo $v->icon ?>" alt="" title="<?php echo $v->name ?>" border="0" /></a>
			<?php } ?>
            </div>
        
             
            <div class="right_box">
				<div class="title">Categories</div>                
                <ul class="list">
				<?php foreach (Web::product_category() as $v) : ?>
                <li>
					<a href="<?php echo Web::url('list', $v['rewrite_url'], $v['id']); ?>"><?php echo $v['title']; ?></a>
					<?php if (isset($v['sub_items'])) echo Web::show_sub_items($v['sub_items'], 'list'); ?>
				</li>
				<?php endforeach; ?>
                </ul>               
             
            </div>
			
            <div class="right_box trchat">
				<div class="title">Chat Online</div> 
				<?php 
					$customer_service = Web::config('customer_service');
					$customer_service = unserialize($customer_service);					
				?>
				<ul style="float:left;">
					<li class="msn">
					<?php 
						$cs = explode(',', $customer_service['msn']);
						if (is_array($cs))
						{
							foreach ($cs as $k => $v)
							{
								echo $k > 0 ? ', ' : ''; 
								echo '<a href="msnim:chat?contact='.$v.'" target="_blank">'.$v.'</a>';
							}
						}
					?>
					</li>
					<li class="skype">					
					<?php 
						$cs = explode(',', $customer_service['skype']);
						if (is_array($cs))
						{
							foreach ($cs as $k => $v)
							{
								echo $k > 0 ? ', ' : ''; 
								echo '<a href="skype:'.$v.'" target="_blank">'.$v.'</a>';
							}
						}
					?>
					</li>
					<li class="qq">					
					<?php 
						$cs = explode(',', $customer_service['qq']);
						if (is_array($cs))
						{
							foreach ($cs as $k => $v)
							{
								echo $k > 0 ? ', ' : ''; 
								echo '<a href="http://wpa.qq.com/msgrd?v=3&uin='.$v.'&site=qq&menu=yes" target="_blank">'.$v.'</a>';
							}
						}
					?>
					</li>
					<li class="email">					
					<?php 
						$cs = explode(',', $customer_service['email']);
						if (is_array($cs))
						{
							foreach ($cs as $k => $v)
							{
								echo $k > 0 ? ', ' : ''; 
								echo '<a href="mailto:'.$v.'" target="_blank">'.$v.'</a>';
							}
						}
					?>
					</li>
				</ul>             
            </div>             
        
		
            <div class="right_box trchat">
				<div class="title">About Us</div> 
				<div class="about">
					<p>				
					<?php echo Web::config('about_us'); ?>
					</p>             
				</div>
			</div>
			
			
            <div class="clear">
            <div class="title">Links</div> 
			<div class="links clear">
				<?php foreach (Web::get_friendly_links(10, 1) as $v): ?>
				<a href="<?php echo $v->link ?>"><?php echo $v->title; ?></a><br />
				<?php endforeach; ?>
            </div>
			</div>
			
        </div><!--end of right content-->
        