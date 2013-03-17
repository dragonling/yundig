<?php echo View::factory('header') ?>

<script type='text/javascript' src="/assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="/assets/admin/javascript/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	/* datatable */
	var validator = $("#login_form").validate({
		rules: {   
			email: {required: true}  ,
			password: {required: true}  ,
		}
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>

<div class="center_content">
<div class="left_content">
        	<div class="feat_prod_box_details">
            
              	<div class="contact_form">
                <div class="form_subtitle">登錄</div> 
					<div class="error"><?php echo Arr::get($_GET, 'msg', '');?></div>
					<form id="contact_form" method="post" action="<?php echo Web::url('', 'user/authorize', 1); ?>">
                    
                    <div class="form_row">
                    <label class="contact"><strong>Email<span class="error"> * </span>:</strong></label>
                    <input type="text" id="username" name="username" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>Password<span class="error"> * </span>:</strong></label>
                    <input type="password" id="password" name="password" class="contact_input" />
                    </div>
					
                    <div class="form_row">
						<label class="contact">&nbsp;</label>
						<button type="submit" id="submit_btn" class="contact" style="border:0;padding:0;">send</button>
					</div>
					</form>
                </div>  
            
          </div>	
            
</div><!--end of left content-->


<div class="clear"></div>
</div><!--end of center content-->

	  

<?php echo View::factory('footer') ?>