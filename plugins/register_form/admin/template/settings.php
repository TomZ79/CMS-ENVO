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
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page2 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
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
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlrf["reg_box_title"]["regbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_title', $JAK_SETTING_VAL["rf_title"], '', 'form-control');
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
                echo $Html->addTag('h3', $tlrf["reg_box_title"]["regbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc4"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_register', '1', ($jkv["rf_active"] == '1') ? TRUE : FALSE, 'jak_register1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_register1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_register', '0', ($jkv["rf_active"] == '0') ? TRUE : FALSE, 'jak_register2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_register2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc5"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_simple', '1', ($jkv["rf_simple"] == '1') ? TRUE : FALSE, 'jak_simple1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_simple1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_simple', '0', ($jkv["rf_simple"] == '0') ? TRUE : FALSE, 'jak_simple2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_simple2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc6"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_usrapprove', '1', ($jkv["rf_confirm"] == '1') ? TRUE : FALSE, 'jak_usrapprove1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_usrapprove1', $tl["checkbox"]["chk1"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_usrapprove', '2', ($jkv["rf_confirm"] == '2') ? TRUE : FALSE, 'jak_usrapprove2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_usrapprove2', $tlrf["reg_box_content"]["regbc11"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_usrapprove', '3', ($jkv["rf_confirm"] == '3') ? TRUE : FALSE, 'jak_usrapprove3');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_usrapprove3', $tlrf["reg_box_content"]["regbc12"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc7"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_redirect" class="form-control">
                          <option value="0"><?php echo $tlrf["reg_box_content"]["regbc29"]; ?></option>
                          <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $c) { ?>
                            <option value="<?php echo $c["id"]; ?>"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $z) {
                              if ($z["varname"] == 'rf_redirect' && $c["id"] == $z["value"]) { ?> selected="selected"<?php }
                            } ?>><?php echo $c["name"]; ?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc8"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_usergroup" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
                            if ($v["id"] != '1') {

                              if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $z) {

                                if ($z["varname"] == 'rf_usergroup' && $v["id"] == $z["value"]) {
                                  $selected = TRUE;
                                } else {
                                  $selected = FALSE;
                                }
                              }

                              echo $Html->addOption($v["id"], $v["name"], $selected);
                            }
                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc9"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php

                        if ($jkv["adv_editor"]) {

                          // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                          echo $Html->addDiv('', 'htmleditorlight');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_lcontent', (isset($JAK_SETTING_VAL["rf_welcome"])) ? jak_edit_safe_userpost(htmlspecialchars($JAK_SETTING_VAL["rf_welcome"])) : '', '', '', array('id' => 'jak_editor_light', 'class' => 'form-control hidden'));

                        } else {

                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_lcontent', (isset($JAK_SETTING_VAL["rf_welcome"])) ? jak_edit_safe_userpost($JAK_SETTING_VAL["rf_welcome"]) : '', '40', '', array('id' => 'jakEditor', 'class' => 'jakEditorLight'));

                        }

                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc30"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php

                        if ($jkv["adv_editor"]) {

                          // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                          echo $Html->addDiv('', 'htmleditorlight1');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_lcontent1', (isset($JAK_SETTING_VAL["rf_welcome_email"])) ? jak_edit_safe_userpost(htmlspecialchars($JAK_SETTING_VAL["rf_welcome_email"])) : '', '', '', array('id' => 'jak_editor_light1', 'class' => 'form-control hidden'));

                        } else {

                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_lcontent1', (isset($JAK_SETTING_VAL["rf_welcome_email"])) ? jak_edit_safe_userpost($JAK_SETTING_VAL["rf_welcome_email"]) : '', '40', '', array('id' => 'jakEditor1', 'class' => 'jakEditorLight'));

                        }

                        ?>

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
                echo $Html->addTag('h3', $tlrf["reg_box_title"]["regbt3"], 'box-title');
                ?>


              </div>
              <div class="box-body">
                <?php include APP_PATH . 'admin/template/sidebar_widget.php'; ?>
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