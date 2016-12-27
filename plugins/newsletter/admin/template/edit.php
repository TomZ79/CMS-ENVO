<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
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
<?php } if ($page3 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
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
<?php } if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];?>',
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
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["general"]["g20"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tl["title"]["t13"]; ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <td><?php echo $tlnl["nletter"]["d8"]; ?></td>
            <td>
              <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
                <input type="text" name="jak_title" class="form-control" value="<?php echo $JAK_FORM_DATA["title"]; ?>"/>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tl["page"]["p8"]; ?></td>
            <td>
              <div class="radio">
                <label class="checkbox-inline">
                  <input type="radio" name="jak_showdate" value="1"<?php if ($JAK_FORM_DATA["showdate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jak_showdate" value="0"<?php if ($JAK_FORM_DATA["showdate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                </label>
              </div>
            </td>
          </tr>
          <tr>
            <td><?php echo $tlnl["nletter"]["d44"]; ?></td>
            <td>
              <a href="<?php echo (JAK_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(JAK_rewrite::jakParseurl($rowc['varname'], 'fv', $JAK_FORM_DATA['id'], $JAK_FORM_DATA['fullview'], '')); ?>" target="_blank"><?php echo $tlnl["nletter"]["m"]; ?></a>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right">
          <i class="fa fa-save margin-right-5"></i>
          <?php echo $tl["general"]["g20"]; ?>
        </button>
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tl["title"]["t14"]; ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-striped">
          <tr>
            <td>{myweburl} {mywebname} {browserversion} {unsubscribe} {username} {fullname} {useremail}</td>
          </tr>
          <tr>
            <td>
              <textarea name="jak_content" class="form-control jakEditorF" id="nlpost" rows="40"><?php echo $JAK_FORM_DATA["content"]; ?></textarea>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right">
          <i class="fa fa-save margin-right-5"></i>
          <?php echo $tl["general"]["g20"]; ?>
        </button>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>