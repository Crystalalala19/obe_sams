 <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-home"></i>
                            <h3>Home</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <div class="shortcuts"> 
                                <?php
                                  echo "<pre>";
                                  print_r($this->session->all_userdata());
                                  echo "</pre>";
                                ?>
                            </div>
                        </div>

                       </div> <!-- /widget -->                 
            </div> <!-- /span12 -->         
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main-inner -->
