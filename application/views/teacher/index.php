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
                    </div>
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->
