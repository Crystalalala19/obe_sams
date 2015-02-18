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
                            <li class="from_user"> <a href="#" class="avatar">
                              <div class="message_wrap"> <span class="arrow"></span>
                                <div class="info"> 
                                    <a class="name"> 
                                        <h2>Welcome <?php foreach($user as $row): ?><?php echo $row['lname'].", ".$row['fname']." ".$row['mname'];?></h2>   
                                    </a> 
                                </div>
                                    Student ID: <?php echo $row['student_id'];?><br><?php endforeach; ?>
                                    <?php foreach($student_year as $row1): ?>
                                        Program: <?php echo $row1['programName'].' - '.$row1['year_level'];?><br>
                                        Effective Year: <?php echo $row1['effective_year'].' - '.($row1['effective_year']+1);?><br>
                                    <?php endforeach; ?>     
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div><br>

                        <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>Grp #</th>
                                    <th>Subject</th>
                                    <th>Course Description</th>
                                    <th>Schedule</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach($get_courses as $row): ?>   
                                <tr>
                                    <td width="5%"><?php echo $row['group_num']; ?></td>          
                                    <td><?php echo $row['courseCode']; ?></td>
                                    <td><?php echo $row['CourseDesc']; ?></td>
                                    <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td> 
                                    <td><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></td> 
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
