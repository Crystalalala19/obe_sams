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
                                    <select class="form-control input-sm" id="program_inp" name="program" readonly>
                                        <option value="<?php echo $program;?>" selected="selected"><?php echo $program;?></option>
                                    </select>
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
                                                <td><input type="text" class="form-control input-sm" name="po_code[]" value="<?php echo $row['poCode'];?>"></td>
                                                <td><input type="text" class="form-control input-sm" name="po_attrib[]" value="<?php echo $row['attribute'];?>"></td>
                                                <td><textarea class="form-control span6" name="po_desc[]" rows="5"><?php echo $row['description'];?></textarea></td>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($course_list as $key => $row):?>
                                            <tr>
                                                <input type="hidden" class="form-control input-sm" name="co_id[]" value="<?php echo $row['ID'];?>">
                                                <td><input type="text" class="form-control input-sm" name="co_code[]" value="<?php echo $row['CourseCode'];?>"></td>
                                                <td><textarea class="form-control input-sm span6" name="co_desc[]" rows="3"><?php echo $row['CourseDesc'];?></textarea></td>
                                                <td><input type="text" class="" name="co_equi[]" value="" placeholder="Enter Course Equivalent">
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
            cellcol0.innerHTML = "<input type='hidden' name='po_id[]'><input type='text' class='required' name='po_code[]' placeholder='Enter PO Code' required='required'>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='required' name='po_attrib[]' placeholder='Enter PO Attribute' required='required'>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<textarea class='required span6' name='po_desc[]' rows='5' placeholder='Enter PO Description' required='required'></textarea>";
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
            cellcol0.innerHTML = "<input type='hidden' name='co_id[]'><input type='text' class='required' name='co_code[]' placeholder='Enter Course Code' required='required'>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<textarea class='required span6' name='co_desc[]' rows='3' placeholder='Enter Course Description' required='required'></textarea>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<input type='text' class='' name='co_equi[]' placeholder='Enter Course Equivalents'>";
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