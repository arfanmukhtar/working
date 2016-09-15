@extends('frontend.layoutother')

@section('content')

<?php $setting = get_setting(); ?>
  
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $property->title; ?> 
                    <small><?php echo get_catogory($property->category_id); ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home');?></a>
                    </li>
                    <li class="active"><?php echo $property->title; ?> </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive"  width="750px"  src="<?php echo url("assets/images/uploads/" . $property->user_id .  "/" . $property->image_name); ?>" alt="">
                        </div>
						<?php foreach($property_photos as $photo) { ?>
						<div class="item">
                            <img class="img-responsive"  width="750px" src="<?php echo url("assets/images/uploads/" . $property->user_id . "/" . $property->id . "/" . $photo->image_name); ?>" alt="">
                        </div>
					
					<?php } ?>
                        
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
				
				
                <h3 class="page-header"><?php echo trans('frontend.Description');?></h3>
				<p> <?php echo $property->body; ?> </p>
            
            </div>

            <div class="col-md-4">
				<div id="map" style="width: 100%; height: 300px;"></div>
				
				<div class="price_detail" style="padding-top:20px;">
				<?php echo $setting->currency; ?><?php echo number_format($property->price , 0); ?> 
				<span class="secondary_text"><?php if($property->type=="SALE") {  ?> <?php echo trans('frontend.Sale');?>  <?php } else { ?> <?php echo trans('frontend.Rent');?> <?php } ?></span>
				</div>

				<div class="details_info">
				<span class="detail_cell first_detail_cell"><i class="fa fa-arrows" ></i> <?php echo $property->size; ?> ft²</span>
									<span class="detail_cell "> <i class="fa fa-calendar" ></i> <?php echo $property->year; ?></span>
									<span class="detail_cell "><i class="fa fa-umbrella" ></i> <?php echo $property->beds; ?> <?php echo trans('frontend.Beds');?></span>
									<span class="detail_cell last_detail_cell"><i class="fa fa-wheelchair" ></i> <?php echo $property->bath; ?> <?php echo trans('frontend.Bath');?></span>
									</div>
				
				<div class="details_info">
				<p> <?php echo $property->address; ?> </p>
				</div>
				
				
				<div class="padded_solid_black_border items item-rows top_spacer bottom_spacer hidden-xs hidden-sm">
            <div class="col-md-6">
					<?php
						$photo = url("assets/images/uploads/" . $property->agent_id . "/profile.jpg");
											if(!@getimagesize($photo)) { 
												$photo = url("assets/avatars/profile-pic.jpg");
											}
					?>
				     <img class="img-circle" src="<?php echo $photo; ?>" alt="">
			</div>
			<div class="col-md-6">
                <h3>{{$agent->name}}</h3>
				<p> {{$agent->email}} </p>
				<p> {{$agent->phone}} </p>
               
                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"href="javascript:void(0)"><?php echo trans('frontend.Contact');?></i></a>
            </div>
            </div>
               
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">
		
			<div class="col-md-12">
                <h3 class="page-header"><?php echo trans('frontend.Features');?></h3>
				<?php $property_features = explode("," , $property->features); foreach($features as $list) :  ?>
				<div class="col-md-3">  <i class="<?php if(in_array($list->id ,$property_features)) { ?>fa fa-check blue<?php } else { ?> fa fa-times red <?php } ?> "> </i> {{$list->name}}</div>
				<?php endforeach; ?>
            </div>

            <div class="col-lg-12">
                <h3 class="page-header"><?php echo trans('frontend.RelatedProperties');?></h3>
            </div>
			<?php  if(!empty($property->related)) {  $property_related = explode("," , $property->related); 
						
			for($i = 0; $i< count($property_related) ; $i++) { 
				    $property = get_property($property_related[$i]);
			?>
	
            <div class="col-sm-3 col-xs-6">
                <a href="<?php echo url("property/" . $property->id . "/" . clean($property->title)); ?>">
                    <img class="img-responsive img-hover img-related" src="<?php echo url("/assets/images/uploads/" . $property->user_id . "/" . $property->image_name); ?>" alt="">
                </a>
            </div>

            <?php }  } ?>

        </div>
        <!-- /.row -->

        <hr>
 <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM" 
          type="text/javascript"></script>
		  
	 <script type="text/javascript">
    var locations = [
      ['<?php echo $property->title; ?>', <?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>),
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
  
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo trans('frontend.Contact');?></h4>
      </div>
      <div class="modal-body">
       <form role="form" action="<?php echo url("send_request"); ?>" method="post">
                                        <div class="modal-body" id="form_close">
                                           {!! csrf_field() !!} 
											
                                        <div class="form-group">
                                            <label> <?php echo trans('frontend.Name');?></label>
                                            <input class="form-control" type="text" required id="name" name="name">
                                            <input class="form-control" type="hidden" id="property_id" value="<?php echo $property->id; ?>" name="agent_id">
                                          </div>
										  
										  <div class="form-group">
                                            <label> <?php echo trans('frontend.Email');?></label>
                                            <input class="form-control" type="text" required id="email" name="email">
                                          </div>
										  
										  <div class="form-group">
                                            <label> <?php echo trans('frontend.Phone');?></label>
                                            <input class="form-control" type="text" id="phone" name="phone">
                                          </div>
										  
										  
										  <div class="form-group">
                                            <label> <?php echo trans('frontend.Message');?></label>
                                            <textarea class="form-control" type="text" id="message"  name="message"> </textarea>
                                          </div>
										  
										   
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" id="SendRequest" class="btn btn-primary">Send Request</button>
                                        </div>
										</form>
      </div>
    
    </div>
  </div>
</div>
  
  <script type="text/javascript">
								
								$("body").on("click" , "#SendRequest" , function() {
									
									var form_data = { 
										property_id:$("#property_id").val(),
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
												$("#form_close").html("Thank you for Contact With Us. We Will contact back you soon");
											 }
											 }
									});
									
								});
								
								
								
									
							</script>
							
							
		<?php
			function clean($string) {
				$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
				return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
			}	
		?>
           
  
@endsection
