                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <?php echo $header;?>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-briefcase"></i>  Programs
                                </li>
                                <li class="active">
                                    <i class="fa fa-plus-square"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    echo $this->session->flashdata('message');
    if (!empty($message)) echo $message;

    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>', 
    '</div>');
    echo form_open('admin/add_teacher');
?>
        <div class="form-group col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="teacher_fname">First Name:</label>
                <input type="text" class="form-control input-sm" name="teacher_fname" id="teacher_fname" value="<?php echo set_value('teacher_fname'); ?>">
            </div>

            <div class="form-group">
                <label for="teacher_mname">Middle Name:</label>
                <input type="text" class="form-control input-sm" name="teacher_mname" id="teacher_mname" value="<?php echo set_value('teacher_mname'); ?>">
            </div>

            <div class="form-group">
                <label for="teacher_lname">Last Name:</label>
                <input type="text" class="form-control input-sm" name="teacher_lname" id="teacher_lname" value="<?php echo set_value('teacher_lname'); ?>">
            </div>

            <div class="form-group">
                <label for="login_id">ID Login:</label>
                <input type="text" class="form-control input-sm" name="login_id" id="login_id" value="<?php echo set_value('login_id'); ?>">
            </div>

            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
    </form>