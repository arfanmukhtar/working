@extends('frontend.layoutother')

@section('content')
<?php $setting = get_setting(); ?>
  
		<br>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
		<div class="col-md-8">
			<h4> <?php echo $agent->name; ?> <small> 	<?php echo $agent->email; ?> </small> </h4>
			<small> <?php echo count($properties); ?> Result Found  </small>
		</div>
		
		<div class="col-md-4">
			<select style="width:220px" onchange="javascript:window.location.href=this.value" name="selectbasic" class="form-control pull-right">
			  <option <?php if($order=="new") echo "selected"; ?> value="?order=new">Newest First</option>
			  <option <?php if($order=="priceh") echo "selected"; ?> value="?order=priceh">Price High to Low</option>
			  <option <?php if($order=="pricel") echo "selected"; ?> value="?order=pricel">Price Low to High</option>
			</select>
		</div>
		</div>
		<hr>
        <!-- /.row -->

		
		 <div class="row">
		 
		<div class="col-md-12">
    <div class="row list-group">
        <?php foreach($properties as $list): $category = get_catogory($list->category_id); ?>
		<div class="item  col-xs-12 col-lg-3 ">
			<span class="search-promotion label label-lg label-default mostWanted">{{$category}}</span>
            <div class="thumbnail">
                 <img class="group list-group-image" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="" />
                 <?php if($list->featured == 1) { ?>
					<div class="featured-tag">Featured</div>
				<?php } ?>
				<div class="caption">
                    
                   
					<div class="desc-box">
						<h3 class="head_title"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>"><?php echo $list->title; ?></a></h3>
						<h4><?php echo $setting->currency; ?>{{number_format($list->price)}} <small> <?php if($list->type=="SALE") {  ?> For Sale  <?php } else { ?> For Rent <?php } ?> </small></h4>
					<div class="details_info">
						<span class="detail_cell "><?php echo $list->year; ?></span>
						<span class="detail_cell "><?php echo $list->beds; ?> beds</span>
						<span class="detail_cell last_detail_cell"><?php echo $list->bath; ?> baths</span>
					</div>
					
					<div class="details_info">
						<p> {{$list->address}}  </p>
					</div>
					
					<!--<ul class="property-highlight1">
                                 
                    <li class="sq-highlight">
                        <span class="room">Bedrooms</span><span class="path">{{$list->beds}}</span> 
                    </li>
                                 
                    <li class="bed-higlight">
                        <span class="room">Bathrooms</span><span class="path">{{$list->bath}}</span>   
                    </li>
                                    
                    <li class="bed-higlight">
                        <span class="room">Built Year</span><span class="path">{{$list->year}}</span>   
                    </li>
                                    
                </ul> -->
						
						<div class="clearfix">
						</div>
					</div>
				
                </div>
            </div>
        </div>
		<?php endforeach; ?>
    </div>
			
        </div>
		
		
		</div>
		
		<hr>

		
		<?php
			function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
			?>
       
@endsection
