 <!-- PDF doesn't work, EDIT: now fixed -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->

<style type="text/css">
    h2 {
        color: #060;
        font-size: 15px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: left;
    }
</style>


<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-pushpin"></i>
                        <h3>Teacher Log</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                    <div class="span11">
                        <table id="view_teacherslog" class="table">
                            <thead>
                                <tr>
                                    <th><center>Date</center></th>
                                    <th><center>Course</center></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($log as $row1): ?>
                                    <tr>
                                        <td width="20%"><center>
                                            <span class="news-item-month"><?php echo "".date('jS', strtotime($row1['date'])).' '.date('M Y', strtotime($row1['date']));?>
                                            <br><?php echo "".date('h:i A', strtotime($row1['date']));?></span>    
                                        </center></td>
                                        <td><center><?php echo $row1['courseCode'].' Group Number:'.$row1['group_num'].' '.$row1['start_time'].' - '.$row1['end_time'].' '.$row1['days'];?></center></td>
                                        <td><center><a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/class_list/<?php echo $row1['ID'];?>" title="View Class">View Class</a></center></td>
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
            //Auto sort column
            "order": [[1,'asc']],

            //Disable sorting with class no-sort
            "columnDefs": [
                { targets: 'no-sort', orderable: false }
            ],

            "bLengthChange": false,
            "bFilter": true,
            "bAutoWidth": false,
            "bSort": false 
        };

        var table = $('#view_teacherslog').DataTable( dataTableOptions );

        $('.dataTables_filter input').attr("placeholder", " Enter keyword");

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>
    