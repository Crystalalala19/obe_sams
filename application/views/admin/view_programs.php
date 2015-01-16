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
    if (!empty($message)): echo $message;

    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> ', 
    '</div>');
    ?>
    <?php endif;?>

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

    <div class="form-group col-md-10">
        <table id="view_programs" class="table table-striped table-bordered dataTable no-footer">
            <thead>
                <tr>
                    <th>Year</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>
    </div>

    <?php endif; ?>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $('#program_ajax').change(function() {
            var selectedValue = this.value;
            
            if(selectedValue == '') {
                alert('Empty');
            }
            else {
                $.ajax({
                    url: '<?php echo site_url("index.php/admin/program_ajax");?>',
                    type: 'post',
                    data: {option: selectedValue},
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(key, value) {
                            $('<tr>').append(
                                $('<td>').text(value.effective_year)
                            ).appendTo('#view_programs');
                        });

                        console.log(response);
                    }
                });
            }
        });
    </script>