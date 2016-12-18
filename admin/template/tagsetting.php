<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
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

<?php if ($errors) { ?>
  <div class="alert bg-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php if (isset($errors["e"])) echo $errors["e"];
    if (isset($errors["e1"])) echo $errors["e1"];
    if (isset($errors["e2"])) echo $errors["e2"];
    if (isset($errors["e3"])) echo $errors["e3"]; ?>
  </div>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <ul class="nav nav-tabs" id="cmsTab">
      <li class="active"><a href="#style_tabs-1"><?php echo $tl["menu"]["m2"]; ?></a></li>
      <li><a href="#style_tabs-2"><?php echo $tl["general"]["g89"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="style_tabs-1">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["page"]["p"]; ?></td>
                    <td>
                      <?php include_once "title_edit.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p5"]; ?></td>
                    <td>
                      <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t39"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["tag"]["t3"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                        <input class="form-control" type="text" name="jak_limit"
                               value="<?php echo $jkv["taglimit"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["tag"]["t4"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        <input class="form-control" type="text" name="jak_min"
                               value="<?php echo $jkv["tagminfont"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["tag"]["t5"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                        <input class="form-control" type="text" name="jak_max"
                               value="<?php echo $jkv["tagmaxfont"]; ?>"/>
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
        </div>

      </div>
      <div class="tab-pane" id="style_tabs-2">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php include 'sidebar_widget.php'; ?>
          </div>
          <div class="box-footer">
            <button type="submit" name="save"
                    class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });
  </script>

<?php include "footer.php"; ?>