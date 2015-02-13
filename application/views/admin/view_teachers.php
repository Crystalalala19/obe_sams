    <!-- DataTables Style -->
    <!-- PDF works -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css"> -->
    
    <!-- PDF works  -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css"> -->

    <!-- PDF doesn't work, EDIT: now fixed -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-sitemap"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)) echo $message;
                            ?>

                            <button class="btn btn-info" data-toggle='modal' data-target='#add' title="Add New"><i class="icon-plus"></i> Add new</button>
    
                            <?php if($teacher_list != FALSE):?>
                            <a href="<?php echo base_url();?>admin/teachers/upload" role="button" class="btn btn-warning" title="Upload Classes"><i class="icon-time"></i> Upload Classes</a>

                            <table id="view_teachers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="20%">ID #</th>
                                        <th>Name</th>
                                        <th width="10%" class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($teacher_list as $row): ?>
                                        <tr>
                                            <td><?php echo $row['teacher_id'];?></td>
                                            <td><?php echo $row['fname'].' '. $row['lname'];?></td>
                                            <td>
                                                <div class="btn-group inline pull-left">
                                                    <a type="button" title="View Classes" class="btn btn-warning btn-small btn-responsive" href="<?php echo base_url();?>admin/teachers/classes/<?php echo $row['teacher_id'];?>"><i class="icon-book"></i></a>
                                                    <a type="button" title="Edit Teacher" class="btn btn-primary btn-small btn-responsive" href="<?php echo base_url();?>admin/teachers/edit/<?php echo $row['ID'];?>"><i class="icon-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>        
                                </tbody>
                            </table>

                            <?php endif;?>

                            <?php echo form_open('admin/teachers'); ?>
                            <div class='modal fade' id='add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-vertical-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'><i class="icon-plus"></i> Add Teacher</h4>
                                        </div>
                                        <div class='modal-body'>
                                            <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                <label for="teacher_fname">First Name:</label>
                                                <input type="text" class="form-control input-sm" name="teacher_fname" id="teacher_fname" value="<?php echo set_value('teacher_fname'); ?>" required>
                                                
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                <label for="teacher_mname">Middle Name:</label>
                                                <input type="text" class="form-control input-sm" name="teacher_mname" id="teacher_mname" value="<?php echo set_value('teacher_mname'); ?>" required>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                <label for="teacher_lname">Last Name:</label>
                                                <input type="text" class="form-control input-sm" name="teacher_lname" id="teacher_lname" value="<?php echo set_value('teacher_lname'); ?>" required>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-4 col-sm-4 col-md-4">
                                                <label for="login_id">ID Login:</label>
                                                <input type="text" class="form-control input-sm" name="login_id" id="login_id" value="<?php echo set_value('login_id'); ?>" required>
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
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            //Auto sort column
            "order": [[1,'asc']],

            //Disable sorting with class no-sort
            "columnDefs": [
                { targets: 'no-sort', orderable: false }
            ],

            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false 
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }, 
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [ {
                            "sExtends": "xls",
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            //Columns to export as data, exluded Action column
                            "mColumns": [ 0, 1]
                        }, {
                            "sExtends": "pdf",
                            "sButtonText": "PDF",
                            //Columns to export as data, exluded Action column
                            "mColumns": [ 0, 1]
                        }
                    ]
                }
            ]
        };

        var table = $('#view_teachers').DataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>
    