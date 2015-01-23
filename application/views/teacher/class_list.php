
<!-- For filter table -->
<link href="shttp://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
<link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">

<!-- End filter table -->

<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Class List</li>
        </ul>
      </section>
<div id='content'>

<ul class='breadcrumb' id='breadcrumb'>
    <li class='active'><a href="<?php echo base_url();?>site/home"><i class='icon-dashboard'></i> Course</a></li>
    <li class='title'><i class='icon-table'></i> Class List</li>
    
</ul>
        
    <!--<div class='panel-body'>

        <?php foreach($result as $row): ?>

            <legend><?php echo $row->CourseCode;?> - <?php echo $row->CourseDesc;?></legend>
            <div class='form-group'>
              <center><label class='control-label'><font size="5">Group Number Schedule</font></label><center>
              <center><label class='control-label'>Year Level Semester</label><center>
              <center><label class='control-label'>School Year</label><center>
            </div>

         <?php endforeach; ?>    

    </div>-->

<br><br>
            <table id="example-table" class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th><center>Student ID</center></th>
                    <th><center>Name</center></th>
                    <th><center>Program Name</center></th>
                </tr>
            </thead>
             <tbody>
                    <tr>
                        <?php foreach($class_list as $row): ?>
                        <td><center><a href="<?php echo base_url();?>site/scorecard/<?php echo $row->student_id;?>"><?php echo $row->student_id;?></a></center></td>
                        <td><center><?php echo $row->fname; echo " ".$row->mname; echo " ".$row->lname;?></center></td>
                        <td><center><?php echo $row->effective_year;?> - <?php echo $row->effective_year;?></center></td>
                    </tr>
                        <?php endforeach; ?>        
                       
                </tbody>
            </table>




</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable.js"></script>

<script type="text/javascript" language="javascript" class="init">
    var d = document.getElementById('courselist');
    d.className = d.className + " active";

    $('#example-table').filterable();
</script>

