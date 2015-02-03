    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-book"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">                            
                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)): echo $message;

                                else:
                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i>', 
                                '</div>');
                            ?>
                            
                            <a href="<?php echo base_url('admin/teachers/view');?>">
                                <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            </a>

                            <select>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                            </select>

                            <hr>
                            <table id="view_classes" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Group #</th>
                                        <th>Course Code</th>
                                        <th>Schedule</th>
                                        <th>Semester</th>
                                        <th>Academic Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($teacher_classes as $row):?>
                                    <tr>
                                        <td><?php echo $row['group_num']; ?></td>
                                        <td><?php echo $row['courseCode']; ?></td>
                                        <td><?php echo $row['start_time'].' - '.$row['end_time'].' '.$row['days']; ?></td>
                                        <td><?php echo $row['semester']; ?></td>
                                        <td><?php echo ($row['school_year']-1). ' - '. $row['school_year']; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div> <!-- /widget-content -->  
                        <?php endif;?>
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("teachers_menu");
        d.className = d.className + " active";

        $(document).ready(function(){
            $('#view_classes').DataTable();
        });
    </script>

