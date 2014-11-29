<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>	
</head>
<body>

<div id="container">

	<div class="col-lg-3 col-md-3">
        <div class="div-trans text-center">
            <h3>SIGN UP</h3>
            <div class="col-lg-12 col-md-12 col-sm-12" >    

                <?php echo form_open('site/signup_validation'); ?>
                <?php echo validation_errors(); ?>

                 <div class="form-group">
                	Id Number:<br>    
                    <input type="text" name="idnum" value="<?php echo set_value('idnum'); ?>" />
                </div>
               
                <div class="form-group">
                	
                    <input hidden type="text" name="role" value="<?php echo set_value('role', 'teacher'); ?>" />
                </div>
                <div class="form-group">
                	Password:<br>
                      <input type="password" name="password" value="<?php echo set_value('password'); ?>" />
                </div>
                <div class="form-group">
                	Confirm Password:<br>
                    <input type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>" />
                </div>
                <div class="form-group">
                    Last Name:<br>
                    <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" />
                </div>
                <div class="form-group">
                    Middle Name:<br>
                    <input type="text" name="mname" value="<?php echo set_value('mname'); ?>" />
                </div>
                <div class="form-group">
                    First Name:<br>
                    <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" />
                </div>
                <div class="form-group">
                    CourseID:<br>
                    <input type="text" name="courseID" value="<?php echo set_value('courseID'); ?>" />
                </div>  
                <div class="form-group">
                    Email:<br>
                    <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
                </div>
                <div class="form-group">
                    <?php echo form_submit('signup_submit', 'Sign up!'); ?>
                </div>
                 <?php echo form_close(); ?>   
            </div>
        </div>
    </div>

	<a href="<?php echo base_url()."site" ?>">Back to Homepage</a>
		
</div>

</body>
</html>