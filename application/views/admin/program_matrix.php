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
        $po_count = count($po_list);
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-switch.min.css">
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>

    <h3>Major Subjects</h3>
    <div class="form-group">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <?php for($x = 1; $x <= $po_count; $x++):?>
                    <th>PO <?php echo $x;?></th>
                    <?php endfor;?>
                </tr>
            </thead>

            <tbody>
                <?php foreach($course_list as $row):?>
                <tr>
                    <td><?php echo $row['CourseCode']; ?></td>
                    <td><?php echo $row['CourseDesc']; ?></td>
                    <?php foreach($po_list as $row): ?>
                    <td><input type="checkbox" data-size='mini' <?php if($row['status'] == 1) echo 'checked';?> ></td>
                    <?php endforeach;?>
                </tr>
               
                <?php endforeach;?>
                <!-- <tr>
                    <td>Hey</td>
                    <td>Hey2</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $("[type='checkbox']").bootstrapSwitch();
    </script>