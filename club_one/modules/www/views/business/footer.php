
    </div> <!-- end of templatemo_content -->
    
    <div id="templatemo_sidebar">
    	
        <div id="request_a_quote">
        
            <h2>Quick Contact</h2>
       
            <form action="#" method="get">
            <label>Name</label>
            <input type="text" value="" name="q" size="10" class="quote_input" title="Name" />
            <label>Email address</label>
            <input type="text" value="" name="q" size="10" class="quote_input" title="Email address" />
            <label>Subject</label>
            <input type="text" value="" name="q" size="10" class="quote_input" title="Subject" />
            <input type="submit" name="Submit" value="" alt="Submit" id="submit_btn" title="Submit" />
            </form>
            
            <div class="cleaner"></div>
        </div>
        
        <div id="sidebar_featured_project">
        	
            <h3>Featured Project</h3>
            <div class="left"><img src="<?php echo Kohana::$base_url ?>assets/themes/business/images/documents.png" alt="image" /></div>
            <div class="right">
            	<h6>Lorem ipsum dolor sit</h6>
            	<p>Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor.</p>
            </div>
            
             <div class="cleaner"></div>
            
        </div>
        
        <div id="news_section">
            
            <h3>User News</h3>
                    
            <div class="news_box">
                <a href="#">Lorem ipsum dolor sit amet consectetur </a>
                <p>Maecenas tellus erat, dictum vel semper a, dapibus ac elit. Nunc rutrum pretium porta.</p>
            </div>
            
             <div class="news_box">
               	<a href="#">Aenean feugiat mattis est nec egestas</a>
                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
            </div>
               
            <div class="cleaner"></div>     
        </div>
    
    	<div class="cleaner"></div>
    </div>
    
    <div id="templatemo_footer">

        <ul class="footer_menu">
			<?php foreach (Web::get_catalog('footer') as $nav) { ?>
			<li><a href="<?php echo $nav['link'] ?>" target="<?php echo $nav['target'] ?>"><?php echo $nav['title'] ?></a></li>
			<?php } ?>
        </ul>
    
        Copyright © 2024 <a href="#">Your Company Name</a> | from <a href="http://www.cssmoban.com" target="_parent">网站模板</a> | Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    
    </div> <!-- end of footer -->

</div> <!-- end of wrapper -->


</body>
</html>
