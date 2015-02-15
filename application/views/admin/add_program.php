    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.steps.css">
 
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

                                $attrib = array("id" => "step-form");
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
                                                    <label for="program_name">Program Code:</label>
                                                    <input type="text" class="form-control input-sm" name="program_name" id="program_name" value="<?php echo set_value('teacher_fname'); ?>" required>
                                                </div>
                                                <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                    <label for="full_name">Full Program Name:</label>
                                                    <input type="text" class="form-control input-sm" name="full_name" id="full_name" value="<?php echo set_value('teacher_fname'); ?>" required>
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

                            <?php if($program_list == FALSE):?>
                                <div class="alert alert-info"><strong>Notice:</strong> No programs to list. <a href="<?php echo base_url(); ?>admin/programs/view">Click here to add.</a></div>
                            <?php else:?>

                            <pre>Fields with <span class="red-req">*</span> &nbsp;are required.</pre>

                            <?php echo form_open('admin/programs/add', $attrib); ?>
                            <div>
                                <h2>Program</h2>
                                <section>
                                    <label class="control-label" for="program_inp">Program: <span class="red-req">*</span></label><br>
                                    <select class="required" title="Please select a Program" id="program_inp" name="program">
                                        <option value="">Select a Program:</option>
                                        <?php foreach ($program_list as $row): ?>
                                        <option value="<?php echo $row['programName']; ?>"><?php echo rawurldecode($row['programName']); ?></option>
                                        <?php endforeach;?>
                                    </select>
                               
                                    <br>
                                    <label class="control-label" for="effective_year">Effective Year: <span class="red-req">*</span></label><br>
                                    <?php
                                        function yearDropdown($startYear, $endYear, $id="year"){
                                            //start the select tag
                                            echo "<select class='required' title='Please select the Effective Year' id='".$id."' name='".$id."'>";
                                                echo '<option value="">Select Effective Year:</option>';
                                                //echo each year as an option    
                                                for ($i=$startYear;$i<=$endYear;$i++){
                                                echo "<option value=".$i.">".$i." - ".($i+1)."</option>";    
                                                }
                                            //close the select tag
                                            echo "</select>";
                                        }
                                        yearDropdown(date('Y'), date('Y')+50, "effective_year");
                                    ?>
                                </section>
                                
                                <h2>Program Outcomes</h2>
                                <section style="position:relative;">
                                    <table class="table table-striped table-bordered no-footer text-center" id="po-table">
                                        <tbody>
                                            <tr>
                                                <th>PO Code</th>
                                                <th>PO Attribute</th>
                                                <th>PO Description</th>
                                            </tr>
                                            <tr>
                                                <td><span class="red-req">*</span><input type="text" class="required" name="po_code[]" id="po_code"></td>
                                                <td><span class="red-req">*</span><input type="text" class="required" name="po_attrib[]" id="po_attrib"></td>
                                                <td><span class="red-req">*</span><textarea class="required span6" name="po_desc[]" rows="5" id="po_desc"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow()">Add Row</button>
                                    <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow()">Remove Row</button>
                                </section>

                                <h2>Courses</h2>
                                <section style="position:relative;">
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
                                                <td><span class="red-req">*</span><input type="text" class="required" name="co_code[]" id="co_code"></td>
                                                <td><span class="red-req">*</span><textarea class="required span6" name="co_desc[]" rows="3" id="co_desc"></textarea></td>
                                                <td><input type="text" class="" name="co_equi[]"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow2()">Add Row</button>
                                    <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow2()">Remove Row</button>
                                </section>
                            </div>
                            </form>
                            <?php endif;?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.steps.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/step.js"></script>

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
            cellcol0.innerHTML = "<span class='red-req'>*</span><input type='text' class='required' name='po_code[]' id='po_code'>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<span class='red-req'>*</span><input type='text' class='required' name='po_attrib[]' id='po_attrib'>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<span class='red-req'>*</span><textarea class='required span6' name='po_desc[]' rows='5' id='po_desc'></textarea>";
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
            cellcol1.innerHTML = "<span class='red-req'>*</span><input type='text' class='required' name='co_code[]' id='co_code'>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<span class='red-req'>*</span><textarea class='required span6' name='co_desc[]' rows='3' id='co_desc'></textarea>";
            var cellcol3 = row.insertCell(3);
            cellcol3.innerHTML = "<input type='text' class='' name='co_equi[]'>";
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
