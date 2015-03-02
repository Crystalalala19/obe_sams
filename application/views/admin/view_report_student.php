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
                    <div class="widget" style="overflow: visible;">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php 
                                if (!empty($message)) echo $message;
                                echo $this->session->flashdata('message');

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i> ', 
                                '</div>');
                            ?>

                            <?php echo form_open('admin/report_student/');?>
                                <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                <div class="clearfix"></div><br>

                                <label class="control-label" for="program">Program:</label>
                                <select class="span2" id="program" name="program" required>
                                    <option value="">Program:</option>
                                    <?php foreach ($program_list as $row): ?>
                                    <option value="<?php echo $row['programName'];?>"><?php echo rawurldecode($row['programName']); ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <select class="span2" id="program_ajax" name="program_year" required>
                                    <option value="" selected="selected">--------------------------------</option>
                                </select>

                                <select class="span2" id="program_ajax2" name="course" required>
                                    <option value="" selected="selected">--------------------------------</option>
                                </select>

                                <select class="span2" id="year_level" name="year_level" required>
                                    <option value="">Year level:</option>
                                    <option value="all"<?php echo set_select('year_level', 'all');?>>All Year Level</option>
                                    <option value="1"<?php echo set_select('year_level', '1');?>>First Year</option>
                                    <option value="2"<?php echo set_select('year_level', '2');?>>Second Year</option>
                                    <option value="3"<?php echo set_select('year_level', '3');?>>Third Year</option>
                                    <option value="4"<?php echo set_select('year_level', '4');?>>Fourth Year</option>
                                </select>
                                
                                <select class="span2" name="semester" required>
                                    <option value="">Semester:</option>
                                    <option value="all"<?php echo set_select('semester', 'all');?>>All Semester</option>
                                    <option value="1"<?php echo set_select('semester', '1');?>>First Semester</option>
                                    <option value="2"<?php echo set_select('semester', '2');?>>Second Semester</option>
                                    <option value="summer"<?php echo set_select('semester', 'summer');?>>Summer</option>
                                </select>

                                <select class="span2" name="academic_year" required>
                                    <option value="">Academic Year:</option>
                                    <?php foreach ($year_classes as $row): ?>
                                    <option value="<?php echo $row['school_year'];?>"<?php echo set_select('academic_year', $row['school_year']);?>><?php echo $row['school_year'].' - '. ($row['school_year']+1); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span1" name="po_num" required>
                                    <option value="">PO #:</option>
                                    <option value="all"<?php echo set_select('po_num', 'all');?>>All</option>
                                    <?php for($x = 1; $x <= $max_po; $x++):?>
                                    <option value="0<?php echo $x;?>"<?php echo set_select('po_num', '0'.$x);?>>PO <?php echo $x;?></option>
                                    <?php endfor; ?>
                                </select>

                                <div class="clearfix"></div>
                                <input type="submit" class="btn btn-success" name="submit" value="Generate Report">
                            </form>

                            <hr>

                            <?php if(!empty($result)): ?>
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="student_report">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Teacher</th>
                                        <?php if($po_count == 3): ?>
                                        <th>PO Score</th>
                                        <?php else: ?>
                                        <?php for($x=1;$x<=$po_count; $x++): ?>
                                        <th>PO <?php echo $x; ?></th>
                                        <?php endfor; ?>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $key => $row): ?>
                                    <tr>
                                        <td><?php echo $row['sfname'].' '.$row['slname'];?></td>
                                        <td><?php echo $row['courseCode'].' Grp. '.$row['group_num'];?></td>
                                        <td><?php echo $row['tfname'].' '.$row['tlname'];?></td>
                                        <?php if($po_count == 3): ?>
                                        <td><?php
                                            if(!is_numeric($row['score'])) {
                                                if($row == 'NC')
                                                    echo '<font size="2" color="#FF0000"><b>NC</b></font>';
                                                elseif($row == 'INC')
                                                    echo '<font size="2" color="#FF9900"><b>INC</b></font>';
                                                elseif($row == 'W')
                                                    echo '<font size="2" color="#993300"><b>W</b></font>';
                                            }
                                            else
                                                echo number_format($row['score'],1);
                                            ?>
                                        </td>
                                        <?php else: ?>
                                        <?php for($x=0;$x<$po_count;$x++): ?>
                                        <td>
                                            <?php
                                            if(!is_numeric($row['score'][$x]['score'])) {
                                                if($row['score'][$x]['score'] == 'NC')
                                                    echo '<font size="2" color="#FF0000"><b>NC</b></font>';
                                                elseif($row['score'][$x]['score'] == 'INC')
                                                    echo '<font size="2" color="#FF9900"><b>INC</b></font>';
                                                elseif($row['score'][$x]['score'] == 'W')
                                                    echo '<font size="2" color="#993300"><b>W</b></font>';
                                            }
                                            else 
                                                echo number_format($row['score'][$x]['score'],1);
                                            ?>
                                        </td>
                                        <?php endfor; ?>
                                        <?php endif;?>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr bgcolor="#FFF380">
                                        <td></td>
                                        <td><center>Average</center></td>
                                        <td></td>
                                        <?php if($po_count == 3): ?>
                                        <td></td>
                                        <?php else: ?>
                                        <?php for($x=1;$x<=$po_count;$x++): ?>
                                        <td></td>
                                        <?php endfor; ?>
                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php endif;?>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var baseurl = "<?php print base_url(); ?>";
    </script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/report_student.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/report_student2.js"></script>

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("report_dropdown");
        d.className = d.className + " active";

        var dataTableOptions = {
            //Auto sort column
            "order": [[0,'asc']],

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
                    "aButtons":    [ {
                            "sExtends": "xls",
                            "sTitle": "Student Reports <?php echo date('M Y');?>",
                            "oSelectorOpts": {
                                page: 'current'
                            },
                            "mColumns": "visible"
                        }, {
                            "sExtends": "pdf",
                            "sTitle": "Student Reports <?php echo date('M Y');?>",
                            "sButtonText": "PDF",
                            "mColumns": "visible"
                        }
                    ]
                }
            ]
        };

        var table = $('#student_report').DataTable( dataTableOptions );

        $('.dataTables_filter input').attr("placeholder", " Enter keyword");

        var tt = new $.fn.dataTable.TableTools( table, tableToolsOptions );

        $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
    </script>

    <script type="text/javascript">
        var table2 = document.getElementById('student_report'),
            rows = table2.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
            footer = table2.getElementsByTagName('tfoot')[0];

            
        for (var i = 3; i <= <?php if($po_count == 3) echo $po_count; else echo $po_count+2; ?> ; i++) {
            var sum = numOfValues = 0;
            for (var j = 0, l = rows.length; j < l; j++) {
                try {
                    if(rows[j].getElementsByTagName('td')[i].innerHTML.trim() != '' && !isNaN(rows[j].getElementsByTagName('td')[i].innerHTML)) {
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
