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
                                    <i class="fa fa-pencil-square-o"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    echo $this->session->flashdata('message');
    if (!empty($message)): echo $message;

    else:
    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>', 
    '</div>');
?>
    <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <label for="program_inp">Program:</label>
        <select class="form-control input-sm" id="program_inp" name="program" disabled>
            <?php foreach($program_list as $row):?>
            <option value="<?php echo $row['programName'];?>" <?php if($program == $row['programName']) echo 'selected="selected"'; ?>><?php echo $row['programName'];?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <label for="effective_year">Effective Year:</label>
        <?php
            function yearDropdown($startYear, $endYear, $id="year", $year){
                //start the tag
                echo "<select class='form-control input-sm' id=".$id." name=".$id.">";
                    //echo each year as an option    
                    for ($i=$startYear;$i<=$endYear;$i++){
                        if($i == $year) {
                            echo "<option value=".$i." selected='selected'>".$i."</option>n";
                        }
                        else {
                            echo "<option value=".$i.">".$i."</option>n";
                        }    
                    }
                //close the select tag
                echo "</select>";
            }
            yearDropdown(date('Y'), 2100, "effective_year", $year);
        ?>
    </div>
    <?php endif;?>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";
    </script>