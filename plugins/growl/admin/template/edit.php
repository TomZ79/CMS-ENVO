<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
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
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];?>'
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
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=growl', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li class="nav-item">
        <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
          <span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab"]; ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
          <span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlgwl["gwl_box_title"]["gwlbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-4">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-8">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $ENVO_FORM_DATA["title"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-4">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc28"]);
                        ?>

                      </div>
                      <div class="col-md-8">
                        <div class="input-group">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_img', $ENVO_FORM_DATA["previmg"], 'envo_img', 'form-control');
                          ?>

                          <span class="input-group-btn">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=envo_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
                            ?>

													</span>
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
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html->startTag('h3', array('class' => 'box-title'));
                echo $tlgwl["gwl_box_title"]["gwlbt1"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlgwl["gwl_help"]["gwlh1"], 'data-original-title' => $tlgwl["gwl_help"]["gwlh"]));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html->endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <select name="envo_pageid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["pageid"] == '0') ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc1"], $selected);
                          if (isset($ENVO_PAGES) && is_array($ENVO_PAGES)) foreach ($ENVO_PAGES as $z) {

                            $selected = (in_array($z["id"], explode(',', $ENVO_FORM_DATA["pageid"]))) ? TRUE : FALSE;
                            echo $Html->addOption($z["id"], $z["title"], $selected);

                          }
                          ?>

                        </select>
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
                echo $Html->addTag('h3', $tlgwl["gwl_box_title"]["gwlbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc2"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_all', '1', ($ENVO_FORM_DATA["everywhere"] == '1') ? TRUE : FALSE, 'envo_all1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_all1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_all', '0', ($ENVO_FORM_DATA["everywhere"] == '0') ? TRUE : FALSE, 'envo_all2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_all2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc3"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_cookies', '1', ($ENVO_FORM_DATA["remember"] == '1') ? TRUE : FALSE, 'envo_cookies1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_cookies1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_cookies', '0', ($ENVO_FORM_DATA["remember"] == '0') ? TRUE : FALSE, 'envo_cookies2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_cookies2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc4"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <select name="envo_cookiestime" class="form-control selectpicker">

                          <?php for ($i = 1; $i <= 99; $i++) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($i, $i, ($ENVO_FORM_DATA["remembertime"] == $i) ? TRUE : FALSE);

                          } ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc5"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <select name="envo_dur" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption(3000, 3, ($ENVO_FORM_DATA["duration"] == 3000) ? TRUE : FALSE);
                          echo $Html->addOption(4000, 4, ($ENVO_FORM_DATA["duration"] == 4000) ? TRUE : FALSE);
                          echo $Html->addOption(5000, 5, ($ENVO_FORM_DATA["duration"] == 5000) ? TRUE : FALSE);
                          echo $Html->addOption(6000, 6, ($ENVO_FORM_DATA["duration"] == 6000) ? TRUE : FALSE);
                          echo $Html->addOption(7000, 7, ($ENVO_FORM_DATA["duration"] == 7000) ? TRUE : FALSE);
                          echo $Html->addOption(8000, 8, ($ENVO_FORM_DATA["duration"] == 8000) ? TRUE : FALSE);
                          echo $Html->addOption(9000, 9, ($ENVO_FORM_DATA["duration"] == 9000) ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc6"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sticky', '1', ($ENVO_FORM_DATA["sticky"] == '1') ? TRUE : FALSE, 'envo_sticky1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sticky1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sticky', '0', ($ENVO_FORM_DATA["sticky"] == '0') ? TRUE : FALSE, 'envo_sticky2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sticky2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc7"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <select name="envo_class" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption("top-right", $tlgwl["gwl_box_content"]["gwlbc8"], ($ENVO_FORM_DATA["position"] == "top-right") ? TRUE : FALSE);
                          echo $Html->addOption("top-left", $tlgwl["gwl_box_content"]["gwlbc9"], ($ENVO_FORM_DATA["position"] == "top-left") ? TRUE : FALSE);
                          echo $Html->addOption("center", $tlgwl["gwl_box_content"]["gwlbc10"], ($ENVO_FORM_DATA["position"] == "center") ? TRUE : FALSE);
                          echo $Html->addOption("bottom-left", $tlgwl["gwl_box_content"]["gwlbc11"], ($ENVO_FORM_DATA["position"] == "bottom-left") ? TRUE : FALSE);
                          echo $Html->addOption("bottom-right", $tlgwl["gwl_box_content"]["gwlbc12"], ($ENVO_FORM_DATA["position"] == "bottom-right") ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc13"]);
                        ?>

                      </div>
                      <div class="col-md-5">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_color', '1', ($ENVO_FORM_DATA["color"] == '1') ? TRUE : FALSE, 'envo_color1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_color1', $tlgwl["gwl_box_content"]["gwlbc14"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_color', '0', ($ENVO_FORM_DATA["color"] == '0') ? TRUE : FALSE, 'envo_color2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_color2', $tlgwl["gwl_box_content"]["gwlbc15"]);
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
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html->startTag('h3', array('class' => 'box-title'));
                echo $tlgwl["gwl_box_title"]["gwlbt3"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlgwl["gwl_help"]["gwlh1"], 'data-original-title' => $tlgwl["gwl_help"]["gwlh"]));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html->endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <select name="envo_permission[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc16"], $selected);
                          if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

                            $selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["permission"]))) ? TRUE : FALSE;
                            echo $Html->addOption($v["id"], $v["name"], $selected);

                          }
                          ?>

                        </select>
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
                echo $Html->addTag('h3', $tlgwl["gwl_box_title"]["gwlbt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc17"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_datefrom', ($ENVO_FORM_DATA["startdate"]) ? date("Y-m-d H:i", $ENVO_FORM_DATA["startdate"]) : '', 'datepickerFrom', 'form-control', array('readonly' => 'readonly'));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc18"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_dateto', ($ENVO_FORM_DATA["enddate"]) ? date("Y-m-d H:i", $ENVO_FORM_DATA["enddate"]) : '', 'datepickerTo', 'form-control', array('readonly' => 'readonly'));
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
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html->startTag('h3', array('class' => 'box-title'));
                echo $tlgwl["gwl_box_title"]["gwlbt5"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlgwl["gwl_help"]["gwlh1"], 'data-original-title' => $tlgwl["gwl_help"]["gwlh"]));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html->endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc19"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="envo_newsid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["newsid"] == '0') ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc1"], $selected);
                          if (isset($ENVO_NEWS) && is_array($ENVO_NEWS)) foreach ($ENVO_NEWS as $n) {

                            $selected = (in_array($n["id"], explode(',', $ENVO_FORM_DATA["newsid"]))) ? TRUE : FALSE;
                            echo $Html->addOption($n["id"], $n["title"], $selected);

                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc20"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_mainnews', '1', ($ENVO_FORM_DATA["newsmain"] == '1') ? TRUE : FALSE, 'envo_mainnews1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_mainnews1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_mainnews', '0', ($ENVO_FORM_DATA["newsmain"] == '0') ? TRUE : FALSE, 'envo_mainnews2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_mainnews2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <?php if (ENVO_TAGS) { ?>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc21"]);
                          ?>

                        </div>
                        <div class="col-md-7">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_tags', '1', ($ENVO_FORM_DATA["tags"] == '1') ? TRUE : FALSE, 'envo_tags1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_tags1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_tags', '0', ($ENVO_FORM_DATA["tags"] == '0') ? TRUE : FALSE, 'envo_tags2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_tags2', $tl["checkbox"]["chk1"]);
                            ?>

                          </div>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc22"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_search', '1', ($ENVO_FORM_DATA["search"] == '1') ? TRUE : FALSE, 'envo_search1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_search1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_search', '0', ($ENVO_FORM_DATA["search"] == '0') ? TRUE : FALSE, 'envo_search2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_search2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlgwl["gwl_box_content"]["gwlbc23"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sitemap', '1', ($ENVO_FORM_DATA["sitemap"] == '1') ? TRUE : FALSE, 'envo_sitemap1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sitemap1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sitemap', '0', ($ENVO_FORM_DATA["sitemap"] == '0') ? TRUE : FALSE, 'envo_sitemap2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sitemap2', $tl["checkbox"]["chk1"]);
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
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-md-12">
            <?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>