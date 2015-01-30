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

    <style type="text/css">
        @media (max-width: 768px) {
            .btn-responsive {
                padding:2px 4px;
                font-size:80%;
                line-height: 1;
                border-radius:3px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .btn-responsive {
                padding:4px 9px;
                font-size:90%;
                line-height: 1.2;
            }
        }
    </style>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">

    <div class="form-group">
        <button class="btn btn-info" data-toggle='modal' data-target='#add' title="New Program"><i class="fa fa-plus"></i> New Program</button>
        <a id="delprogram" type="button" class="btn btn-danger pull-right" style="display: none;" title="Delete Program" onclick="return confirm('Warning! This will delete all data associated with this program. Do you want to continue?');"><i class="fa fa-trash"></i> Delete Program</a>
    </div>

    <?php echo form_open('admin/programs/view'); ?>
        <div class='modal fade' id='add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-vertical-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='myModalLabel'><i class="fa fa-plus"></i> New Program</h4>
                    </div>
                    <div class='modal-body'>
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
                </div>
            </div>
        </div>
    </form>

    <?php if($program_list != FALSE):?>
    <div class="form-group col-md-2">
        <label for="program_ajax">Program:</label>
        <select name="program" class="selectpicker show-tick" title="Select Program" data-live-search="true" multiple data-max-options="1" data-size="auto" id="program_ajax" required>
            <?php foreach($program_list as $row): ?>
            <option value="<?php echo $row['programName'];?>"><?php echo $row['programName'];?></option>
            <?php endforeach;?>
        </select>
    </div>

    <table id="view_programs" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Effective Year</th>
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

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $('#program_ajax').change(function() {
            var selectedValue = this.value;
            
            if(selectedValue == '') {
                $("#delprogram").hide();

                $("#toBeRemoved td").remove();
                $("#toBeRemoved").append(
                    $("<td colspan='2'>").html("No program selected.")
                ).appendTo('#view_programs');
            }
            else {
                $.ajax({
                    url: '<?php echo site_url("index.php/admin/program_ajax");?>',
                    type: 'post',
                    data: {option: selectedValue},
                    dataType: 'json',
                    success: function(response) {
                        $("#delprogram").show().attr("href", "delete/program/"+selectedValue);

                        $("#toBeRemoved td").remove();
                        if(jQuery.isEmptyObject(response)) {
                            $("#toBeRemoved").append(
                                $("<td colspan='2'>").html("No Effective Years found.")
                            ).appendTo('#view_programs');
                        }
                        else {
                            $.each(response, function(key, value) {
                                    $("#toBeRemoved").append(
                                        $('<td>').html(value.effective_year),
                                        $('<td>').html("<div class='btn-group inline pull-left'><a type='button' href='<?php echo base_url();?>admin/programs/outcome/"+selectedValue+"/"+value.effective_year+"' class='btn btn-warning btn-sm btn-responsive' title='Program Outcome' target='_blank'><i class='fa fa-list-alt'></i></a><a type='button' href='<?php echo base_url();?>admin/programs/edit/"+selectedValue+"/"+value.effective_year+"' class='btn btn-primary btn-sm btn-responsive' title='Edit Curriculum' target='_blank'><i class='fa fa-pencil'></i></a><a type='button' href='<?php echo base_url();?>admin/programs/delete/"+selectedValue+ "/"+value.effective_year+"' class='btn btn-danger btn-sm btn-responsive' title='Delete Effective Year' onclick='return confirm(\"Do you want to permanently delete?\");'><i class='fa fa-trash-o'></i></a></div>")
                                    ).appendTo('#view_programs');
                            });
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    <?php endif; ?>
