<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
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
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
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
      <li class="nav-item">
        <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab"]; ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
          <span class="text"><?php echo $tlrf["reg_section_tab"]["regtab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
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
                      <div class="col-sm-12">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $ENVO_SETTING_VAL["rf_title"], '', 'form-control');
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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc4"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_register', '1', ($setting["rf_active"] == '1') ? TRUE : FALSE, 'envo_register1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_register1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_register', '0', ($setting["rf_active"] == '0') ? TRUE : FALSE, 'envo_register2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_register2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc5"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_simple', '1', ($setting["rf_simple"] == '1') ? TRUE : FALSE, 'envo_simple1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_simple1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_simple', '0', ($setting["rf_simple"] == '0') ? TRUE : FALSE, 'envo_simple2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_simple2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc6"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_usrapprove', '1', ($setting["rf_confirm"] == '1') ? TRUE : FALSE, 'envo_usrapprove1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_usrapprove1', $tl["checkbox"]["chk1"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_usrapprove', '2', ($setting["rf_confirm"] == '2') ? TRUE : FALSE, 'envo_usrapprove2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_usrapprove2', $tlrf["reg_box_content"]["regbc11"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_usrapprove', '3', ($setting["rf_confirm"] == '3') ? TRUE : FALSE, 'envo_usrapprove3');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_usrapprove3', $tlrf["reg_box_content"]["regbc12"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc7"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_redirect" class="form-control">
                          <option value="0"><?php echo $tlrf["reg_box_content"]["regbc29"]; ?></option>
                          <?php if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $c) { ?>
                            <option value="<?php echo $c["id"]; ?>"<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $z) {
                              if ($z["varname"] == 'rf_redirect' && $c["id"] == $z["value"]) { ?> selected="selected"<?php }
                            } ?>><?php echo $c["name"]; ?></option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc8"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_usergroup" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) {
                            if ($v["id"] != '1') {

                              if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $z) {

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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc9"]);
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php

                        if ($setting["adv_editor"]) {

                          // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                          echo $Html->addDiv('', 'htmleditorlight');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_lcontent', (isset($ENVO_SETTING_VAL["rf_welcome"])) ? envo_edit_safe_userpost(htmlspecialchars($ENVO_SETTING_VAL["rf_welcome"])) : '', '', '', array('id' => 'envo_editor_light', 'class' => 'form-control hidden'));

                        } else {

                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_lcontent', (isset($ENVO_SETTING_VAL["rf_welcome"])) ? envo_edit_safe_userpost($ENVO_SETTING_VAL["rf_welcome"]) : '', '40', '', array('id' => 'envoEditor', 'class' => 'envoEditorLight'));

                        }

                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlrf["reg_box_content"]["regbc30"]);
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php

                        if ($setting["adv_editor"]) {

                          // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                          echo $Html->addDiv('', 'htmleditorlight1');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_lcontent1', (isset($ENVO_SETTING_VAL["rf_welcome_email"])) ? envo_edit_safe_userpost(htmlspecialchars($ENVO_SETTING_VAL["rf_welcome_email"])) : '', '', '', array('id' => 'envo_editor_light1', 'class' => 'form-control hidden'));

                        } else {

                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_lcontent1', (isset($ENVO_SETTING_VAL["rf_welcome_email"])) ? envo_edit_safe_userpost($ENVO_SETTING_VAL["rf_welcome_email"]) : '', '40', '', array('id' => 'envoEditor1', 'class' => 'envoEditorLight'));

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
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
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