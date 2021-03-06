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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">
    
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
        /*End Responsive*/
    </style>

    <!--  Jquery Core Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-admin.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/base-admin.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>

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
                <a class="brand" href="<?php echo base_url('site/members');?>">
                    <img src="<?php echo base_url();?>assets/img/obesams.png" class="navbar-brand-logo " title="OBE SAMS Academic" alt="OBE SAMS Academic"/>
                </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Account">
                            <i class="icon-cog"></i> 
                                <?php foreach($user as $row): ?><?php echo $row['coordinator_id'];?><?php endforeach; ?> 
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('coordinator/account');?>"><i class="icon-key" title="Change Password"></i> Change Password</a></li>
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
                    <li <?php uri_match('coordinator');?>>
                        <a href="<?php echo base_url('coordinator');?>" title="Home">
                            <i class="icon-home"></i><span>Home</span> 
                        </a> 
                    </li>
                    <li <?php uri_match('class_list');?> id="courselist">
                        <a href="<?php echo base_url('coordinator/course_list'); ?>" title="View Class"><i class="icon-list"></i>
                            <span>General Class List</span> 
                        </a>
                    </li>
                    <li <?php uri_match('student_list');?> id="studentlist">
                        <a href="<?php echo base_url('coordinator/student_list'); ?>" title="View Students"><i class="icon-group"></i>
                            <span>Students</span> 
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /container --> 
        </div>
        <!-- /subnavbar-inner --> 
    </div>
    <!-- /subnavbar -->