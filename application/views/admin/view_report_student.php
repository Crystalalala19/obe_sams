    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php 
                                echo $this->session->flashdata('message');
                                if (!empty($message)) echo $message;

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i> ', 
                                '</div>');
                            ?>

                            <?php echo form_open('admin/report_student');?>
                                <label class="control-label" for="program">Program:</label>
                                <select class="span2" id="program" name="program" required>
                                    <option value="">Program:</option>
                                    <?php foreach ($program_list as $row): ?>
                                    <option value="<?php echo $row['programName']; ?>"><?php echo rawurldecode($row['programName']); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span2" id="year_level" name="year_level" required>
                                    <option value="">Year level:</option>
                                    <option value="all">All</option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                                
                                <select class="span2" name="semester" required>
                                    <option value="">Semester:</option>
                                    <option value="all">All</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="summer">Summer</option>
                                </select>

                                <select class="span2" name="academic_year" required>
                                    <option value="">Academic Year:</option>
                                    <?php foreach ($year_classes as $row): ?>
                                    <option value="<?php echo $row['school_year']; ?>"><?php echo $row['school_year'].' - '. ($row['school_year']+1); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span2" name="po_num" required>
                                    <option value="">PO #:</option>
                                    <option value="all">All</option>
                                    <?php for($x = 1; $x <= 10; $x++):?>
                                    <option value="0<?php echo $x;?>">PO <?php echo $x;?></option>
                                    <?php endfor; ?>
                                </select>

                                <div class="clearfix"></div>
                                <input type="submit" class="btn btn-success" name="submit" value="Generate Report">
                            </form>

                            <hr>

                            <?php if(!empty($result)): ?>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $key => $row): ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['studentID'];?>
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

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("report_dropdown");
        d.className = d.className + " active";
    </script>