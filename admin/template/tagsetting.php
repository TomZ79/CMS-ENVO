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
  <div class="alert bg-danger">
    <?php if (isset($errors["e"])) echo $errors["e"];
    if (isset($errors["e1"])) echo $errors["e1"];
    if (isset($errors["e2"])) echo $errors["e2"];
    if (isset($errors["e3"])) echo $errors["e3"]; ?>
  </div>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">
      <button type="submit" name="save" class="btn btn-success button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTabTagS" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["tag_section_tab"]["tagtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["tag_section_tab"]["tagtab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["tag_box_title"]["tagbt"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["tag_box_content"]["tagbc"]; ?></strong></div>
                      <div class="col-md-7">
                        <?php include_once "title_edit.php"; ?>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["tag_box_content"]["tagbc1"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-success pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["tag_box_title"]["tagbt1"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["tag_box_content"]["tagbc2"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin <?php if (isset($errors["e1"])) echo "has-error"; ?>">
                          <input class="form-control" type="text" name="jak_limit" value="<?php echo $jkv["taglimit"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["tag_box_content"]["tagbc3"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">
                          <input class="form-control" type="text" name="jak_min" value="<?php echo $jkv["tagminfont"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["tag_box_content"]["tagbc4"]; ?></strong></div>
                      <div class="col-md-7" <?php if (isset($errors["e3"])) echo "has-error"; ?>>
                        <input class="form-control" type="text" name="jak_max" value="<?php echo $jkv["tagmaxfont"]; ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-success pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["tag_box_title"]["tagbt2"]; ?></h3>
              </div>
              <div class="box-body">
                <?php include 'sidebar_widget.php'; ?>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-success pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>