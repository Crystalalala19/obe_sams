    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-edit"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                        <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)): echo $message;

                            else:
                            echo validation_errors('
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                <i class="icon-exclamation-sign"></i>', 
                            '</div>');
                            
                            $attrib = array( 'onsubmit' => "return confirm('Are you sure you want to update?');"); 

                            echo form_open('', $attrib);
                        ?>
                                <div class="control-group">
                                    <label for="program_inp">Program:</label>
                                    <input type="hidden" name="program_id" value="<?php echo set_value('program_id', $program_info['ID']);?>">
                                    <input type="text" name="program" id="program_inp" value="<?php echo set_value('program', $program_info['programName']);?>">
                                </div>

                                <div class="control-group">
                                    <label for="program_full">Program Full Name:</label>
                                    <input type="text" name="program_full" class="span6" id="program_full" value="<?php echo set_value('program', $program_info['programFullName']);?>">
                                </div>

                                <div class="control-group">
                                    <label for="effective_year">Effective Year:</label>
                                    <select name="effective_year" readonly>
                                        <option value="<?php echo $year;?>" selected="selected"><?php echo $year;?></option>
                                    </select>
                                </div>

                                <div class="control-group">
                                    <table class="table table-striped table-bordered" id="po-table">
                                        <thead>
                                            <tr>
                                                <th>PO CODE</th>
                                                <th>PO ATTRIBUTE</th>
                                                <th>PO DESCRIPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($program_data as $row):?>
                                            <tr>
                                                <input type="hidden" name="po_id[]" value="<?php echo $row['ID'];?>">
                                                <td><input type="text" class="span1" name="po_code[]" value="<?php echo $row['poCode'];?>" placeholder="PO Code"></td>
                                                <td><input type="text" class="span4" name="po_attrib[]" value="<?php echo $row['attribute'];?>" placeholder="PO Attribute"></td>
                                                <td><textarea class="span6" name="po_desc[]" rows="5" placeholder="PO Description"><?php echo $row['description'];?></textarea></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow()">Add Row</button>
                                    <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow()">Remove Row</button>
                                </div>
                                <hr>
                                <div class="control-group">
                                    <table class="table table-striped table-bordered" id="course-table">
                                        <thead>
                                            <tr>
                                                <th>Course List</th>
                                                <th>Course Description</th>
                                                <th>Course Equivalents 
                                                    <a href="#" data-toggle="popover" data-html="true" data-content="Separate by comma. <br>Ex: IT110, CS110, ICT110"><i class="icon-info-sign icon-large"></i></a>
                                                </th>
                                                <th>Year Level</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($course_list as $key => $row):?>
                                            <tr>
                                                <input type="hidden" name="co_id[]" value="<?php echo $row['ID'];?>">
                                                <td><input type="text" class="span1" name="co_code[]" value="<?php echo $row['CourseCode'];?>" placeholder="Course Code"></td>
                                                <td><input type="text" class="span3" name="co_desc[]" value="<?php echo $row['CourseDesc'];?>" placeholder="Course Description"></td>
                                                <td><input type="text" class="" name="co_equi[]" value="<?php if(isset($equivalent[$key]))echo $equivalent[$key];?>" placeholder="Course Equivalents"></td>
                                                <td>
                                                    <select title="Please select a Year" name="year_level[]">
                                                        <option value="">Select Year Level: </option>
                                                        <option value="1" <?php if($row['year_level'] == 1) echo 'selected="selected"';?>>1</option>
                                                        <option value="2" <?php if($row['year_level'] == 2) echo 'selected="selected"';?>>2</option>
                                                        <option value="3" <?php if($row['year_level'] == 3) echo 'selected="selected"';?>>3</option>
                                                        <option value="4" <?php if($row['year_level'] == 4) echo 'selected="selected"';?>>4</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select title="Please select a Semester" name="semester[]">
                                                        <option value="">Select Semester: </option>
                                                        <option value="1" <?php if($row['semester'] == 1) echo 'selected="selected"';?>>1</option>
                                                        <option value="2" <?php if($row['semester'] == 2) echo 'selected="selected"';?>>2</option>
                                                        <option value="summer" <?php if($row['semester'] == 'summer') echo 'selected="selected"';?>>Summer</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow2()">Add Row</button>
                                    <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow2()">Remove Row</button>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-success" name="submit" value="Update">
                                <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            </form>
                            <?php endif;?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->
    
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
            cellcol0.innerHTML = "<input type='hidden' name='po_id[]'><input type='text' class='span1' name='po_code[]' placeholder='PO Code' required='required'>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='span4' name='po_attrib[]' placeholder='PO Attribute' required='required'>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<textarea class='span6' name='po_desc[]' rows='5' placeholder='PO Description' required='required'></textarea>";
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
            cellcol0.innerHTML = "<input type='hidden' name='co_id[]'><input type='text' class='span1' name='co_code[]' placeholder='Course Code' required='required'>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='span3' name='co_desc[]' placeholder='Course Description'>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<input type='text' class='' name='co_equi[]' placeholder='Course Equivalents'>";
            var cellcol3 = row.insertCell(3);
            cellcol3.innerHTML = "<select title='Please select a Year' name='year_level[]'>"+
                                    "<option value=''>Select Year Level: </option>"+
                                    "<option value='1'>1</option>"+
                                    "<option value='2'>2</option>"+
                                    "<option value='3'>3</option>"+
                                    "<option value='4'>4</option>"+
                                 "</select>";
            var cellcol4 = row.insertCell(4);
            cellcol4.innerHTML = "<select title='Please select a Semester' name='semester[]'>"+
                                    "<option value=''>Select Semester: </option>"+
                                    "<option value='1'>1</option>"+
                                    "<option value='2'>2</option>"+
                                    "<option value='summer'>Summer</option>"+
                                 "</select>";
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