@extends('frontend.layoutother')

@section('content')

  

       
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <?php echo trans('frontend.Agents');?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home');?></a>
                    </li>
                    <li class="active"><?php echo trans('frontend.Agents');?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            
			<?php foreach($agents as $agent) : 
				$photo = url("assets/images/uploads/" . $agent->id . "/profile.jpg");
											if(!@getimagesize($photo)) { 
												$photo = url("assets/avatars/profile-pic.jpg");
											}
			?>
            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <img class="img-circle img-responsive" style="max-width:120px; padding:5px;" src="<?php echo $photo; ?>" alt="">
                    <div class="caption">
                        <h3> <a href="<?php echo url("agent/properties/" . $agent->id . "/" . clean($agent->name)); ?>"> {{$agent->name}} </a> </h3>
                        <p>  {{$agent->email}} </p>
                        <p>  {{$agent->phone}} </p>
                        <ul class="list-inline">
                            <li><a href="{{$agent->facebook}}"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            
                            <li><a href="{{$agent->twitter}}"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
			
			
			
			<?php endforeach;?>
            
            <?php
			function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
			?>
        
</div>
        <hr>
       
@endsection
