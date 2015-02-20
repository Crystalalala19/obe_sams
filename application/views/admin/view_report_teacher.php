    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->

    <style type="text/css">
        tfoot {
            display: table-header-group;
        }   
        tfoot input {
            width: 95%;
        }
        @media (max-width: 768px) {
            .btn-responsive {
                padding:2px 4px;
                font-size:80%;
                line-height: 1;
                border-radius:3px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .btn-responsive {
                padding:4px 9px;
                font-size:90%;
                line-height: 1.2;
            }
        }
    </style>

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user-md"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            <div class="clearfix"></div><br>

                            <label for="selector">Select Academic Year:</label>
                            <select name="academic_year" id="selector" class="selectpicker show-tick" title="Select Academic Year" data-live-search="true" multiple data-max-options="1" data-size="auto">
                                <?php foreach($year_classes as $row):?>
                                <option value='<?php echo $row['school_year'];?>' <?php if($academic_year == $row['school_year']) echo 'selected="selected"'; ?>><?php echo $row['school_year'].' - '.($row['school_year']+1);?></option>
                                <?php endforeach;?>
                            </select>

                            <hr>

                            <?php if(!empty($academic_year)):?>     
                            <table id="teacher_report" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">Status</th>
                                        <th width="12%">Semester</th>
                                        <th>Teacher</th>
                                        <th width="12%">Group #</th>
                                        <th width="10%">Subject</th>
                                        <th width="20%">Schedule</th>
                                        <th width="10%" class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Status</th>
                                        <th>Semester</th>
                                        <th>Teacher</th>
                                        <th>Group #</th>
                                        <th>Subject</th>
                                        <th>Schedule</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($teacher_list as $key => $row):?>
                                    <tr>
                                        <td><?php if($row['class_population'][0] == 0):;?><button class="btn btn-danger btn-small btn-responsive">Empty</button><?php else: ?><button class="btn btn-success btn-small btn-responsive">OK</button><?php endif;?></td>
                                        <td><?php echo ucfirst($row['semester']);?></td>
                                        <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                        <td><?php echo $row['group_num'];?></td>
                                        <td><?php echo $row['courseCode'];?></td>
                                        <td><?php echo $row['start_time'].' - '. $row['end_time'].' '. $row['days'];?></td>
                                        <td>
                                            <a type="button" title="View Class" class="btn btn-warning btn-small btn-responsive" href="<?php echo base_url();?>admin/teachers/scorecard/<?php echo $row['teacher_id'].'/'.$row['school_year'].'/'.$row['ID'];?>">View Class</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php endif;?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <!-- <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" language="javascript">
        $('#selector').change(function()
        {
            self.location = "<?php echo base_url('admin/reports/teacher');?>/"+ this.value;
        });

        var d = document.getElementById("report_dropdown");
        d.className = d.className + " active";

        var dataTableOptions = {
            //Auto sort column
            "order": [[1,'asc']],

            //Disable sorting with class no-sort
            "columnDefs": [
                { targets: 'no-sort', orderable: false }
            ],

            "bLengthChange": true,
            "bFilter": true,
            "bAutoWidth": false
        };

        var table = $('#teacher_report').DataTable( dataTableOptions );

        $('.dataTables_filter input').attr("placeholder", " Enter keyword");

        $('#teacher_report tfoot th:eq(0), tfoot th:eq(6)').html("");

        $('#teacher_report tfoot th:not(:eq(0), :eq(6))').each( function () {
            var title = $('#teacher_report thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        table.columns().eq( 0 ).each( function ( colIdx ) {
            $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                table
                    .column( colIdx )
                    .search( this.value )
                    .draw();
            } );
        } );
    </script>