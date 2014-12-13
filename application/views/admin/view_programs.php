                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                View Programs
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li>
                                    <i class="fa fa-briefcase"></i>  Programs
                                </li>
                                <li class="active">
                                    <i class="fa fa-list-alt"></i>  View Programs
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
    <?php if($program_list == FALSE): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
        <span class="sr-only">Information:</span>
        There are no currently programs added.
    </div>
    <?php else: ?>
    <table id="view_programs" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th>Program</th>
                <th>Year</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <tr>            
                <?php foreach($program_list as $row): ?>
                <td><?php echo $row['programName'];?></td>
                <td><?php echo $row['effective_year'];?></td>
                <td>Row 1 Data 2</td>
            </tr>
                <?php endforeach; ?>        
                <?php endif; ?>
        </tbody>
    </table>

<script>
    var d = document.getElementById("program_dropdown");
    d.className = d.className + " active";
</script>