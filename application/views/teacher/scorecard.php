    <style type="text/css">
         tfoot td {
            font-size: 15px;
            font-weight: bold;
        }

        .label-danger {
            background-color: #FF0000;
        }
        
        .label-danger:hover {
            background-color: #FF3030;
        }
    </style>
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Student Scorecard</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            <div class="clearfix"></div><br>

                            <?php 
                                $po_count = count($get_po);
                                $attributes = array('class' => 'col-md-4');
                            ?>

                            <h3><center>
                            <?php foreach($get_scoreEY as $row): ?>
                                <?php echo $row['programFullName'];?><br>
                                <?php echo '(Effective SY: '.$row['effective_year'].' - '.($row['effective_year']+1).')';?>                                
                            <?php endforeach; ?>  
                            </center></h3>
                            <br>
                            <h>
                                <?php foreach($get_studentName as $row1): ?>
                                <?php $stud_id = $row1->student_id; $stud_name = $row1->lname.', '.$row1->fname;?> 
                                <?php echo '[ '.$row1->student_id.' ]  ';?>
                                <?php echo $row1->lname.', '.$row1->fname; ?>
                                <br>
                                <?php echo 'Year Level: '.$row1->year_level;?>
                                <?php endforeach; ?>
                            </h4> 
                            <hr>

                            <table id="scorecard_teacher" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Code</th>
                                     <?php for($x = 1; $x <= $po_count; $x++):?><th>PO <?php echo $x;?></th><?php endfor;?>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($class_list as $key => $row3): ?>
                                    <tr>
                                        <td width="7%"><?php echo $row3['courseCode']; ?></td>
                                        <?php for($x=0; $x < $po_count; $x++): ?>
                                            <td><?php if(!is_numeric($row3['score'][$x]['score'])) {if($row3['score'][$x]['score'] == 'NC'){echo '<span class="label label-danger">NC</span>';} elseif($row3['score'][$x]['score'] == 'INC') {echo '<span class="label label-important">INC</span>';} elseif($row3['score'][$x]['score'] == 'W'){echo '<span class="label label-warning">W</span>';}} else{echo number_format($row3['score'][$x]['score'],1);}?></td>
                                        <?php endfor;?>   
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr bgcolor="#FFF380">
                                        <td><center>Average</center></td>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <td></td>
                                        <?php endfor;?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> <!-- /widget-content --> 
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->


<script type="text/javascript">

        var table = document.getElementById('scorecard_teacher'),
            rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
            footer = table.getElementsByTagName('tfoot')[0];

            
        for (var i = 1; i <= <?php echo $po_count; ?>; i++) {
            var sum = numOfValues = 0;
            for (var j = 0, l = rows.length; j < l; j++) {
                try {
                    if(rows[j].getElementsByTagName('td')[i].innerHTML != '' && !isNaN(rows[j].getElementsByTagName('td')[i].innerHTML)) {
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
                            "sExtends": "xls",
                            "sTitle": "<?php echo $stud_name.' '.$stud_id; ?>",
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            "mColumns": "visible"
                        }, {
                            "sExtends": "pdf",
                            "sTitle": "<?php echo $stud_name.' '.$stud_id; ?>",
                            "sButtonText": "PDF",
                            "mColumns": "visible"
                        }
                    ]
                }
            ]
        };

        var table = $('#scorecard_teacher').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

</script>

<script type="text/javascript" language="javascript" class="init">
    var d = document.getElementById('studentlist');
    d.className = d.className + " active";
</script>
