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

    <?php 
        $pos = 9;
    ?>
    <h3>Major Subjects</h3>
    <div class="form-group">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="10%">Code</th>
                    <th width="20%">Subject</th>
                    <?php for($x = 1; $x <= $pos; $x++):?>
                    <th>PO <?php echo $x?></th>
                    <?php endfor;?>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>