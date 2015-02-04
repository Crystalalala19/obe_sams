    <!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">

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
                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)): echo $message;

                                else:
                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i>', 
                                '</div>');
                            ?>
                            <div class="pull-right">
                                <a href="<?php echo base_url('admin/teachers/view');?>">
                                    <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                </a>
                            </div>

                            <div class="control-group">
                                <select class="selectpicker show-tick" title="Select Academic Year" data-live-search="true" multiple data-max-options="1" data-size="5">
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                </select>
                            </div>

                            <hr>
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">1st Semester</a></li>
                                    <li><a href="#tab2" data-toggle="tab">2nd Semester</a></li>
                                    <li><a href="#tab3" data-toggle="tab">Summer</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class='panel panel-default grid'>
                                            <div class="span11">
                                                <table id="view_classes" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Group #</th>
                                                            <th>Course Code</th>
                                                            <th>Schedule</th>
                                                            <th>Semester</th>
                                                            <th>Academic Year</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($teacher_classes as $row):?>
                                                        <tr>
                                                            <td><?php echo $row['group_num']; ?></td>
                                                            <td><?php echo $row['courseCode']; ?></td>
                                                            <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                                                            <td><?php echo $row['semester']; ?></td>
                                                            <td><?php echo ($row['school_year']-1). ' - '. $row['school_year']; ?></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <div class='panel panel-default grid'>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <div class='panel panel-default grid'>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /widget-content -->  
                        <?php endif;?>
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";

        $(document).ready(function(){
            $('#view_classes').DataTable();
        });
    </script>

