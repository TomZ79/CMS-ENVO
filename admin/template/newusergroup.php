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

  <div class="row">
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
  </div>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <ul class="nav nav-tabs" id="settTab">
      <li class="active"><a href="#general"><?php echo $tl["title"]["t4"]; ?></a></li>
      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
        <li><a href="#plugins">Plugin settings</a></li>
      <?php } ?>
    </ul>

    <div class="tab-content">
      <div id="general" class="tab-pane active fade in">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t18"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["user"]["u"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                        <input type="text" name="jak_name" class="form-control"
                               value="<?php if (!isset($JAK_FORM_DATA["name"]) && isset($_REQUEST["jak_name"])) {
                                 echo $_REQUEST["jak_name"];
                               } elseif (isset($JAK_FORM_DATA["name"])) { ?><?php echo $JAK_FORM_DATA["name"];
                               } ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u6"]; ?></td>
                    <td>
                      <textarea name="jak_lcontent" class="form-control" rows="4"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost($_REQUEST["jak_lcontent"]); ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u37"]; ?></td>
                    <td>
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
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u11"]; ?></td>
                    <td>
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
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <?php if (JAK_TAGS) { ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["user"]["u40"]; ?></h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                    <tr>
                      <td>
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
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="box-footer">
                  <button type="submit" name="save"
                          class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP)) { ?>
        <div id="plugins" class="tab-pane fade">
          <?php if (isset($JAK_HOOK_ADMIN_USERGROUP) && is_array($JAK_HOOK_ADMIN_USERGROUP)) foreach ($JAK_HOOK_ADMIN_USERGROUP as $hs) {
            include_once APP_PATH . $hs['phpcode'];
          } ?>
        </div>
      <?php } ?>
    </div>

  </form>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#settTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });
  </script>

<?php include "footer.php"; ?>