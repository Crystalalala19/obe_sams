                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Upload Lists
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Students</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-bar-chart-o"></i>  Upload Lists
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    print_r($this->input->post());
    echo $message;
    echo validation_errors('<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>', '</div>');
    $attributes = array('class' => 'col-md-4');

    echo form_open_multipart('admin/upload_students', $attributes);
?>
    <div class="form-group">
        <label for="lists">Program Lists:</label>
        <?php if ($programs == FALSE): ?>
            <p>There are no currently programs added.</p>
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
        <label for="userfile">Upload CSV: </label>
        <input type="file" name="userfile" id="userfile">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>
</form>

<script>
    var d = document.getElementById("student_dropdown");
    d.className = d.className + " active";
</script>