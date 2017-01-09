<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];?>',
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
    <div class="savebutton hidden-xs">
      <button type="submit" name="save" class="btn btn-success button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-8">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt5"]; ?></h3>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc19"]; ?></strong></div>
                  <div class="col-md-7">
                    <?php include_once APP_PATH . "admin/template/cat_new.php"; ?>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">
                    <strong><?php echo $tlblog["blog_box_content"]["blogbc20"]; ?></strong>
                    <a class="cms-help" data-content="<?php echo $tlblog["blog_help"]["blogh2"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlblog["blog_help"]["blogh"]; ?>">
                      <i class="fa fa-question-circle"></i>
                    </a>
                  </div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">
                      <input type="text" name="jak_varname" id="jak_varname" class="form-control" value="<?php if (isset($_REQUEST["jak_varname"])) echo $_REQUEST["jak_varname"]; ?>"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc21"]; ?></strong></div>
                  <div class="col-md-7">
                    <textarea name="jak_lcontent" class="form-control" rows="4"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost($_REQUEST["jak_lcontent"]); ?></textarea>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc22"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio radio-success">

                      <input type="radio" id="jak_active1" name="jak_active" value="1"<?php if (isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '1') { ?> checked="checked"<?php } ?> />
                      <label for="jak_active1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                      <input type="radio" id="jak_active2" name="jak_active" value="0"<?php if (isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '0') { ?> checked="checked"<?php } ?> />
                      <label for="jak_active2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc23"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="input-group">
                      <input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; ?>" />
                    <span class="input-group-btn">
                      <button class="btn btn-default iconpicker" data-placement="top" role="iconpicker"></button>
                    </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-success pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["button"]["btn1"]; ?>
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt6"]; ?>
              <a class="cms-help" data-content="<?php echo $tlblog["blog_help"]["blogh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlblog["blog_help"]["blogh"]; ?>">
                <i class="fa fa-question-circle"></i>
              </a>
            </h3>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-12">
                    <select name="jak_permission[]" multiple="multiple" class="form-control">
                      <option value="0"<?php if (isset($_REQUEST["jak_permission"]) && $_REQUEST["jak_permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog_box_content"]["blogbc24"]; ?></option>
                      <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                        <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && $v["id"] == $_REQUEST["jak_permission"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-success pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["button"]["btn1"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>