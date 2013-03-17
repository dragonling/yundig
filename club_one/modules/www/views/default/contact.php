<?php echo View::factory('header') ?>

<script type='text/javascript' src="/assets/admin/javascript/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="/assets/admin/javascript/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	/* setup navigation, content boxes, etc... */
	//Administry.setup();
	
	/* datatable */
	var validator = $("#contact_form").validate({
		rules: {   
			nickname: {required: true}  ,    
			email: {required: true}  ,    
			tel: {required: false}  , 
			content: {required: true}  , 
		},
		messages: { 
			nickname:{required:" <?php echo i18n::get('err_cannot_empty', 'common'); ?>"}  ,    
			email:{required:" <?php echo i18n::get('err_cannot_empty', 'common'); ?>"}  ,    
			tel:{required:""}  ,   
			content:{required:" <?php echo i18n::get('err_cannot_empty', 'common'); ?>"}  ,
		},
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("ok");
		}
	});


});

</script>

<div class="center_content">
<div class="left_content">
	<div class="crumb_nav">
	<a href="<?php echo URL::base('http') ?>">home</a> &gt;&gt; <?php echo $catalog['title']; ?>
	</div>
	<div class="title" style="width:100%">	<?php echo $catalog['title']; ?></div>
   
        	<div class="feat_prod_box_details">
            <p class="details">
            <?php echo $catalog['desc']; ?>
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">all fields are requierd</div> 
					<div class="error"><?php echo Arr::get($_GET, 'msg', '');?></div>
					<form id="contact_form" method="post" action="<?php echo Web::url('main', 'feeback', 1); ?>">
                    <div class="form_row">
                    <label class="contact"><strong>Name<span class="error"> * </span>:</strong></label>
                    <input type="text" id="nickname" name="nickname" class="contact_input" />
                    </div>  

                    <div class="form_row">
                    <label class="contact"><strong>Email<span class="error"> * </span>:</strong></label>
                    <input type="text" id="email" name="email" class="contact_input" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" id="tel" name="tel" class="contact_input" />
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Message<span class="error"> * </span>:</strong></label>
                    <textarea class="contact_textarea" id="content" name="content" ></textarea>
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