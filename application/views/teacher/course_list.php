<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    
<!-- For filter table -->
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
<link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">


<!-- End filter table -->


<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Course</li>
        </ul>
</section>

<div id='content'>
    <div class='panel panel-default grid'>
        <div class='panel-heading'>
            Assigned Classes
        </div>
        <div class='panel-body'>   
            <div class="container">
                <div class="form-group col-md-2">
                    <label for="academicyear_ajax">Academic Year:</label>
                    <select name="academicyear" class="selectpicker show-tick" title="Select Academic Year" data-live-search="true" multiple data-max-options="1" data-size="auto" id='academicyear_ajax' required>
                        <?php foreach($select_SY as $row): ?>
                        <option value="<?php echo $row->school_year;?>"><?php echo $row->school_year;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group col-md-12"></div>
                <div class="tabbable">
                    <div class='panel-body'>   
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                       
                                <div class="span8">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                          <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                          <li><a href="#tab5" data-toggle="tab">Summer</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab3">
                                                <div class='panel panel-default grid'>
                                                    <table id="example-table" class="table table-striped table-hover table-condensed">
                                                        <?php
                                                            echo $this->session->flashdata('message1');
                                                            if (!empty($message1)) echo $message1;

                                                            echo validation_errors('
                                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                                                <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                                            '</div>');
                                                        ?>
                                                        <thead>
                                                            <tr id="showTable">
                                                                <th>Course Code <i class="icon-filter"></i></th>
                                                                <th style="visibility:hidden;">Group Number</th>
                                                                <th style="visibility:hidden;">Schedule</th>
                                                                <th style="visibility:hidden;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($course1 as $row1): ?>
                                                            <tr>
                                                                <td><?php echo $row1->courseCode." ";?> </td>
                                                                <td><?php echo "Group: ".$row1->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row1->start_time."-".$row1->end_time." ".$row1->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1->ID;?>">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab4">
                                                <div class='panel panel-default grid'>
                                                    <table id="example-table1" class="table table-striped table-hover table-condensed">
                                                        <?php
                                                            echo $this->session->flashdata('message2');
                                                            if (!empty($message2)) echo $message2;

                                                            echo validation_errors('
                                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                                                <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                                            '</div>');
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <th>Course Code <i class="icon-filter"></i></th>
                                                                <th style="visibility:hidden;">Group Number</th>
                                                                <th style="visibility:hidden;">Schedule</th>
                                                                <th style="visibility:hidden;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($course2 as $row2): ?>
                                                            <tr>
                                                                <td><?php echo $row2->courseCode." ";?> </td>
                                                                <td><?php echo "Group: ".$row2->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row2->start_time."-".$row2->end_time." ".$row2->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row2->ID;?>">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab5">
                                                <div class='panel panel-default grid'>
                                                    <table id="example-table2" class="table table-striped table-hover table-condensed">
                                                        <?php
                                                            echo $this->session->flashdata('message3');
                                                            if (!empty($message3)) echo $message3;

                                                            echo validation_errors('
                                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                                                <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                                            '</div>');
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <th>Course Code <i class="icon-filter"></i></th>
                                                                <th style="visibility:hidden;">Group Number</th>
                                                                <th style="visibility:hidden;">Schedule</th>
                                                                <th style="visibility:hidden;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($course3 as $row3): ?>
                                                            <tr>
                                                                <td><?php echo $row3->courseCode." ";?> </td>
                                                                <td><?php echo "Group: ".$row3->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row3->start_time."-".$row3->end_time." ".$row3->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row3->ID;?>">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  


                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>

    <body>
      
    </body>


</div>

<style>
    table .collapse.in {
    display:table-row;
}
</style>
<!-- For filter table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable.js"></script>
<!-- End filter table -->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min1.js"></script>


<script type="text/javascript">
    $('#example-table').filterable();
    $('#example-table1').filterable();
    $('#example-table2').filterable();
</script>

<script type="text/javascript" language="javascript">

    $(document).ready(function(){

            $('#academicyear_ajax').on('change', function() {

                var selectedValue = this.value;
                
                if(selectedValue == '') {
                    alert('Empty');
                }

                else {
                    $.ajax({
                        url: '<?php echo site_url("index.php/site/course_list");?>',
                        type: 'post',
                        data: {option: selectedValue},
                        dataType: 'json',
                        success: function(response) {
                          $.each(response, function(key, value)){
                                $("#showTable").append(
                                    $('<td>').html(value.courseCode),
                                    $('<td>').html()
                                )
                          }
                        }
                    });
                }

            });
        });

</script>