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
                                    <i class="fa fa-briefcase"></i>  Programs
                                </li>
                                <li class="active">
                                    <i class="fa fa-list-alt"></i>  <?php echo $header;?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
    <?php if(!empty($message)): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
        <span class="sr-only">Information:</span>
        <?php echo $message; ?>
    </div>
    <?php else: ?>
    <div class="form-group col-xs-4 col-sm-4 col-md-2">
        <label for="student_id">Student ID #:</label>
        <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>" id="student_id" class="form-control input-sm" readonly>
    </div>
    <?php endif;?>