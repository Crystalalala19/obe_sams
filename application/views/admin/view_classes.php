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

                            <a href="<?php echo base_url('admin/teachers/view');?>">
                                <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            </a>
                            <div class="clearfix"></div><br>

                            <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)): echo $message;

                            else:
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
                            <h1>Academic Year</h1>
                            <h2><?php echo $academic_year.' - '.($academic_year+1);?></h2>

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
                                                        <th>Group #</th>
                                                        <th>Course Code</th>
                                                        <th>Schedule</th>
                                                        <th>Action</th>
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
                                                        <th>Group #</th>
                                                        <th>Course Code</th>
                                                        <th>Schedule</th>
                                                        <th>Action</th>
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
                                                        <th>Group #</th>
                                                        <th>Course Code</th>
                                                        <th>Schedule</th>
                                                        <th>Action</th>
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

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";

        $(document).ready(function(){
            $('#first_sem').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false 
            });

            $('#second_sem').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false 
            });
            $('#summer').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false 
            });
        });

        $('#selector').change(function()
        {
            self.location = "<?php echo base_url('admin/teachers/classes');?>/"+ document.getElementById('teacher_id').value+"/"+ this.value;
        });
    </script>

