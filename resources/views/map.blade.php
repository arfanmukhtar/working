@extends('frontend.layoutmap')

@section('content')

  <?php $setting = get_setting(); ?>

       <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"> <?php echo trans('frontend.Realesates');?> </h3>
            </div>
        </div>
     

		
		 <div class="row">
		 
		 <div class="col-md-3">
			 <form class="form-horizontal" method="get" action="{{url('maplisting')}}">
<fieldset>

<!-- Select Basic -->
<div class="form-group">
  <div class="col-md-12">
   <input id="textinput" name="keywords" type="text" placeholder="<?php echo trans('frontend.Address');?> / <?php echo trans('frontend.Keywords');?> / <?php echo trans('frontend.Zip');?>" class="form-control input-md">
      
  </div>
  </div>
  <div class="form-group">
  <div class="col-md-12">
    <select id="selectbasic" name="type" class="form-control">
       <option value=""><?php echo trans('frontend.All');?></option>
      <option value="SALE"><?php echo trans('frontend.Sale');?></option>
      <option value="RENT"><?php echo trans('frontend.Rent');?></option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-6">
    <select id="selectbasic" name="min" class="form-control">
      <option value=""><?php echo trans('frontend.PriceFrom');?></option>
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
  <div class="col-md-6">
    <select id="selectbasic" name="max" class="form-control">
	<option value=""><?php echo trans('frontend.PriceTo');?></option>
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
  

</div>
<div class="form-group">
<div class="col-md-6">
    <select id="selectbasic" name="bed" class="form-control">
     <option value=""><?php echo trans('frontend.Beds');?></option>
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
  
  <div class="col-md-6">
    <select id="selectbasic" name="bath" class="form-control">
      <option value=""><?php echo trans('frontend.Bath');?></option>
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
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary"><?php echo trans('frontend.Search');?></button>
  </div>
</div>

</fieldset>
</form>


<h4>  <?php echo trans('frontend.Agents');?> </h4>
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
			
			
			
			
			<br />
		</div>
		
		
		 
		<div class="col-md-9">
    <div class="row list-group">
        <?php foreach($properties as $list): $category = get_catogory($list->category_id);?>
		<div class="item  col-xs-12 col-lg-4 ">
			<span class="search-promotion label label-lg label-default mostWanted">{{$category}}</span> 
            <div class="thumbnail">
                 <img class="group list-group-image" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="" />
				 <?php if($list->featured == 1) { ?>
					<div class="featured-tag"><?php echo trans('frontend.Featured');?> </div>
				<?php } ?>
                <div class="caption">
                    
                   
					<div class="desc-box">
						<h3 class="head_title"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>"><?php echo $list->title; ?></a></h3>
						<h4>
  <?php echo $setting->currency; ?>{{number_format($list->price)}} <small> <?php if($list->type=="SALE") {  ?> For Sale  <?php } else { ?> For Rent <?php } ?> </small></h4>
						<ul>
                                             <li class="resalt"><strong><?php echo trans('frontend.Beds');?> </strong><span><?php echo $list->beds; ?></span></li>
                                              <li><strong><?php echo trans('frontend.Bath');?>   </strong><span><?php echo $list->bath; ?></span></li>
                                              <li class="resalt"><strong><?php echo trans('frontend.Area');?> </strong><span><?php echo $list->size; ?> ft²</span></li>
                                              <li class=""><strong><?php echo trans('frontend.Place');?>  </strong><span><?php echo $list->city; ?></span></li>
                                             
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
		
		
		</div>
		<?php
			function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
			?>
		
		<script type="text/javascript"> 
		$(document).ready(function() {
			$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
			$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		});
		</script>

       
@endsection
