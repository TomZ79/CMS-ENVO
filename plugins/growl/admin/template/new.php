<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "e") { ?>
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
      echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=growl', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
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
                          echo $Html->addInput('text', 'jak_title', '', '', 'form-control');
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
                          echo $Html->addInput('text', 'jak_img', (isset($_REQUEST["jak_img"])) ? $_REQUEST["jak_img"] : '', 'jak_img', 'form-control');
                          ?>

                          <span class="input-group-btn">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                        <select name="jak_pageid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ((isset($_REQUEST["jak_pageid"]) && ($_REQUEST["jak_pageid"] == '0' || (in_array('0', $_REQUEST["jak_pageid"]))) || !isset($_REQUEST["jak_pageid"]))) ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc1"], $selected);
                          if (isset($JAK_PAGES) && is_array($JAK_PAGES)) foreach ($JAK_PAGES as $v) {

                            if (isset($_REQUEST["jak_pageid"]) && (in_array($v["id"], $_REQUEST["jak_pageid"]))) {
                              if (isset($_REQUEST["jak_pageid"]) && (in_array('0', $_REQUEST["jak_pageid"]))) {
                                $selected = FALSE;
                              } else {
                                $selected = TRUE;
                              }
                            } else {
                              $selected = FALSE;
                            }

                            echo $Html->addOption($v["id"], $v["title"], $selected);

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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                          echo $Html->addRadio('jak_all', '1', ((isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '1') || !isset($_REQUEST["jak_all"])) ? TRUE : FALSE, 'jak_all1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_all1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_all', '0', ((isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '0')) ? TRUE : FALSE, 'jak_all2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_all2', $tl["checkbox"]["chk1"]);
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
                          echo $Html->addRadio('jak_cookies', '1', ((isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '1')) ? TRUE : FALSE, 'jak_cookies1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_cookies1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_cookies', '0', ((isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '0') || !isset($_REQUEST["jak_cookies"])) ? TRUE : FALSE, 'jak_cookies2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_cookies2', $tl["checkbox"]["chk1"]);
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
                        <select name="jak_cookiestime" class="form-control selectpicker" data-live-search="true" data-size="5">

                          <?php for ($i = 1; $i <= 99; $i++) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($i, $i, (isset($_REQUEST["jak_cookiestime"]) && $_REQUEST["jak_cookiestime"] == $i) ? TRUE : FALSE);

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
                        <select name="jak_dur" class="form-control selectpicker" data-size="5">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption(3000, 3, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 3000) ? TRUE : FALSE);
                          echo $Html->addOption(4000, 4, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 4000) ? TRUE : FALSE);
                          echo $Html->addOption(5000, 5, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 5000) ? TRUE : FALSE);
                          echo $Html->addOption(6000, 6, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 6000) ? TRUE : FALSE);
                          echo $Html->addOption(7000, 7, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 7000) ? TRUE : FALSE);
                          echo $Html->addOption(8000, 8, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 8000) ? TRUE : FALSE);
                          echo $Html->addOption(9000, 9, (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 9000) ? TRUE : FALSE);
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
                          echo $Html->addRadio('jak_sticky', '1', ((isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '1')) ? TRUE : FALSE, 'jak_sticky1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sticky1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_sticky', '0', ((isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '0') || !isset($_REQUEST["jak_sticky"])) ? TRUE : FALSE, 'jak_sticky2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sticky2', $tl["checkbox"]["chk1"]);
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
                        <select name="jak_class" class="form-control selectpicker" data-size="4">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption("top-right", $tlgwl["gwl_box_content"]["gwlbc8"], (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-right") ? TRUE : FALSE);
                          echo $Html->addOption("top-left", $tlgwl["gwl_box_content"]["gwlbc9"], (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-left") ? TRUE : FALSE);
                          echo $Html->addOption("center", $tlgwl["gwl_box_content"]["gwlbc10"], (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "center") ? TRUE : FALSE);
                          echo $Html->addOption("bottom-left", $tlgwl["gwl_box_content"]["gwlbc11"], (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-left") ? TRUE : FALSE);
                          echo $Html->addOption("bottom-right", $tlgwl["gwl_box_content"]["gwlbc12"], (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-right") ? TRUE : FALSE);
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
                          echo $Html->addRadio('jak_color', '1', ((isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '1') || !isset($_REQUEST["jak_color"])) ? TRUE : FALSE, 'jak_color1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_color1', $tlgwl["gwl_box_content"]["gwlbc14"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_color', '0', ((isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '0')) ? TRUE : FALSE, 'jak_color2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_color2', $tlgwl["gwl_box_content"]["gwlbc15"]);
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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                        <select name="jak_permission[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ((isset($_REQUEST["jak_permission"]) && ($_REQUEST["jak_permission"] == '0' || (in_array('0', $_REQUEST["jak_permission"]))) || !isset($_REQUEST["jak_permission"]))) ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc16"], $selected);
                          if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) {

                            if (isset($_REQUEST["jak_permission"]) && (in_array($v["id"], $_REQUEST["jak_permission"]))) {
                              if (isset($_REQUEST["jak_permission"]) && (in_array('0', $_REQUEST["jak_permission"]))) {
                                $selected = FALSE;
                              } else {
                                $selected = TRUE;
                              }
                            } else {
                              $selected = FALSE;
                            }

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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                          echo $Html->addInput('text', 'jak_datefrom', ($_REQUEST["jak_datefrom"]) ? $_REQUEST["jak_datefrom"] : '', 'datepickerFrom', 'form-control', array('readonly' => 'readonly'));
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
                          echo $Html->addInput('text', 'jak_dateto', ($_REQUEST["jak_dateto"]) ? $_REQUEST["jak_dateto"] : '', 'datepickerTo', 'form-control', array('readonly' => 'readonly'));
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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                        <select name="jak_newsid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ((isset($_REQUEST["jak_newsid"]) && ($_REQUEST["jak_newsid"] == '0' || (in_array('0', $_REQUEST["jak_newsid"]))) || !isset($_REQUEST["jak_newsid"]))) ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc1"], $selected);
                          if (isset($JAK_NEWS) && is_array($JAK_NEWS)) foreach ($JAK_NEWS as $n) {

                            if (isset($_REQUEST["jak_newsid"]) && (in_array($n["id"], $_REQUEST["jak_newsid"]))) {
                              if (isset($_REQUEST["jak_newsid"]) && (in_array('0', $_REQUEST["jak_newsid"]))) {
                                $selected = FALSE;
                              } else {
                                $selected = TRUE;
                              }
                            } else {
                              $selected = FALSE;
                            }

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
                          echo $Html->addRadio('jak_mainnews', '1', ((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '1')) ? TRUE : FALSE, 'jak_mainnews1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_mainnews1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_mainnews', '0', ((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '0') || !isset($_REQUEST["jak_mainnews"])) ? TRUE : FALSE, 'jak_mainnews2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_mainnews2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <?php if (JAK_TAGS) { ?>
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
                            echo $Html->addRadio('jak_tags', '1', ((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1')) ? TRUE : FALSE, 'jak_tags1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_tags1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_tags', '0', ((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') || !isset($_REQUEST["jak_tags"])) ? TRUE : FALSE, 'jak_tags2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_tags2', $tl["checkbox"]["chk1"]);
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
                          echo $Html->addRadio('jak_search', '1', ((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '1')) ? TRUE : FALSE, 'jak_search1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_search1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_search', '0', ((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '0') || !isset($_REQUEST["jak_search"])) ? TRUE : FALSE, 'jak_search2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_search2', $tl["checkbox"]["chk1"]);
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
                          echo $Html->addRadio('jak_sitemap', '1', ((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '1')) ? TRUE : FALSE, 'jak_sitemap1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sitemap1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_sitemap', '0', ((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '0') || !isset($_REQUEST["jak_sitemap"])) ? TRUE : FALSE, 'jak_sitemap2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sitemap2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <?php include_once APP_PATH . "admin/template/editor_new.php"; ?>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>