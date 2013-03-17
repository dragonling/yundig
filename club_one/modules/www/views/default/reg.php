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
        	<div class="feat_prod_box_details">
            
              	<div class="contact_form">
                <div class="form_subtitle">登記成為會員</div> 
					<div class="error"><?php echo Arr::get($_GET, 'msg', '');?></div>
					<form id="contact_form" method="post" action="<?php echo Web::url('', 'user/reg_next', 1); ?>">
                    
                    <div class="form_row">
                    <label class="contact"><strong>Email<span class="error"> * </span>:</strong></label>
                    <input type="text" id="email" name="email" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>Password<span class="error"> * </span>:</strong></label>
                    <input type="password" id="password" name="password" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>password_confirm<span class="error"> * </span>:</strong></label>
                    <input type="password" id="password_confirm" name="password_confirm" class="contact_input" />
                    </div>
					
					<div class="form_row">
                    <label class="contact"><strong>Name<span class="error"> * </span>:</strong></label>
                    <input type="text" id="first_name" name="first_name" class="" />
                    <input type="text" id="last_name" name="last_name" class="" />
                    </div>  

                    <div class="form_row">
                    <label class="contact"><strong>Gender:</strong></label>
                    <?php echo Form::radios('gender', i18n::get('data_gender', 'user'), 1); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>出生日期:</strong></label>
                    <?php 
						//日
						$days = array('0' => '日');
						for($i = 1; $i <= 31; $i++) $days[$i] = $i;
						echo Form::select('day', $days, 0);
						
						//月
						$months = array('0' => '月');
						for($i = 1; $i <= 12; $i++) $months[$i] = $i;
						echo Form::select('month', $months, 0);
						
						//年
						$years = array('0' => '年');						
						for($i = date('Y')-16; $i > date('Y')-70; $i--) $years[$i] = $i;
						echo Form::select('year', $years, 0);
					?>
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Phone<span class="error"> * </span>:</strong></label>
                    <input type="text" id="phone" name="phone" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>spare_email<span class="error"> * </span>:</strong></label>
                    <input type="text" id="spare_email" name="spare_email" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>id_card<span class="error"> * </span>:</strong></label>
                    <input type="text" id="id_card" name="id_card" class="contact_input" />
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>County<span class="error"> * </span>:</strong></label>
						<?php echo Form::select('county', i18n::get('data_county', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>education<span class="error"> * </span>:</strong></label>
						<?php echo Form::select('education', i18n::get('data_education', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>profession<span class="error"> * </span>:</strong></label>
						<?php echo Form::select('profession', i18n::get('data_profession', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>income<span class="error"> * </span>:</strong></label>
						<?php echo Form::select('income', i18n::get('data_income', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>family_income<span class="error"> * </span>:</strong></label>
						<?php echo Form::select('family_income', i18n::get('data_family_income', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>marriage<span class="error"> * </span>:</strong></label>
						<?php echo Form::radios('marriage', i18n::get('data_marriage', 'user'), 0); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>referrer_name<span class="error"> * </span>:</strong></label>
						<?php echo Form::input('referrer_name'); ?>
                    </div>
					
                    <div class="form_row">
                    <label class="contact"><strong>referrer_id<span class="error"> * </span>:</strong></label>
						<?php echo Form::input('referrer_id'); ?>
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