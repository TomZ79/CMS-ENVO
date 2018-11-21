<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page3 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
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
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
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

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html -> addAnchor('index.php?p=blog', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#cmsPage1" class="active" data-toggle="tab">
          <span class="text"><?= $tlblog["blog_section_tab"]["blogtab"] ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#cmsPage2" class="" data-toggle="tab">
          <span class="text"><?= $tlblog["blog_section_tab"]["blogtab4"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage3" class="" data-toggle="tab">
          <span class="text"><?= $tlblog["blog_section_tab"]["blogtab1"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage4" class="" data-toggle="tab">
          <span class="text"><?= $tlblog["blog_section_tab"]["blogtab2"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage5" class="" data-toggle="tab">
          <span class="text"><?= $tlblog["blog_section_tab"]["blogtab3"] ?></span>
        </a>
      </li>
      <li class='nav-item dropdown collapsed-menu hidden'>
        <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
          ... <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
        </div>
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
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc"]);
                        echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_title', $ENVO_FORM_DATA["title"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc25"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_showtitle', '1', ($ENVO_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'envo_showtitle1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_showtitle', '0', ($ENVO_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'envo_showtitle2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_showtitle2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc28"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_showdate', '1', ($ENVO_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'envo_showdate1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_showdate', '0', ($ENVO_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'envo_showdate2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_showdate2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc31"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_social', '1', ($ENVO_FORM_DATA["socialbutton"] == '1') ? TRUE : FALSE, 'envo_social1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_social1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_social', '0', ($ENVO_FORM_DATA["socialbutton"] == '0') ? TRUE : FALSE, 'envo_social2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_social2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc32"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_sidebar', '1', ($ENVO_FORM_DATA["sidebar"] == '1') ? TRUE : FALSE, 'envo_sidebar1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_sidebar1', $tl["checkbox"]["chk2"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html -> addRadio('envo_sidebar', '0', ($ENVO_FORM_DATA["sidebar"] == '0') ? TRUE : FALSE, 'envo_sidebar2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('envo_sidebar2', $tl["checkbox"]["chk3"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc33"]);
                        echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ( 'data-content' => $tlblog["blog_help"]["blogh4"], 'data-original-title' => $tlblog["blog_help"]["blogh"] ));
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="input-group">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_img', $ENVO_FORM_DATA["previmg"], 'envo_img', 'form-control');
                          ?>

                          <span class="input-group-append">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang=' . $managerlang . '&fldr=&field_id=envo_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ( 'type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"] ));
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
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc43"]);
                        echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ( 'data-content' => $tlblog["blog_help"]["blogh5"], 'data-original-title' => $tlblog["blog_help"]["blogh"] ));
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_imgdesc', (!empty($ENVO_FORM_DATA["previmgdesc"])) ? $ENVO_FORM_DATA["previmgdesc"] : 'Image Preview | CMS', 'envo_imgdesc', 'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="row-form p-t-10 p-b-10">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc35"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addCheckbox('envo_delete_hits', '', FALSE, 'envo_delete_hits');
                          echo $Html -> addLabel('envo_delete_hits', '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form p-t-10 p-b-10">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc36"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addCheckbox('envo_update_time', '', FALSE, 'envo_update_time');
                          echo $Html -> addLabel('envo_update_time', '');
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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html -> startTag('h3', array ( 'class' => 'box-title' ));
                echo $tlblog["blog_box_title"]["blogbt8"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ( 'data-content' => $tlblog["blog_help"]["blogh1"], 'data-original-title' => $tlblog["blog_help"]["blogh"] ));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html -> endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-12">
                        <select name="envo_catid[]" multiple="multiple" class="form-control">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["catid"] == '0') ? TRUE : FALSE;

                          echo $Html -> addOption('0', $tlblog["blog_box_content"]["blogbc37"], $selected);
                          if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $z) {

                            $selected = (in_array($z["id"], explode(',', $ENVO_FORM_DATA["catid"]))) ? TRUE : FALSE;
                            echo $Html -> addOption($z["id"], $z["name"], $selected);

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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt9"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-12">
                        <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_datetime', ($ENVO_FORM_DATA["time"]) ? $ENVO_FORM_DATA["time"] : '', 'datepickerTime', 'form-control', array ( 'readonly' => 'readonly' ));
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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt10"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc38"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_datefrom', ($ENVO_FORM_DATA["startdate"]) ? date("Y-m-d H:i", $ENVO_FORM_DATA["startdate"]) : '', 'datepickerFrom', 'form-control', array ( 'readonly' => 'readonly' ));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlblog["blog_box_content"]["blogbc39"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_dateto', ($ENVO_FORM_DATA["enddate"]) ? date("Y-m-d H:i", $ENVO_FORM_DATA["enddate"]) : '', 'datepickerTo', 'form-control', array ( 'readonly' => 'readonly' ));
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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
            <?php if (ENVO_TAGS) { ?>
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt11"], 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Choose tags from predefined list');
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <select name="" id="selecttags1" class="form-control selectpicker">
                            <optgroup label="Poskytovatelé TV">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html -> addOption('skylink', 'Skylink');
                              echo $Html -> addOption('freesat', 'freeSAT');
                              echo $Html -> addOption('digi-tv', 'Digi TV');
                              ?>

                            </optgroup>
                            <optgroup label="Vysílací technologie">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html -> addOption('dvb-t/t2', 'DVB-T/T2');
                              echo $Html -> addOption('dvb-s/s2', 'DVB-S/S2');
                              echo $Html -> addOption('dvb-c', 'DVB-C');
                              echo $Html -> addOption('dvb-h', 'DVB-H');
                              ?>

                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Choose tags from list');
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <?php $ENVO_TAG_ALL = envo_tag_name_admin();
                          if ($ENVO_TAG_ALL) { ?>
                            <select name="" id="selecttags2" class="form-control selectpicker">

                              <?php
                              foreach ($ENVO_TAG_ALL as $v) {

                                echo $Html -> addOption($v["tag"], $v["tag"]);

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
                          echo $Html -> addInput('text', 'envo_tags', '', '', 'form-control tags', array ( 'data-role' => 'tagsinput' ));
                          ?>

                        </div>
                      </div>
                      <?php if ($ENVO_TAGLIST) { ?>
                        <div class="row-form">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="tags"><?= $tlblog["blog_box_content"]["blogbc42"] ?></label>
                              <div class="controls">
                                <?= $ENVO_TAGLIST ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="box-footer">

                  <?php
                  // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                  echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
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
            <?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
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
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html -> addDiv('', 'csseditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html -> addTextarea('envo_css', $ENVO_FORM_DATA["blog_css"], '', '', array ( 'id' => 'envo_css', 'class' => 'hidden' ));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
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
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html -> addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html -> addDiv('', 'javaeditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html -> addTextarea('envo_javascript', $ENVO_FORM_DATA["blog_javascript"], '', '', array ( 'id' => 'envo_javascript', 'class' => 'hidden' ));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
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
                echo $Html -> addTag('h3', $tlblog["blog_box_title"]["blogbt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
    echo $Html -> addInput('hidden', 'envo_oldcatid', $ENVO_FORM_DATA["catid"]);
    ?>

  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>