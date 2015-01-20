<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Student List</li>
        </ul>
</section>

<div id='content'>
      	<table id="view_programs" class="table table-striped table-bordered dataTable no-footer">

        <thead>
            <tr>
                <th><center>Student ID</center></th>
                <th><center>Name</center></th>
                <th><center>Program</center></th>
            </tr>
        </thead>
        
        <tbody>
              	<?php foreach($student_list as $row): ?>      

                <tr>            
                    <td><center><a href="<?php echo base_url();?>site/scorecard/<?php echo $row->student_id;?>"><?php echo $row->student_id;?></a></center></td>
                    <td><center><?php echo $row->fname." ".$row->mname." ".$row->lname;?></center></td>
                    <td><center><?php echo $row->programName."-".$row->effective_year;?></center></td>
                </tr>
                        <?php endforeach; ?>   

        </tbody>

    </table>
</div>


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