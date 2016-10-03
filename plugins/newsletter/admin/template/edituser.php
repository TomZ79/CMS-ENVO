<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
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

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tl["general"]["g67"]; ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <td><?php echo $tl["user"]["u"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
                <input type="text" name="jak_name" class="form-control" value="<?php echo $JAK_FORM_DATA["name"]; ?>"/>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tl["user"]["u1"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
                <input type="text" name="jak_email" class="form-control" value="<?php echo $JAK_FORM_DATA["email"]; ?>"/>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tl["menu"]["m9"]; ?></td>
            <td>
              <select name="jak_usergroup" class="form-control selectpicker">
                <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
                  <option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $JAK_FORM_DATA["usergroupid"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
              </select>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>