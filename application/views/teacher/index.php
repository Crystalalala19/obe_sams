<section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Dashboard</li>
        </ul>
      </section>
<div id='content'>
<ul class='breadcrumb' id='breadcrumb'>
    <i class='icon-dashboard'></i>
    <li class='title'>Dashboard</li>
</ul>

  
  <div class='panel-body'>
    <?php
      echo "<pre>";
      print_r($this->session->all_userdata());
      echo "</pre>";
    ?>
  </div>
</div>
</div>
</div>
