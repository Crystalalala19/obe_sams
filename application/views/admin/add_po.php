                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Add PO
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-bar-chart-o"></i>  Add PO
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
<?php
    print_r($this->input->post());
    echo $message;
    echo validation_errors('<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>', '</div>');

    $attributes = array('class' => 'col-xs-4');
    
    echo form_open('admin/add_po', $attributes);
?>
    

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>

    
</form>