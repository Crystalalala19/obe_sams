    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-edit"></i>
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
                            
                            $attrib = array( 'onsubmit' => "return confirm('Are you sure you want to update?');"); 

                            echo form_open('', $attrib);
                        ?>
                                <div class="control-group">
                                    <label for="program_inp">Program:</label>
                                    <select class="form-control input-sm" id="program_inp" name="program" readonly>
                                        <?php foreach($program_list as $row):?>
                                        <option value="<?php echo $row['programName'];?>" <?php if($program == $row['programName']) echo 'selected="selected"'; ?>><?php echo rawurldecode($row['programName']);?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="control-group">
                                    <label for="effective_year">Effective Year:</label>
                                    <select name="effective_year" readonly>
                                        <option value="<?php echo $year;?>" selected="selected"><?php echo $year;?></option>
                                    </select>
                                </div>

                                <div class="control-group">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>PO CODE</th>
                                                <th>PO ATTRIBUTE</th>
                                                <th>PO DESCRIPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($program_data as $row):?>
                                            <tr>
                                                <input type="hidden" name="po_id[]" value="<?php echo $row['ID'];?>">
                                                <td><input type="text" class="form-control input-sm" name="po_code[]" value="<?php echo $row['poCode'];?>"></td>
                                                <td><input type="text" class="form-control input-sm" name="po_attrib[]" value="<?php echo $row['attribute'];?>"></td>
                                                <td><textarea class="form-control span6" name="po_desc[]" rows="5"><?php echo $row['description'];?></textarea></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="control-group">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Course List</th>
                                                <th>Course Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($course_list as $row):?>
                                            <tr>
                                                <input type="hidden" class="form-control input-sm" name="co_id[]" value="<?php echo $row['ID'];?>">
                                                <td><input type="text" class="form-control input-sm" name="co_code[]" value="<?php echo $row['CourseCode'];?>"></td>
                                                <td><textarea class="form-control input-sm span6" name="co_desc[]" rows="3"><?php echo $row['CourseDesc'];?></textarea></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <input type="submit" class="btn btn-success" name="submit" value="Update">
                                <button onclick="javascript:window.history.back();" type="button" class="btn btn-info"><i class="icon-angle-left"></i> Go Back</button>
                            </form>
                            <?php endif;?>
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