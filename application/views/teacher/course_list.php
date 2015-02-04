<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    
<!-- For filter table -->
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">

<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">

                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-list"></i>
                    <h3>Assigned Classes</h3>
                </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="span2">
                            <label>Academic Year:</label>
                            <?php $attrib = array('id' => 'autoSub');?>
                            <?php echo form_open('site/course_list/'.set_value('selector'), $attrib);?>
                            <select name="selector" id="selector">
                                <?php foreach($select_SY as $row): ?>
                                <option value=""> sdfsdf</option>
                                <option value="<?php echo $row->school_year;?>"><?php echo $row->school_year;?></option>
                                <?php endforeach;?>
                            </select>
                            </form>
                        </div>
                      
                        <div class="span11"><br>
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                    <li><a href="#tab4" data-toggle="tab">2nd Semester</a></li>
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
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1->ID;?>">
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
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row2->ID;?>">
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
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row3->ID;?>">
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

                </div> <!-- /widget -->         

            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" language="javascript">


    $('#selector').change(function()
    {
      $("#autoSub").submit();
    });

</script>
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
