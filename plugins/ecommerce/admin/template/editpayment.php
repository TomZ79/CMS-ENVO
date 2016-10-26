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
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tlec["shop"]["m2"]; ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <td><?php echo $tl["page"]["p"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                <input type="text" name="jak_field" class="form-control"
                       value="<?php echo $JAK_FORM_DATA["field"]; ?>"/>
              </div>
            </td>
          </tr>
          <?php if ($page3 == 1 || $page3 == 2 || $page3 == 6 || $page3 == 7 || $page3 == 10) { ?>
            <tr>
              <td><?php if ($page3 == 1) { ?><?php echo $tlec["shop"]["m24"]; ?><?php } else if ($page3 == 2) { ?><?php echo $tlec["shop"]["m25"]; ?><?php } else { ?><?php echo $tlec["shop"]["m26"]; ?><?php } ?></td>
              <td>
                <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                  <?php include APP_PATH . "admin/template/editorlight_edit.php"; ?>
                </div>
              </td>
            </tr>
          <?php } else if ($page3 == 3 || $page3 == 4 || $page3 == 5 || $page3 == 8 || $page3 == 9) { ?>
            <tr>
              <td><?php if ($page3 == 3 || $page3 == 8 || $page3 == 9) { ?><?php echo $tl["login"]["l5"]; ?><?php } else { ?><?php echo $tl["login"]["l3"]; ?><?php } ?></td>
              <td>
                <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                  <input type="text" name="jak_lcontent" class="form-control"
                         value="<?php echo $JAK_FORM_DATA["field1"]; ?>"/>
                </div>
              </td>
            </tr>
          <?php } ?>
          <?php if ($page3 == 4 || $page3 == 5 || $page3 == 9 || $page3 == 10) { ?>
            <tr>
              <td><?php if ($page3 == 9) {
                  echo $tl["user"]["u4"];
                } elseif ($page3 == 10) {
                  echo $tlec["shop"]["m93"];
                } else {
                  echo $tlec["shop"]["m28"];
                } ?></td>
              <td>
                <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                  <input type="text" name="jak_field2" class="form-control"
                         value="<?php echo $JAK_FORM_DATA["field2"]; ?>"/>
                </div>
              </td>
            </tr>
          <?php } ?>
          <tr>
            <td><?php echo $tlec["shop"]["m29"]; ?></td>
            <td>
              <div class="input-group">
                <input type="text" name="jak_fees" class="form-control" value="<?php echo $JAK_FORM_DATA["fees"]; ?>">
                <span class="input-group-addon">&#37;</span>
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
  </form>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#langTabT a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>