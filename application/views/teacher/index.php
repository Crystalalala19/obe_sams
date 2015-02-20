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
                                        <h2>Welcome <?php foreach($user as $row): ?><?php echo $row['lname'].", ".$row['fname'];?></h2>   
                                    </a> 
                                </div>
                                <div class="text">Teacher ID: <?php echo $row['teacher_id'];?><br></div>
                              </div>
                            </li>
                        </ul>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Teacher Log</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class='panel panel-default grid'>
                                        <div style="height:200px;width:1150px;overflow:auto;">
                                            <ul class="news-items">
                                            <?php foreach($log as $row1): ?> 
                                                <li>
                                                    <div class="news-item-date"> 
                                                        <span class="news-item-day"><?php echo "".date('jS', strtotime($row1['date']));?></span> 
                                                        <span class="news-item-month"><?php echo "".date('M Y', strtotime($row1['date']));?></span> 
                                                    </div>
                                                        <?php echo "".date('h:i A', strtotime($row1['date']));?>
                                                        <p class="news-item-preview">
                                                            <p>
                                                                <?php echo 'Group #: '.$row1['group_num'].' '.$row1['courseCode'].' '.$row1['start_time'].' - '.$row1['end_time'].' '.$row1['days'];?>
                                                            </p>
                                                            <p>
                                                                <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1['ID'];?>" title="View Class">View Class</a>
                                                            </p>
                                                        </p>
                                                </li>
                                                <?php endforeach; ?> 
                                            </ul>
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
