<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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
          if (isset($errors["e3"])) echo $errors["e3"];?>',
      }, {
        // settings
        type: 'danger',
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
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t9"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin">
                      <input type="text" name="jak_name" class="form-control" value="<?php if (isset($_REQUEST["jak_name"])) echo $_REQUEST["jak_name"]; ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u1"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                      <input type="text" name="jak_email" class="form-control" value="<?php if (isset($_REQUEST["jak_email"])) echo $_REQUEST["jak_email"]; ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u2"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                      <input class="form-control" type="text" name="jak_username" value="<?php if (isset($_REQUEST["jak_username"])) echo $_REQUEST["jak_username"]; ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["submenu"]["sm100"]; ?></strong></div>
                  <div class="col-md-7">
                    <select name="jak_usergroup" class="form-control selectpicker" data-size="5">
                      <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
                        if ($v["id"] != "1") { ?>
                          <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_usergroup"]) && $v["id"] == $_REQUEST["jak_usergroup"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u3"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_access" value="1" checked="checked"/> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_access" value="0"/> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
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
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t10"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u4"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                      <div class="label-indicator-absolute">
                        <input class="form-control" type="text" name="jak_password" value=""/>
                        <span class="label password-indicator-label-absolute"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["user"]["u5"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                      <div class="label-indicator-absolute">
                        <input class="form-control" type="text" name="jak_confirm_password" value=""/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-info generate-label-absolute">Generate 10 characters password</button>
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["general"]["g20"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($JAK_HOOK_ADMIN_USER) && is_array($JAK_HOOK_ADMIN_USER)) foreach ($JAK_HOOK_ADMIN_USER as $hsu) {
      include_once APP_PATH . $hsu['phpcode'];
    } ?>
  </form>

  <style>
    .label-indicator-absolute {
      position: relative;
    }
    .label-indicator-absolute .password-indicator-label-absolute {
      position: absolute;
      top: 50%;
      margin-top: -9px;
      right: 7px;
      -webkit-transition: all 0.2s ease-in-out;
      -o-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;
    }
  </style>

<?php include "footer.php"; ?>