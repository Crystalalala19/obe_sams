
<!-- For filter table -->
<link href="shttp://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
<link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">

<!-- End filter table -->


<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Course List</li>
        </ul>
</section>

<div id='content'>
    
  <div class='panel panel-default grid'>
       <div class='panel-heading'>
         <i class='icon-table icon-large'></i>
         
         <div class='panel-tools'>
           <div class='badge'><font size = '4'>Assigned Course List</font></div>
         </div>
       </div>

       

        <div class='panel-body'>   
            <div class="container">
              <div class="tabbable">
                
                <div class='panel-body'>   
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                   
                            <div class="span8">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                          <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                          <li><a href="#tab5" data-toggle="tab">Summer</a></li>
                                        </ul>
                                        <div class="tab-content">


                                          <div class="tab-pane active" id="tab3">
                                            <div class='panel panel-default grid'>
                                                  <table class='table table-condensed'>
                                                <table id="example-table" class="table table-striped table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Code <i class="icon-filter"></i></th>
                                                            <th style="visibility:hidden;">sdfasdf</th>
                                                            <th style="visibility:hidden;">asdasd</th>
                                                            <th style="visibility:hidden;">Semester</th>
                                                            <th style="visibility:hidden;">School Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $count =1; ?>
                                                            <?php foreach($course1 as $row2): ?>

                                                            <tr class="clickable" data-toggle="collapse" id="rowa<?php echo $count;?>" data-target=".rowa<?php echo $count;?>">
                                                                <td><?php echo $row2->courseCode." ";?> <button class="btn"><i class="icon-plus-sign"></i></button></td>
                                                                <td style="visibility:hidden;">asdasdf</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdf</td>
                                                              
                                                            </tr> 
                                                
                                                            <?php foreach($teacher_class1 as $row1): ?> 

                                                            <tr class="collapse rowa<?php echo $count;?>">
                                                                <td style="visibility:hidden;">fasdasdfasd</td>
                                                                <td style="visibility:hidden;">erwertwert</td>
                                                                <td><?php echo "Group: ".$row1->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row1->start_time."-".$row1->end_time." ".$row1->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1->ID;?>">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            </tr>      

                                                            <?php endforeach; ?>   
                                                            <?php $count++;?> 
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                            </div>

                                          </div>

                                          <div class="tab-pane" id="tab4">
                                            
                                             <div class='panel panel-default grid'>
                                              
                                                <table class='table table-condensed'>
                                                <table id="example-table1" class="table table-striped table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Code <i class="icon-filter"></i></th>
                                                            <th style="visibility:hidden;">sdfasdf</th>
                                                            <th style="visibility:hidden;">asdasd</th>
                                                            <th style="visibility:hidden;">Semester</th>
                                                            <th style="visibility:hidden;">School Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $count =1; ?>
                                                            <?php foreach($course2 as $row5): ?>

                                                            <tr class="clickable" data-toggle="collapse" id="rowb<?php echo $count;?>" data-target=".rowb<?php echo $count;?>">
                                                                <td><?php echo $row5->courseCode." ";?><button class="btn"><i class="icon-plus-sign"></i></button></td>
                                                                <td style="visibility:hidden;">asdasdf</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdf</td>
                                                              
                                                            </tr> 
                                             
                                                            <?php foreach($teacher_class2 as $row6): ?> 

                                                            <tr class="collapse rowb<?php echo $count;?>">
                                                                <td style="visibility:hidden;">fasdasdfasd</td>
                                                                <td style="visibility:hidden;">fasdasdfasd</td>
                                                                <td><?php echo "Group: ".$row6->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row6->start_time."-".$row6->end_time." ".$row6->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="#">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            </tr>      

                                                            <?php endforeach; ?>   
                                                            <?php $count++;?> 
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab5">
                                            
                                             <div class='panel panel-default grid'>
                                            
                                                <table class='table table-condensed'>
                                                <table id="example-table2" class="table table-striped table-hover table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Code <i class="icon-filter"></i></th>
                                                            <th style="visibility:hidden;">sdfasdf</th>
                                                            <th style="visibility:hidden;">asdasd</th>
                                                            <th style="visibility:hidden;">Semester</th>
                                                            <th style="visibility:hidden;">School Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php $count =1; ?>
                                                            <?php foreach($course3 as $row3): ?>

                                                            <tr class="clickable" data-toggle="collapse" id="rowc<?php echo $count;?>" data-target=".rowc<?php echo $count;?>">
                                                                <td><?php echo $row3->courseCode." ";?><button class="btn"><i class="icon-plus-sign"></i></button></td>
                                                                <td style="visibility:hidden;">asdasdf</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdfasd</td>
                                                                <td style="visibility:hidden;">asdf</td>
                                                              
                                                            </tr> 
                                             
                                                            <?php foreach($teacher_class3 as $row4): ?> 

                                                            <tr class="collapse rowc<?php echo $count;?>">
                                                                <td style="visibility:hidden;">fasdasdfasd</td>
                                                                <td style="visibility:hidden;">fasdasdfasd</td>
                                                                <td><?php echo "Group: ".$row4->group_num;?></td>
                                                                <td><?php echo "Schedule: ".$row4->start_time."-".$row4->end_time." ".$row4->days;?></td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-info" href="#">
                                                                        <i class="icon-eye-open"></i> View Class
                                                                    </a>
                                                                </td>
                                                            </tr>      

                                                            <?php endforeach; ?>   
                                                            <?php $count++;?> 
                                                            <?php endforeach; ?>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>













                                        </div>
                                    </div>
                              </div>     
                      </div>

                      

                                      </div>
                                    </div>
                                </div>
                          </div>      
                      </div>

                    </div>
                </div>


              </div>
            </div>
        </div> 


     </div>

</div>
<style>
    table .collapse.in {
    display:table-row;
}
</style>
<!-- For filter table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable.js"></script>
<!-- End filter table -->

 <script type="text/javascript">
    $('#example-table').filterable();
    $('#example-table1').filterable();
    $('#example-table2').filterable();



  </script>

