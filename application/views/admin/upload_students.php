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
                                    <i class="fa fa-users"></i>  Students
                                </li>
                                <li class="active">
                                    <i class="fa fa-plus"></i>  <?php echo $header;?>
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
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>', 
    '</div>');
    $attributes = array('class' => 'col-md-4');

    echo form_open_multipart('admin/upload_students', $attributes);
?>
        <div class="form-group">
            <label for="lists">Program Lists:</label>
            <?php if ($programs == FALSE): ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
                    <span class="sr-only">Information:</span>
                    There are no currently programs added.
                </div>
            <?php else: ?>
                <select class="form-control input-sm" name="program" id="lists">
                    <option selected="selected" value="">Please select: </option>
                    <?php foreach($programs as $row): ?>
                    <option value="<?php echo $row['ID']?>"><?php echo $row['programName'].' - '. $row['effective_year']; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="userfile">Upload .CSV File: </label>
            <input type="file" name="userfile" id="userfile">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </div>
    </form>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("student_dropdown");
        d.className = d.className + " active";
    </script>