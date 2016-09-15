
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="active">
                            <a href="<?php echo url("/dashboard"); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						
						<?php if(Auth::user()->AccessLevel == 0) { ?>
						
						<li>
                            <a href="<?php echo url("/features"); ?>"><i class="fa fa-list fa-fw"></i> Features</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo url("/categories"); ?>"><i class="fa fa-list fa-fw"></i> Categories</a>
                        </li>
						
						<li>
                            <a href="<?php echo url("/agents"); ?>"><i class="fa fa-user fa-fw"></i> Agents </a>
                        </li>
						<?php } ?>
						
                        <li>
                            <a href="<?php echo url("/properties"); ?>"><i class="fa fa-list fa-fw"></i> Properties </a>
                        </li>
						
						<li>
                            <a href="<?php echo url("/property/add"); ?>"><i class="fa fa-plus fa-fw"></i> Add Property </a>
                        </li>
						
						<li>
                            <a href="<?php echo url("/profile"); ?>"><i class="fa fa-user fa-fw"></i> My Profile </a>
                        </li>
						<?php if(Auth::user()->AccessLevel == 0) { ?>
						
						<li>
                            <a href="<?php echo url("/settings"); ?>"><i class="fa fa-user fa-fw"></i> Settings </a>
                        </li>
						
						
						
						<?php } ?>
						<li>
                            <a href="<?php echo url("/customer-requests"); ?>"><i class="fa fa-user fa-fw"></i> Customers Request </a>
                        </li>
						<li><a href="<?php echo url("/logout"); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->