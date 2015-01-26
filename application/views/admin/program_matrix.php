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
    echo $this->session->flashdata('message');
    if (!empty($message)) echo $message;

    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>', 
    '</div>');

    $po_count = count($po_list);
?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-switch.min.css">
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>

    <h3>Major Subjects</h3>
    <?php echo form_open();?>

    <input type="hidden" name="py_id" value="<?php echo $po_list[0]['pyID'];?>">
    <?php foreach($po_list as $key => $row): ?>
        <input type="hidden" name="po_id[]" value="<?php echo $row['ID'];?>">
    <?php endforeach ?>
    
    <div class="form-group">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <?php for($x = 1; $x <= $po_count; $x++):?>
                    <th>PO <?php echo $x;?></th>
                    <?php endfor; $row_num=1;?>
                </tr>
            </thead>

            <tbody>
                <?php foreach($course_list as $key => $row): ?>
                <tr>
                    <td>
                        <input type="hidden" name="course_id[]" value="<?php echo $row['ID'];?>">
                        <input type="hidden" name="course_code[]" value="<?php echo $row['CourseCode'];?>"><?php echo $row['CourseCode'];?>
                    </td>
                    <td><?php echo $row['CourseDesc']; ?></td>
                    <?php foreach($po_list as $key2 => $row2): ?>
                    <td>
                        <input type="checkbox" data-size='mini' name='row[<?php echo $key;?>][]' value='<?php echo $row2['ID'];?>'>
                    </td>
                    <?php endforeach; $row_num++; ?>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
        <input type="submit" class="btn btn-success" id="btnSubmit" name="submit" value="Save">
    </form>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $("[type='checkbox']").bootstrapSwitch();
    </script>