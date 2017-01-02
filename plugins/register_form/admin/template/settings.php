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
<?php } if ($page2 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo ($page1 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["not"]);?>',
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
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlrf["reg_box_title"]["regbt"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <?php include APP_PATH . "admin/template/title_edit.php"; ?>
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
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlrf["reg_box_title"]["regbt2"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc4"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_register" value="1"<?php if ($jkv["rf_active"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_register" value="0"<?php if ($jkv["rf_active"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc5"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_simple" value="1"<?php if ($jkv["rf_simple"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_simple" value="0"<?php if ($jkv["rf_simple"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc6"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_usrapprove" value="1"<?php if ($jkv["rf_confirm"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_usrapprove" value="2"<?php if ($jkv["rf_confirm"] == '2') { ?> checked="checked"<?php } ?> /> <?php echo $tlrf["reg_box_content"]["regbc11"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_usrapprove" value="3"<?php if ($jkv["rf_confirm"] == '3') { ?> checked="checked"<?php } ?> /> <?php echo $tlrf["reg_box_content"]["regbc12"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc7"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_redirect" class="form-control selectpicker" data-size="5">
                          <option value="0"><?php echo $tl["title"]["t12"]; ?></option>
                          <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $c) { ?>
                            <option value="<?php echo $c["id"]; ?>"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $z) {
                              if ($z["varname"] == 'rf_redirect' && $c["id"] == $z["value"]) { ?> selected="selected"<?php }
                            } ?>><?php echo $c["name"]; ?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc8"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_usergroup" class="form-control selectpicker">
                          <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
                            if ($v["id"] != '1') { ?>
                              <option value="<?php echo $v["id"]; ?>"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $z) {
                                if ($z["varname"] == 'rf_usergroup' && $v["id"] == $z["value"]) { ?> selected="selected"<?php }
                              } ?>><?php echo $v["name"]; ?></option><?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlrf["reg_box_content"]["regbc9"]; ?></strong></div>
                      <div class="col-md-7"><?php include APP_PATH . "admin/template/editorlight_edit.php"; ?></div>
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
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["reg_box_title"]["regbt3"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <?php include APP_PATH . 'admin/template/sidebar_widget.php'; ?>
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
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>