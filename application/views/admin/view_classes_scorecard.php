    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->

    <style type="text/css">
         tfoot td {
            font-size: 15px;
            font-weight: bold;
        }
    </style>

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-group"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            <div class="clearfix"></div><br>

                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)) echo $message;

                                $po_count = count($get_po);
                                $attributes = array('class' => 'col-md-4');
                            ?>
                            
                            <!-- <h4>
                                <center>
                                    <?php echo $class_program['programFullName'];?><br>
                                    <?php echo '(Effective SY: '.$class_program['effective_year'].' - '.($class_program['effective_year']+1).')';?>    
                                </center>
                            </h4> -->

                            <div class="pull-left">
                                <?php foreach($select_schedule as $row1): ?>
                                    <h4>
                                        <?php echo $row1['courseCode'].' ';?><?php echo '| Group '; echo $row1['group_num'].'';?>
                                        <?php 
                                            $co_code = $row1['courseCode'];
                                            $grp = $row1['group_num'];
                                            echo '<br> ';
                                            echo $row1['start_time'].' - ';
                                            echo $row1['end_time'].' ';
                                            echo $row1['days'].'<br>';
                                        ?>
                                        Semester: <?php echo $row1['semester'].' | ';?> School Year: <?php echo $row1['school_year']; ?>
                                        <br><br><?php echo 'Assigned Teacher: '.$row1['fname'].' '.$row1['lname'];?>
                                    </h4>
                                <?php endforeach; ?>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="clearfix"></div>
                            <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th width="11%">Student ID</i></th>
                                        <th>Name</i></th>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <th>PO <?php echo $x;?></i></th>
                                        <?php endfor; $row_num=1;?>
                                        <th width="11%" class="no-sort">Scorecard</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($class_list as $row): ?>   
                                    <tr>          
                                        <td><?php echo $row['studentID'];?></td>
                                        <td><?php echo $row['fname']." ".$row['lname'];?></td>
                                        <?php foreach($row['grade'] as $row1): ?>
                                        <td><?php 
                                                if (!is_numeric($row1)) {
                                                    if($row1 == 'NC') {
                                                        echo '<font size="2" color="#FF0000"><b>NC</b></font>';
                                                    } 
                                                    elseif($row1 == 'INC') {
                                                        echo '<font size="2" color="#FF9900"><b>INC</b></font>';
                                                    } 
                                                    elseif($row1 == 'W') {
                                                        echo '<font size="2" color="#993300"><b>W</b></font>';
                                                    }
                                                } 
                                                else echo number_format($row1,1);?>
                                        </td>
                                        <?php endforeach;?>   
                                        <td>
                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>admin/student_scorecard/<?php echo $row['student_id'];?>" title="View Student Scorecard">View Scorecard</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>   
                                </tbody>

                                <tfoot>
                                    <tr bgcolor="#FFF380">
                                        <td></td>
                                        <td><center>Average</center></td>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <td></td>
                                        <?php endfor;?>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";
    </script>
    
    <script type="text/javascript" language="javascript">
       var table = document.getElementById('view_classlist'),
            rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
            footer = table.getElementsByTagName('tfoot')[0];

            
        for (var i = 2; i <= <?php echo $po_count+1;?>; i++) {
            var sum = numOfValues = 0;
            for (var j = 0, l = rows.length; j < l; j++) {
                try {
                    if(!isNaN(rows[j].getElementsByTagName('td')[i].innerHTML)) {
                        sum += parseFloat(
                            rows[j].getElementsByTagName('td')[i]
                            .innerHTML
                        ) || 0;

                        numOfValues++;
                    }
                } catch (e) {}
            }

            var avg = sum / numOfValues;
            footer.getElementsByTagName('td')[i]
            .innerHTML = parseFloat(Math.round(avg * 100) / 100).toFixed(1);

            if( isNaN(footer.getElementsByTagName('td')[i].innerHTML) || footer.getElementsByTagName('td')[i].innerHTML == 0)
                footer.getElementsByTagName('td')[i].innerHTML = " ";
        }
    </script>

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
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "bShowAll": false
                }, {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [ {
                            "sExtends": "xls",
                            "sTitle": "<?php echo $co_code.' Group No. '.$grp;?>",
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            //Columns to export as data, exluded Action column
                            "mColumns": "visible"
                        }, {
                            "sExtends": "pdf",
                            "sTitle": "<?php echo $co_code.' Group No. '.$grp;?>",
                            "sButtonText": "PDF",
                            "sPdfMessage": "<?php echo $class_program['programFullName'].' '.$class_program['effective_year'].' - '.($class_program['effective_year']+1);?>",
                            //Columns to export as data, exluded Action column
                            "mColumns": "visible"
                        }
                    ]
                }
            ]
        };

        var table = $('#view_classlist').DataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>