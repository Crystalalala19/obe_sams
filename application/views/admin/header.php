<?php
    function echoActiveClassIfRequestMatches($requestUri)
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sb-admin.css">
    <!--  Font-Awesome Style -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css"> -->
    
    <!-- DataTables Style -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
    
    <style type="text/css">
        div.DTTT { margin-bottom: 0.5em; float: right; }
        div.dataTables_wrapper { clear: both; }
    </style>

    <!--  Jquery Core Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>

    <!-- 
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> 

    <script type="text/javascript" language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin">Computer Science Department</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>site/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- active_link() works only for controller names, not methods names -->
                    <li <?=echoActiveClassIfRequestMatches("admin")?>>
                        <a href="<?php echo base_url();?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li id="program_dropdown" class="">
                        <a href="javascript:;" data-toggle="collapse" data-target="#program"><i class="fa fa-briefcase"></i> Programs <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="program" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/programs/add"><i class="fa fa-plus"></i> Add Program Outcome</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/programs/view"><i class="fa fa-list"></i> View programs</a>
                            </li>
                        </ul>
                    </li>

                    <li <?=echoActiveClassIfRequestMatches("teachers")?> id="teachers">
                        <a href="<?php echo base_url();?>admin/teachers"><i class="fa fa-book"></i> Teachers</a>
                    </li>
                    
                    <!-- <li id="student_dropdown" class="">
                        <a href="javascript:;" data-toggle="collapse" data-target="#student"><i class="fa fa-users"></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="student" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/upload_students"><i class="fa fa-plus"></i> Upload Student list</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/view_students"><i class="fa fa-list-alt"></i> View Student list</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
            