<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>Program Outcomes</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">
                        <div class="clearfix"></div><br>
                        <h4><center>
                        <?php foreach($student_year as $row1): ?>
                            <?php echo $row1['programFullName'];?><br>
                            <?php echo '(Effective SY: '.$row1['effective_year'].' - '.($row1['effective_year']+1).')';?>                                
                        <?php endforeach; ?>  
                        </center></h4>  
                        <hr>

                        <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>PO Code</th>
                                    <th width="35%">PO Attribute</th>
                                    <th>Program Outcomes</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach($view_po as $row): ?>   
                                <tr>
                                    <td><?php echo $row['poCode']; ?></td>          
                                    <td width="35%"><?php echo $row['attribute']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->

