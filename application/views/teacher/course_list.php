


<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Course</li>
        </ul>
</section>

<div id='content'>
    <div class='panel panel-default grid'>
        <div class='panel-heading'>
            Assigned Classes
        </div>
        <div class='panel-body'>   
            <div class="container">
                <table id="example" class="table table-striped dataTable no-footer">
                 <?php
                    echo $this->session->flashdata('message');
                    if (!empty($message)) echo $message;

                    echo validation_errors('
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                        <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                    '</div>');
                ?>
                    <thead>
                        <tr>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Course Code</th>
                            <th>Group # - Schedule</th>
                            <th><center>Action</center></th>

                        </tr>
                    </thead>


                    <tbody>
                    <?php foreach($select_courseList as $row): ?>
                        <tr>
                            <td><center><?php echo $row->school_year;?></center></td>
                            <td><center><?php echo $row->semester;?></center></td>
                            <td><center><?php echo $row->courseCode;?></center></td>
                            <td><center>Group <?php echo $row->group_num.": ".$row->start_time." - ".$row->end_time." ".$row->days;?></center></td>
                            <td>
                                <center>
                                    <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row->ID;?>">
                                    <i class="icon-eye-open"></i> View Class
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>   
    </div>
</div>


<script type="text/javascript" language="javascript">
     $(document).ready(function() {

            // Setup - add a text input to each footer cell
            $('#example thead th').not(":eq(4)")
                                .each( function () {
                var title = $('#example thead th').eq( $(this).index() ).text();
                $(this).html( '<center><input type="text" placeholder="'+title+'" /></center>' );
            } );

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().eq( 0 ).each( function ( colIdx ) {
                if (colIdx == 4) return;
                $( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
                    table
                        .column( colIdx )
                        .search( this.value )
                        .draw();
                } );
            } );
        } );


</script>