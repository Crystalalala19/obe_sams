    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-group"></i>
                            <h3>Students</h3>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($student_list as $row): ?>   
                                    <tr>          
                                        <td><center><?php echo $row->studentID;?></center></td>
                                        <td><center><?php echo $row->fname." ".$row->mname." ".$row->lname;?></center></td>
                                        <td><center><?php echo $row->programName;?> - <?php echo $row->effective_year;?></center></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/scorecard/<?php echo $row->studentID;?>" title="View Scorecard">
                                                <i class="icon-eye-open"></i> View Scorecard
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>   
                                </tbody>
                            </table>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

<script type="text/javascript" language="javascript">
     
        
        var dataTableOptions = {
           "bLengthChange": false
        };

        var tableToolsOptions = {
            "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.3/swf/copy_csv_xls_pdf.swf",
            "aButtons": [ {
                    "sExtends": "copy",
                    "sButtonText": "Copy",
                    //Columns to export as data, exluded Action column
                    "mColumns": [ 0, 1 ],
                },{
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

        var table = $('#view_studentlist').DataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>