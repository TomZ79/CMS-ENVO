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
        <h3 class="box-title"><?php echo $tl["title"]["t13"]; ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <td><?php echo $tlt["st"]["d29"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
                <input type="text" name="jak_name" class="form-control" value="<?php if (isset($_REQUEST["jak_name"])) echo $_REQUEST["jak_name"]; if (isset($JAK_FORM_DATA["name"])) echo $JAK_FORM_DATA["name"]; ?>"/>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tl["general"]["g87"]; ?></td>
            <td>
              <div class="input-group">
                <input type="text" name="jak_img" id="jak_img" data-placement="bottomRight" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; if (isset($JAK_FORM_DATA["img"])) echo $JAK_FORM_DATA["img"]; ?>">
                <span class="input-group-addon"></span>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#jak_img').iconpicker();
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>