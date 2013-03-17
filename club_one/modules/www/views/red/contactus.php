<?php echo View::factory('header') ?>    
        
    	<h2>Contact Us</h2>
        <p>Duis et leo elit, et aliquam turpis. In egestas justo at nulla mattis non commodo nulla sodales. Pellentesque vehicula rutrum ante, at euismod mauris dignissim commodo. </p>
        <h6>&nbsp;</h6>
        <h6>Company Name</h6>
      111-222 Quisque odio quam, <br />
        Pulvinar sit amet convallis eget, 10110<br />
        Venenatis ut turpis<br />
        email: info [ at ] yoursite [ dot ] com  
    	
        <div class="cleaner_h40"></div>
        
        <h4>Quick Contact</h4>
        <div id="contact_form">
        
            <form method="post" name="contact" action="#">
            
                <input type="hidden" name="post" value=" Send " />
              <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                <div class="cleaner_h10"></div>
                
                <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                <div class="cleaner_h10"></div>
                
                <label for="url">Phone:</label> <input type="text" name="url" id="url" class="input_field" />
              <div class="cleaner_h10"></div>
                
                <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                <div class="cleaner_h10"></div>
                
                <input style="font-weight: bold;" type="submit" class="submit_btn" name="submit" id="submit" value=" Send " />
                <input style="font-weight: bold;" type="reset" class="submit_btn" name="reset" id="reset" value=" Reset " />
            
          </form>
            
        </div>
        
<?php echo View::factory('footer') ?>