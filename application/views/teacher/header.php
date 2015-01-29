<?php
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI']);

        if ($current_file_name == $requestUri)
            echo 'class="active launcher"';
    }
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
   
        <title><?php echo $title; ?></title>

        <!-- Offline files -->
        <link href="<?php echo base_url();?>assets/img/icon.png" rel="icon" type="image/ico" />
        <!--  Bootstrap Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
         <!-- Custom CSS -->    
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/teacher.css">
        <!--  Font-Awesome Style -->
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css">
        <!-- For datatable -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
        <!-- end datatable -->

        

        <style type="text/css">
            div.DTTT { margin-bottom: 0.5em; float: right; }
            div.dataTables_wrapper { clear: both; }
        </style>


        <!-- FOOTER -->

     
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!--  Core Bootstrap Script -->
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
        <!--  Custom Script -->
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/teacher.js"></script>
        
        <!--Datatables-->
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
        <!--Datatables-->
        
    </head>
    
    <body class='main page'>
        <!-- Navbar -->
        <div class='navbar navbar-default' id='navbar'>
            <a class='navbar-brand' href='#'>
                <i class='icon-user'></i>
                Teacher Account
            </a>
            <ul class='nav navbar-nav pull-right'>
                <li class='dropdown user'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <i class='icon-user'></i>
                        <strong> <?php foreach($user as $row): ?><?php echo $row['teacher_id'];?><?php endforeach; ?></strong>
                        <b class='caret'></b>
                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='#'>Edit Profile</a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href="<?php echo base_url()."site/logout" ?>">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    

        <div id='wrapper'>
            <!-- Sidebar -->
            <section id='sidebar'>
                <i class='icon-align-justify icon-large' id='toggle'></i>
                <ul id='dock'>
                    <li <?=echoActiveClassIfRequestMatches("members")?> class="launcher">
                        <i class='icon-dashboard'></i>
                        <a href="<?php echo base_url();?>site/members">Dashboard</a>
                    </li>
                    <li id="courselist" <?=echoActiveClassIfRequestMatches("course_list")?> class='launcher'>
                        <i class='icon-table'></i>
                        <a href="<?php echo base_url();?>site/course_list/">Course</a>
                    </li>
                    <li id="studentlist" <?=echoActiveClassIfRequestMatches("student_list")?> class='launcher'>
                        <i class='icon-user'></i>
                        <a href="<?php echo base_url();?>site/student_list/">Student List</a>
                    </li>
                      <!--<li <?=echoActiveClassIfRequestMatches("forms")?> class="launcher">
                        <i class='icon-file-text-alt'></i>
                        <a href="<?php echo base_url();?>site/view_class/forms">Forms</a>
                      </li>
                      <li <?=echoActiveClassIfRequestMatches("forms")?> class="launcher">
                        <i class='icon-file-text-alt'></i>
                        <a href="<?php echo base_url();?>site/view_table/tales">Tables</a>
                      </li>
                      <li <?=echoActiveClassIfRequestMatches("#")?> class='launcher dropdown hover'>
                        <i class='icon-flag'></i>
                        <a href='#'>Reports</a>
                        <ul class='dropdown-menu'>
                          <li class='dropdown-header'>Launcher description</li>
                          <li>
                            <a href='#'>Action</a>
                          </li>
                          <li>
                            <a href='#'>Another action</a>
                          </li>
                        </ul>
                      </li>-->
                </ul>
                <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
            </section>
            <!-- Tools -->
          