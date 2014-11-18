<div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Create Curriculum</h1>
        <h3>Sample page rani</h3>
        <?php
        
        $this->load->helper("form");
        echo form_open("account/create_map");

        echo validation_errors();


        echo form_label("Course Code: ", "courseCode");
        $data = array(
            "name" => "courseCode",
            "id" => "courseCode",
            "value" => "",
            "required" => "required"
        );
        echo form_input($data).'<br>';

        echo form_label('Course Name: ', 'courseName');
        $data = array(
            "name" => "courseName",
            "id" => "courseName",
            "value" => "",
            "required" => "required"
        );
        echo form_input($data).'<br>';
        echo form_submit('submit', 'submit');

        echo form_close();
        ?>

        <br><br><br><br><br><br><br><br><br><br>
        <p><a href="<?php echo base_url();?>site" class="btn btn-primary btn-lg" role="button">Back</a></p>
    </div>
</div>