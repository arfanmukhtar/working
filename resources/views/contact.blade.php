@extends('frontend.layoutother')

@section('content')
<?php $setting = get_setting(); ?>
  <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo trans('frontend.Contact');?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
			<div id="map" style="width: 100%; height: 300px;"></div>
               <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM" 
          type="text/javascript"></script>
		  
	 <script type="text/javascript">
    var locations = [
      ['<?php echo $setting->title; ?>', <?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3><?php echo trans('frontend.ContactDetails');?></h3>
                <p>
                    <?php echo $setting->address; ?><br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: <?php echo $setting->phone_no; ?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:<?php echo $setting->email; ?>"><?php echo $setting->email; ?></a>
                </p>
                
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="<?php echo $setting->facebook; ?>"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo $setting->linkedin; ?>"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo $setting->twitter; ?>"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo $setting->google; ?>"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row" id="form_close">
            <div class="col-md-8">
                <h3>Send us a Message</h3>
                <form name="sentMessage" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo trans('frontend.Name');?>:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo trans('frontend.Phone');?>:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo trans('frontend.Email');?>:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><?php echo trans('frontend.ContactThankYou');?>:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="button" id="SendRequest" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>
        <!-- /.row -->
		
		
		<script type="text/javascript">
								
								$("body").on("click" , "#SendRequest" , function() {
									
									var form_data = { 
										name:$("#name").val(),
										email:$("#email").val(),
										phone:$("#phone").val(),
										message:$("#message").val()
									};
									$.ajax({
										type: 'POST',
										url: '<?php echo url("/send_request"); ?>',
										data: form_data,
										success: function (msg) {
											 if(msg!= "") { 
												$("#form_close").html("<?php echo trans('frontend.ContactThankYou');?>");
											 }
											 }
									});
									
								});	
							</script>
							

        <hr>
       
@endsection
