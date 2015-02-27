<!-- PDF doesn't work, EDIT: now fixed -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->
    
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-file"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Teacher Log</a></li>
                                <li><a href="#tab2" data-toggle="tab">Assigning Class</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class='panel panel-default grid'>
                                        <table id="view_teacherslog" class="table">
                                            <thead>
                                                <tr>
                                                    <th><center>Date</center></th>
                                                    <th><center>Course</center></th>
                                                    <th><center>Submitted By:</center></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($teacher_log as $row1): ?>
                                                    <tr>
                                                        <td width="20%"><center>
                                                            <span class="news-item-month"><?php echo "".date('jS', strtotime($row1['date'])).' '.date('M Y', strtotime($row1['date']));?>
                                                            <br><?php echo "".date('h:i A', strtotime($row1['date']));?></span>    
                                                        </center></td>
                                                        <td><center><?php echo $row1['courseCode'].' Group #: <b>'.$row1['group_num'].'</b> | '.$row1['start_time'].' - '.$row1['end_time'].' '.$row1['days'];?></center></td>
                                                        <td><center><?php echo $row1['fname'].' '.$row1['lname'];?></center></td>
                                                        <td><center><a class="btn btn-mini btn-info" href="<?php echo base_url();?>admin/teachers/scorecard/<?php echo $row1['teacher_id'].'/'.$row1['school_year'].'/'.$row1['ID'];?>" title="View Class">View Class</a></center></td>
                                                    </tr>
                                                <?php endforeach; ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class='panel panel-default grid'>
                                        <table id="view_activitylog" class="table">
                                            <thead>
                                                <tr>
                                                    <th><center>Date</center></th>
                                                    <th><center>Course</center></th>
                                                    <!-- <th></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($activity_log as $row): ?>
                                                    <tr>
                                                        <td width="20%"><center>
                                                            <span class="news-item-month"><?php echo "".date('jS', strtotime($row['date'])).' '.date('M Y', strtotime($row['date']));?>
                                                            <br><?php echo "".date('h:i A', strtotime($row['date']));?></span>    
                                                        </center></td>
                                                        <td><center><?php echo $row['courseCode'].' Group #: <b>'.$row['group_num'].'</b> | '.$row['start_time'].' - '.$row['end_time'].' '.$row['days'];?></center></td>
                                                        <!-- <td><center><a class="btn btn-mini btn-info" href="<?php echo base_url();?>admin/teachers/scorecard/<?php echo $row['teacher_id'].'/'.$row['school_year'].'/'.$row['ID'];?>" title="View Class">View Class</a></center></td> -->
                                                    </tr>
                                                <?php endforeach; ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

   <script type="text/javascript" language="javascript">
        var d = document.getElementById("activity_log");
        d.className = d.className + " active";
    </script>

    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            //Auto sort column
            "order": [[1,'asc']],

            //Disable sorting with class no-sort
            "columnDefs": [
                { targets: 'no-sort', orderable: false }
            ],

            "bInfo": false,
            "bLengthChange": false,
            "bFilter": true,
            "bAutoWidth": false,
            "bSort": false 
        };

        var table = $('#view_teacherslog').DataTable( dataTableOptions );

        $('.dataTables_filter input').attr("placeholder", " Enter keyword");

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>

    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            //Auto sort column
            "order": [[1,'asc']],

            //Disable sorting with class no-sort
            "columnDefs": [
                { targets: 'no-sort', orderable: false }
            ],

            "bInfo": false,
            "bLengthChange": false,
            "bFilter": true,
            "bAutoWidth": false,
            "bSort": false 
        };

        var table = $('#view_activitylog').DataTable( dataTableOptions );

        $('.dataTables_filter input').attr("placeholder", " Enter keyword");

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>

   