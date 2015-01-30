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
                                    <i class="fa fa-university"></i>  <a href="<?php echo base_url(); ?>admin/teachers">Teachers</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-pencil-square-o"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php if (!empty($message)): echo $message;
    
    else:
    echo $this->session->flashdata('message2');
    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ', 
    '</div>'); 

    $attrib = array( 'onsubmit' => "return confirm('Do you really want to submit?');"); 
?>
    <?php echo form_open('admin/teachers/edit/'.$row['ID'], $attrib); ?>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="student_id">Teacher ID #:</label>
                <input type="text" name="teacher_id" value="<?php echo set_value('teacher_id', $row['teacher_id']); ?>" id="student_id" class="form-control input-sm">
                <input type="hidden" name="id" value="<?php echo set_value('id', $row['ID']); ?>">
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" value="<?php echo set_value('fname', $row['fname']); ?>" id="fname" class="form-control input-sm">
            </div>
            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" name="mname" value="<?php echo set_value('mname', $row['mname']); ?>" id="mname" class="form-control input-sm">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" value="<?php echo set_value('lname', $row['lname']); ?>" id="lname" class="form-control input-sm">
            </div>

            <div class="pull-left">
                <input type="submit" name="submit" value="Update" class="btn btn-success">
                <div class="clearfix"></div>
            </div>
            
            <!-- window.top.close(); -->
            <div class="pull-right">
                <button type="button" class="btn btn-danger" onclick="window.open('','_self').close();"><i class="fa fa-times"></i> Close tab</button>
            </div>
        </div>
    </form>
    <?php endif;?>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers");
        d.className = d.className + " active";
    </script>