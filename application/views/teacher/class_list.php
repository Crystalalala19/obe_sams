    <!-- PDF doesn't work, EDIT: now fixed -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrapv3.css">

    <!-- Datatables Script -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/datatables-bootstrapv3.js"></script>
    <!-- End DataTables -->

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
                            <div class="pull-left">
                                <a onclick="javascript:window.history.back();">
                                    <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                </a>
                            </div>
                            <div class="clearfix"></div><br>

                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)) echo $message;

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i></button>
                                    <i class="icon-exclamation-sign" aria-hidden="true"></i> ', 
                                '</div>');

                                $po_count = count($get_po);
                                $attributes = array('class' => 'col-md-4');
                            ?>
                            
                            <div class="pull-left">
                                <div class="alert alert-info">
                                <?php foreach($select_schedule as $row1): ?>
                                    <h4>
                                        <?php echo $row1->courseCode.' ';?><?php echo '| Group '; echo $row1->group_num.'';?>
                                        <?php 
                                            echo '<br> ';
                                            echo $row1->start_time.' - ';
                                            echo $row1->end_time.' ';
                                            echo $row1->days.'<br>';
                                        ?>
                                        Semester: <?php echo $row1->semester,' | ';?> School Year: <?php echo $row1->school_year; ?>
                                    </h4>
                                 <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th width="15%">Student ID</i></th>
                                        <th>Name</i></th>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <th>PO <?php echo $x;?></i></th>
                                        <?php endfor; ?>
                                        <th width="5%" class="no-sort text-center">Scorecard</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($class_list as $row): ?>   
                                    <tr>          
                                        <td><?php echo $row['studentID'];?></td>
                                        <td><?php echo $row['fname']." ".$row['lname'];?></td>
                                        <?php foreach($row['score'] as $row1): ?>
                                            <td><?php echo $row1;?></td>
                                        <?php endforeach; ?>   
                                        <td>
                                            <a class="btn btn-mini btn-info" href="<?php echo base_url();?>site/scorecard/<?php echo $row['student_id'];?>" title="View Scorecard">
                                                <i class="icon-eye-open"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>   
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="2"><center>Average</center></td>
                                        <?php for($x = 1; $x <= $po_count; $x++):?>
                                            <td></td>
                                        <?php endfor;?>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <?php echo form_open_multipart();?>
                                <div class="control-group">
                                    <div class="pull-right">
                                        <h3><i class="icon-download-alt icon-2x"></i> Download Template:</h3>
                                        <a href="<?php echo base_url('site/download/class');?>"><img src="<?php echo base_url('assets/img/excel.png');?>"></a>
                                    </div>

                                    <label for="userfile">Upload .CSV File: </label>
                                    <input type="hidden" name="teacher_id" value="<?php echo $this->session->userdata('teacher_id');?>">
                                    <input type="file" name="userfile" id="userfile" class="filestyle" data-buttonText="Find file" data-buttonName="btn-primary" data-iconName="icon-upload-alt">
                                </div>

                                <div class="control-group">
                                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                </div>
                            </form>  
                        </div> <!-- /widget-content --> 
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-filestyle.min.js"></script>
    
    <script type="text/javascript">
        var values = [],
            table = document.getElementById('view_classlist'),
            rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
            footer = table.getElementsByTagName('tfoot')[0];

        for(var i=2; i<<?php echo $po_count;?>; i++){
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
            footer.getElementsByTagName('td')[i-1].innerHTML = Math.round(score * 100) / 100;
          
            if( isNaN(footer.getElementsByTagName('td')[i-1].innerHTML) )
                footer.getElementsByTagName('td')[i-1].innerHTML = " ";
        }
    </script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById('courselist');
        d.className = d.className + " active";

        $('#view_classlist').filterable();
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
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }, 
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save as...",
                    "aButtons":    [{
                            "sExtends": "pdf",
                            "sButtonText": "PDF",
                            //Columns to export as data, exluded Action column
                            "mColumns": "visible"
                        }
                    ]
                }
            ]
        };

        var table = $('#view_classlist').dataTable( dataTableOptions );

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>