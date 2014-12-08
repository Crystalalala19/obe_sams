                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Add new Program
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-briefcase"></i>  Programs
                                </li>
                                <li class="active">
                                    <i class="fa fa-plus-square"></i>  Add new Program
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    echo $message;
    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>', 
    '</div>');
    $attributes = array('class' => 'col-md-4');
    echo form_open('admin/create_program', $attributes);
?>
    <div class="form-group">
        <label for="program">Program:</label>
        <select class="form-control input-sm" id="program">
            <option value="BSCS">BSCS</option>
            <option value="BSIT">BSIT</option>
            <option value="BSICT">BSICT</option>
        </select>
        <label for="effective_year">Effective Year:</label>
        <?php
            function yearDropdown($startYear, $endYear, $id="year"){
                //start the select tag
                echo "<select class='form-control input-sm' id=".$id." name=".$id.">n";
                    echo '<option selected="selected" value="">Please select: </option>';  
                    //echo each year as an option    
                    for ($i=$startYear;$i<=$endYear;$i++){
                    echo "<option value=".$i.">".$i."</option>n";    
                    }
                //close the select tag
                echo "</select>";
            }
            yearDropdown(2000, 2100, "effective_year");
        ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>
</form>