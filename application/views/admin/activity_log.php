    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-file"></i>
                            <h3><?php echo $header;?></h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">Assigning Class</a></li>
                                <li><a href="#tab2" data-toggle="tab">Teacher Log</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class='panel panel-default grid'>
                                        <ul class="news-items">
                                            <li>
                                                <?php foreach($activity_log as $row): ?>
                                                    <div class="news-item-date"> <span class="news-item-day"><?php echo "".date('jS', strtotime($row['date']));?></span> <span class="news-item-month"><?php echo "".date('M Y', strtotime($row['date']));?></span> </div>
                                                    <div class="news-item-detail">
                                                        <table id="view_classlist" class="table table-striped table-bordered dataTable no-footer">
                                                            <thead>
                                                                <tr>
                                                                    <th>PO Code</th>
                                                                    <th>PO Attribute</th>
                                                                    <th>Program Outcomes</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody>
                                                                <?php foreach($show_courses as $row1): ?>   
                                                                <tr>
                                                                    <td><?php echo $row1['ID']; ?></td>          
                                                                    <td><?php echo $row1['courseCode']; ?></td>
                                                                    <td><?php echo $row1['teacherID']; ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                <?php endforeach; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class='panel panel-default grid'>
                                        <ul class="news-items">
                                            <li>
                                              <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Aug</span> </div>
                                              <div class="news-item-detail"> <a href="http://www.egrappler.com/thursday-roundup-40/" class="news-item-title" target="_blank">Thursday Roundup # 40</a>
                                                <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                                              </div>
                                            </li>
                                            <li>
                                              <div class="news-item-date"> <span class="news-item-day">15</span> <span class="news-item-month">Jun</span> </div>
                                              <div class="news-item-detail"> <a href="http://www.egrappler.com/retina-ready-responsive-app-landing-page-website-template-app-landing/" class="news-item-title" target="_blank">Retina Ready Responsive App Landing Page Website Template – App Landing</a>
                                                <p class="news-item-preview"> App Landing is a retina ready responsive app landing page website template perfect for software and application developers and small business owners looking to promote their iPhone, iPad, Android Apps and software products.</p>
                                              </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- /widget-content -->  
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

  