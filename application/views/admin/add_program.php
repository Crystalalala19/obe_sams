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
                                    <i class="fa fa-plus-square"></i>  <?php echo $header;?>
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
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>', 
    '</div>');
    echo form_open('admin/add_program');
?>
    <div id="step-1">
        <div class="form-group col-md-6">
            <label for="program_inp">Program:</label>
            <select class="form-control input-sm" id="program_inp" name="program">
                <option selected="selected" value="">Select program: </option>
                <option value="BSCS">BSCS</option>
                <option value="BSIT">BSIT</option>
                <option value="BSICT">BSICT</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="effective_year">Effective Year:</label>
            <?php
                function yearDropdown($startYear, $endYear, $id="year"){
                    //start the select tag
                    echo "<select class='form-control input-sm' id=".$id." name=".$id.">";
                        echo '<option selected="selected" value="">Select year: </option>';  
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
    </div>
    <div id="step-2">
        <div class="form-group col-md-12">
            <table class="table table-striped table-bordered dataTable no-footer text-center" id="po-table">
                <tbody>
                    <tr>
                        <th width="1%"></th>
                        <th width="10%">PO Code</th>
                        <th width="30%">PO Attribute</th>
                        <th width="59%">PO Description</th>
                    </tr>
                    <tr>
                        <td><p style="margin:4px 2px;">1.</p></td>
                        <td><input type="text" class="form-control input-sm" name="po_code[]"></td>
                        <td><input type="text" class="form-control input-sm" name="po_attrib[]"></td>
                        <td><textarea class="form-control input-sm" name="po_desc[]" rows="3"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-default btn-xs" id="btnAddRow" onclick="addRow()">Add Row</button>
            <button type="button" class="btn btn-default btn-xs" id="btnRemoveRow" onclick="removeRow()">Remove Row</button>
        </div>
    </div>
    <div id="step-3">
        <!-- Step 3 goes here!!! -->
    </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary disabled" id="btnSubmit" name="submit" value="Submit">

            <!-- STEP Start -->
            <div class="btn btn-primary disabled" id="btnPrevious" name="btnPrevious">Previous</div>
            <div class="btn btn-primary disabled" id="btnNext" name="btnNext">Next</div>
            <!-- STEP End -->
        </div>
    </form>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        var table = document.getElementById("po-table");

        function addRow() {
            var lastrow = table.rows.length;
            var lastcol = table.rows[0].cells.length;   
            var row = table.insertRow(lastrow); 
            var cellcol0 = row.insertCell(0);
            cellcol0.innerHTML = "<p style='margin:4px 2px;'>"+lastrow+".</p>";
            var cellcol1 = row.insertCell(1);
            cellcol1.innerHTML = "<input type='text' class='form-control input-sm' name='po_code[]'></input>";
            var cellcol2 = row.insertCell(2);
            cellcol2.innerHTML = "<input type='text' class='form-control input-sm' name='po_attrib[]'></input>";
            var cellcol3 = row.insertCell(3);
            cellcol3.innerHTML = "<textarea class='form-control input-sm' name='po_desc[]' rows='3'></textarea>";
        }

        function removeRow(){
            var lastrow = table.rows.length;
            if(lastrow<3){
                alert("You have reached the minimal required rows.");
                return;
            }
            table.deleteRow(lastrow-1);
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/step.js"></script>