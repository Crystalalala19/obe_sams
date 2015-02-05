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

                <div class="alert alert-danger">
                    Please select an academic year to view your assigned classes.
                </div>

              

                <?php
                    echo $this->session->flashdata('message');
                    if (!empty($message)): echo $message;

                    else:
                ?>

                    <div class="widget-content">
                    <a href="<?php echo base_url('admin/teachers/view');?>">
                        <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                    </a>
                <div class="clearfix"></div><br>
                        <div class="control-group">
                            <select name="academic_year" id="selector" class="selectpicker show-tick" title="Select Academic Year" data-live-search="true" multiple data-max-options="1" data-size="auto">
                                <?php foreach($select_SY as $row): ?>
                                    <option value="<?php echo $row->school_year;?>"><?php echo $row->school_year.' - '.($row->school_year+1);?></option>
                                <?php endforeach;?>
                            </select>
                        </div>


                        <hr>
                        <?php if(!empty($this->uri->segment(3))):?>
                        <div class="span3">
                            <div class="alert alert-info">
                                <h4>Academic Year: <?php echo $academic_year.' - '.($academic_year+1);?></h4>
                            </div>
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
                                                        <th><center>Course Code <i class="icon-filter"></i></center></th>
                                                        <th><center>Group Number <i class="icon-filter"></i></center></th>
                                                        <th><center>Schedule <i class="icon-filter"></i></center></th>
                                                        <th style="visibility:hidden;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($first_sem as $row1): ?>
                                                    <tr>
                                                        <td><center><?php echo $row1->courseCode." ";?> </center></td>
                                                        <td><center><?php echo $row1->group_num;?></center></td>
                                                        <td><center><?php echo $row1->start_time."-".$row1->end_time." ".$row1->days;?></center></td>
                                                        <td><center>
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1->ID;?>">
                                                                <i class="icon-eye-open"></i> View Class
                                                            </center></a>
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
                                                        <th><center>Course Code <i class="icon-filter"></i></center></th>
                                                        <th><center>Group Number <i class="icon-filter"></i></center></th>
                                                        <th><center>Schedule <i class="icon-filter"></i></center></th>
                                                        <th style="visibility:hidden;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($second_sem as $row2): ?>
                                                    <tr>
                                                        <td><center><?php echo $row2->courseCode." ";?></center> </td>
                                                        <td><center><?php echo $row2->group_num;?></center></td>
                                                        <td><center><?php echo $row2->start_time."-".$row2->end_time." ".$row2->days;?></center></td>
                                                        <td><center>
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row2->ID;?>">
                                                                <i class="icon-eye-open"></i> View Class
                                                            </center></a>
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
                                                        <th><center>Course Code <i class="icon-filter"></i></center></th>
                                                        <th><center>Group Number <i class="icon-filter"></i></center></th>
                                                        <th><center>Schedule <i class="icon-filter"></i></center></th>
                                                        <th style="visibility:hidden;">Action <i class="icon-filter"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($summer as $row3): ?>
                                                    <tr>
                                                        <td><center><?php echo $row3->courseCode." ";?> </center></td>
                                                        <td><center><?php echo $row3->group_num;?></center></td>
                                                        <td><center><?php echo $row3->start_time."-".$row3->end_time." ".$row3->days;?></center></td>
                                                        <td><center>
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row3->ID;?>">
                                                                <i class="icon-eye-open"></i> View Class
                                                            </center></a>
                                                        </td>
                                                    <?php endforeach; ?>   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <?php endif?>
                        </div>    
                    </div> <!-- /widget -->    
                <?php endif?>     
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->


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

    $('#selector').change(function()
    {
        self.location = "<?php echo base_url('site/course_list');?>/"+ this.value;
    });
</script>
