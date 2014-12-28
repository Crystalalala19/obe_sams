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
                                    <i class="fa fa-list-alt"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
    <?php if(!empty($message)): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
        <span class="sr-only">Information:</span>
        <?php echo $message; ?>
    </div>
    <?php else:  $program = $row['programName']; $year = $row['effective_year'];?>
    <div class="form-group col-xs-6 col-sm-6 col-md-6">
        <label for="program_inp">Program:</label>
        <select class="form-control input-sm" id="program_inp" name="program">
            <option value="BSCS" <?php if($program == "BSCS") echo 'selected="selected"'; ?>>BSCS</option>
            <option value="BSIT" <?php if($program == "BSIT") echo 'selected="selected"'; ?>>BSIT</option>
            <option value="BSICT" <?php if($program == "BSICT") echo 'selected="selected"'; ?>>BSICT</option>
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
            yearDropdown(2000, 2100, "effective_year", $year);
        ?>
    </div>
    <?php endif;?>