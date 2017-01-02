<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } if ($page2 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } if ($success) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo $success["e"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["general"]["g20"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["page"]["p"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
                      <input class="form-control" type="text" name="jak_title" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                        if ($v["varname"] == 'nltitle') {
                          echo $v["value"];
                        }
                      } ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d13"]; ?></strong></div>
                  <div class="col-md-7">
                <textarea class="jakEditorLight" id="jakEditor" rows="4" name="jak_description"><?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                    if ($v["varname"] == 'nlsignoff') {
                      echo $v["value"];
                    }
                  } ?></textarea>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d14"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
                      <input class="form-control" type="text" name="jak_thankyou" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                        if ($v["varname"] == 'nlthankyou') {
                          echo $v["value"];
                        }
                      } ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d28"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e4"])) echo " has-error"; ?> no-margin">
                      <input type="text" name="jak_email" class="form-control" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                        if ($v["varname"] == 'nlemail') {
                          echo $v["value"];
                        }
                      } ?>" placeholder="<?php echo $tl["setting"]["s"]; ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d15"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_smpt" value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {if ($v["varname"] == 'nlsmtp_mail' && $v["value"] == '0') { ?> checked="checked"<?php } } ?> /> <?php echo $tlnl["nletter"]["d16"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_smpt" value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) { if ($v["varname"] == 'nlsmtp_mail' && $v["value"] == '1') { ?> checked="checked"<?php } } ?> /> <?php echo $tlnl["nletter"]["d17"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d18"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jak_host" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                      if ($v["varname"] == 'nlsmtphost') {
                        echo $v["value"];
                      }
                    } ?>"/>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d19"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
                      <input type="text" class="form-control" name="jak_port" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                        if ($v["varname"] == 'nlsmtpport') {
                          echo $v["value"];
                        }
                      } ?>" placeholder="25"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d29"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_alive" value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) { if ($v["varname"] == 'nlsmtp_alive' && $v["value"] == '1') { ?> checked="checked"<?php } } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_alive" value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) { if ($v["varname"] == 'nlsmtp_alive' && $v["value"] == '0') { ?> checked="checked"<?php } } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d30"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_auth" value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) { if ($v["varname"] == 'nlsmtp_auth' && $v["value"] == '1') { ?> checked="checked"<?php } } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_auth" value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) { if ($v["varname"] == 'nlsmtp_auth' && $v["value"] == '0') { ?> checked="checked"<?php } } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d39"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
                      <input type="text" class="form-control" name="jak_prefix" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                        if ($v["varname"] == 'nlsmtp_prefix') {
                          echo $v["value"];
                        }
                      } ?>" placeholder="ssl/true/false"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["login"]["l1"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jak_username" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                      if ($v["varname"] == 'nlsmtpusername') {
                        echo base64_decode($v["value"]);
                      }
                    } ?>"/>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["login"]["l2"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="jak_password" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                      if ($v["varname"] == 'nlsmtppassword') {
                        echo base64_decode($v["value"]);
                      }
                    } ?>"/>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d41"]; ?></strong></div>
                  <div class="col-md-7">
                    <input type="submit" name="testMail" class="btn btn-success" id="sendTM" value="<?php echo $tlnl["nletter"]["d42"]; ?>"/>                    <span id="loader" style="display: none;">
                <img src="../../img/loader.gif" alt="loader" width="16" height="11"/>
              </span>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["general"]["g20"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- JavaScript to disable send button and show loading.gif image -->
  <script type="text/javascript">
    $(document).ready(function () {
      // onclick
      $("#sendTM").click(function () {
        $("#loader").show();
        $('#sendTM').val("<?php echo $tlnl["nletter"]["d31"];?>");
        $('#sendTM').attr("disabled", "disabled");
        $('.jak_form').submit();
      });
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>