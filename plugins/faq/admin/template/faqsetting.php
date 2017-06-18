<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
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
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
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
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
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
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab3"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab4"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_title', $JAK_SETTING_VAL["faqtitle"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc1"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('jak_lcontent', jak_edit_safe_userpost($JAK_SETTING_VAL["faqdesc"]), '4', '', array('class' => 'form-control'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc2"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_email', $jkv["faqemail"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc3"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <select name="jak_showfaqordern" class="form-control selectpicker">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('id', $tl["selection"]["sel9"], ($JAK_SETTING['showfaqwhat'] == "id") ? TRUE : FALSE);
                              echo $Html->addOption('title', $tl["selection"]["sel10"], ($JAK_SETTING['showfaqwhat'] == "title") ? TRUE : FALSE);
                              echo $Html->addOption('time', $tl["selection"]["sel11"], ($JAK_SETTING['showfaqwhat'] == "time") ? TRUE : FALSE);
                              echo $Html->addOption('hits', $tl["selection"]["sel12"], ($JAK_SETTING['showfaqwhat'] == "hits") ? TRUE : FALSE);
                              ?>

                            </select>
                          </div>
                          <div class="col-md-6">
                            <select name="jak_showfaqorder" class="form-control selectpicker">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('ASC', $tl["selection"]["sel13"], ($JAK_SETTING['showfaqorder'] == "ASC") ? TRUE : FALSE);
                              echo $Html->addOption('DESC', $tl["selection"]["sel14"], ($JAK_SETTING['showfaqorder'] == "DESC") ? TRUE : FALSE);
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
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc5"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'jak_maxpost', $jkv["faqmaxpost"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc6"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
                          <select name="jak_date" class="form-control selectpicker" data-size="7">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($jkv['faqdateformat'] == '') ? TRUE : FALSE);

                            echo $Html->addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($jkv['faqdateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('d F Y', 'd F Y (01 January 2017)', ($jkv['faqdateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html->addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($jkv['faqdateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('l F Y', 'l F Y (Monday January 2017)', ($jkv['faqdateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc7"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">
                          <select name="jak_time" class="form-control selectpicker" data-size="7">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($jkv['downloadtimeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?php echo $tl["selection"]["sel111"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($jkv['faqtimeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($jkv['faqtimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($jkv['faqtimeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($jkv['faqtimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?php echo $tl["selection"]["sel112"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - H:i', ' - H:i ( - 13:00)', ($jkv['faqtimeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($jkv['faqtimeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($jkv['faqtimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
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
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc8"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_faqurl', '1', ($jkv["faqurl"] == '1') ? TRUE : FALSE, 'jak_faqurl1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_faqurl1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_faqurl', '0', ($jkv["faqurl"] == '0') ? TRUE : FALSE, 'jak_faqurl2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_faqurl2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc9"] . ' / ' . $tlf["faq_box_content"]["faqbc10"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_rssitem', $jkv["faqrss"], '', 'form-control');
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
          <div class="col-md-5">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt1"], 'box-title');
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
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc11"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlf["faq_help"]["faqh1"], 'data-original-title' => $tlf["faq_help"]["faqh"]));
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
                          <select name="jak_mid" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('2', $tl["selection"]["sel1"], ($jkv['faqpagemid'] == 2) ? TRUE : FALSE);
                            echo $Html->addOption('4', $tl["selection"]["sel2"], ($jkv['faqpagemid'] == 4) ? TRUE : FALSE);
                            echo $Html->addOption('6', $tl["selection"]["sel3"], ($jkv['faqpagemid'] == 6) ? TRUE : FALSE);
                            echo $Html->addOption('8', $tl["selection"]["sel4"], ($jkv['faqpagemid'] == 8) ? TRUE : FALSE);
                            echo $Html->addOption('10', $tl["selection"]["sel5"], ($jkv['faqpagemid'] == 10) ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc12"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> no-margin">
                          <input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["faqpageitem"]; ?>"/>
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt10"], 'box-title');
                echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
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
                          echo $Html->addInput('text', 'jak_shortmsg', $jkv["faqshortmsg"], '', 'form-control');
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt2"], 'box-title');
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
                echo $Html->addTextarea('jak_css', $jkv["faq_css"], '20', '', array('id' => 'jak_css', 'class' => 'hidden'));
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt3"], 'box-title');
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
                echo $Html->addTextarea('jak_javascript', $jkv["faq_javascript"], '20', '', array('id' => 'jak_javascript', 'class' => 'hidden'));
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt4"], 'box-title');
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