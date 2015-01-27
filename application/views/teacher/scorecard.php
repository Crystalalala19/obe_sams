<!-- For filter table -->
<link href="shttp://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-filterable.css" rel="stylesheet">
<link href="http://lightswitch05.github.io/filterable/stylesheets/main.css" rel="stylesheet">

<!-- End filter table -->



<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
            <li class='active'><a href="<?php echo base_url();?>site/home"><i class='icon-dashboard'></i> Course</a></li>
            <li class='title'><i class='icon-table'></i> Scorecard</li>
        </ul>
      </section>

<div id='content'>
     <div class='panel panel-default grid'>
        <div class='panel-heading'>
            <?php foreach($scorecard as $row): ?> 
            <?php echo '[ '.$row->studentID.' ]  ';?>
            <?php echo $row->lname.', '.$row->fname.' '.$row->mname; ?>
            <?php endforeach; ?>     
       </div>
       <br>


        <div class='panel-body'>   
            <div class="container">
              <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab1" data-toggle="tab">1st Year</a></li>
                  <li><a href="#tab2" data-toggle="tab">2nd Year</a></li>
                  <li><a href="#tab5" data-toggle="tab">3rd Year</a></li>
                  <li><a href="#tab6" data-toggle="tab">4th Year</a></li>
                </ul>

                <div class='panel-body'>   
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <br>
                            <div class="span8">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                          <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                        </ul>
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="tab3">
                                            
                                            <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th style="visibility: hidden">Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                   

                                                         <table id="example-table" class="table table-striped table-hover table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <th>Course Code <i class="icon-filter"></th>   
                                                                </tr>
                                                            </thead>
                                                             <tbody>
                                                                    <tr>
                                                                        <td>CS110</td>   
                                                                    </tr>                                                                       
                                                                </tbody>
                                                            </table>




                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1.2</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>

                                          </div>

                                          <div class="tab-pane" id="tab4">
                                            
                                             <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th>Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <table class='table table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th><div style="visibility: hidden">Course Code</div></th>                                                               
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>

                                          </div>
                                        </div>
                                    </div>
                              </div>     
                      </div>

                      <div class="tab-pane" id="tab2">
                        <br>
                            <div class="span8">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                        <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="tab3">
                                        
                                         <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th>Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <table class='table table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th><div style="visibility: hidden">Course Code</div></th>                                                               
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>CS11</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>

                                      </div>
                                    </div>
                                </div>
                          </div>      
                      </div>
                        <div class="tab-pane" id="tab5">
                            <br>
                            <div class="span8">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                        <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="tab3">
                                        
                                         <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th>Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <table class='table table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th><div style="visibility: hidden">Course Code</div></th>                                                               
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                      </div>
                                      
                                      <div class="tab-pane" id="tab4">
                                        
                                         <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th>Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <table class='table table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th><div style="visibility: hidden">Course Code</div></th>                                                               
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>

                                      </div>
                                    </div>
                                </div>
                          </div>      
                      </div>
                       <div class="tab-pane" id="tab6">
                        <br>
                            <div class="span8">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab3" data-toggle="tab">1st Semester</a></li>
                                        <li><a href="#tab4" data-toggle="tab">Second Semester</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="tab3">
                                        
                                         <div class='panel panel-default grid'>
                                              <div class='panel-heading'>
                                                <i class='icon-table icon-large'></i>
                                               
                                              </div>
                                              <table class='table table-condensed'>
                                                <thead>
                                                  <tr>
                                                    <th>Course Code</th>
                                                    <th>Program Outcome</th>
                                                   
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <table class='table table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th><div style="visibility: hidden">Course Code</div></th>                                                               
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table class='table table-bordered table-condensed'>
                                                            <thead>
                                                              <tr>
                                                                <th>P01</th>
                                                                <th>P02</th>
                                                                <th>P03</th>
                                                                <th>P04</th>
                                                                <th>P05</th>
                                                                <th>P06</th>
                                                                <th>P07</th>
                                                                <th>P08</th>
                                                                <th>P09</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                      </div>
                                      <div class="tab-pane" id="tab4">
                                        
                                        <div class='panel panel-default grid'>
                                          <div class='panel-heading'>
                                            <i class='icon-table icon-large'></i>
                                            Condensed Table
                                          </div>
                                          <table class='table table-condensed'>
                                            <thead>
                                              <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                              </tr>
                                              <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                              </tr>
                                              <tr>
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>

                                      </div>
                                    </div>
                                </div>
                          </div>      
                      </div>

                    </div>
                </div>


              </div>
            </div>
        </div> 


     </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-utils.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-cell.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable-row.js"></script>
<script src="<?php echo base_url();?>assets/js/filterable.js"></script>


<script>
  $('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTab1 a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})


</script>

<script type="text/javascript" language="javascript" class="init">
    var d = document.getElementById('studentlist');
    d.className = d.className + " active";
</script>

<script type="text/javascript">
   $('#example-table').filterable();
</script>

