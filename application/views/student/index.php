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
                                <div class="text">Student ID: <?php echo $row['student_id'];?><br></div>
                              </div>
                            </li>
                        </ul>
                        <?php endforeach; ?>

                         <div class="clearfix"></div><br>
                        <?php 
                            $po_count = count($m_array);
                            $attributes = array('class' => 'col-md-4');
                        ?>

                        <div class="span11">
                            <h4><center>
                            <?php foreach($get_EY as $row): ?>
                                <?php echo $row->programFullName;?><br>
                                <?php echo '(Effective SY: '.$row->effective_year.' - '.($row->effective_year+1).')';?>                                
                            <?php endforeach; ?>  
                            </center></h4>  
                            <hr>
                        </div>

                        <div class="span11"><br>
                                <h4>
                                    <?php foreach($get_class as $row2): ?> 
                                        <?php 
                                            if($row2->semester == '1'){
                                                echo 'FIRST SEMESTER'; 
                                            } elseif ($row2->semester == '2' ) {
                                                echo 'SECOND SEMESTER';
                                            } else {
                                                echo 'SUMMER';
                                            }                        
                                        ?>
                                      
                                        <?php echo $row2->school_year.' - '.($row2->school_year+1);?>
                                    <?php endforeach; ?>
                                </h4>   
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th> Course Code </th>
                                     <?php for($x = 1; $x <= $po_count; $x++):?>
                                        <th>PO <?php echo $x;?></i></th>
                                    <?php endfor; $row_num=1;?>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($class_list as $row3): ?>
                                    <tr>
                                        <td><?php echo $row3['courseCode']; ?></td>
                                        <?php foreach($row3['grade'] as $row4): ?>
                                            <td><?php echo $row4;?></td>
                                        <?php endforeach; $row_num++; ?>   
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><center>Average</center></td>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <td></td>
                                        <?php endfor;?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>





                    </div>
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->
