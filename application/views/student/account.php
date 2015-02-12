    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/mootools.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/StrongPass.js"></script>

    <style type="text/css">
        #password {
            padding: 10px;
            border: 1px solid #000;
            margin: 0 0 10px;
        }

        div.pass-container {
            height: 30px;
        }

        div.pass-bar {
            height: 11px;
            margin-top: 2px;
        }
        div.pass-hint {
            font-family: arial;
            font-size: 11px;
        }
    </style>

    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-key"></i>
                            <h3>Change Password</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">
                            <?php
                            echo $this->session->flashdata('message');
                            if (!empty($message)) echo $message; 

                            echo validation_errors('
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                                    <i class="icon-exclamation-sign"></i> ', 
                                '</div>');
                            
                            $attrib = array( 'onsubmit' => "return confirm('Are you sure?');"); 

                            echo form_open('student/account', $attrib);?>
                                <fieldset>
                                    <div class="control-group">                                         
                                        <label class="control-label" for="cur_pass">Current Password</label>
                                        <div class="controls">
                                            <input type="password" class="span4" id="cur_pass" name="cur_pass">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <div class="control-group">                                         
                                        <label class="control-label">New Password</label>
                                        <div class="controls">
                                            <input type="password" class="span4" id="new_pass" name="new_pass">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->
                                    
                                    <div class="control-group">                                         
                                        <label class="control-label" for="con_pass">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" class="span4" id="con_pass" name="con_pass">
                                        </div> <!-- /controls -->               
                                    </div> <!-- /control-group -->

                                    <input type="submit" name="submit" value="Change Password" class="btn btn-success">

                                </fieldset>
                            </form>
                        </div> <!-- /widget-content --> 
                    </div> <!-- /widget -->                 
                </div> <!-- /span12 -->         
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /main-inner -->

    <script type="text/javascript">
        new StrongPass("new_pass", {
            onReady: function() {
                console.log('you can begin typing');
            },
            onPass: function(score, verdict) {
                console.log('pass', score, verdict)
            },
            onFail: function(score, verdict) {
                console.log('fail', score, verdict);
            },
            onBanned: function(word) {
                console.warn(word, 'is not allowed as it is on the bannedPasswords list');
            }
        });
    </script>
