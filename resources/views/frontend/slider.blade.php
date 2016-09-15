<header id="myCarousel" class="carousel slide">
     
			
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo url("assets/frontend/images/slides/1.jpg"); ?>');"></div>
              
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('<?php echo url("assets/frontend/images/slides/2.jpg"); ?>');"></div>
                
            </div>
			
			 <div class="item">
                <div class="fill" style="background-image:url('<?php echo url("assets/frontend/images/slides/3.jpg"); ?>');"></div>
                
            </div>
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
		
		<div id="text">
			<div class="col-md-12">
			<h3> <?php echo trans('frontend.search_title');?> </h3>
               <form class="form-horizontal" action="{{url('listing')}}" method="get">
<fieldset>

<!-- Select Basic -->
<div class="form-group">
  <div class="col-md-9">
  <input id="textinput" name="keywords" type="text" placeholder="<?php echo trans('frontend.Address');?> / <?php echo trans('frontend.Keywords');?> / <?php echo trans('frontend.Zip');?>" class="form-control input-md">
    
  </div>
  <div class="col-md-3">
    <select id="selectbasic" name="type" class="form-control">
      <option value=""><?php echo trans('frontend.All');?></option>
      <option value="SALE"><?php echo trans('frontend.Sale');?></option>
      <option value="RENT"><?php echo trans('frontend.Rent');?></option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
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
  <div class="col-md-3">
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
  
  <div class="col-md-3">
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
  
  <div class="col-md-3">
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
  <div class="col-md-12 pull-right">
    <button id="singlebutton" type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> Find Properties</button>
  </div>
</div>


</fieldset>
</form>
            </div>
		</div>
    </header>
	
