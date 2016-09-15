<?php $setting = get_setting(); ?>
<div class="top-bar-dark">            
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">
                        <div class="top-bar-socials">
                            <a href="<?php echo $setting->facebook; ?>" class="social-icon-sm si-dark si-gray-round si-colored-facebook">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="<?php echo $setting->twitter; ?>" class="social-icon-sm si-dark si-gray-round si-colored-twitter">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="<?php echo $setting->google; ?>" class="social-icon-sm si-dark si-gray-round si-colored-google-plus">
                                <i class="fa fa-google-plus"></i>
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="<?php echo $setting->linkedin; ?>" class="social-icon-sm si-dark si-gray-round si-colored-linkedin">
                                <i class="fa fa-linkedin"></i>
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="<?php echo $setting->youtube; ?>" class="social-icon-sm si-dark si-gray-round si-colored-google-plus">
                                <i class="fa fa-youtube"></i>
                                <i class="fa fa-youtube"></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class="col-sm-8 text-right">
                        <ul class="list-inline top-dark-right"> 
							<li><a class="" href="<?php echo url("localization/en"); ?>"><span class="flag-icon flag-icon-gb"></span></a>
							<a class="" href="<?php echo url("localization/es"); ?>"><span class="flag-icon flag-icon-es"></span></a></li>
           						
                            <li class="hidden-sm hidden-xs"><i class="fa fa-envelope"></i> <?php echo $setting->email; ?></li>
                            <li class="hidden-sm hidden-xs"><i class="fa fa-phone"></i> <?php echo $setting->phone_no; ?></li>
                            <li><a href="<?php echo url("login"); ?>"><i class="fa fa-lock"></i> <?php echo trans('frontend.Login');?></a></li>
                            <li><a href="<?php echo url("register"); ?>"><i class="fa fa-user"></i> <?php echo trans('frontend.Register');?></a></li>
                            <li><a class="topbar-icons" href="javascript:void(0)"><span><i class="fa fa-search top-search"></i></span></a></li>
                            
							<!--<li> 
								<select class="selectpicker" data-width="fit">
								   <option data-content='<span class="flag-icon flag-icon-gb"></span> English'>English</option>
							      <option  data-content='<span class="flag-icon flag-icon-es"></span> Español'>Español</option>
							   </select>
							</li> -->
                        </ul>
                        <div class="search">
                            <form action="<?php echo url("listing"); ?>" method="get" role="form">
                                <input type="text" name="keywords" class="form-control" autocomplete="off" placeholder="<?php echo trans('frontend.Search');?>">
                                <span class="search-close"><i class="fa fa-times"></i></span>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--top-bar-dark end here-->
        <!--navigation -->
        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url("/"); ?>"><img src="{{url('assets/frontend/logo.png')}}" alt="Easy Estate"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
								<li>
									<a href="<?php echo url("/"); ?>"><?php echo trans('frontend.Home');?></a>
								</li>
								<li>
									<a href="<?php echo url("/map-home"); ?>"><?php echo trans('frontend.MapHome');?></a>
								</li>
								
								<li>
									<a href="<?php echo url("/all-agent"); ?>"><?php echo trans('frontend.Agents');?></a>
								</li>
								
								<li>
									<a href="<?php echo url("/about-us"); ?>"><?php echo trans('frontend.About');?></a>
								</li>
								
								<li>
									<a href="<?php echo url("/loan-calculator"); ?>"><?php echo trans('frontend.Calculator');?></a>
								</li>
								<li>
									<a href="<?php echo url("/contact-us"); ?>"><?php echo trans('frontend.Contact');?></a>
								</li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--container-->
        </div><!--navbar-default-->
<script> 
//Search         
    (function () {

        $('.top-search').on('click', function() {
            $('.search').fadeIn(500, function() {
              $(this).toggleClass('search-toggle');
            });     
        });

        $('.search-close').on('click', function() {
            $('.search').fadeOut(500, function() {
                $(this).removeClass('search-toggle');
            }); 
        });

    }());

</script>

   