<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
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
    <div class="savebutton hidden-xs">
      <button type="submit" name="save" class="btn btn-success button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTabNewC" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["cat_section_tab"]["cattab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["cat_section_tab"]["cattab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt6"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["cat_box_content"]["catbc"]; ?></strong></div>
                      <div class="col-md-7">
                        <?php include_once "cat_edit.php"; ?>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">
                        <strong><?php echo $tl["cat_box_content"]["catbc1"]; ?></strong>
                        <a class="cms-help" data-content="<?php echo $tl["cat_help"]["cath1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
                          <i class="fa fa-question-circle"></i>
                        </a>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">
                          <input type="text" name="jak_varname" id="jak_varname" class="form-control" value="<?php echo $JAK_FORM_DATA["varname"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <?php if ($JAK_FORM_DATA["pluginid"] > 0) { ?>
                      <input type="hidden" name="jak_url" value=""/>
                    <?php } else { ?>
                    <div class="row-form">
                      <div class="col-md-5">
                        <strong><?php echo $tl["cat_box_content"]["catbc2"]; ?></strong>
                        <a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["cat_help"]["cath2"]; ?>" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
                          <i class="fa fa-question-circle"></i>
                        </a>
                      </div>
                      <div class="col-md-7">
                        <input type="text" name="jak_url" class="form-control" value="<?php echo $JAK_FORM_DATA["exturl"]; ?>"/>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["cat_box_content"]["catbc3"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" id="content" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["cat_box_content"]["catbc4"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_menu1" name="jak_menu" value="1"<?php if ($JAK_FORM_DATA["showmenu"] == '1') { ?> checked="checked"<?php } ?> />
                          <label for="jak_menu1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                          <input type="radio" id="jak_menu2" name="jak_menu" value="0"<?php if ($JAK_FORM_DATA["showmenu"] == '0') { ?> checked="checked"<?php } ?> />
                          <label for="jak_menu2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["cat_box_content"]["catbc5"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_footer1" name="jak_footer" value="1"<?php if ($JAK_FORM_DATA["showfooter"] == '1') { ?> checked="checked"<?php } ?> />
                          <label for="jak_footer1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                          <input type="radio" id="jak_footer2" name="jak_footer" value="0"<?php if ($JAK_FORM_DATA["showfooter"] == '0') { ?> checked="checked"<?php } ?> />
                          <label for="jak_footer2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["cat_box_content"]["catbc6"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="input-group">
                          <input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php echo $JAK_FORM_DATA["catimg"]; ?>">
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
                <h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt3"]; ?>
                  <a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["cat_help"]["cath3"]; ?>" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
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
                          <option value="0"<?php if ($JAK_FORM_DATA["permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cat_box_content"]["catbc7"]; ?></option>
                          <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                            <option value="<?php echo $v["id"]; ?>"<?php if (in_array($v["id"], explode(',', $JAK_FORM_DATA["permission"]))) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
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
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt4"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <button id="copy1" class="btn btn-primary btn-xs pull-right margin-bottom-10" type="button"><?php echo $tl["button"]["btn25"]; ?></button>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">
                        <textarea name="jak_lcontent_meta_desc" class="form-control" id="jak_editor_light_meta_desc" rows="4" maxlength="400"><?php echo jak_edit_safe_userpost(htmlspecialchars($JAK_FORM_DATA["metadesc"])); ?></textarea>
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
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt5"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <input type="text" name="jak_lcontent_meta_key" class="form-control" id="jak_editor_light_meta_key" value="<?php echo jak_edit_safe_userpost(htmlspecialchars($JAK_FORM_DATA["metakey"])); ?>"/>
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
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>