<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-warning',
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab3"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_title', $JAK_SETTING_VAL["blogtitle"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc1"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('jak_lcontent', envo_edit_safe_userpost($JAK_SETTING_VAL["blogdesc"]), '4', '', array('class' => 'form-control'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc2"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_email', $jkv["blogemail"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc3"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <select name="jak_showblogordern" class="form-control selectpicker">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('id', $tl["selection"]["sel9"], ($JAK_SETTING['showblogwhat'] == "id") ? TRUE : FALSE);
                              echo $Html->addOption('title', $tl["selection"]["sel10"], ($JAK_SETTING['showblogwhat'] == "title") ? TRUE : FALSE);
                              echo $Html->addOption('time', $tl["selection"]["sel11"], ($JAK_SETTING['showblogwhat'] == "time") ? TRUE : FALSE);
                              echo $Html->addOption('hits', $tl["selection"]["sel12"], ($JAK_SETTING['showblogwhat'] == "hits") ? TRUE : FALSE);
                              ?>

                            </select>
                          </div>
                          <div class="col-md-6">
                            <select name="jak_showblogorder" class="form-control selectpicker">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('ASC', $tl["selection"]["sel13"], ($JAK_SETTING['showblogorder'] == "ASC") ? TRUE : FALSE);
                              echo $Html->addOption('DESC', $tl["selection"]["sel14"], ($JAK_SETTING['showblogorder'] == "DESC") ? TRUE : FALSE);
                              ?>

                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc4"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_bloglimit" class="form-control selectpicker">

                          <?php for ($i = 0; $i <= 50; $i++) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($i, $i, ($jkv["bloghlimit"] == $i) ? TRUE : FALSE);

                          } ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc5"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_maxpost', $jkv["blogmaxpost"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc6"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                          <select name="jak_date" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($jkv['blogdateformat'] == '') ? TRUE : FALSE);

                            echo $Html->addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($jkv['blogdateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('d F Y', 'd F Y (01 January 2017)', ($jkv['blogdateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html->addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($jkv['blogdateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('l F Y', 'l F Y (Monday January 2017)', ($jkv['blogdateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc7"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <select name="jak_time" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($jkv['blogtimeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?php echo $tl["selection"]["sel111"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($jkv['blogtimeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($jkv['blogtimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($jkv['blogtimeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($jkv['blogtimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?php echo $tl["selection"]["sel112"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - H:i', ' - H:i ( - 13:00)', ($jkv['blogtimeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($jkv['blogtimeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($jkv['blogtimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
                              ?>

                            </optgroup>

                          </select>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc8"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_blogurl', '1', ($jkv["blogurl"] == '1') ? TRUE : FALSE, 'jak_blogurl1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_blogurl1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_blogurl', '0', ($jkv["blogurl"] == '0') ? TRUE : FALSE, 'jak_blogurl2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_blogurl2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc9"] . ' / ' . $tlblog["blog_box_content"]["blogbc10"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_rssitem', $jkv["blogrss"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc11"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlblog["blog_help"]["blogh3"], 'data-original-title' => $tlblog["blog_help"]["blogh"]));
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
                          <select name="jak_mid" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('2', $tl["selection"]["sel1"], ($jkv['blogpagemid'] == 2) ? TRUE : FALSE);
                            echo $Html->addOption('4', $tl["selection"]["sel2"], ($jkv['blogpagemid'] == 4) ? TRUE : FALSE);
                            echo $Html->addOption('6', $tl["selection"]["sel3"], ($jkv['blogpagemid'] == 6) ? TRUE : FALSE);
                            echo $Html->addOption('8', $tl["selection"]["sel4"], ($jkv['blogpagemid'] == 8) ? TRUE : FALSE);
                            echo $Html->addOption('10', $tl["selection"]["sel5"], ($jkv['blogpagemid'] == 10) ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc12"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_item', $jkv["blogpageitem"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt12"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_blogshortmsg', $jkv["blogshortmsg"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

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

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../../../../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang='.$managerlang.'&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
                echo '<br/>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'csseditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('jak_css', $jkv["blog_css"], '20', '', array('id' => 'jak_css', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../../../../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang='.$managerlang.'&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
                echo '<br/>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'javaeditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('jak_javascript', $jkv["blog_javascript"], '20', '', array('id' => 'jak_javascript', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>