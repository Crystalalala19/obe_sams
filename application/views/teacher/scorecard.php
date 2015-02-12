    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-users"></i>
                            <h3>Student Scorecard</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="pull-left">
                                <a href="javascript:window.history.go(-1);">
                                    <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                </a>
                            </div>
                            <div class="clearfix"></div><br>
                            <?php 
                                $po_count = count($get_po);
                                $attributes = array('class' => 'col-md-4');
                            ?>

                            <h4><center>
                            <?php foreach($get_EY as $row): ?>
                                <?php echo $row->programFullName;?><br>
                                <?php echo '(Effective SY: '.$row->effective_year.' - '.($row->effective_year+1).')';?>                                
                            <?php endforeach; ?>  
                            </center></h4>  
                            <h4>
                                <?php foreach($get_studentName as $row1): ?> 
                                <?php echo '[ '.$row1->student_id.' ]  ';?>
                                <?php echo $row1->lname.', '.$row1->fname.' '.$row1->mname; ?>
                                <?php endforeach; ?>
                            </h4> 
                            <hr>

                            <table id="scorecard_teacher" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Course Code</th>
                                     <?php for($x = 1; $x <= $po_count; $x++):?><th>PO <?php echo $x;?></th><?php endfor;?>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($class_list as $key => $row3): ?>
                                    <tr>
                                        <td><center><?php echo $row3['courseCode']; ?></center></td>
                                        <?php for($x=0; $x < $po_count; $x++): ?>
                                            <td><center>
                                                <?php echo $row3['score'][$x]['score'];?>
                                            </center></td>
                                        <?php endfor;?>   
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><center>Average</center></td>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <td><center></center></td>
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
                    sum += parseFloat(
                        rows[j].getElementsByTagName('td')[i]
                        .getElementsByTagName('center')[0]
                        .innerHTML
                    );
                    numOfValues++;
                } catch (e) {}
            }

            var avg = sum / numOfValues;
            footer.getElementsByTagName('td')[i]
            .getElementsByTagName('center')[0]
            .innerHTML = Math.round(avg * 100) / 100;
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
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            "mColumns": "visible"
                        }, {
                            "sExtends": "pdf",
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
