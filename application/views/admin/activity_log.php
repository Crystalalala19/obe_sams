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
                                <li class="active"><a href="#tab1" data-toggle="tab">Assigning Class</a></li>
                                <li><a href="#tab2" data-toggle="tab">Teacher Log</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class='panel panel-default grid'>
                                        <ul class="news-items">
                                        <?php foreach($activity_log as $row): ?> 
                                            <li>
                                                <div class="news-item-date"> 
                                                    <span class="news-item-day"><?php echo "".date('jS', strtotime($row['date']));?></span> 
                                                    <span class="news-item-month"><?php echo "".date('M Y', strtotime($row['date']));?></span> 
                                                </div>
                                                <div class="news-item-detail">
                                                    <?php echo "".date('h:i A', strtotime($row['date']));?>
                                                </div>
                                            </li>
                                            <?php endforeach; ?> 
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class='panel panel-default grid'>
                                        <div style="height:400px;width:1150px;overflow:auto;">
                                            <ul class="news-items">
                                            <?php foreach($teacher_log as $row1): ?> 
                                                <li>
                                                    <div class="news-item-date"> 
                                                        <span class="news-item-day"><?php echo "".date('jS', strtotime($row1['date']));?></span> 
                                                        <span class="news-item-month"><?php echo "".date('M Y', strtotime($row1['date']));?></span> 
                                                    </div>
                                                    <?php echo "".date('h:i A', strtotime($row1['date']));?>
                                                    <p class="news-item-preview">
                                                        <p>
                                                            <?php echo 'Group #: '.$row1['group_num'].' '.$row1['courseCode'].' '.$row1['start_time'].' - '.$row1['end_time'].' '.$row['days'];?>
                                                        </p>
                                                        <p> 
                                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>admin/teachers/scorecard/<?php echo $row1['teacher_id'].'/'.$row1['school_year'].'/'.$row1['ID'];?>" title="View Class">
                                                                <i class="icon-eye-open"></i> View Class
                                                            </a>
                                                        </p>
                                                        <p>Uploaded by: 
                                                            <?php echo $row1['fname'].' '.$row1['lname'];?>
                                                        </p>
                                                    </p>
                                                </li>
                                            <?php endforeach; ?>     
                                            </ul>
                                        </div>    
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