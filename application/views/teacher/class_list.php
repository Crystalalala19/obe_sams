
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <li class='active'><a href="<?php echo base_url();?>site/home"><i class='icon-dashboard'></i> Course</a></li>
        <li class='title'><i class='icon-table'></i> Class List</li>
    </ul>
</section>

<div id='content'>

 <div class="bs-example" data-example-id="list-group-variants">
    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group">
                <?php foreach($select_schedule as $row1): ?>
                    <li class="list-group-item list-group-item-success"><center><b><font size="2"><?php echo $row1->courseCode.' ';?></font></b>
                   
                        <?php echo '| Group '; echo $row1->group_num.' | ';?>
                        <?php 
                            echo 'Schedule: ';
                            echo $row1->start_time.' - ';
                            echo $row1->end_time.' ';
                            echo $row1->days;
                        ?>
                        </center>
                    </li>
                    <li class="list-group-item list-group-item-warning">
                        Semester: <?php echo $row1->semester,' | ';?> School Year: <?php echo $row1->school_year; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
 <?php
    echo $this->session->flashdata('message');
    if (!empty($message)) echo $message;

    echo validation_errors('
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
        <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
    '</div>');

    $po_count = count($get_po);
?>
    
    <table id="view_classlist" class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <tr>
                <th><center>Student ID</center></th>
                <th><center>Name</center></th>
                <th><center>Program Name</center></th>
                <?php for($x = 1; $x <= $po_count; $x++):?>
                    <th><center>PO <?php echo $x;?></center></th>
                <?php endfor; $row_num=1;?>
                <th><center>View Scorecard</center></th>
            </tr>
        </thead>
        <tbody>
            <tr>  
                <?php foreach($class_list as $row): ?>
                <td><center><?php echo $row['student_id'];?></center></td>
                <td><center><?php echo $row['fname']; echo " ".$row['mname']; echo " ".$row['lname'];?></center></td>
                <td><center><?php foreach($select_programName as $row1): ?><?php echo $row1->programName;?><?php endforeach; ?> - <?php echo $row['effective_year'];?></center></td>
                <?php foreach($get_po as $key2 => $row2): ?>
                    <td>
                        <center>
                            <?php echo $row2['score'];?>
                        </center>
                    </td>
                <?php endforeach; $row_num++; ?>
                <td>
                    <center>
                        <a class="btn btn-sm btn-info" href="<?php echo base_url();?>site/scorecard/<?php echo $row['student_id'];?>">
                        <i class="icon-eye-open"></i> View Scorecard
                        </a>
                    </center>
                </td>
            </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>
</div>


<script type="text/javascript" language="javascript">

    var d = document.getElementById('courselist');
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

        var table = $('#view_classlist').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>