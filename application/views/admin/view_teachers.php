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
                                <li class="active">
                                    <i class="fa fa-university"></i>  <?php echo $header;?>
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

    <button class="btn btn-info" data-toggle='modal' data-target='#add' title="Add New"><i class="fa fa-plus"></i> Add new</button>

    <div class='modal fade' id='add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-vertical-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title' id='myModalLabel'><i class="fa fa-plus"></i> Add Teacher</h4>
                </div>
                <div class='modal-body'>
                    <?php echo form_open('admin/teachers'); ?>
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
                    </form>
            </div>
        </div>
    </div>

    <?php if($teacher_list != FALSE):?>
    <a href="<?php echo base_url();?>admin/teachers/upload" role="button" class="btn btn-warning"><i class="fa fa-clock-o"></i> Upload Classes</a>

    <table id="view_teachers" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="15%">ID #</th>
                <th width="30%">First Name</th>
                <th width="30%">Last Name</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teacher_list as $row): ?>
                <tr>            
                    <td><?php echo $row['teacher_id'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td>
                        <div class="btn-group inline pull-left">
                            <a type="button" title="View Classes" class="btn btn-warning btn-sm btn-responsive" href="<?php echo base_url();?>admin/teachers/classes/<?php echo $row['teacher_id'];?>" target="_blank"><i class="fa fa-book"></i></a>
                            <a type="button" title="Edit Teacher" class="btn btn-primary btn-sm btn-responsive" href="<?php echo base_url();?>admin/teachers/edit/<?php echo $row['ID'];?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
                            <a type="button" title="Delete Teacher" class="btn btn-danger btn-sm btn-responsive" href="<?php echo base_url();?>admin/teachers/delete/<?php echo $row['ID'];?>" onclick="return confirm('Do you want to permanently delete?');"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>

    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            //Auto sort column
            aaSorting: [[1,'asc']],
            //Disable sorting for column Action
            aoColumnDefs: [{ 'bSortable': false, 'aTargets': [3] }]
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ {
                    "sExtends": "copy",
                    "sButtonText": "Copy",
                    //Columns to export as data, exluded Action column
                    "mColumns": [ 0, 1, 2 ],
                }, 
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [ {
                            "sExtends": "xls",
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            "mColumns": [ 0, 1, 2 ]
                        }, {
                            "sExtends": "pdf",
                            "sButtonText": "PDF",
                            "mColumns": [ 0, 1, 2 ]
                        }
                    ]
                }
            ]
        };

        var table = $('#view_teachers').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>
    <?php endif;?>

    