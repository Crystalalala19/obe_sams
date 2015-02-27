<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h3>Student List</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <table id="view_studentlist" class="table table-striped table-bordered dataTable no-footer">
                                <?php
                                    echo $this->session->flashdata('message');
                                    if (!empty($message)) echo $message;
                                ?> 
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th class="no-sort" width="10%">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($student_list as $row): ?>   
                                    <tr>          
                                        <td><center><?php echo $row->studentID;?></center></td>
                                        <td><center><?php echo $row->fname." ".$row->lname;?></center></td>
                                        <td><center><?php echo $row->programName;?> - <?php echo $row->effective_year;?></center></td>
                                        <?php $program = $row->programName;?>
                                        <td>
                                            <center>
                                                <a class="btn btn-mini btn-info" href="<?php echo base_url();?>coordinator/scorecard/<?php echo $row->studentID;?>" title="View Scorecard">View Scorecard</a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>   
                                </tbody>
                            </table>
                    </div>
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var dataTableOptions = {
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false 
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [{
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "bShowAll": false
                }, {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [ {
                            "sExtends": "pdf",
                            "sTitle": "<?php echo $program; ?>",
                            "sButtonText": "PDF",
                            "mColumns": [0,1,2]
                        }
                    ]
                }
            ]
        };

        var table = $('#view_studentlist').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

    </script>