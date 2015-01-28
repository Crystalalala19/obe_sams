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
                                    <i class="fa fa-list"></i>  <?php echo $header;?>
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
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ', 
    '</div>');
    ?>

    <div class="form-group col-md-12">
        <button class="btn btn-info" data-toggle='modal' data-target='#add' title="New Program"><i class="fa fa-plus"></i> New Program</button>
    </div>

    <div class='modal fade' id='add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-vertical-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title' id='myModalLabel'><i class="fa fa-plus"></i> New Program</h4>
                </div>
                <div class='modal-body'>
                    <?php echo form_open('admin/programs/view'); ?>
                        <div class="form-group col-xs-4 col-sm-4 col-md-4">
                            <label for="program_name">Program Name:</label>
                            <input type="text" class="form-control input-sm" name="program_name" id="program_name" value="<?php echo set_value('teacher_fname'); ?>" required>
                        </div>
                        <div class="clearfix"></div>
                </div>
                <div class='modal-footer'>
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                    <input type="reset" class="btn btn-info" value="Clear">
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <?php if($program_list != FALSE):?>
    <div class="form-group col-md-2">
        <label for="program_ajax">Program:</label>
        <select name="program" class="form-control input-sm" id="program_ajax">
            <option selected="selected" value="">Select program: </option>
            <?php foreach($program_list as $row): ?>
            <option value="<?php echo $row['programName'];?>"><?php echo $row['programName'];?></option>
            <?php endforeach;?>
        </select>
    </div>

    <table id="view_programs" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Year</th>
                <th width="12%">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr id="toBeRemoved">
                <td>Please select a program.</td>
                <td></td>
            </tr>   
        </tbody>
    </table>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $('#program_ajax').change(function() {
            var selectedValue = this.value;
            
            if(selectedValue == '') {
                $("#toBeRemoved td").remove();
                $("#toBeRemoved").append(
                    $('<td>').html("Please select a program."),
                    $('<td>').html("")
                ).appendTo('#view_programs');
            }
            else {
                $.ajax({
                    url: '<?php echo site_url("index.php/admin/program_ajax");?>',
                    type: 'post',
                    data: {option: selectedValue},
                    dataType: 'json',
                    success: function(response) {
                        $("#toBeRemoved td").remove();
                        $.each(response, function(key, value) {
                            $("#toBeRemoved").append(
                                $('<td>').html(value.effective_year),
                                $('<td>').html("<div class='btn-group inline pull-left'><a type='button' href='<?php echo base_url();?>admin/programs/outcome/"+selectedValue+"/"+value.effective_year+"' class='btn btn-warning btn-sm btn-responsive fa fa-list-alt' title='Program Outcome' target='_blank'></a><a type='button' href='<?php echo base_url();?>admin/programs/edit/"+selectedValue+"/"+value.effective_year+"' class='btn btn-primary btn-sm btn-responsive fa fa-pencil' title='Edit Program' target='_blank'></a><a type='button' href='<?php echo base_url();?>admin/programs/delete/"+selectedValue+ "/"+value.effective_year+"' class='btn btn-danger btn-sm btn-responsive fa fa-trash-o' title='Delete Program' onclick='return confirm(\"Do you want to permanently delete?\");'></a></div>")
                            ).appendTo('#view_programs');
                        });
                        console.log(response);
                    }
                });
            }
        });
    </script>
    <?php endif; ?>
