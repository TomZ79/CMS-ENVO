<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "e") { ?>
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

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">
      <button type="submit" name="save" class="btn btn-success button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTabSearchS" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["ss_section_tab"]["sstab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["ss_section_tab"]["sstab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["ss_box_title"]["ssbt"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["ss_box_content"]["ssbc"]; ?></strong></div>
                      <div class="col-md-7">
                        <?php include_once "title_edit.php"; ?>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["ss_box_content"]["ssbc1"]; ?></strong></div>
                      <div class="col-md-7"><?php include_once "editorlight_edit.php"; ?></div>
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
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["ss_box_title"]["ssbt1"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["ss_box_content"]["ssbc2"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_search1" name="jak_search" value="1"<?php if ($jkv["searchform"] == 1) { ?> checked="checked"<?php } ?> />
                          <label for="jak_search1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                          <input type="radio" id="jak_search2" name="jak_search" value="0"<?php if ($jkv["searchform"] == 0) { ?> checked="checked"<?php } ?> />
                          <label for="jak_search2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["ss_box_content"]["ssbc3"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_ajaxsearch1" name="jak_ajaxsearch" value="1"<?php if ($jkv["ajaxsearch"] == 1) { ?> checked="checked"<?php } ?> />
                          <label for="jak_ajaxsearch1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                          <input type="radio" id="jak_ajaxsearch2" name="jak_ajaxsearch" value="0"<?php if ($jkv["ajaxsearch"] == 0) { ?> checked="checked"<?php } ?> />
                          <label for="jak_ajaxsearch2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["ss_box_content"]["ssbc4"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_fullsearch1" name="jak_fullsearch" value="1"<?php if ($jkv["fulltextsearch"] == 1) { ?> checked="checked"<?php } ?> />
                          <label for="jak_fullsearch1"><?php echo $tl["checkbox"]["chk"]; ?></label>

                          <input type="radio" id="jak_fullsearch2" name="jak_fullsearch" value="0"<?php if ($jkv["fulltextsearch"] == 0) { ?> checked="checked"<?php } ?> />
                          <label for="jak_fullsearch2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

                        </div>
                        <input type="hidden" name="jak_fullsearchold" value="<?php echo $jkv["fulltextsearch"]; ?>"/>
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
                <h3 class="box-title"><?php echo $tl["ss_box_title"]["ssbt2"]; ?></h3>
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