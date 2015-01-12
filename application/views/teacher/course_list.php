<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Course List</li>
        </ul>
      </section>
<div id='content'>

    <ul class='breadcrumb' id='breadcrumb'>
        <li class='active'><a href="<?php echo base_url();?>site/home"><i class='icon-dashboard'></i> Course</a></li>
        <li class='title'><i class='icon-table'></i> Course List</li>
        
    </ul>
        
            <table id="example" class="table">
                
                <thead>
                    <tr>
                        <th><center>Group Number</center></th>
                        <th><center>Course Code</center></th>
                        <th><center>Schedule</center></th>
                        <th><center>Semester</center></th>
                        <th><center>School Year</center></th>
                    </tr>
                </thead>
                
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>

                <tbody>
                    <tr>
                        <?php foreach($teacher_class as $row): ?>
                        <td><center><a href="<?php echo base_url();?>site/class_list/<?php echo $row->group_num;?>"><?php echo $row->group_num;?></a></center></td>
                        <td><center><?php echo $row->courseCode;?></center></td>
                        <td><center><?php echo $row->start_time."-".$row->end_time." ".$row->days;?></center></td>
                        <td><center><?php echo $row->semester;?></center></td>
                        <td><center><?php echo $row->school_year;?></center></td>
                    </tr>
                        <?php endforeach; ?>        
                       
                </tbody>
            </table>
</div>






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
