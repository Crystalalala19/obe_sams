    <div id="home" >
        <div class="overlay">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-9 col-md-9 head-text">
                        <h1 id="divDisp" >COMPUTER SCIENCE DEPARTMENT</h1>
                        <span >
                            <i class="fa fa-laptop" ></i>Be a source of information and computing expertise
                        </span>
                        <span >
                            <i class="fa fa-laptop" ></i>Educate students to become well-rounded individuals 
                        </span>
                        <span >
                            <i class="fa fa-laptop" ></i>Train students to become world-leading computer science specialists 
                        </span>
                        <span>
                            <i class="fa fa-laptop" ></i>Perform world-class research works in selected areas in the in the 
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;computing sciences
                        </span>
                        <span>
                            <i class="fa fa-laptop" ></i>Provide quality, cutting-edge educational experiences
                        </span>
                        
                        <span >
                            <i class="fa fa-laptop" ></i>Provide state-of-the-art education and training in the use of 
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;computers to non-CS/IT majors
                        </span>
                        
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="div-trans text-center">
                            <h3>Enter Information</h3>
                            <div class="col-lg-12 col-md-12 col-sm-12" > 
                            <?php 
                                echo validation_errors('
                                <div class="alert alert-danger" role="alert">', 
                                '</div>');
                            ?>   
                                <?php echo form_open('site/login_validation'); ?>
                                    <div class="form-group">    
                                        <input type="text" class="form-control" name="idnum" value="<?php echo set_value('idnum'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" name="login_submit" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--./ HOME SECTION END -->
    <div id="about" >
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 sub-head">
                    <h2  data-wow-delay="0.3s" class="wow fadeInUp animated" ><strong>ABOUT </strong></h2>
                    <p class="sub-head">The system records the update of the student's 
                        strengths and weaknesses on each specific course. 
                        Keeping track of the student’s academic performance will 
                        be easier and convenient for the teachers.
                    </p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-4">
                    <div class="media wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="pull-left">
                            <i class="fa fa-recycle fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">End-in-mind Philosophy</h3>
                            <p >
                                Student focused and student capability conscious. 
                            </p>

                        </div>
                    </div>
                    <div class="media wow fadeInUp animated" data-wow-delay="0.3s">
                        <div class="pull-left">
                            <i class="fa fa-history fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Visible Alignment</h3>
                            <p>
                                Well-thought of and reflected upon activities. Direct development. Success oriented.
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 wow fadeInUp animated">
                        <div class="pull-left">
                            <i class="fa fa-star-o fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Stakeholders Involved</h3>
                            <p>
                                Stakeholders are involved in all the stages of the educational process.
                            </p>

                        </div>

                        <div class="pull-left">
                            <i class="fa fa-mortar-board fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><br>Constructivist Philosophy</h3>
                            <p>
                                Change in educational perspective and mindset. Change in teaching 
                                and learning perspective.
                            </p>

                        </div>
                </div>

                <div class="col-lg-4 col-md-4">

                    <div class="media wow fadeInUp animated" data-wow-delay="0.4s">
                        <div class="pull-left">
                            <i class="fa fa-users fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Articulated, Expressed & Owned</h3>
                            <p>
                                Subscribed to and owned by administration, faculty and students.
                            </p>

                        </div>
                    </div>
                    <div class="media wow fadeInUp animated" data-wow-delay="0.5s">
                        <div class="pull-left">
                            <i class="fa fa-thumbs-o-up fa-4x  "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Assured andd Assessed</h3>
                            <p>
                                Importance of quality assurance and assessment system in place.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row pad-top-botm wow fadeInUp animated" data-wow-delay="0.7s">
                <div class="col-lg-8 col-md-8 col-sm-8 " >

                    <h3><strong>Our Department Aims</strong></h3>
                    <p>
                        To train students to become world-leading computer science 
                        specialists by considering technologies for efficient “Information” exchange; 
                        and to configure computer technologies to help human society

                    </p>
                    <p>
                        To educate students to become well-rounded individuals to 
                        be able to contribute much more than a narrow technical expertise

                    </p>
                    <p>
                        To perform world-class research works in selected areas in the in the computing sciences

                    </p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 text-center" >
                    <i class="fa fa-lightbulb-o big-icon "></i>


                </div>

            </div>
        </div>
    </div>
    <!--./ ABOUT SECTION END -->
    <div class="donars-section">
        <div class="overlay">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 ">
                        <div id="testimonials" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#testimonials" data-slide-to="0" class=""></li>
                                <li data-target="#testimonials" data-slide-to="1" class=""></li>
                                <li data-target="#testimonials" data-slide-to="2" class="active"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item">
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">

                                            <h4><i class="fa fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit onec molestie non sem vel condimentum. <i class="fa fa-quote-right"></i></h4>
                                            <div class="user-img pull-right">
                                                <img src="<?php echo base_url();?>assets/img/user2.png" alt="" class="img-circle image-responsive">
                                            </div>
                                            <h5 class="pull-right"><strong class="c-black">Fr. Dionisio Marcelo Miranda</strong></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
                                            <h4><i class="fa fa-quote-left"></i>Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc. <i class="fa fa-quote-right"></i></h4>
                                            <div class="user-img pull-right">
                                                <img src="<?php echo base_url();?>assets/img/user.gif" alt="" class="img-circle image-responsive">
                                            </div>
                                            <h5 class="pull-right"><strong class="c-black">Mary Jane Sabellano</strong></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item active">
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
                                            <h4><i class="fa fa-quote-left"></i>Sed ultricies, libero ut adipiscing fringilla, ante elit luctus lorem, a egestas dui metus a arcu condimentum. <i class="fa fa-quote-right"></i></h4>
                                            <div class="user-img pull-right">
                                                <img src="<?php echo base_url();?>assets/img/user2.png" alt="" class="img-circle image-responsive">
                                            </div>
                                            <h5 class="pull-right"><strong class="c-black">Joan Tero</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--./ DONARS TESTIMONIALS END -->
    <div id="port-folio" class="pad-top-botm" >
        <div class="container">
            <div class="row text-center ">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <h2 data-wow-delay="0.3s" class="wow fadeInUp animated"><strong>GALLERY </strong></h2>
                    <p class="sub-head">Lorem ipsum dolor sit amet, consectetur adipiscing elit onec molestie non sem vel condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.4s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/laboratory.JPG" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                 Department of Computer Science
                                </span>
                               
                                Laboratory Room
                            </p>
                            <a class="preview  " title="Laboratory Room" href="<?php echo base_url();?>assets/img/portfolio/laboratory.JPG"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.5s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/network.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                 Department of Computer Science
                                </span>
                               
                                Network Control Room
                            </p>
                            <a class="preview " title="Network Control Room" href="<?php echo base_url();?>assets/img/portfolio/network.jpg"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.6s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/room.JPG" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                                <span>
                                 Department of Computer Science
                                </span>
                               
                                Classroom
                            </p>
                            <a class="preview " title="Classroom" href="<?php echo base_url();?>assets/img/portfolio/room.JPG"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row " style="padding-top: 50px;">
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.7s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/speech.JPG" class="img-responsive " alt="" />
                        <div class="overlay">
                           <p>
                                <span>
                                 Department of Computer Science
                                </span>
                               
                                Speech Laboratory
                            </p>
                            <a class="preview  " title="Speech Laboratory" href="<?php echo base_url();?>assets/img/portfolio/speech.JPG"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.8s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/students.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                            <p>
                                <span>
                                 Department of Computer Science
                                </span>
                               
                                Students
                            </p>
                            <a class="preview " title="Students" href="<?php echo base_url();?>assets/img/portfolio/students.jpg"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                    <div class="portfolio-item wow fadeInUp animated" data-wow-delay="0.9s">


                        <img src="<?php echo base_url();?>assets/img/portfolio/teach.jpg" class="img-responsive " alt="" />
                        <div class="overlay">
                          <p>
                                <span>
                                Department of Computer Science
                                </span>
                               
                                Teaching
                            </p>
                            <a class="preview " title="Teaching" href="<?php echo base_url();?>assets/img/portfolio/teach.jpg"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--./ GALLERY/PORTFOLIO SECTION END -->
    <div id="help" >
        <div class="overlay">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <h2 data-wow-delay="0.3s" class="wow fadeInUp animated"><strong>FACULTY</strong></h2>
                        <p class="sub-head">Checkout this video , which will let you know the Head and teachers of the Department. </p>
                    </div>
                </div>
                <div class="row ">

                    <!-- <div class="col-lg-6 col-lg-offset-1  col-md-6 col-md-offset-1">
                        <iframe src="http://player.vimeo.com/video/18312392" class="vedio-style wow fadeInUp animated" data-wow-delay="0.4s"></iframe>
                    </div> -->

                    <div class="col-lg-4 col-md-4" style="padding-top: 50px;">

                        <div class="media wow fadeInUp animated" data-wow-delay="0.5s">
                            <div class="pull-left">
                                <i class="fa fa-star-o fa-4x  "></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Watch This Video</h3>
                                <p>
                                    Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc. 
                                Aenean faucibus luctus enim. 
                                </p>

                            </div>
                        </div>
                        <div class="media wow fadeInUp animated" data-wow-delay="0.6s">
                            <div class="pull-left">
                                <i class="fa fa-history fa-4x  "></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Come Visit Our Department</h3>
                                <p>
                                    Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc. 
                                Aenean faucibus luctus enim. 
                                </p>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    <!--./ HELP SECTION END -->
    <div id="contact" >
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <h2 data-wow-delay="0.3s" class="wow fadeInUp animated"><strong>CONTACT US </strong></h2>
                    <p class="sub-head">For more information, please call the Office of the Chair</p>

                    <p class="sub-head  wow fadeInUp animated" data-wow-delay="0.4s"><strong>ADDRESS :</strong> (+63 32) 344 3801 locals 328 & 329, Department of Computer Science
                    University of San Carlos – Technological Center
                    Nasipit Talamban, Cebu City, Philippines
                    </p>
                </div>
            </div>
            <div class="row text-center wow fadeInUp animated" data-wow-delay="0.4s">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <a href="#">  <img src="<?php echo base_url();?>assets/img/Social/facebook.png" alt="" /> </a>
                     <a href="#"> <img src="<?php echo base_url();?>assets/img/Social/google-plus.png" alt="" /></a>
                     <a href="#"> <img src="<?php echo base_url();?>assets/img/Social/twitter.png" alt="" /></a>
                    </div>
                </div>
            <div class="row pad-top-botm">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control wow fadeInUp animated" data-wow-delay="0.5s" required="required" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control wow fadeInUp animated" required="required" data-wow-delay="0.6s" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea name="message"  required="required" data-wow-delay="0.7s" class="wow fadeInUp animated form-control" style="min-height: 150px;" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-lg wow fadeInUp animated " data-wow-delay="0.8s">SUBMIT REQUEST</button>
                        </div>

                    </form>
                </div>

            </div>
            
        </div>
    </div>
    <!--./ CONTACT SECTION END -->
    <div id="footser-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                 &copy; 2014 yourdomian.com | by <a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank" >binarytheme.com</a>
                </div>
            </div>

        </div>
    </div>
