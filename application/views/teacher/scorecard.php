<!-- For filter table -->
<link href="shttp://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
<link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">

<!-- End filter table -->


 <div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-users"></i>
                        <h3>Student Scorecard</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <div class="span11">
                            <h4><center>
                            <?php foreach($get_EY as $row): ?>
                                <?php echo $row->programFullName;?><br>
                                <?php echo '(Effective SY: '.$row->effective_year.' - '.($row->effective_year+1).')';?>                                
                            <?php endforeach; ?>  
                            </center></h4>  
                            <h4>
                                <?php foreach($get_studentName as $row1): ?> 
                                <?php echo '[ '.$row1->student_id.' ]  ';?>
                                <?php echo $row1->lname.', '.$row1->fname.' '.$row1->mname; ?>
                                <?php endforeach; ?>
                            </h4> <hr>
                        </div>

                        <div class="span11"><br>
                                <h4>
                                    <?php foreach($get_class as $row2): ?> 
                                        <?php 
                                            if($row2->semester == '1st'){
                                                echo 'First Semester'; 
                                            } elseif ($row2->semester == '2nd' ) {
                                                echo 'Second Semester';
                                            } else {
                                                echo 'Summer';
                                            }                        
                                        ?>
                                      
                                        <?php echo ' | SY: '.$row2->school_year.' - '.($row2->school_year+1);?>
                                    <?php endforeach; ?>
                                </h4>   
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th> Code </th>
                                    <th> PO Score</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <?php foreach($get_course as $row3): ?>
                                        <td><?php echo $row3->courseCode; ?></td>
                                        <td></td>
                                    <?php endforeach; ?>
                                  </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable.js"></script>


<script>
  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTab1 a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})


</script>

<script type="text/javascript" language="javascript" class="init">
    var d = document.getElementById('studentlist');
    d.className = d.className + " active";
</script>

<script type="text/javascript">
   $('#example-table').filterable();
</script>

