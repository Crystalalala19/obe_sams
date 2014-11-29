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

                    <div id="container">
                    	<?php
                    	   echo "<pre>";
                    	   print_r($this->session->all_userdata());
                    		echo "</pre>";
                    	?>
                    	<a href="<?php echo base_url()."site/logout" ?>">Logout</a>
                    </div>
