<?php echo doctype("html5"); ?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title><?php echo $title;?></title>
    <!--  Bootstrap Style -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Font-Awesome Style -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--  Animation Style -->
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="<?php echo base_url();?>assets/css/prettyPhoto.css" rel="stylesheet" />
    <!--  Google Font Style -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--  Custom Style -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="pre-div">
        <div id="loader">
        </div>
    </div>
    <!--/. PRELOADER END -->
    <div class="navbar navbar-default navbar-fixed-top move-me ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url();?>assets/img/logo.png" class="navbar-brand-logo " alt="" />

                </a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">

                    <li >
                        <a href="#home">HOME

                        </a>

                    </li>
                    <li >
                        <a href="#about">ABOUT

                        </a>

                    </li>

                    <li >
                        <a href="#port-folio">GALLERY
                        </a>

                    </li>

                    <li >
                        <a href="#help">HOW TO HELP ?
                        </a>

                    </li>

                    <li >
                        <a href="#contact">CONTACT 
                        </a>

                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!--./ NAV BAR END -->