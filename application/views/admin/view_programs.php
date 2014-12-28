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
    <?php if($program_list == FALSE): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>  
        <span class="sr-only">Information:</span>
        There are no currently programs added.
    </div>
    <?php else: ?>
    <table id="view_programs" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th>Program</th>
                <th>Year</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($program_list as $row): ?>
                <tr>            
                    <td><?php echo $row['programName'];?></td>
                    <td><?php echo $row['effective_year'];?></td>
                    <td>
                        <div class="btn-group inline pull-left">
                            <a type="button" class="btn btn-primary btn-sm fa fa-pencil" href="<?php echo base_url();?>admin/view_programs/edit/<?php echo $row['ID'];?>"></a>
                            <a type="button" class="btn btn-danger btn-sm fa fa-trash-o" href="javascript:delpost('2','Cafe Maru')"></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>
    <?php endif; ?>

<script type="text/javascript" language="javascript">
    var d = document.getElementById("program_dropdown");
    d.className = d.className + " active";
    
    var dataTableOptions = {
        //Disable sorting for column Action
        aoColumnDefs: [{ 'bSortable': false, 'aTargets': [2] }],
    };

    var tableToolsOptions = {
        "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
        "aButtons": [ {
                "sExtends": "copy",
                "sButtonText": "Copy",
                //Columns to export as data, exluded Action column
                "mColumns": [ 0, 1 ],
            }, {
                "sExtends": "print",
                "sButtonText": "Print",
                "bShowAll": false
            }, {
                "sExtends":    "collection",
                "sButtonText": "Save as...",
                "aButtons":    [ {
                        "sExtends": "xls",
                        "oSelectorOpts": {
                            page: 'current'
                        },
                        "mColumns": [ 0, 1 ]
                    }, {
                        "sExtends": "pdf",
                        "sButtonText": "PDF",
                        "mColumns": [ 0, 1 ]
                    }
                ]
            }
        ]
    };

    var table = $('#view_programs').dataTable( dataTableOptions );

    var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

    $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
</script>