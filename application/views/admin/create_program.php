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
                                    <i class="fa fa-bar-chart-o"></i>  Create Program</a>
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
    echo form_open('admin/create_program');
?>
    <table class="table table-striped table-bordered" id="po-table">
        <tbody>
            <tr style="font-weight:bold;">
                <td style="width:15%;">Course Code</td>
                <td style="width:20%;">Course Name</td>
                <td>PO 1</td>
                <td>PO 2</td>
                <td>PO 3</td>
                <td>PO 4</td>
                <td>PO 5</td>
                <td>PO 6</td>
                <td>PO 7</td>
                <td>PO 8</td>
                <td>PO 9</td>
            </tr>
            <tr class="default-row">
                <td>
                    <?php
                    $data = array(
                        'name' => 'course_code[]',
                        'class' => 'form-control input-sm'
                    );
                    echo form_input($data);
                    ?>
                </td>
                <td>
                    <?php
                    $data = array(
                        'name' => 'course_name[]',
                        'class' => 'form-control input-sm'
                    );
                    echo form_input($data);
                    ?>
                </td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="1"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="2"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="3"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="4"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="5"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="6"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="7"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="8"></td>
                <td><input type="checkbox" class="form-control" name="row1[]" value="9"></td>
            </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" name="submit" value="Send">
</form>
<hr>
<button class="btn btn-default btn-sm" onclick="addRow()">Add Row</button>
<button class="btn btn-default btn-sm" onclick="addCol()">Add Column</button>
<button class="btn btn-default btn-sm" onclick="removeRow()">Remove Row</button>
<button class="btn btn-default btn-sm" onclick="removeCol()">Remove Column</button>

<script>
var table = document.getElementById("po-table");

function addRow() {
    var lastrow = table.rows.length;
    var lastcol = table.rows[0].cells.length;   
    var row = table.insertRow(lastrow); 
    var cellcol0 = row.insertCell(0);
    cellcol0.innerHTML = "<input type='text' class='form-control input-sm' name='course_code[]'></input>";
    var cellcol1 = row.insertCell(1);
    cellcol1.innerHTML = "<input type='text' class='form-control input-sm' name='course_name[]'></input>";

    for(i=2; i<lastcol;i++)
    {
        var cell1 = row.insertCell(i);
        cell1.innerHTML = "<input type='checkbox' class='form-control' name='row"+lastrow+"[]' value='"+(i-1)+"'>";
    }   
}
function addCol() {
    var lastrow = table.rows.length;
    var lastcol = table.rows[0].cells.length;
    var headertxt = table.rows[0].cells[lastcol-1].innerHTML;
    var headernum = headertxt.slice(headertxt.indexOf("PO")+2);
    headernum = headernum.trim();

    //for each row add column
    for(i=0; i<lastrow;i++)
    {
        var cell1 = table.rows[i].insertCell(lastcol);
        if(i==0)
            cell1.innerHTML = "PO " + (Number(headernum)+1);
        else
        {
            cell1.innerHTML = "<input type='checkbox' class='form-control' name='row"+i+"[]' value='"+(lastcol-1)+"'>";  
        }
    }
}

function removeRow(){
    var lastrow = table.rows.length;
    if(lastrow<2){
        alert("You have reached the minimal required rows.");
        return;
    }
    table.deleteRow(lastrow-1);
}

function removeCol(){
    var lastcol = (table.rows[0].cells.length)-1;
    var lastrow = (table.rows.length);
    //disallow first two column removal unless code is add to re-add text box columns vs checkbox columns
    if(lastcol<3){
        alert("You have reached the minimal required columns.");
        return;
    }
    
    //for each row remove column
    for(i=0; i<lastrow;i++){
        table.rows[i].deleteCell(lastcol);
    }
}
</script>