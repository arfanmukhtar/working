@extends('layouts.app')

@section('content')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                    <h1><?php echo $title; ?> <a class="btn btn-primary pull-right" href="<?php echo url("/property/add"); ?>"  style="margin-bottom:5px"><i class="fa fa-plus"> </i></a></h1>
					</div>
          
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Agent</th>
                                            <th>Featured</th>
                                            <th>Archive</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($properties as $row) { ?>
                                        <tr>
                                            <td><img class="img-responsive" width="100px" src="<?php echo url("/assets/images/uploads/" . $row->user_id . "/" . $row->image_name); ?>" alt="" /></td>
                                            <td><?php echo $row->title; ?> <br>
                                            
												<?php echo $row->city; ?>, <?php echo $row->state; ?>, <?php echo $row->zip; ?>
											</td>
											<td><?php echo $row->price; ?> <small> <?php if($row->type=="SALE") {  ?> For Sale  <?php } else { ?> For Rent <?php } ?>  </small> </td>
                                            <td>
												Bathrooms : <?php echo $row->bath; ?> <br>
												Bedrooms : <?php echo $row->beds; ?> <br>
												Year : <?php echo $row->year; ?> <br>
											
											</td>
											<td> {{get_catogory($row->category_id)}} </td>
											<td> {{get_agent($row->agent_id)}} </td>
									
											<td> <input class="featured" data-id="<?php echo $row->id; ?>"  type="checkbox" <?php if($row->featured == 1) echo "checked"; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-size="small" data-offstyle="danger"> </td>
											<td> <input class="archived" data-id="<?php echo $row->id; ?>"  type="checkbox" <?php if($row->is_delete == 1) echo "checked"; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-size="small" data-offstyle="danger"> </td>
											<td> 
											<a data-id="1" href="<?php echo url("listing/edit/" . $row->id); ?>" > <i class="fa fa-edit"> </i> </a>
											<a href="" > <i class="fa fa-trash-o "> </i> </a> 
											</td>
                                        </tr>
									<?php } ?>
                                       
                                    </tbody>
                                </table>
								{!! $properties->render() !!}
                            </div>
                            <!-- /.table-responsive -->
                        </div>

						<script> 
						$("body").on("change" , ".featured" , function() {
									
									var property_id  = $(this).attr("data-id");
									
									var form_data = { 
										property_id : property_id
									};
									$.ajax({
										type: 'POST',
										url: '<?php echo url("property/addTofeatured"); ?>',
										data: form_data,
										success: function (msg) {
											 
											 }
									});
									
								});	
								
								$("body").on("change" , ".archived" , function() {
									var property_id  = $(this).attr("data-id");
									
									var form_data = { 
										property_id : property_id
									};
									$.ajax({
										type: 'POST',
										url: '<?php echo url("property/addToArchive"); ?>',
										data: form_data,
										success: function (msg) {
											$(this).attr('data-value',value_new)
										}
									});
									
								});	
								
						</script>
						
           
@endsection
