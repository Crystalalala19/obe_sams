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

            <table id="example" class="table">
                
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Program Name</th>
                    </tr>   
                </thead>
                
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>

                <tbody>
                    <tr>
                        <?php foreach($result as $row): ?>
                        <td><a href="<?php echo base_url();?>site/scorecard/<?php echo $row->student_id;?>"><?php echo $row->student_id;?></a></td>
                        <td><?php echo $row->fname; echo " ".$row->mname; echo " ".$row->lname;?></td>
                        <td><?php echo $row->score;?></td>
                        <td><?php echo $row->programName;?> - <?php echo $row->effective_year;?></td>
                    </tr>
                        <?php endforeach; ?>        
                       
                </tbody>
            </table>
</div>


<!--Datatables-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<!--Datatables-->

<script type="text/javascript" language="javascript" class="init">
    var d = document.getElementById('courselist');
    d.className = d.className + " active";
</script>

<script type="text/javascript" language="javascript" class="init">
                $(document).ready(function() {
                    // Setup - add a text input to each footer cell
                    $('#example tfoot th').each( function () {
                        var title = $('#example thead th').eq( $(this).index() ).text();
                        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                    } );

                    // DataTable
                    var table = $('#example').DataTable();

                    // Apply the search
                    table.columns().eq( 0 ).each( function ( colIdx ) {

                        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                            table
                                .column( colIdx )
                                .search( this.value )
                                .draw();
                        } );
                    } );
                } );
            </script>