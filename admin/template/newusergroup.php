<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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
          if (isset($errors["e2"])) echo $errors["e2"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="col-md-12">
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <div class="form-group">
        <label for="groupbase"><?php echo $tl["general"]["g61"]; ?></label>
        <div class="input-group">
          <select name="jak_groupbase" id="groupbase" class="form-control selectpicker" data-size="5">
            <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
              if ($z["id"] != '1') { ?>
                <option value="<?php echo $z["id"]; ?>"<?php if (isset($_REQUEST['jak_groupbase']) && $z["id"] == $_REQUEST['jak_groupbase']) { ?> selected="selected"<?php } ?>><?php echo $z["name"]; ?></option><?php }
            } ?>
          </select>
		    <span class="input-group-btn">
		    	<button class="btn btn-info" name="create" type="submit"><?php echo $tl["general"]["g20"]; ?></button>
		    </span>
        </div><!-- /input-group -->
      </div>
    </form>
  </div>

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
          <span class="text"><?php echo $tl["title"]["t4"]; ?></span>
        </a>
      </li>
      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["title_cmd"]["t2"]; ?></span>
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
                <h3 class="box-title"><?php echo $tl["title"]["t18"]; ?></h3>
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
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                          <input type="text" name="jak_name" class="form-control"
                                 value="<?php if (!isset($JAK_FORM_DATA["name"]) && isset($_REQUEST["jak_name"])) {
                                   echo $_REQUEST["jak_name"];
                                 } elseif (isset($JAK_FORM_DATA["name"])) { ?><?php echo $JAK_FORM_DATA["name"];
                                 } ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["user"]["u6"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" class="form-control" rows="4"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost($_REQUEST["jak_lcontent"]); ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["user"]["u37"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_advs" value="1"<?php if (isset($_REQUEST["jak_advs"]) && $_REQUEST["jak_advs"] == '1') { ?> checked="checked"<?php }
                            if (isset($JAK_FORM_DATA["advsearch"]) && $JAK_FORM_DATA["advsearch"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_advs" value="0"<?php if (isset($_REQUEST["jak_advs"]) && $_REQUEST["jak_advs"] == '0') { ?> checked="checked"<?php }
                            if (isset($JAK_FORM_DATA["advsearch"]) && $JAK_FORM_DATA["advsearch"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["user"]["u11"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_rate" value="1"<?php if (isset($_REQUEST["jak_rate"]) && $_REQUEST["jak_rate"] == '1') { ?> checked="checked"<?php }
                            if (isset($JAK_FORM_DATA["canrate"]) && $JAK_FORM_DATA["canrate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_rate" value="0"<?php if (isset($_REQUEST["jak_rate"]) && $_REQUEST["jak_rate"] == '0') { ?> checked="checked"<?php }
                            if (isset($JAK_FORM_DATA["canrate"]) && $JAK_FORM_DATA["canrate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
          <div class="col-md-4">
            <?php if (JAK_TAGS) { ?>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["user"]["u40"]; ?></h3>
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
                          <div class="radio">
                            <label class="checkbox-inline">
                              <input type="radio" name="jak_tags" value="1"<?php if (isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1') { ?> checked="checked"<?php }
                              if (isset($JAK_FORM_DATA["tags"]) && $JAK_FORM_DATA["tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                            </label>
                            <label class="checkbox-inline">
                              <input type="radio" name="jak_tags" value="0"<?php if (isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') { ?> checked="checked"<?php }
                              if (isset($JAK_FORM_DATA["tags"]) && $JAK_FORM_DATA["tags"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
            <?php } ?>
          </div>
        </div>
      </div>

      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP)) { ?>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <?php if (isset($JAK_HOOK_ADMIN_USERGROUP) && is_array($JAK_HOOK_ADMIN_USERGROUP)) foreach ($JAK_HOOK_ADMIN_USERGROUP as $hs) {
              include_once APP_PATH . $hs['phpcode'];
            } ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </form>

<?php include "footer.php"; ?>