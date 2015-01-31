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
                                    <i class="fa fa-clock-o"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    echo $this->session->flashdata('message');

    if(!empty($this->session->flashdata('non_existingTeacher'))): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <strong>Error:</strong> uploading failed. <br><br>The following <strong>Teacher ID(s)</strong> does not exists:
        <?php foreach ($this->session->flashdata('non_existingTeacher') as $value): ?>
        <strong><?php echo $value;?>, </strong>
        <?php endforeach;?> 
    </div>
<?php endif; 
    if(!empty($this->session->flashdata('non_existingCourse'))): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <strong>Error:</strong> uploading failed. <br><br>The following <strong>Course(s)</strong> does not exists in the Curriculum:
        <?php foreach ($this->session->flashdata('non_existingCourse') as $value): ?>
        <strong><?php echo $value;?>, </strong>
        <?php endforeach;?> 
    </div>
<?php endif;

    $attributes = array('class' => 'col-md-4');
    echo form_open_multipart('admin/upload', $attributes);
?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
        <div class="form-group">
            <label for="userfile">Upload .CSV File: </label>
            <input type="file" name="userfile" id="userfile" class="filestyle" data-buttonText="Find file" data-buttonName="btn-primary" data-iconName="fa fa-upload">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </div>
    </form>

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-filestyle.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers");
        d.className = d.className + " active";
    </script>
