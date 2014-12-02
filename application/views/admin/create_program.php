                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Create Program
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-bar-chart-o"></i>  Create Program
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    echo $message;
    echo validation_errors('<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>', '</div>');

    $attributes = array('class' => 'col-xs-4');
    
    echo form_open('admin/create_program', $attributes);
?>
    <div class="form-group">
            <label>Program:</label>
            <input type="text" class="form-control input-sm" name="program">
            <label>Effective Year:</label>
            <?php
                function yearDropdown($startYear, $endYear, $id="year"){
                    //start the select tag
                    echo "<select class='form-control input-sm' id=".$id." name=".$id.">n";
                        echo '<option selected="selected" value="">Please Select</option>';  
                        //echo each year as an option    
                        for ($i=$startYear;$i<=$endYear;$i++){
                        echo "<option value=".$i.">".$i."</option>n";    
                        }
                      
                    //close the select tag
                    echo "</select>";
                }
                yearDropdown(2000, 2100, "effective_year");
            ?>
            <label>Program Outcome Numbers:</label>
            <?php yearDropdown(9, 20, "po_num") ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>

    
</form>