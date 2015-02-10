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
                                    <?php foreach($get_EY as $row1): ?>
                                        Program: <?php echo $row1->programFullName;?><br>
                                        Effective Year: <?php echo $row1->effective_year.' - '.($row1->effective_year+1);?><br>
                                    <?php endforeach; ?>     
                                </div>
                            </li>
                        </ul>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->
