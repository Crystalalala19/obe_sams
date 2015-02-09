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
                            <div class="span11">

                                <table id="view_studentlist" class="table table-striped table-bordered dataTable no-footer">
                                    <?php
                                        echo $this->session->flashdata('message');
                                        if (!empty($message)) echo $message;

                                        echo validation_errors('
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                            <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                        '</div>');
                                    ?> 
                                    <thead>
                                        <tr>
                                            <th><center>Student ID</center></th>
                                            <th><center>Name</center></th>
                                            <th><center>Program</center></th>
                                            <th><center>Action</center></th>
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
                                                        <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/scorecard/<?php echo $row->studentID;?>">
                                                        <i class="icon-eye-open"></i> View Scorecard
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                                <?php endforeach; ?>   

                                    </tbody>

                                </table>
                            </div>    

                        </div>

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

        var table = $('#view_studentlist').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>