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
          if (isset($errors["e1"])) echo $errors["e1"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

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
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["user"]["u"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                        <input type="text" name="jak_name" class="form-control" value="<?php echo $JAK_FORM_DATA["name"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u6"]; ?></td>
                    <td>
                      <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u37"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_advs" value="1"<?php if ($JAK_FORM_DATA["advsearch"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_advs" value="0"<?php if ($JAK_FORM_DATA["advsearch"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["user"]["u11"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_rate" value="1"<?php if ($JAK_FORM_DATA["canrate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_rate" value="0"<?php if ($JAK_FORM_DATA["canrate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <?php if (JAK_TAGS) { ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["user"]["u40"]; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped v-text-center">
                    <tr>
                      <td>
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="1"<?php if ($JAK_FORM_DATA["tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="0"<?php if ($JAK_FORM_DATA["tags"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="box-footer">
                  <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
        <div id="plugins" class="tab-pane fade">
          <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT) && is_array($JAK_HOOK_ADMIN_USERGROUP_EDIT)) foreach ($JAK_HOOK_ADMIN_USERGROUP_EDIT as $hs) {
            include_once APP_PATH . $hs['phpcode'];
          } ?>
        </div>
      <?php } ?>
    </div>

  </form>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#settTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });
    });
  </script>

<?php include "footer.php"; ?>