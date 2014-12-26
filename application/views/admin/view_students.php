                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <?php echo $header;?>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-users"></i>  Students
                                </li>
                                <li class="active">
                                    <i class="fa fa-plus-square"></i>  <?php echo $header;?>
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
    <table id="view_students" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="15%">ID #</th>
                <th width="30%">First Name</th>
                <th width="30%">Last Name</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>            
                <?php foreach($student_list as $row): ?>
                <td><?php echo $row['student_id'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td></td>
            </tr>
                <?php endforeach; ?>        
                <?php endif; ?>
        </tbody>
    </table>
<script>
    var d = document.getElementById("student_dropdown");
    d.className = d.className + " active";
</script>