    <!-- For filter table -->
    <link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
    <!-- End filter table -->

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

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i> ', 
                                '</div>');
                            ?>

                            <?php echo form_open('admin/report_student');?>
                                <label class="control-label" for="program">Program:</label>
                                <select class="span2" id="program" name="program">
                                    <option value="">Program:</option>
                                    <?php foreach ($program_list as $row): ?>
                                    <option value="<?php echo $row['programName'];?>" <?php echo set_select('program', $row['programName']);?>><?php echo rawurldecode($row['programName']); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span2" id="year_level" name="year_level">
                                    <option value="">Year level:</option>
                                    <option value="all" <?php echo set_select('year_level', 'all');?>>All</option>
                                    <option value="1" <?php echo set_select('year_level', '1');?>>First Year</option>
                                    <option value="2" <?php echo set_select('year_level', '2');?>>Second Year</option>
                                    <option value="3" <?php echo set_select('year_level', '3');?>>Third Year</option>
                                    <option value="4" <?php echo set_select('year_level', '4');?>>Fourth Year</option>
                                </select>
                                
                                <select class="span2" name="semester">
                                    <option value="">Semester:</option>
                                    <option value="all" <?php echo set_select('semester', 'all');?>>All</option>
                                    <option value="1" <?php echo set_select('semester', '1');?>>First</option>
                                    <option value="2" <?php echo set_select('semester', '2');?>>Second</option>
                                    <option value="summer" <?php echo set_select('semester', 'summer');?>>Summer</option>
                                </select>

                                <select class="span2" name="academic_year">
                                    <option value="">Academic Year:</option>
                                    <?php foreach ($year_classes as $row): ?>
                                    <option value="<?php echo $row['school_year'];?>" <?php echo set_select('academic_year', $row['school_year']);?>><?php echo $row['school_year'].' - '. ($row['school_year']+1); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span2" name="po_num">
                                    <option value="">PO #:</option>
                                    <option value="all" <?php echo set_select('po_num', 'all');?>>All</option>
                                    <?php for($x = 1; $x <= 10; $x++):?>
                                    <option value="0<?php echo $x;?>" <?php echo set_select('po_num', '0'.$x);?>>PO <?php echo $x;?></option>
                                    <?php endfor; ?>
                                </select>

                                <div class="clearfix"></div>
                                <input type="submit" class="btn btn-success" name="submit" value="Generate Report">
                            </form>

                            <hr>

                            <?php if(!empty($result)): ?>
                            <table class="table table-striped table-bordered" id="filterme">
                                <thead>
                                    <tr>
                                        <th width="10%">Student ID <i class="icon-filter"></th>
                                        <th width="15%">Name <i class="icon-filter"></th>
                                        <th width="10%">Subject <i class="icon-filter"></th>
                                        <th width="15%">Teacher <i class="icon-filter"></th>
                                        <th width="10%">PO <i class="icon-filter"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $key => $row): ?>
                                        <tr>
                                            <td><?php echo $row['studentID'];?></td>
                                            <td><?php echo $row['sfname'].' '.$row['slname'];?></td>
                                            <td><?php echo $row['courseCode'].' Grp. '.$row['group_num'];?></td>
                                            <td><?php echo $row['tfname'].' '.$row['tlname'];?></td>
                                            <td><?php echo $row['score'];?></td>
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

    <!-- Filter table -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/filterable.js"></script>
    <!-- End filter table -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("report_dropdown");
        d.className = d.className + " active";

        $('#filterme').filterable();
    </script>