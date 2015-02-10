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
    
    <style type="text/css">
        div.DTTT { margin-bottom: 0.5em; float: right; }
        div.dataTables_wrapper { clear: both; }
        /*Responsive Footer*/
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 100px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
        }

        .red-req {
            color: red;
            padding-left: 5px;
        }
        /*End Responsive*/
    </style>

    <!--  Jquery Core Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-admin.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/base-admin.js"></script>
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                <a class="brand" href="<?php echo base_url('student');?>">
                <img src="<?php echo base_url();?>assets/img/obesams.png" class="navbar-brand-logo" title="OBE SAMS Academic" alt="OBE SAMS Academic"/>
                
                </a> 

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Account">
                            <i class="icon-cog"></i> 
                                <?php foreach($user as $row): ?><?php echo $row['student_id'];?><?php endforeach; ?> 
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-user" title="Edit Profile"></i> Edit Profile</a></li>
                                <li><a href="<?php echo base_url()."site/logout" ?>" title="Logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse --> 
            </div>
            <!-- /container --> 
        </div>
        <!-- /navbar-inner --> 
    </div>
    <!-- /navbar -->

    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="<?php echo base_url('student'); ?>" title="Home"><i class="icon-home"></i><span>Home</span> </a> </li>
                </ul>
            </div>
            <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
    </div>
    <!-- /subnavbar -->