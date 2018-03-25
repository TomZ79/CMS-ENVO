<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"]; ?>'
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
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"]; ?>'
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
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li class="nav-item">
        <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab"]; ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab4"]; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage3" role="tab">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab1"]; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage4" role="tab">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab2"]; ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage5" role="tab">
          <span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab3"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', '', '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc25"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '1', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '1') || !isset($_REQUEST["envo_showtitle"])) ? TRUE : FALSE, 'envo_showtitle1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '0', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '0')) ? TRUE : FALSE, 'envo_showtitle2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtitle2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc28"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '1', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '1') || !isset($_REQUEST["envo_showdate"])) ? TRUE : FALSE, 'envo_showdate1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '0', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '0')) ? TRUE : FALSE, 'envo_showdate2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showdate2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc31"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_social', '1', ((isset($_REQUEST["envo_social"]) && $_REQUEST["envo_social"] == '1')) ? TRUE : FALSE, 'envo_social1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_social1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_social', '0', ((isset($_REQUEST["envo_social"]) && $_REQUEST["envo_social"] == '0') || !isset($_REQUEST["envo_social"])) ? TRUE : FALSE, 'envo_social2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_social2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc32"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar', '1', ((isset($_REQUEST["envo_sidebar"]) && $_REQUEST["envo_sidebar"] == '1') || !isset($_REQUEST["envo_sidebar"])) ? TRUE : FALSE, 'envo_sidebar1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar1', $tl["checkbox"]["chk2"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar', '0', ((isset($_REQUEST["envo_sidebar"]) && $_REQUEST["envo_sidebar"] == '0')) ? TRUE : FALSE, 'envo_sidebar2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar2', $tl["checkbox"]["chk3"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc33"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlblog["blog_help"]["blogh4"], 'data-original-title' => $tlblog["blog_help"]["blogh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="input-group">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_img', (isset($_REQUEST["envo_img"])) ? $_REQUEST["envo_img"] : '', 'envo_img', 'form-control');
                          ?>

                          <span class="input-group-btn">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=envo_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
                            ?>

													</span>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc43"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlblog["blog_help"]["blogh5"], 'data-original-title' => $tlblog["blog_help"]["blogh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_imgdesc', (isset($_REQUEST["envo_imgdesc"])) ? $_REQUEST["envo_imgdesc"] : 'Image Preview', 'envo_imgdesc', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html->startTag('h3', array('class' => 'box-title'));
                echo $tlblog["blog_box_title"]["blogbt8"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlblog["blog_help"]["blogh1"], 'data-original-title' => $tlblog["blog_help"]["blogh"]));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html->endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-12">
                        <select name="envo_catid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ((isset($_REQUEST["envo_catid"]) && ($_REQUEST["envo_catid"] == '0' || (in_array('0', $_REQUEST["envo_catid"]))) || !isset($_REQUEST["envo_catid"]))) ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlblog["blog_box_content"]["blogbc37"], $selected);
                          if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $v) {

                            if (isset($_REQUEST["envo_catid"]) && (in_array($v["id"], $_REQUEST["envo_catid"]))) {
                              if (isset($_REQUEST["envo_catid"]) && (in_array('0', $_REQUEST["envo_catid"]))) {
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt9"], 'box-title');
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
                          echo $Html->addInput('text', 'envo_datetime', (isset($_REQUEST["envo_datetime"])) ? $_REQUEST["envo_datetime"] : date("Y-m-d H:i:s"), 'datepickerTime', 'form-control', array('readonly' => 'readonly'));
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt10"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc38"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_datefrom', ($_REQUEST["envo_datefrom"]) ? $_REQUEST["envo_datefrom"] : '', 'datepickerFrom', 'form-control', array('readonly' => 'readonly'));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlblog["blog_box_content"]["blogbc39"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div
                          class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_dateto', ($_REQUEST["envo_dateto"]) ? $_REQUEST["envo_dateto"] : '', 'datepickerTo', 'form-control', array('readonly' => 'readonly'));
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
            <?php if (ENVO_TAGS) { ?>
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt11"], 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Choose tags from predefined list');
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <select name="" id="selecttags1" class="form-control selectpicker">
                            <optgroup label="Poskytovatelé TV">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('skylink', 'Skylink');
                              echo $Html->addOption('freesat', 'freeSAT');
                              echo $Html->addOption('digi-tv', 'Digi TV');
                              ?>

                            </optgroup>
                            <optgroup label="Vysílací technologie">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption('dvb-t/t2', 'DVB-T/T2');
                              echo $Html->addOption('dvb-s/s2', 'DVB-S/S2');
                              echo $Html->addOption('dvb-c', 'DVB-C');
                              echo $Html->addOption('dvb-h', 'DVB-H');
                              ?>

                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Choose tags from list');
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <?php $ENVO_TAG_ALL = envo_tag_name_admin();
                          if ($ENVO_TAG_ALL) { ?>
                            <select name="" id="selecttags2" class="form-control selectpicker">
                              <?php
                              foreach ($ENVO_TAG_ALL as $v) {

                                echo $Html->addOption($v["tag"], $v["tag"]);

                              }
                              ?>

                            </select>
                          <?php } else { ?>
                            <div>Tags cloud is empty!</div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-12">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_tags', (isset($_REQUEST["envo_tags"]) ? $_REQUEST["envo_tags"] : ''), 'envo_tags', 'form-control tags', array('data-role' => 'tagsinput'));
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">

                  <?php
                  // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                  echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                  ?>

                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
            <?php include_once APP_PATH . "admin/template/editor_new.php"; ?>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
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
                echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang='.$managerlang.'&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
                echo '<br/>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'csseditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_css', (isset($_REQUEST["envo_css"])) ? $_REQUEST["envo_css"] : '', '', '', array('id' => 'envo_css', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
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
                echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang='.$managerlang.'&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
                echo '<br/>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'javaeditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_javascript', (isset($_REQUEST["envo_javascript"])) ? $_REQUEST["envo_javascript"] : '', '', '', array('id' => 'envo_javascript', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlblog["blog_box_title"]["blogbt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <?php include APP_PATH . 'admin/template/sidebar_widget_new.php'; ?>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>