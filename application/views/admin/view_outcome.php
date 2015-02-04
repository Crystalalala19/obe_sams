    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-list"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <?php
                                echo $this->session->flashdata('message');
                                if (!empty($message)) echo $message;

                                echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i>', 
                                '</div>');

                                $po_count = count($po_list);
                            ?>
                            <h3>Major Subjects</h3>
                            <?php echo form_open();?>

                                <?php foreach($po_list as $key => $row): ?>
                                    <input type="hidden" name="po_id[]" value="<?php echo $row['ID'];?>">
                                <?php endforeach ?>
                                
                                <div class="form-group">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Subject</th>
                                                <?php for($x = 1; $x <= $po_count; $x++):?>
                                                <th>PO <?php echo $x;?></th>
                                                <?php endfor; $row_num=1;?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($course_list as $key => $row): ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="course_id[]" value="<?php echo $row['ID'];?>"><?php echo $row['CourseCode'];?>
                                                </td>
                                                <td><?php echo $row['CourseDesc']; ?></td>
                                                <?php foreach($po_list as $key2 => $row2): ?>
                                                <td>
                                                    <input type="checkbox" data-size='mini' name='row[<?php echo $key;?>][]' value='<?php echo $row2['ID'];?>' <?php if($m_array[$key][$key2]['status'] == '1') echo "checked=\"checked\""; ?>>
                                                </td>
                                                <?php endforeach; $row_num++; ?>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <input type="submit" class="btn btn-success" id="btnSubmit" name="submit" value="Save">
                                <a href="<?php echo base_url('admin/programs/view');?>">
                                    <button type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                                </a>
                            </form>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript" language="javascript">
        var d = document.getElementById("program_dropdown");
        d.className = d.className + " active";
    </script>