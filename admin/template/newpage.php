<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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
<?php }
if ($errors) { ?>
  <script>
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

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=page', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#cmsPage1" class="active" data-toggle="tab">
          <span class="text"><?= $tl["page_section_tab"]["pagetab"] ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#cmsPage2" class="" data-toggle="tab">
          <span class="text"><?= $tl["page_section_tab"]["pagetab1"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage3" class="" data-toggle="tab">
          <span class="text"><?= $tl["page_section_tab"]["pagetab2"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage4" class="" data-toggle="tab">
          <span class="text"><?= $tl["page_section_tab"]["pagetab3"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage5" class="" data-toggle="tab">
          <span class="text"><?= $tl["page_section_tab"]["pagetab4"] ?></span>
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
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc3"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $_REQUEST["envo_name"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc4"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '1', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '1')) ? TRUE : FALSE, 'envo_showtitle1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '0', ((isset($_REQUEST["envo_showtitle"]) && $_REQUEST["envo_showtitle"] == '0') || !isset($_REQUEST["envo_showtitle"])) ? TRUE : FALSE, 'envo_showtitle2');
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
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc5"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_shownav', '1', ((isset($_REQUEST["envo_shownav"]) && $_REQUEST["envo_shownav"] == '1') || !isset($_REQUEST["envo_shownav"])) ? TRUE : FALSE, 'envo_shownav1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_shownav1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_shownav', '0', ((isset($_REQUEST["envo_shownav"]) && $_REQUEST["envo_shownav"] == '0')) ? TRUE : FALSE, 'envo_shownav2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_shownav2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc6"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showfooter', '1', ((isset($_REQUEST["envo_showfooter"]) && $_REQUEST["envo_showfooter"] == '1') || !isset($_REQUEST["envo_showfooter"])) ? TRUE : FALSE, 'envo_showfooter1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showfooter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showfooter', '0', ((isset($_REQUEST["envo_showfooter"]) && $_REQUEST["envo_showfooter"] == '0')) ? TRUE : FALSE, 'envo_showfooter2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showfooter2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc7"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '1', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '1')) ? TRUE : FALSE, 'envo_showdate1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '0', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '0') || !isset($_REQUEST["envo_showdate"])) ? TRUE : FALSE, 'envo_showdate2');
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
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc8"]);
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
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc11"]);
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
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc13"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtags', '1', ((isset($_REQUEST["envo_showtags"]) && $_REQUEST["envo_showtags"] == '1')) ? TRUE : FALSE, 'envo_showtags1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtags1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtags', '0', ((isset($_REQUEST["envo_showtags"]) && $_REQUEST["envo_showtags"] == '0') || !isset($_REQUEST["envo_showtags"])) ? TRUE : FALSE, 'envo_showtags2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtags2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc15"]);
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_password', $_REQUEST["envo_password"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-12">
                        <select name="envo_catid" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('0', $tl["page_box_content"]["pagebc"], (!$page1) ? TRUE : FALSE);

                          if (isset($ENVO_CAT_NOTUSED) && is_array($ENVO_CAT_NOTUSED)) foreach ($ENVO_CAT_NOTUSED as $v) {
                            echo $Html->addOption($v["id"], $v["name"], ($v["id"] == $page2) ? TRUE : FALSE);
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
            <?php if (ENVO_TAGS) { ?>
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', $tl["page_box_title"]["pagebt2"], 'box-title');
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

                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
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
                          echo $Html->addInput('text', 'envo_tags', (isset($_REQUEST["envo_tags"])) ? $_REQUEST["envo_tags"] : '', 'envo_tags', 'form-control tags', array('data-role' => 'tagsinput'));
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">

                  <?php
                  // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                  echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
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
            <?php include_once "editor_new.php"; ?>
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
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'csseditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_css', (isset($_REQUEST["envo_css"])) ? $_REQUEST["envo_css"] : '', '', '', array('id' => 'envo_css', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
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
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'javaeditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_javascript', (isset($_REQUEST["envo_javascript"])) ? $_REQUEST["envo_javascript"] : '', '', '', array('id' => 'envo_javascript', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt5"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <!-- Moving stuff -->
                <ul class="envo_content_move">

                  <li class="envocontent">
                    <div class="text"><?= $tl["page_box_content"]["pagebc21"] ?></div>
                    <div class="actions">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'corder_new[]', '1', '', 'corder');
                      echo $Html->addInput('hidden', 'real_plugin_id[]', '9999');
                      ?>

                    </div>
                  </li>

                  <li class="envocontent">
                    <div class="envocontent_header"><?= $tl["global_text"]["globaltxt19"] ?></div>
                    <div class="form-group">
                      <label><?= $tl["global_text"]["globaltxt9"] ?></label>
                      <div class="row">
                        <div class="col-sm-4">
                          <select name="envo_shownewsorder" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["envo_shownewsorder"]) && $_REQUEST["envo_shownewsorder"] == "ASC") || !isset($_REQUEST["envo_shownewsorder"])) ? TRUE : FALSE);
                            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["envo_shownewsorder"]) && $_REQUEST["envo_shownewsorder"] == "DESC") ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                        <div class="col-sm-4">
                          <select name="envo_shownewsordern" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('id', $tl["selection"]["sel9"], ((isset($_REQUEST["envo_shownewsordern"]) && ($_REQUEST["envo_shownewsordern"] == 'id')) || !isset($_REQUEST["envo_shownewsordern"])) ? TRUE : FALSE);
                            echo $Html->addOption('title', $tl["selection"]["sel10"], ((isset($_REQUEST["envo_shownewsordern"]) && ($_REQUEST["envo_shownewsordern"] == 'title'))) ? TRUE : FALSE);
                            echo $Html->addOption('time', $tl["selection"]["sel11"], ((isset($_REQUEST["envo_shownewsordern"]) && ($_REQUEST["envo_shownewsordern"] == 'time'))) ? TRUE : FALSE);
                            echo $Html->addOption('hits', $tl["selection"]["sel12"], ((isset($_REQUEST["envo_shownewsordern"]) && ($_REQUEST["envo_shownewsordern"] == 'hits'))) ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                        <div class="col-sm-4">
                          <select name="envo_shownewsmany" class="form-control selectpicker">

                            <?php for ($i = 0; $i <= 10; $i++) {

                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption($i, $i, (isset($_REQUEST["envo_shownewsmany"]) && $_REQUEST["envo_shownewsmany"] == $i) ? TRUE : FALSE);

                            } ?>

                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><?= $tl["global_text"]["globaltxt12"] ?></label>
                      <select name="envo_shownews[]" multiple="multiple" class="form-control">

                        <?php
                        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ((isset($_REQUEST["envo_shownews"]) && ($_REQUEST["envo_shownews"] == '0' || (in_array('0', $_REQUEST["envo_shownews"]))) || !isset($_REQUEST["envo_shownews"]))) ? TRUE : FALSE;

                        echo $Html->addOption('0', $tl["global_text"]["globaltxt13"], $selected);
                        if (isset($ENVO_GET_NEWS) && is_array($ENVO_GET_NEWS)) foreach ($ENVO_GET_NEWS as $gn) {

                          if (isset($_REQUEST["envo_shownews"]) && (in_array($gn["id"], $_REQUEST["envo_shownews"]))) {
                            if (isset($_REQUEST["envo_shownews"]) && (in_array('0', $_REQUEST["envo_shownews"]))) {
                              $selected = FALSE;
                            } else {
                              $selected = TRUE;
                            }
                          } else {
                            $selected = FALSE;
                          }

                          echo $Html->addOption($gn["id"], $gn["title"], $selected);

                        }
                        ?>

                      </select>
                    </div>
                    <div class="actions">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
                      echo $Html->addInput('hidden', 'real_plugin_id[]', '9998');
                      ?>

                    </div>
                  </li>

                  <?php if (isset($ENVO_HOOK_ADMIN_PAGE_NEW) && is_array($ENVO_HOOK_ADMIN_PAGE_NEW)) foreach ($ENVO_HOOK_ADMIN_PAGE_NEW as $hspn) {
                    include_once APP_PATH . $hspn["phpcode"];
                  } ?>

                </ul>

                <!-- END Moving Stuff -->
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt6"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <?php include "sidebar_widget_new.php"; ?>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>