<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
<?php } ?>

<?php if ($errors) { ?>
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
    <div class="row">
      <div class="col-md-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlum["um"]["d"]; ?></h3>
          </div>
          <div class="box-body" style="height: 111px;">
            <div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">
              <input class="form-control" type="text" name="jak_oldurl" value="<?php echo $JAK_FORM_DATA["urlold"]; ?>"/>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>

      </div>
      <div class="col-md-6">

        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlum["um"]["d1"]; ?></h3>
          </div>
          <div class="box-body">
            <div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e3"])) echo " has-error"; ?>">
              <input class="form-control" type="text" name="jak_newurl" id="jak_newurl" value="<?php echo $JAK_FORM_DATA["urlnew"]; ?>"/>
            </div>
            <table class="table first-column v-text-center">
              <tr>
                <td>Přesměrovat na hlavní stránku</td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_baseurl" id="1" value="1"<?php if ($JAK_FORM_DATA["baseurl"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_baseurl" id="0" value="0"<?php if ($JAK_FORM_DATA["baseurl"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
    </div>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tlum["um"]["d3"]; ?></h3>
      </div>
      <div class="box-body">
        <div class="form-group no-margin">
          <select name="jak_redirect" class="form-control selectpicker">
            <option value="301"<?php if ($JAK_FORM_DATA["redirect"] == '301') { ?> selected="selected"<?php } ?>><?php echo $tlum["um"]["d4"]; ?></option>
            <option value="302"<?php if ($JAK_FORM_DATA["redirect"] == '302') { ?> selected="selected"<?php } ?>><?php echo $tlum["um"]["d5"]; ?></option>
          </select>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    $('#jak_newurl').keyup(function () {
      this.value = this.value.replace(/[^a-zA-Z0-9\-_.]/g,'');
    });
    $('#jak_newurl').bind("keypress click", function(){
      $( "#0" ).prop( "checked", true );
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>