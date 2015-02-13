    <!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-plus"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)) echo $message;

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i> ', 
                                '</div>');

                                $attrib = array("onsubmit" => "return validate_form();");
                            ?>

                            <button class="btn btn-info" data-toggle='modal' data-target='#add' title="New Program"><i class="icon-plus"></i> New Program</button>
                            
                            <?php echo form_open('admin/programs/view'); ?>
                                <div class='modal fade' id='add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-vertical-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='myModalLabel'><i class="icon-plus"></i> New Program</h4>
                                            </div>
                                            <div class='modal-body'>
                                                <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                    <label for="program_name">Program Name:</label>
                                                    <input type="text" class="form-control input-sm" name="program_name" id="program_name" value="<?php echo set_value('teacher_fname'); ?>" required>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class='modal-footer'>
                                                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                                <input type="reset" class="btn btn-info" value="Clear">
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <?php echo form_open('admin/programs/add', $attrib); ?>
                                <p class="pull-left"><pre>Fields with <span class="red-req">*</span> are required.</pre></p>
                                <div id="step-1">
                                    <p class="pull-right">Step 1 of 3</p>
                                    <div class="clearfix"></div>
                                    <div class="control-group col-md-6">
                                        <label class="control-label" for="program_inp">Program: <span class="red-req">*</span></label>
                                        <?php if($program_list == FALSE):?>
                                            <div class="alert alert-info"><strong>Notice:</strong> No programs to list. <a href="<?php echo base_url(); ?>admin/programs/view">Click here to add.</a></div>
                                        <?php else:?>
                                        <select class="selectpicker show-tick" title="Select Program" data-live-search="true" multiple data-max-options="1" data-size="auto" id="program_inp" name="program">
                                            <?php foreach ($program_list as $row): ?>
                                            <option value="<?php echo $row['programName']; ?>"><?php echo rawurldecode($row['programName']); ?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?php endif;?>
                                    
                                        <?php if($program_list == TRUE):?>
                                        <label class="control-label" for="effective_year">Effective Year: <span class="red-req">*</span></label>
                                        <?php
                                            function yearDropdown($startYear, $endYear, $id="year"){
                                                //start the select tag
                                                echo "<select class='selectpicker show-tick' title='Select Effective Year' data-live-search='true' multiple data-max-options='1' data-size='5' id=".$id." name=".$id.">";
                                                    //echo each year as an option    
                                                    for ($i=$startYear;$i<=$endYear;$i++){
                                                    echo "<option value=".$i.">".$i." - ".($i+1)."</option>";    
                                                    }
                                                //close the select tag
                                                echo "</select>";
                                            }
                                            yearDropdown(date('Y'), date('Y')+50, "effective_year");
                                        ?>
                                    </div>
                                </div>
                                
                                <div id="step-2">
                                    <p class="pull-right">Step 2 of 3</p>
                                    <div class="clearfix"></div>
                                    <div class="control-group col-md-12">
                                        <table class="table table-striped table-bordered no-footer text-center" id="po-table">
                                            <tbody>
                                                <tr>
                                                    <th>PO Code</th>
                                                    <th>PO Attribute</th>
                                                    <th>PO Description</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control input-sm" name="po_code[]"><span class="red-req">*</span></td>
                                                    <td><input type="text" class="form-control input-sm" name="po_attrib[]"><span class="red-req">*</span></td>
                                                    <td><textarea class="form-control span6" name="po_desc[]" rows="5"></textarea><span class="red-req">*</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow()">Add Row</button>
                                        <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow()">Remove Row</button>
                                    </div>
                                </div>
                                <div id="step-3">
                                    <p class="pull-right">Step 3 of 3</p>
                                    <div class="clearfix"></div>
                                    <div class="control-group col-md-12">
                                        <table class="table table-striped table-bordered no-footer text-center" id="course-table">
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Course Code</th>
                                                    <th>Course Description</th>
                                                    <th>Course Equivalents 
                                                        <a href="#" data-toggle="popover" data-html="true" data-content="Separate by comma. <br>Ex: IT110, CS110, ICT110"><i class="icon-info-sign icon-large"></i></a>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td><p style="margin:4px 2px;">1.</p></td>
                                                    <td><input type="text" class="form-control input-sm" name="co_code[]"><span class="red-req">*</span></td>
                                                    <td><textarea class="form-control input-sm span6" name="co_desc[]" rows="3"></textarea><span class="red-req">*</span></td>
                                                    <td><input type="text" class="form-control input-sm" name="co_equi[]"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow2()">Add Row</button>
                                        <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow2()">Remove Row</button>
                                    </div>
                                    <br>

                                    <div class="control-group pull-left">
                                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                
                                <div class="control-group pull-right">
                                    <!-- STEP Start -->
                                    <button type="button" class="btn btn-primary btn-sm" id="btnPrevious" name="btnPrevious">Previous</button>
                                    <button type="button" class="btn btn-primary btn-sm" id="btnNext" name="btnNext">Next</button>
                                    <!-- STEP End -->
                                </div>
                                <?php endif;?>
                            </form>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/step.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/program-validation.js"></script> -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
            placement: 'top'
        });

        var table = document.getElementById("po-table");

        function addRow() {
            var lastrow = table.rows.length;
            var lastcol = table.rows[0].cells.length;   
            var row = table.insertRow(lastrow); 
            var cellcol0 = row.insertCell(0);
            cellcol0.innerHTML = "<input type='text' class='form-control input-sm' name='po_code[]'><span class='red-req'>*</span>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='form-control input-sm' name='po_attrib[]'><span class='red-req'>*</span>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<textarea class='form-control input-sm span6' name='po_desc[]' rows='3'></textarea><span class='red-req'>*</span>";
        }

        function removeRow(){
            var lastrow = table.rows.length;
            if(lastrow<3){
                alert("You have reached the minimal required rows.");
                return;
            }
            table.deleteRow(lastrow-1);
        }

        var table2 = document.getElementById("course-table");

        function addRow2() {
            var lastrow = table2.rows.length;
            var lastcol = table2.rows[0].cells.length;   
            var row = table2.insertRow(lastrow); 
            var cellcol0 = row.insertCell(0);
            cellcol0.innerHTML = "<p style='margin:4px 2px;'>"+lastrow+".</p>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='form-control input-sm' name='co_code[]'><span class='red-req'>*</span>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<textarea class='form-control input-sm span6' name='co_desc[]' rows='3'></textarea><span class='red-req'>*</span>";
            var cellcol3 = row.insertCell(3);
            cellcol3.innerHTML = "<input type='text' class='form-control input-sm' name='co_equi[]'>";
        }
        
        function removeRow2(){
            var lastrow = table2.rows.length;
            if(lastrow<3){
                alert("You have reached the minimal required rows.");
                return;
            }
            table2.deleteRow(lastrow-1);
        }
    </script>
