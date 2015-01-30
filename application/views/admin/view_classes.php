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
                                    <i class="fa fa-university"></i>  <a href="<?php echo base_url('admin/teachers'); ?>">Teachers</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-book"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
    <?php
    echo $this->session->flashdata('message');
    if (!empty($message)): echo $message;

    else:
    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ', 
    '</div>');
    ?>

    <table id="view_classes" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Group #</th>
                <th>Course Code</th>
                <th>Time</th>
                <th>Semester</th>
                <th>School Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teacher_classes as $row):?>
            <tr>
                <td><?php echo $row['group_num']; ?></td>
                <td><?php echo $row['courseCode']; ?></td>
                <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['school_year']; ?></td>
                <td></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('#view_classes').DataTable();
        });
    </script>
    <?php endif;?>

