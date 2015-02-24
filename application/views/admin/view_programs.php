    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    
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

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-briefcase"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)) echo $message;

                            echo validation_errors('
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                <i class="icon-exclamation-sign"></i>', 
                            '</div>');
                            ?>

                            <?php if($program_list != FALSE):?>
                            <div class="form-group col-md-2">
                                <label for="program_ajax">Program:</label>
                                <select name="program" class="selectpicker show-tick" title="Select Program" data-live-search="true" multiple data-max-options="1" data-size="5" id="program_ajax">
                                    <?php foreach($program_list as $row): ?>
                                    <option value="<?php echo $row['programName'];?>"><?php echo rawurldecode($row['programName']);?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <table id="view_programs" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Effective Academic Year</th>
                                        <th width="12%">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="toBeRemoved">
                                    <tr>
                                        <td colspan="2">Please select a program.</td>
                                    </tr>   
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";

        $('#program_ajax').change(function() {
            var selectedValue = this.value;
            
            if(selectedValue == '') {
                $(".toBeRemoved td").remove();
                $(".toBeRemoved").append(
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
                        $(".toBeRemoved td").remove();
                        if(jQuery.isEmptyObject(response)) {
                            $(".toBeRemoved").append(
                                $("<td colspan='2'>").html("No records found.")
                            ).appendTo('#view_programs');
                        }
                        else {
                            var trHTML = '';
                            $.each(response, function(key, value) {
                                trHTML += "<tr><td>"+value.effective_year+" - "+ (parseInt(value.effective_year, 10) + 1)+"</td><td>"+"<div class='btn-group inline pull-left'><a type='button' href='<?php echo base_url();?>admin/programs/outcome/"+encodeURIComponent(selectedValue)+"/"+value.effective_year+"' class='btn btn-warning btn-mini btn-responsive' title='Program Outcome'>View</a><a type='button' href='<?php echo base_url();?>admin/programs/edit/"+encodeURIComponent(selectedValue)+"/"+value.effective_year+"' class='btn btn-primary btn-mini btn-responsive' title='Edit Curriculum'>Edit</a><a type='button' href='<?php echo base_url();?>admin/programs/delete/"+encodeURIComponent(selectedValue)+"/"+value.effective_year+"' class='btn btn-danger btn-mini btn-responsive' title='Delete Effective Year' onclick='return confirm(\"Do you want to permanently delete?\");'>Delete</a></div></td></tr>";
                            });

                            $('.toBeRemoved').append(trHTML);
                        }
                        // For console debugging
                        // console.log(response);
                    }
                });
            }
        });
    </script>
    <!-- encodeURIComponent().replace(/%20/g, "+") -->