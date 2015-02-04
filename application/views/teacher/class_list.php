<!-- For filter table -->
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">



<div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-group"></i>
                            <h3>Students</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                        <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)) echo $message;

                            echo validation_errors('
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                            '</div>');

                            $po_count = count($get_po);
                            $attributes = array('class' => 'col-md-4');
                        ?>

                        <div class="span4">
                            <div class="alert alert-info">
                            <?php foreach($select_schedule as $row1): ?>
                                <h4>
                                    <?php echo $row1->courseCode.' ';?><?php echo '| Group '; echo $row1->group_num.'';?>
                                    <?php 
                                        echo '<br> ';
                                        echo $row1->start_time.' - ';
                                        echo $row1->end_time.' ';
                                        echo $row1->days.'<br>';
                                    ?>
                                    Semester: <?php echo $row1->semester,' | ';?> School Year: <?php echo $row1->school_year; ?>
                                </h4>
                             <?php endforeach; ?>
                            </div>
                        </div>

                        </style>

                            <div class="span11">
                                <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Student ID <i class="icon-filter"></i></th>
                                            <th>Name <i class="icon-filter"></i></th>
                                            <?php for($x = 1; $x <= $po_count; $x++):?>
                                                <th>PO <?php echo $x;?> <i class="icon-filter"></i></th>
                                            <?php endfor; $row_num=1;?>
                                            <th>View Scorecard</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            <?php foreach($class_list as $row): ?>   
                                            <tr>          
                                                <td><?php echo $row['studentID'];?></td>
                                                <td><?php echo $row['fname']; echo " ".$row['mname']; echo " ".$row['lname'];?></td>
                                                <?php foreach($row['grade'] as $row1): ?>
                                                    <td><?php echo $row1;?></td>
                                                <?php endforeach; $row_num++; ?>   
                                                <td>
                                                    
                                                        <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/scorecard/<?php echo $row['student_id'];?>">
                                                        <i class="icon-eye-open"></i> View Scorecard
                                                        </a>
                                                    
                                                </td>
                                            </tr>
                                                <?php endforeach; ?>   

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="2"><center>Average</center></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>

                                </table>
                                <br>
                                <div class="form-group">
                                    <label for="userfile">Upload .CSV File: </label>
                                    <input type="file" name="userfile" id="userfile">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
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
<!-- End filter table -->

<script type="text/javascript">
var values = [],
  table = document.getElementById('view_classlist'),
  rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
  footer = table.getElementsByTagName('tfoot')[0];

for(var i=2; i<11; i++){
  values[i] = [];
  for(var j=0, l=rows.length; j<l; j++){
    values[i].push(
      parseFloat(
        rows[j].getElementsByTagName('td')[i]
          .innerHTML
      )
    );
  }

  var score = values[i].reduce(function(pv,cv){return pv + cv;},0) / values[i].length;
  footer.getElementsByTagName('td')[i-1].innerHTML = Math.round(score * 100) / 100;
  
  if( isNaN(footer.getElementsByTagName('td')[i-1].innerHTML) )
    footer.getElementsByTagName('td')[i-1].innerHTML = " ";
}
</script>

<script type="text/javascript" language="javascript">
    var d = document.getElementById('courselist');
    d.className = d.className + " active";

    $('#view_classlist').filterable();

</script>