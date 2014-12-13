                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Students List
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-users"></i>  Students
                                </li>
                                <li class="active">
                                    <i class="fa fa-plus-square"></i>  Students List
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
    <?php if($student_list == FALSE): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
        <span class="sr-only">Information:</span>
        There are no currently students added.
    </div>
    <?php else: ?>
    <table id="view_students" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th>ID #</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>            
                <?php foreach($student_list as $row): ?>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
            </tr>
                <?php endforeach; ?>        
                <?php endif; ?>
        </tbody>
    </table>
<script>
    var d = document.getElementById("student_dropdown");
    d.className = d.className + " active";
</script>