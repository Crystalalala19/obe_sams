    <!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">

    <!-- For filter table -->
    <link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
    <!-- End filter table -->

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-book"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <a href="<?php echo base_url('admin/teachers/view');?>">
                                <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            </a>
                            <div class="clearfix"></div><br>

                            <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)): echo $message;

                            else:
                                if(!empty($info)):
                                echo $info;
                                endif;
                            ?>

                            <input type="hidden" name="teacher_id" value="<?php echo $this->uri->segment(4);?>" id="teacher_id">
                            <div class="control-group">

                                <select name="academic_year" id="selector" class="selectpicker show-tick" title="Select Academic Year" data-live-search="true" multiple data-max-options="1" data-size="auto">
                                    <?php foreach($year_classes as $row):?>
                                    <option value='<?php echo $row['school_year'];?>'><?php echo $row['school_year'].' - '.($row['school_year']+1);?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <hr>
                            
                            <?php if(!empty($this->uri->segment(5))):?>                            
                            <div class="span3">
                                <div class="alert alert-info">
                                    <h4>Academic Year: <?php echo $academic_year.' - '.($academic_year+1);?></h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">1st Semester</a></li>
                                    <li><a href="#tab2" data-toggle="tab">2nd Semester</a></li>
                                    <li><a href="#tab3" data-toggle="tab">Summer</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class='panel panel-default grid'>
                                            <table id="first_sem" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Group # <i class="icon-filter"></th>
                                                        <th>Course Code <i class="icon-filter"></th>
                                                        <th>Schedule <i class="icon-filter"></th>
                                                        <th width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($first_sem as $row):?>
                                                    <tr>
                                                        <td><?php echo $row['group_num']; ?></td>
                                                        <td><?php echo $row['courseCode']; ?></td>
                                                        <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <div class='panel panel-default grid'>
                                            <table id="second_sem" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Group # <i class="icon-filter"></i></th>
                                                        <th>Course Code <i class="icon-filter"></i></th>
                                                        <th>Schedule <i class="icon-filter"></i></th>
                                                        <th width="10%">Action</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($second_sem as $row):?>
                                                    <tr>
                                                        <td><?php echo $row['group_num']; ?></td>
                                                        <td><?php echo $row['courseCode']; ?></td>
                                                        <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <div class='panel panel-default grid'>
                                            <table id="summer" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Group # <i class="icon-filter"></th>
                                                        <th>Course Code <i class="icon-filter"></th>
                                                        <th>Schedule <i class="icon-filter"></th>
                                                        <th width="10%">Action <i class="icon-filter"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($summer as $row):?>
                                                    <tr>
                                                        <td><?php echo $row['group_num']; ?></td>
                                                        <td><?php echo $row['courseCode']; ?></td>
                                                        <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif?>
                        </div> <!-- /widget-content -->  
                        <?php endif;?>
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <!-- Filter table -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable.js"></script>
    <!-- End filter table -->

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";

        $('#first_sem').filterable({ignoreColumns: [3]});
        $('#second_sem').filterable({ignoreColumns: [3]});
        $('#summer').filterable({ignoreColumns: [3]});

        $('#selector').change(function()
        {
            self.location = "<?php echo base_url('admin/teachers/classes');?>/"+ document.getElementById('teacher_id').value+"/"+ this.value;
        });
    </script>

