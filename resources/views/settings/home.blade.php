@extends('layouts.app')

@section('content')


<link href="<?php echo url("assets/css/jquery.filer.css"); ?>" type="text/css" rel="stylesheet" />
			<link href="<?php echo url("assets/css/themes/jquery.filer-dragdropbox-theme.css"); ?>" type="text/css" rel="stylesheet" />
			<script src="<?php echo url("assets/js/jquery.filer.min.js"); ?>"></script>
			<script src="<?php echo url("assets/js/upload.js"); ?>"></script>
	
	
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="dashboard">Home</a>
							</li>
							


							<li class="active"><?php echo $title;?></li>
						</ul><!-- /.breadcrumb -->

						
					</div>

           
                <div class="page-header">
                    <h1><?php echo $title; ?> </h1>
					</div>
           
			
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="<?php echo url("setting/save"); ?>" enctype="multipart/form-data">
                          
                                           {!! csrf_field() !!} 
                                    <div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Title</label>
											<input placeholder="Site Title" value="<?php echo $setting->title; ?>" type="text" required name="title" class="form-control">
										</div>
									</div>
									
				
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Address</label>
											<input placeholder="Address" value="<?php echo $setting->address; ?>" id="address" type="text" required name="address" class="form-control">
										</div>
									</div>
									
									
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Currency</label>
											<select id="currency"  name="currency" class="form-control">
											<option value="$">  USD </option>
											<option value="€">  EURO </option>
											<option value="£">  GBP </option>
											<option value="¥">  Yen  </option>
											<option value="₣">  Franc </option>
											<option value="₹">  Indian Rupee </option>
											<option value="SAR">  SAR  </option>
											<option value="AED">  AED  </option>
											</select> 
											</div>
									</div>
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Featured Now Price</label>
											<input placeholder="5" value="<?php echo $setting->city; ?>" id="feature_price" type="number"  name="feature_price" class="form-control">
										</div>
									</div>
									
									
									
									
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>City</label>
											<input placeholder="City" value="<?php echo $setting->city; ?>" id="city" type="text"  name="city" class="form-control">
										</div>
									</div>
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>State</label>
											<input placeholder="State" value="<?php echo $setting->state; ?>" id="state" type="text"  name="state" class="form-control">
										</div>
									</div>
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Zip</label>
											<input placeholder="Zip"  id="zip" value="<?php echo $setting->zip; ?>" type="text" required name="zip" class="form-control">
										</div>
									</div>
									
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Longitude </label>
											<input placeholder="Longitude" value="<?php echo $setting->longitude; ?>" id="longitude" type="text" required name="longitude" class="form-control">
										</div>
									</div>
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Latitude </label>
											<input placeholder="Latitude" value="<?php echo $setting->latitude; ?>" id="latitude" type="text" required name="latitude" class="form-control">
										</div>
									</div>
									
									<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label>Phone Number </label>
											<input placeholder="Phone Number" value="<?php echo $setting->phone_no; ?>" id="phone" type="text" required name="phone" class="form-control">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label> Email </label>
											<input placeholder="Email" value="<?php echo $setting->email; ?>" id="phone" type="text" required name="email" class="form-control">
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
										<input id="pac-input" class="controls_map" type="text" placeholder="Search Box">
									<div id="myMap"></div>
									</div>
									</div>
									
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Facebook </label>
											<input placeholder="Facebook URL" name="facebook"  value="<?php echo $setting->facebook; ?>"  type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Twitter </label>
											<input placeholder="Twitter URL" name="twitter"  value="<?php echo $setting->twitter; ?>"  type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Google  </label>
											<input placeholder="Google URL" name="google"  value="<?php echo $setting->google; ?>"  type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>LinkedIn </label>
											<input placeholder="LinkedIn URL" name="linkedin"  value="<?php echo $setting->linkedin; ?>"  type="text" class="form-control">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Youtube </label>
											<input placeholder="Youtube URL" name="youtube"  value="<?php echo $setting->youtube; ?>"  type="text" class="form-control">
										</div>
									</div>

							
									
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<input type="submit" value="Save" class="btn btn-primary pull-right">
										</div>
									</div>
									
					  
                                        
                                    </form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
			<style>
#myMap {
   height: 250px;
   width: 1050px;
}
</style>
			<script src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM"></script>
			
<script type="text/javascript"> 
var map;
var marker;
var myLatlng = new google.maps.LatLng(<?php if(!empty($setting->latitude)) echo $setting->latitude; else echo "40.68455824834792"; ?>,<?php if(!empty($setting->longitude)) echo $setting->longitude; else echo "-73.86099235520011"; ?>);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 12,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

 var input = document.getElementById('pac-input');
		 var searchBox = new google.maps.places.SearchBox(input);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		 // Bias the SearchBox results towards current map's viewport.
			google.maps.event.addListener(searchBox, 'places_changed', function() {
     searchBox.set('map', null);


     var places = searchBox.getPlaces();

     var bounds = new google.maps.LatLngBounds();
     var i, place;
     for (i = 0; place = places[i]; i++) {
       (function(place) {
         
       
         google.maps.event.addListener(marker, 'map_changed', function() {
           if (!this.getMap()) {
             this.unbindAll();
           }
         });
         bounds.extend(place.geometry.location);


       }(place));

     }
     map.fitBounds(bounds);
     searchBox.set('map', map);
     map.setZoom(Math.min(map.getZoom(),12));

   });
   
   
marker = new google.maps.Marker({
	map: map,
	position: myLatlng,
	draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK) {
		if (results[0]) {
			$('#latitude,#longitude').show();
			if(results[0].address_components[7].long_name != "") { 
				$('#zip').val(results[0].address_components[7].long_name);
			}
			$('#city').val(results[0].address_components[3].long_name);
			$('#state').val(results[0].address_components[5].long_name);
			$('#address').val(results[0].formatted_address);
			$('#latitude').val(marker.getPosition().lat());
			$('#longitude').val(marker.getPosition().lng());
			infowindow.setContent(results[0].formatted_address);
			infowindow.open(map, marker);
		}
	}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK) {
		if (results[0]) {
			console.log(results[0].address_components);
			if(results[0].address_components[7].long_name != "") { 
				$('#zip').val(results[0].address_components[7].long_name);
			}
			$('#city').val(results[0].address_components[3].long_name);
			$('#state').val(results[0].address_components[5].long_name);
			$('#address').val(results[0].formatted_address);
			$('#latitude').val(marker.getPosition().lat());
			$('#longitude').val(marker.getPosition().lng());
			infowindow.setContent(results[0].formatted_address);
			infowindow.open(map, marker);
		}
	}
});
});

}
google.maps.event.addDomListener(window, 'load', initialize);

</script>
      
           
@endsection
