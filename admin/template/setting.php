<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
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
<?php }
if ($page1 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
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
<?php }
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($success) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($success["e"])) echo $success["e"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab3"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab4"]; ?></span>
        </a>
      </li>
      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT)) { ?>
      <li role="presentation">
        <a href="#cmsPage6" role="tab" id="cmsPage6-tab" data-toggle="tab" aria-controls="cmsPage6">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab5"]; ?></span>
        </a>
      </li>
      <?php } ?>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                          <input type="text" name="jak_email" class="form-control"
                                 value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                   if ($v["varname"] == 'email') {
                                     echo $v["value"];
                                   }
                                 } ?>" placeholder="<?php echo $tl["setting"]["s"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc1"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_shttp"
                                   value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                              if ($v["varname"] == 'sitehttps' && $v["value"] == '0') { ?> checked="checked"<?php }
                            } ?> /> <?php echo $tl["gs_box_content"]["gsbc3"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_shttp"
                                   value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                              if ($v["varname"] == 'sitehttps' && $v["value"] == '1') { ?> checked="checked"<?php }
                            } ?> /> <?php echo $tl["gs_box_content"]["gsbc4"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc2"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_lang" class="form-control selectpicker" data-size="5">
                          <?php if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) { ?>
                            <option value="<?php echo $lf; ?>"<?php if ($jkv["lang"] == $lf) { ?> selected="selected"<?php } ?>><?php echo ucwords($lf); ?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc5"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_langd" value="1"<?php if ($jkv["langdirection"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["gs_box_content"]["gsbc6"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_langd" value="0"<?php if ($jkv["langdirection"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["gs_box_content"]["gsbc7"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc8"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["dateformat"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc9"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["timeformat"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc10"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_timezone_server" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <?php include_once "timezoneserver.php"; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc11"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_time_ago" value="1"<?php if ($jkv["time_ago_show"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_time_ago" value="0"<?php if ($jkv["time_ago_show"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc12"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_hvm" value="1"<?php if ($jkv["hvm"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_hvm" value="0"<?php if ($jkv["hvm"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
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
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt1"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc13"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <select name="jak_mid" class="form-control selectpicker">
                            <option value="2"<?php if ($jkv["adminpagemid"] == 2) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel1"]; ?>
                            </option>
                            <option value="4"<?php if ($jkv["adminpagemid"] == 4) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel2"]; ?>
                            </option>
                            <option value="6"<?php if ($jkv["adminpagemid"] == 6) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel3"]; ?>
                            </option>
                            <option value="8"<?php if ($jkv["adminpagemid"] == 8) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel4"]; ?>
                            </option>
                            <option value="10"<?php if ($jkv["adminpagemid"] == 10) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel5"]; ?>
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc14"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["adminpageitem"]; ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt2"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc15"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_contact"
                                   value="1"<?php if ($jkv["contactform"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_contact" value="0"<?php if ($jkv["contactform"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
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
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt3"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc16"]; ?></strong></div>
                      <div class="col-md-6">
                        <select name="jak_shownews" class="form-control selectpicker" data-size="5">
                          <?php for ($i = 0; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i ?>"<?php if ($jkv["shownews"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt4"]; ?></h3>
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
                        <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                          <input type="text" name="jak_shortmsg" class="form-control" value="<?php echo $jkv["shortmsg"]; ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt5"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc17"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_rss" value="1"<?php if ($jkv["rss"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_rss" value="0"<?php if ($jkv["rss"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc18"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">
                          <input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["rssitem"]; ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt6"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc20"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_editor" value="1"<?php if ($jkv["adv_editor"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_editor" value="0"<?php if ($jkv["adv_editor"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc21"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_acetheme" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc22"]; ?>">
                            <option value="chrome" <?php if ($jkv["acetheme"] == 'chrome') { ?> selected="selected"<?php } ?>>Chrome</option>
                          </optgroup>
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc23"]; ?>">
                            <option value="cobalt" <?php if ($jkv["acetheme"] == 'cobalt') { ?> selected="selected"<?php } ?>>Cobalt</option>
                            <option value="monokai" <?php if ($jkv["acetheme"] == 'monokai') { ?> selected="selected"<?php } ?>>Monokai</option>
                            <option value="vibrant_ink" <?php if ($jkv["acetheme"] == 'vibrant_ink') { ?> selected="selected"<?php } ?>>Vibrant Ink</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc24"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <input type="text" name="jak_acetabSize" class="form-control" value="<?php echo $jkv["acetabSize"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc25"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <input type="text" name="jak_acewraplimit" class="form-control" value="<?php echo $jkv["acewraplimit"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc26"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_acegutter" value="1"<?php if ($jkv["acegutter"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_acegutter" value="0"<?php if ($jkv["acegutter"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc27"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_aceactiveline" value="1"<?php if ($jkv["aceactiveline"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_aceactiveline" value="0"<?php if ($jkv["aceactiveline"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc28"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_aceinvisible" value="1"<?php if ($jkv["aceinvisible"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_aceinvisible" value="0"<?php if ($jkv["aceinvisible"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
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
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt7"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc30"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_smpt" value="0"<?php if ($jkv["smtp_or_mail"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["gs_box_content"]["gsbc39"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_smpt" value="1"<?php if ($jkv["smtp_or_mail"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["gs_box_content"]["gsbc40"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc31"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="text" class="form-control" name="jak_host" value="<?php echo $jkv["smtp_host"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc32"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="text" name="jak_port" class="form-control" value="<?php echo $jkv["smtp_port"]; ?>" placeholder="25"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc33"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_alive" value="1"<?php if ($jkv["smtp_alive"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_alive" value="0"<?php if ($jkv["smtp_alive"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc34"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_auth" value="1"<?php if ($jkv["smtp_auth"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_auth" value="0"<?php if ($jkv["smtp_auth"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc35"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="text" name="jak_prefix" class="form-control" value="<?php echo $jkv["smtp_prefix"]; ?>" placeholder="ssl/tls/true/false"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc36"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="text" name="jak_smtpusername" class="form-control" value="<?php echo $jkv["smtp_user"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc37"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="password" name="jak_smtppassword" class="form-control" value="<?php echo $jkv["smtp_password"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc38"]; ?></strong></div>
                      <div class="col-md-7">
                        <button type="submit" name="testMail" class="btn btn-success" id="sendTM">
                          <i id="loader" class="fa fa-spinner fa-pulse"></i> <?php echo $tl["button"]["btn3"]; ?>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-5">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt8"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc50"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_loginside" value="1"<?php if ($jkv["showloginside"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_loginside" value="0"<?php if ($jkv["showloginside"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc51"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sprint" value="1"<?php if ($jkv["printme"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sprint" value="0"<?php if ($jkv["printme"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["gs_box_content"]["gsbc52"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_smilies" value="1"<?php if ($jkv["usr_smilies"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_smilies" value="0"<?php if ($jkv["usr_smilies"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc53"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="jak_avatwidth" class="form-control"
                                     value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                       if ($v["varname"] == 'useravatwidth') {
                                         echo $v["value"];
                                       }
                                     } ?>" placeholder="<?php echo $tl["placeholder"]["p5"]; ?>"/>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="jak_avatheight" class="form-control"
                                     value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                       if ($v["varname"] == 'useravatheight') {
                                         echo $v["value"];
                                       }
                                     } ?>" placeholder="<?php echo $tl["placeholder"]["p6"]; ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt9"]; ?></h3>
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
                        <label for=""><?php echo $tl["gs_box_content"]["gsbc54"]; ?></label>
                        <textarea name="ip_block" cols="50" rows="5" class="form-control txtautogrow" placeholder="<?php echo $tl["placeholder"]["p7"]; ?>"><?php echo $jkv["ip_block"]; ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for=""><?php echo $tl["gs_box_content"]["gsbc55"]; ?></label>
                        <textarea name="email_block" cols="50" rows="4" class="form-control txtautogrow" placeholder="<?php echo $tl["placeholder"]["p8"]; ?>"><?php echo $jkv["email_block"]; ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for=""><?php echo $tl["gs_box_content"]["gsbc56"]; ?></label>
                        <textarea name="username_block" cols="50" rows="3" class="form-control txtautogrow" placeholder="<?php echo $tl["placeholder"]["p9"]; ?>"><?php echo $jkv["username_block"]; ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt10"]; ?></h3>
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
                        <textarea name="jak_analytics" cols="60" rows="5" class="form-control txtautogrow"><?php echo $jkv["analytics"]; ?></textarea>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt11"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_heatmap" value="1"<?php if ($jkv["heatmap"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_heatmap" value="0"<?php if ($jkv["heatmap"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="index.php?p=setting&amp;sp=trunheat" class="btn btn-warning btn-sm"><?php echo $tl["button"]["btn2"]; ?></a>
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT) && is_array($JAK_HOOK_ADMIN_SETTING_EDIT)) foreach ($JAK_HOOK_ADMIN_SETTING_EDIT as $hs) { ?>
        <div role="tabpanel" class="tab-pane fade" id="cmsPage6" aria-labelledby="cmsPage6-tab">
          <?php include_once APP_PATH . $hs['phpcode']; ?>
        </div>
      <?php } ?>
    </div>
  </form>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark hidden-xs">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar1" data-toggle="tab"><strong>1.</strong></a></li>
      <li><a href="#control-sidebar2" data-toggle="tab"><strong>2.</strong></a></li>
      <li><a href="#control-sidebar3" data-toggle="tab"><strong>3.</strong></a></li>
      <li><a href="#control-sidebar4" data-toggle="tab"><strong>4.</strong></a></li>
      <li><a href="#control-sidebar5" data-toggle="tab"><strong>5.</strong></a></li>
      <li><a href="#control-sidebar6" data-toggle="tab"><strong>6.</strong></a></li>
      <li><a href="#control-sidebar7" data-toggle="tab"><strong>7.</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Tab 1. -->
      <div class="tab-pane active" id="control-sidebar1">
        <h4><?php echo $tl["title"]["t4"]; ?></h4>
        <p>Obecná nastavení pro ACP a webovou síť.</p>
        <hr>

        <!-- Emailová adresa -->
        <h5><strong><?php echo $tl["setting"]["s"]; ?></strong></h5>
        <p></p>

        <!-- HTTP or HTTPS -->
        <h5><strong><?php echo $tl["setting"]["s27"]; ?></strong></h5>
        <p></p>

        <!-- Jazyk -->
        <h5><strong><?php echo $tl["setting"]["s2"]; ?></strong></h5>
        <p>Výběr jazyka pro Administrační rozhraní ACP</p>

        <!-- Směr Textu -->
        <h5><strong><?php echo $tl["setting"]["s17"]; ?></strong></h5>
        <p></p>

        <!-- Formát Datumu -->
        <h5><strong><?php echo $tl["setting"]["s4"]; ?></strong></h5>
        <p>Formátu data.</p>

        <!-- Formát Času -->
        <h5><strong><?php echo $tl["setting"]["s5"]; ?></strong></h5>
        <p>Formát času.</p>

        <!-- Časová Zóna -->
        <h5><strong><?php echo $tl["setting"]["s31"]; ?></strong></h5>
        <p>Výběr časové zóny.</p>

        <!-- Zobrazení data a času -->
        <h5><strong><?php echo $tl["general"]["g138"]; ?></strong></h5>
        <p>Zobrazí čas ve článcích a stránkách buď dle formátu data a času nebo zobrazní čas článku před kolika hodinami byl článek zadán.</p>

        <!-- Captcha -->
        <h5><strong><?php echo $tl["menu"]["m21"]; ?></strong></h5>
        <p></p>

        <!-- Zobrazit Formulář -->
        <h5><strong><?php echo $tl["setting"]["s8"]; ?></strong></h5>
        <p>Zobrazí nabídku na zobrazení kontaktního formuláře v layoutu stránky a v jednotlivých pluginech.</p>

        <!-- Choose how many -->
        <h5><strong><?php echo $tl["title"]["t20"]; ?></strong></h5>
        <p>Nastavení zobrazení počtu zpráv v:</p>
        <p>
        <ul>
          <li>Web Site - Style Manager - Content Block - News (footer Widget)</li>
        </ul>
        </p>
        <p>TIP: Pokud použijeme PHP kódy v template pro zobrazení News-Zpráv, bude i toto nastavení aktivní pro naše template.</p>

        <!-- Short Message Length -->
        <h5><strong><?php echo $tl["title"]["t47"]; ?></strong></h5>
        <p>Nastavení počtu zobrazených znaků v seznamu článku pro:</p>
        <p>
        <ul>
          <li>News - Zprávy</li>
          <li>Blog - Novinky</li>
          <li>Download - Ke Stažení</li>
          <li>FAWQ - Časté dotazy</li>
          <li>Ticketing</li>
          <li>Gallery - Fotogalerie</li>
          <li>Tags - Tagy (Štítky)</li>
          <li>RSS - RSS zprávy</li>
        </ul>
        </p>

        <!-- Aktivovat RSS -->
        <h5><strong><?php echo $tl["title"]["t40"]; ?></strong></h5>
        <p>Aktivace RSS zpráv. Aktivací této položky budou RSS zprávy dostupné pouze pro všeobecné stránky a nebude RSS dostupné pro:</p>
        <p>
        <ul>
          <li>News - Zprávy</li>
          <li>Všechny pluginy (např: Blog, ...)</li>
        </ul>
        </p>

        <!-- Items -->
        <h5><strong><?php echo $tl["general"]["g41"]; ?></strong></h5>
        <p>Počet zobrazených posledních položek RSS Zpráv</p>

        <!-- Page Mid Range -->
        <h5><strong><?php echo $tl["title"]["t29"]; ?></strong></h5>
        <p></p>

        <!-- Items per Page -->
        <h5><strong><?php echo $tl["setting"]["s12"]; ?></strong></h5>
        <p></p>

      </div>
      <!-- Tab 2. -->
      <div class="tab-pane" id="control-sidebar2">
        <h4><?php echo $tl["setting_cmd"]["s50"]; ?></h4>
        <p>Nastavení ACE Editoru. Tento editor umožňuje pracovat se zdrojovým html kódem stránek.</p>
        <hr>

        <!-- Aktivovat Rozšířený Editor (ACE editor) -->
        <h5><strong><?php echo $tl["setting"]["s10"]; ?></strong></h5>
        <p>Aktivace ACE Editoru.</p>

        <!-- Color Themes -->
        <h5><strong><?php echo $tl["setting_cmd"]["s51"]; ?></strong></h5>
        <p>Výběr barevného tématu ACE Editoru.</p>

        <!-- ACE Tab Size -->
        <h5><strong><?php echo $tl["setting_cmd"]["s52"]; ?></strong></h5>
        <p>Nastavení velikosti odsazení.</p>

        <!-- Set Wrap Limit -->
        <h5><strong><?php echo $tl["setting_cmd"]["s53"]; ?></strong></h5>
        <p></p>

        <!-- Show Gutter -->
        <h5><strong><?php echo $tl["setting_cmd"]["s54"]; ?></strong></h5>
        <p></p>

        <!-- Highlight Active Line -->
        <h5><strong><?php echo $tl["setting_cmd"]["s55"]; ?></strong></h5>
        <p></p>

        <!-- Show Invisible -->
        <h5><strong><?php echo $tl["setting_cmd"]["s56"]; ?></strong></h5>
        <p></p>
      </div>
      <!-- Tab 3. -->
      <div class="tab-pane" id="control-sidebar3">
        <h4><?php echo $tl["setting"]["s21"]; ?></h4>
        <hr>

        <!-- Protokol pro Email -->
        <h5><strong><?php echo $tl["setting"]["s22"]; ?></strong></h5>
        <p></p>

        <!-- Host -->
        <h5><strong><?php echo $tl["setting"]["s25"]; ?></strong></h5>
        <p></p>

        <!-- Port -->
        <h5><strong><?php echo $tl["setting"]["s26"]; ?></strong></h5>
        <p></p>

        <!-- Keep SMTP alive? -->
        <h5><strong><?php echo $tl["setting"]["s32"]; ?></strong></h5>
        <p></p>

        <!-- SMTP Authentication -->
        <h5><strong><?php echo $tl["setting"]["s33"]; ?></strong></h5>
        <p></p>

        <!-- SMTP Server Prefix -->
        <h5><strong><?php echo $tl["setting"]["s34"]; ?></strong></h5>
        <p></p>

        <!-- SMTP Username -->
        <h5><strong><?php echo $tl["setting"]["s39"]; ?></strong></h5>
        <p></p>

        <!-- SMPT Password -->
        <h5><strong><?php echo $tl["setting"]["s40"]; ?></strong></h5>
        <p></p>

        <!-- Test Email Settings -->
        <h5><strong><?php echo $tl["setting"]["s41"]; ?></strong></h5>
        <p></p>

      </div>
      <!-- Tab 4. -->
      <div class="tab-pane" id="control-sidebar4">
        <h4><?php echo $tl["title"]["t23"]; ?></h4>
        <hr>

        <!-- Show Login in Sidebar -->
        <h5><strong><?php echo $tl["setting"]["s36"]; ?></strong></h5>
        <p></p>

        <!-- Aktivovat Tiskové Funkce -->
        <h5><strong><?php echo $tl["setting"]["s35"]; ?></strong></h5>
        <p>Aktivace tisknutí stránky. Pokud je tato položka aktivní zobrazí se na dané stránce tlačítko pro tisk.</p>

        <!-- Parse Smilies -->
        <h5><strong><?php echo $tl["setting"]["s1"]; ?></strong></h5>
        <p></p>

        <!-- Avatar Size -->
        <h5><strong><?php echo $tl["setting"]["s14"]; ?></strong></h5>
        <p></p>

        <!-- IP Block List -->
        <h5><strong><?php echo $tl["general"]["g95"]; ?></strong></h5>
        <p></p>

        <!-- Email Block List -->
        <h5><strong><?php echo $tl["general"]["g96"]; ?></strong></h5>
        <p></p>

        <!-- Prohibited Usernames -->
        <h5><strong><?php echo $tl["general"]["g137"]; ?></strong></h5>
        <p></p>

      </div>
      <!-- Tab 5. -->
      <div class="tab-pane" id="control-sidebar5">
        <h4><?php echo $tl["general"]["g98"]; ?></h4>
        <hr>

        <h5><strong><?php echo $tl["general"]["g127"]; ?></strong></h5>
        <p></p>

        <h5><strong><?php echo $tl["general"]["g128"]; ?></strong></h5>
        <p></p>

      </div>
      <!-- Tab 6. -->
      <div class="tab-pane" id="control-sidebar6">
        <h4><?php echo $tl["title_cmd"]["t2"]; ?></h4>
        <hr>
        <p></p>

      </div>
      <!-- Tab 7. -->
      <div class="tab-pane" id="control-sidebar7">
        <h4><?php echo $tl["general_cmd"]["g14"]; ?></h4>
        <hr>
        <p>Ke spojení na Facebook je využíván Feed Dialog, který ovšem vyžaduje mít přidanou webovou síť na Developers SDK Facebook.</p>
        <p>Pro sdílení článků na Facebooku je využíván jednoduchý Share Link Dialog ( sharer.php )</p>
        <p>V následujícím seznamu částí CMS není využíván Share Link Dialog, ale SDK spojení - Feed Dialog:</p>
        <ul>
          <li>Plugin Download -  pro sdílení webu před stažením dokumentu.</li>
        </ul>


      </div>
    </div>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <script type="text/javascript">
    $(document).ready(function () {

      $(".txtautogrow").autoGrow();

      $("#loader").hide();

      <!-- JavaScript to disable send button and show loading.gif image -->
      $("#sendTM").click(function () {
        $("#loader").show();
        $('#sendTM').attr("disabled", "disabled");
        $('.jak_form').submit();
      });

    });
  </script>

<?php include "footer.php"; ?>