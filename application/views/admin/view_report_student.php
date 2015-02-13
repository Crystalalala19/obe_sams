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
                            <?php echo form_open('admin/report_student');?>
                                <label class="control-label" for="program">Program:</label>
                                <select class="span2" id="program" name="program">
                                    <option value="" selected="selected">Program:</option>
                                    <?php foreach ($program_list as $row): ?>
                                    <option value="<?php echo $row['programName']; ?>"><?php echo rawurldecode($row['programName']); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <select class="span2" id="year_level" name="year_level">
                                    <option value="" selected="selected">Year level:</option>
                                    <option value="all">All</option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                                
                                <select class="span2" name="semester">
                                    <option value="">Semester:</option>
                                    <option value="all">All</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="summer">Summer</option>
                                </select>

                                <select class="span2" name="academic_year">
                                    <option value="">Academic Year:</option>
                                    <?php foreach ($year_classes as $row): ?>
                                    <option value="<?php echo $row['school_year']; ?>"><?php echo $row['school_year'].' - '. ($row['school_year']+1); ?></option>
                                    <?php endforeach;?>
                                </select>

                                <div class="clearfix"></div>
                                <input type="submit" class="btn btn-success" name="submit" value="Generate">
                            </form>
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