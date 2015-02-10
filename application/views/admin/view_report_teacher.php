    <!-- choose a theme file -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.blue.css">
    <!-- load jQuery and tablesorter scripts -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.js"></script>

    <!-- tablesorter widgets (optional) -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.widgets.js"></script>

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user-md"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <table id="myTable" class="tablesorter">
                                <thead>
                                    <tr>
                                        <th>S.Y</th>
                                        <th class="filter-select" data-placeholder="Select a Semester">Semester</th>
                                        <th>Teacher</th>
                                        <th>Group #</th>
                                        <th>Subject</th>
                                        <th>Schedule</th>
                                        <th data-sorter="false">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($teacher_list as $row):?>
                                    <tr>
                                        <td><?php echo $row['school_year'];?></td>
                                        <td><?php echo $row['semester'];?></td>
                                        <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                        <td><?php echo $row['group_num'];?></td>
                                        <td><?php echo $row['courseCode'];?></td>
                                        <td><?php echo $row['start_time'].' - '. $row['end_time'].' '. $row['days'];?></td>
                                        <td>
                                            <a type="button" title="View Classes" class="btn btn-warning btn-small btn-responsive" href="<?php echo base_url();?>admin/teachers/scorecard/<?php echo $row['teacher_id'].'/'.$row['school_year'].'/'.$row['ID'];?>"><i class="icon-book"></i></a>

                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("report_dropdown");
        d.className = d.className + " active";

        $(function(){
            $("#myTable").tablesorter({
                theme: 'blue',

                // hidden filter input/selects will resize the columns, so try to minimize the change
                widthFixed : true,
                widgets : ["zebra", "filter"],

                widgetOptions : {
                    filter_searchDelay : 400
                } 
            });
        });
    </script>