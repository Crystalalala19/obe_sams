    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-edit"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">    
                            <?php if (!empty($message)): echo $message;
                                
                                else:
                                echo $this->session->flashdata('message2');
                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i>', 
                                '</div>'); 

                                $attrib = array( 'onsubmit' => "return confirm('Do you really want to submit?');"); 
                            
                                echo form_open('admin/teachers/edit/'.$row['ID'], $attrib); 
                            ?>
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
                                            <a href="<?php echo base_url('admin/teachers/view');?>">
                                                <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            <?php endif;?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";
    </script>