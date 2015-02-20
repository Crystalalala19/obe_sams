    <?php 
    function comma_period($array) {
        $last_entry = array_pop($array);
        if(count($array) > 0) {
            echo implode(", ", $array) . " and " . $last_entry.'.';
        } else {
            echo $last_entry.'.';
        }
    }
    ?>
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-time"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                        <?php echo $this->session->flashdata('message'); ?>

                        <?php if(!empty($this->session->flashdata('non_existingTeacher'))): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                <i class="icon-exclamation-sign"></i>
                                <strong>Error:</strong> uploading failed. <br><br>The following <strong>Teacher ID(s)</strong> does not exist:
                                <?php comma_period($this->session->flashdata('non_existingTeacher')); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($this->session->flashdata('non_existingCourse'))): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                <i class="icon-exclamation-sign"></i>
                                <strong>Error:</strong> uploading failed. <br><br>The following <strong>Course(s)</strong> does not exist in the Curriculums:
                                <?php comma_period($this->session->flashdata('non_existingCourse')); ?>
                            </div>
                        <?php endif; ?>
                        <?php
                            $attributes = array('class' => 'col-md-4');
                            echo form_open_multipart('admin/upload', $attributes);
                        ?>
                                <div class="control-group">
                                    <div class="pull-right">
                                        <h4>Download Template:
                                        <a href="<?php echo base_url('admin/download/csv');?>"><i class="icon-download-alt icon-2x"></i></a>
                                        </h4>
                                    </div>
                                    <label for="userfile">Upload .CSV File: </label>
                                    <input type="file" name="userfile" id="userfile" class="filestyle" data-buttonText="Find file" data-buttonName="btn-primary" data-iconName="icon-upload-alt">
                                </div>
                                <br>
                                <div class="control-group">
                                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                    <a href="<?php echo base_url('admin/teachers/view');?>">
                                        <button type="button" class="btn btn-info" title="Go Back"><i class="icon-angle-left"></i> Go Back</button>
                                    </a>
                                </div>
                            </form>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-filestyle.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers");
        d.className = d.className + " active";
    </script>
