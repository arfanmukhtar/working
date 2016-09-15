<?php $setting = get_setting(); ?>
<footer id="footerWrapper" class="footer2">
	<section id="footerRights">
		<div class="container">
			<div class="row">
			
				<div class="col-md-12">
					<p><?php echo trans('frontend.Copyright');?> © <?php echo date("Y"); ?> <a href="http://about.me/aliarfan" target="blank">Arfan Ali</a> / All rights reserved.</p>
				</div>
			</div>
		</div>
	</section>
</footer>




<div id="slider" style="right:-342px;">
		<div id="sidebar" onclick="open_panel()">
			<img src="<?php echo url("assets/images/contact.png"); ?>"/>
		</div>
		<div id="header_contact" class="form_close">
				
					<h2><?php echo trans('frontend.Contact');?></h2>
					<p><?php echo trans('frontend.FillFormtoContact');?></p>
					<input type="text" id="dname"  name="dname" Placeholder="<?php echo trans('frontend.Name');?>"/>
					<input type="text" id="demail" name="demail" Placeholder="<?php echo trans('frontend.Email');?>"/>
					<input type="text"  id="dphone" name="demail" Placeholder="<?php echo trans('frontend.Phone');?>"/>
					
					
					<textarea type="text" id="dmessage" Placeholder="<?php echo trans('frontend.Message');?>"></textarea><br/>
					<button id="SendRequest"><?php echo trans('frontend.MessageSend');?></button>
				
		</div>
	</div>
	
	
	<script type="text/javascript">
								
								$("body").on("click" , "#SendRequest" , function() {
									
									var form_data = { 
										name:$("#dname").val(),
										email:$("#demail").val(),
										phone:$("#dphone").val(),
										message:$("#dmessage").val()
									};
									$.ajax({
										type: 'POST',
										url: '<?php echo url("/send_request"); ?>',
										data: form_data,
										success: function (msg) {
											 if(msg!= "") { 
												$(".form_close").html("<?php echo trans('frontend.ContactThankYou');?>");
											 }
											 
											 $("#dname").val("");
											 $("#demail").val("");
											 $("#dphone").val("");
											 $("#dmessage").val("");
										
											 }
									});
									
								});	
							</script>