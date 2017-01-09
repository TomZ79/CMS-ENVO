<?php include "header.php"; ?>

<?php if ($success) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($success["s"])) echo $success["s"];?>',
      }, {
        // settings
        type: 'success',
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
        message: '<?php if (isset($errors["e"])) echo $errors["e"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["mtn_box_title"]["mtnbt"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["mtn_box_content"]["mtnbc"]; ?></strong></div>
                  <div class="col-md-7">
                    <button type="submit" name="optimize" class="btn btn-success"><?php echo $tl["button"]["btn13"]; ?></button>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["mtn_box_content"]["mtnbc1"]; ?></strong></div>
                  <div class="col-md-7">
                    <button type="submit" name="download" class="btn btn-info"><?php echo $tl["button"]["btn14"]; ?></button>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["mtn_box_content"]["mtnbc2"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new"><?php echo $tl["button"]["btn15"]; ?></span>
                        <span class="fileinput-exists"><?php echo $tl["button"]["btn16"]; ?></span>
                        <input type="file" name="uploaddb" accept=".xml">
                      </span>
                      <span class="fileinput-filename"></span>
                      <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                    </div>
                    <button type="submit" name="import" class="btn btn-warning" onclick="if(!confirm('<?php echo $tl["error"]["e35"]; ?>'))return false;"><?php echo $tl["button"]["btn17"]; ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["mtn_box_title"]["mtnbt1"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-12"><?php echo sprintf($tl["mtn_box_content"]["mtnbc3"], $jkv["version"]); ?></div>
                </div>
                <div class="row-form">
                  <div class="col-md-12">
                    <?php include_once('include/cms_update.php'); ?>
                  </div>
                </div>
              </div>
            </div>
            <p></p>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>