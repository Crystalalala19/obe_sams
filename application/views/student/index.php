 <!-- Datatables -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>

<style type="text/css">
    h2 {
        color: #060;
        font-size: 15px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: left;
    }
</style>


<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-home"></i>
                        <h3>Home</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                            <ul class="messages_layout">
                                <li class="from_user">
                                  <div class="message_wrap">
                                    <div class="info"> 
                                        <a class="name"> 
                                            <center><h2>Welcome <?php foreach($user as $row): ?><?php echo $row['lname'].", ".$row['fname'];?></h2></center>   
                                        </a> 
                                    </div>
                                        Student ID: <?php echo $row['student_id'];?><br><?php endforeach; ?>
                                        <?php foreach($student_year as $row1): $stud_prog = $row1['programFullName'].' '.$row1['effective_year'].' - '.($row1['effective_year']+1); ?>
                                            Student Prospectus: <?php echo $row1['programName'].' - '.$row1['effective_year'];?><br>
                                            Year Level: <?php echo $row1['year_level'];?><br>
                                        <?php endforeach; ?>
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <?php
                                foreach ($user as $key => $user) {
                                $stud_info = $user['lname'].', '.$user['fname']. ' '.$user['student_id'];
                            }
                                
                            ?>
                            <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Academic Year</th>
                                        <th>Semester</th>
                                        <th>Year Level</th>
                                        <th>Subject</th>
                                        <th>Course Description</th>
                                        <th>Schedule</th>
                                        <th>Teacher</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($get_courses as $row): ?>   
                                    <tr>
                                        <td width="15%"><?php echo $row['school_year'].' - '.($row['school_year']+1); ?></td>
                                        <td width="15%"><?php if($row['semester'] == '1'){
                                                        echo '1ST SEMESTER';
                                                    } 
                                                    elseif ($row['semester'] == '2') {
                                                        echo '2ND SEMESTER';
                                                    }
                                                    elseif ($row['semester'] == 'summer') {
                                                        echo 'SUMMER';
                                                    }
                                                    ?></td>
                                        <td><?php echo $row['year_level']; ?></td>
                                        <td width="10%"><?php echo $row['courseCode']; ?></td>
                                        <td><?php echo $row['CourseDesc']; ?></td>
                                        <td><?php echo 'Group #:'.$row['group_num'].' '.$row['start_time'].' - '.$row['end_time'].' '.$row['days'].' '; ?></td> 
                                        <td><?php echo $row['fname'].' '.$row['lname']; ?></td> 
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->

<script type="text/javascript" language="javascript">
    var dataTableOptions = {
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false 
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "bShowAll": false
                }, {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [{
                            "sExtends": "pdf",
                            "sTitle": "<?php echo $stud_info; ?>",
                            "sButtonText": "PDF",
                            "sPdfMessage": "<?php echo $stud_prog; ?>",
                            "mColumns": "visible"
                        }
                    ]
                }
            ]
        };

        var table = $('#view_classlist').DataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>
