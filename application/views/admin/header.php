<?php
    function uri_match($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI']);

        if ($current_file_name == $requestUri)
            echo 'class=active';
    }
?>
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
            position: absolute;
            color: red;
        }
        /*End Responsive*/
    </style>

    <!--  Jquery Core Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-admin.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/base-admin.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                <a class="brand" href="<?php echo base_url('admin');?>">
                    <img src="<?php echo base_url();?>assets/img/obesams.png" class="navbar-brand-logo" title="OBE SAMS Academic" alt="OBE SAMS Academic"/>
                </a> 

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Account">
                            <i class="icon-cog"></i> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('admin/account');?>"><i class="icon-key" title="Change Password"></i> Change Password</a></li>
                                <li><a href="<?php echo base_url('site/logout');?>" title="Logout"><i class="icon-off"></i> Logout</a></li>
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
                    <li <?php uri_match('admin');?>><a href="<?php echo base_url('admin'); ?>" title="Home"><i class="icon-home"></i><span>Home</span> </a> </li>
                    <li class="dropdown" id="program_dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" title="Programs"> <i class="icon-briefcase"></i><span>Programs</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/programs/add'); ?>" title="Add new Curriculum"><i class="icon-plus"></i> Add new Curriculum</a></li>
                            <li><a href="<?php echo base_url('admin/programs/view'); ?>" title="View Curriculums"><i class="icon-briefcase"></i> View Curriculums</a></li>
                        </ul>
                    </li>
                    <li <?php uri_match('teachers'); uri_match('upload')?> id="teachers_menu"><a href="<?php echo base_url('admin/teachers'); ?>" title="View Teachers"><i class="icon-sitemap"></i><span>Teachers</span> </a></li>
                    <li class="dropdown" id="report_dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" title="Reports"> <i class="icon-list-alt"></i><span>Reports</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/reports/teacher'); ?>"><i class="icon-user-md"></i> Teacher</a></li>
                            <li><a href="<?php echo base_url('admin/reports/student'); ?>"><i class="icon-user"></i> Student</a></li>
                        </ul>
                    </li>
                    <li <?php uri_match('logs');?> id="activity_log"><a href="<?php echo base_url('admin/activity_log'); ?>" title="View Activity Log"><i class="icon-pushpin"></i><span>Activity Log</span> </a></li>
                </ul>
            </div>
            <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
    </div>
    <!-- /subnavbar -->