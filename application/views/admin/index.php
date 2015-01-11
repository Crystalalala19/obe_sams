                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Dashboard
                                <small>Home</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>  Dashboard</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <span class="glyphicon glyphicon-bookmark"></span> Quick Shortcuts
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-3 col-md-6">
                                        <h3>Programs</h3>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-plus fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">Add</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url();?>admin/programs/add">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Go</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-archive fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">Archive</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url();?>admin/programs/view">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Go</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <h3>Teachers</h3>
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tasks fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">Manage</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url();?>admin/teachers">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Go</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <h3>Students</h3>
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-upload fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">Upload</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url();?>admin/upload_students">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Go</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">View</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo base_url();?>admin/view_students">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Go</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- /.row -->

                    <div id="container">
                    	<?php
                    	   echo "<pre>";
                    	   print_r($this->session->all_userdata());
                    		echo "</pre>";
                    	?>
                    	<a href="<?php echo base_url()."site/logout" ?>">Logout</a>
                    </div>