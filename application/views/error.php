<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <title><?php echo $title; ?></title>

    <!-- Offline files -->
    <link rel="icon" href="<?php echo base_url();?>assets/img/icon.png">
    <!--  Bootstrap Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-admin.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dashboard.css">

    <!--  Font-Awesome Style -->
    <!-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/fa-admin.min.css">
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                <a class="brand" href="index.html">
                    <img src="<?php echo base_url();?>assets/img/obesams.png" class="navbar-brand-logo " title="OBE SAMS Academic" alt="OBE SAMS Academic"/>
                </a> 
            </div>
            <!-- /container --> 
        </div>
        <!-- /navbar-inner --> 
    </div>
    <!-- /navbar -->
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="error-container">
                    <h1>404</h1>
                    <h2>Sorry, this page doesn't exist.</h2>
                    <div class="error-details">
                        Why not try going back to the home page?
                    </div> <!-- /error-details -->
                    
                    <div class="error-actions">
                        <a href="<?php echo base_url();?>" class="btn btn-large btn-primary">
                            <i class="icon-home"></i>
                            &nbsp;
                            Homepage                     
                        </a>
                    </div> <!-- /error-actions -->
                </div> <!-- /error-container -->            
            </div> <!-- /span12 -->
        </div> <!-- /row -->
    </div> <!-- /container -->
</body>
</html>
