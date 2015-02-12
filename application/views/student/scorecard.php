 <!-- Datatables -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>


<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>Scorecard</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
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
                        <hr>

                         <table id="scorecard_student" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th> Course Code </th>
                                 <?php for($x = 1; $x <= $po_count; $x++):?>
                                    <th>PO <?php echo $x;?></i></th>
                                <?php endfor;?>
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach($class_list as $key => $row3): ?>
                                <tr>
                                    <td><?php echo $row3['courseCode']; ?></td>
                                    <?php for($x=0; $x < $po_count; $x++): ?>
                                        <td><?php echo $row3['score'][$x]['score'];?></td>
                                    <?php endfor;?>   
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
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
        var values = [],
            table = document.getElementById('scorecard_student'),
            rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
            footer = table.getElementsByTagName('tfoot')[0];

        for(var i=1; i<=<?php echo $po_count;?>; i++){
            values[i] = [];
            for(var j=0, l=rows.length; j<l; j++){
                values[i].push(
                    parseFloat(
                        rows[j].getElementsByTagName('td')[i]
                      .innerHTML
                    )
                );
            }

            var score = values[i].reduce(function(pv,cv){return pv + cv;},0) / values[i].length;
            footer.getElementsByTagName('td')[i].innerHTML = Math.round(score * 100) / 100;
          
            if( isNaN(footer.getElementsByTagName('td')[i].innerHTML) )
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
            "aButtons": [ {
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

        var table = $('#scorecard_student').DataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


</script>

