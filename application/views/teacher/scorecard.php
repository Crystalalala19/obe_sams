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
                        <h3>Students</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <div class="span4">
                            <div class="alert alert-success">
                            <?php foreach($scorecard as $row1): ?>
                                <h4>
                                    <?php foreach($scorecard as $row): ?> 
                                    <?php echo '[ '.$row->studentID.' ]  ';?>
                                    <?php echo $row->lname.', '.$row->fname.' '.$row->mname; ?>
                                    <?php endforeach; ?>
                                </h4>
                             <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="span11"><br>
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">1st Year</a></li>
                                    <li><a href="#tab2" data-toggle="tab">2nd Year</a></li>
                                    <li><a href="#tab3" data-toggle="tab">3rd Year</a></li>
                                    <li><a href="#tab4" data-toggle="tab">4th Year</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class='panel panel-default grid'>
                                            
                                            <div class="tabbable">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab1" data-toggle="tab">1st Semester</a></li>
                                                    <li><a href="#tab5" data-toggle="tab">2nd Semester</a></li>
                                                    <li><a href="#tab6" data-toggle="tab">Summer</a></li>

                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab5">
                                                        <div class='panel panel-default grid'>
                                                            <table id="example-table" class="table table-striped table-hover table-condensed">
                                                                <?php
                                                                    echo $this->session->flashdata('message1');
                                                                    if (!empty($message1)) echo $message1;

                                                                    echo validation_errors('
                                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                                                        <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                                                    '</div>');

                                                                    $po_count = count($get_po);
                                                                    $attributes = array('class' => 'col-md-4');
                                                                ?>
                                                                <thead>
                                                                    <tr id="showTable">
                                                                        <th>Course Code <i class="icon-filter"></i></th>
                                                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                                                            <th><center>PO <?php echo $x;?></center></th>
                                                                        <?php endfor; $row_num=1;?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach($course1 as $row1): ?>
                                                                    <tr>
                                                                        <td><center><?php echo $row['courseCode'];?></center></td>
                                                                        <?php foreach($row['grade'] as $row1): ?>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $row1;?>
                                                                                </center>
                                                                            </td>
                                                                        <?php endforeach; $row_num++; ?>   
                                                                    <?php endforeach; ?>   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="tab6">
                                                        <div class='panel panel-default grid'>
                                                            
                                                        </div>
                                                    </div>
                                                </div>    
                                                    
                                            </div>



                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <div class='panel panel-default grid'>
                                            
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <div class='panel panel-default grid'>
                                            
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab4">
                                        <div class='panel panel-default grid'>
                                            
                                        </div>
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

