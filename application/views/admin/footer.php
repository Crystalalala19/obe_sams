            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!--  Jquery Core Script -->
  	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    
    <?php if(basename(current_url()) == 'view_students' OR basename(current_url()) == 'view_programs'):?>
    <!-- Datatables -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>

    <?php endif?>

    <?php if(basename(current_url()) == 'view_programs'):?>
    <script type="text/javascript" language="javascript">
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
    <?php endif;?>

    <?php if(basename(current_url()) == 'view_students'):?>
    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            //Disable sorting for column Action
            aoColumnDefs: [{ 'bSortable': false, 'aTargets': [3] }],
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ {
                    "sExtends": "copy",
                    "sButtonText": "Copy",
                    //Columns to export as data, exluded Action column
                    "mColumns": [ 0, 1, 2 ],
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

        var table = $('#view_students').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>
    <?php endif;?>

    <!-- 
        If livehost na atoa, uncomment below codes and remove/comment above codes. 
        Otherwise, retain above codes. 
    -->
    <!--
    <script type="text/javascript" language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    -->
</body>
</html>
