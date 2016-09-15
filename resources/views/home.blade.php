@extends('frontend.app')

@section('content')

  <?php $setting = get_setting(); ?>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"> <?php echo trans('frontend.Realesates');?> : {{count($properties)}}</h3>
               
            </div>
        </div>
        <!-- /.row 

        <div class="row">

            <!-- Blog Entries Column 
            <div class="col-md-8">

               <form class="form-horizontal" action="{{url('listing')}}" method="get">
<fieldset>

<!-- Select Basic
<div class="form-group">
  <div class="col-md-9">
  <input id="textinput" name="keywords" type="text" placeholder=" Address / Keyword / Zip" class="form-control input-md">
    
  </div>
  <div class="col-md-3">
    <select id="selectbasic" name="type" class="form-control">
      <option value="">All</option>
      <option value="SALE">For Sale</option>
      <option value="RENT">For Rent</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <select id="selectbasic" name="min" class="form-control">
      <option value="">Price From</option>
      <option value="">Any</option>
      <option value="0">0</option>
      <option value="1000">1000</option>
      <option value="10000">10000</option>
      <option value="50000">50000</option>
      <option value="100000">100000</option>
      <option value="200000">200000</option>
      <option value="300000">300000</option>
      <option value="400000">400000</option>
      <option value="500000">500000</option>
    </select>
  </div>
  <div class="col-md-3">
    <select id="selectbasic" name="max" class="form-control">
	  <option value="">Price To</option>
      <option value="">Any</option>
      <option value="1000">1000</option>
      <option value="10000">10000</option>
      <option value="50000">50000</option>
      <option value="100000">100000</option>
      <option value="200000">200000</option>
      <option value="300000">300000</option>
      <option value="400000">400000</option>
      <option value="500000">500000</option>
      <option value="1000000">1000000</option>
    </select>
  </div>
  
  <div class="col-md-3">
    <select id="selectbasic" name="bed" class="form-control">
      <option value="">Bedrooms</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
  </div>
  
  <div class="col-md-3">
    <select id="selectbasic" name="bath" class="form-control">
      <option value="">Bathrooms</option>
       <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
  </div>
</div>




<div class="form-group">
  <div class="col-md-12 pull-right">
    <button id="singlebutton" type="submit" class="btn btn-primary">Search Property</button>
  </div>
</div>


</fieldset>
</form>
            </div>

            <!-- Blog Sidebar Widgets Column 
            <div class="col-md-4">
            <div class="row">
			<div class="col-md-12">
			<div class="image">

				  <img class="img-responsive" src="<?php // echo url("assets/images/image.jpg"); ?>" alt="" />
				  
				  <a href="#"> <h2 class="homeh2">A Movie in the Park</h2> </a>

			</div>
            </div>
            </div>
            </div>

        </div>
        /.row 

        <hr>
		-->
		
		
		 <div class="row">
		 
		<div class="col-md-9">
    <div class="row list-group">
        <?php foreach($properties as $list):   $category = get_catogory($list->category_id); ?>
		<div class="item  col-xs-12 col-lg-4 ">
			<span class="search-promotion label label-lg label-default mostWanted">{{$category}}</span> 
            <div class="thumbnail">
                 <img class="group list-group-image" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="" />
                <?php if($list->featured == 1) { ?>
				<div class="featured-tag"><?php echo trans('frontend.Featured');?></div>
				<?php } ?>
				<div class="caption">
                    
                   
					<div class="desc-box">
						<h3 class="head_title"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>"><?php echo $list->title; ?></a></h3>
						<h4> 
  <?php echo $setting->currency; ?>{{number_format($list->price)}} <small> <?php if($list->type=="SALE") {  ?> <?php echo trans('frontend.Sale');?>  <?php } else { ?> <?php echo trans('frontend.Rent');?> <?php } ?> </small> </h4>
										<ul>
                                             <li class="resalt"><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds');?> </strong> <span><?php echo $list->beds; ?></span></li>
                                              <li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath');?>  </strong><span><?php echo $list->bath; ?></span></li>
                                              <li class="resalt"><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area');?> </strong><span><?php echo $list->size; ?> ft²</span></li>
                                              <li class=""><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place');?> </strong><span><?php echo $list->city; ?></span></li>
                                             
                                          </ul>

						
						<div class="clearfix">
						</div>
					</div>
				
                </div>
            </div>
        </div>
		<?php endforeach; ?>
    </div>
			{!! $properties->render() !!}
        </div>
		
		<div class="col-md-3">
			<h4> <?php echo trans('frontend.FeaturedAgents');?></h4>
			<?php foreach($agents as $agent) { 
								$photo = url("assets/images/uploads/" . $agent->id . "/profile.jpg");
											if(!@getimagesize($photo)) { 
												$photo = url("assets/avatars/profile-pic.jpg");
											}
			?>
			<div class="agent">
				<div class="agentimage"><img class="img-responsive" src="{{$photo}}"></div>
				<div class="name"><a href="<?php echo url("agent/properties/" . $agent->id . "/" . clean($agent->name)); ?>"><?php echo $agent->name; ?></a></div>
				<div class="phone"><?php echo $agent->phone; ?></div>
				<div class="mail"><a href="mailto:<?php echo $agent->email; ?>?subject=Estate inquery for"><?php echo $agent->email; ?></a></div>
			</div>
			
			<?php } ?>
			
			
			<h4> <?php echo trans('frontend.FeaturedProperties');?> </h4>
			 <?php foreach($featured_properties as $list) {  ?>
			<div class="agent">
				<div class="agentimage"><img class="img-responsive" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>"></div>
				<div class="name"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">{{$list->title}}</a></div>
				<div class="phone">
  <?php echo $setting->currency; ?>{{number_format($list->price)}} </div>
				
			</div>
			<?php } ?>
			
			
		
			
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
