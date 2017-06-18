<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
  <script type="text/javascript">
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
<?php }
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"]; ?>'
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
      echo $Html->addAnchor('index.php?p=faq', $tl["button"]["btn19"], '', 'btn btn-info button');
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
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tlf["faq_section_tab"]["faqtab1"]; ?></span>
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt6"], 'box-title');
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
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_title', $JAK_FORM_DATA["title"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc24"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_showtitle', '1', ($JAK_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'jak_showtitle1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_showtitle1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_showtitle', '0', ($JAK_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'jak_showtitle2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_showtitle2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <?php if ($JAK_CONTACT_FORM) { ?>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc25"]);
                          ?>

                        </div>
                        <div class="col-md-7">
                          <select name="jak_showcontact" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            $selected = ($JAK_FORM_DATA["showcontact"] == '0') ? TRUE : FALSE;

                            echo $Html->addOption('0', $tlf["faq_box_content"]["faqbc26"], $selected);
                            if (isset($JAK_CONTACT_FORMS) && is_array($JAK_CONTACT_FORMS)) foreach ($JAK_CONTACT_FORMS as $cf) {

                              $selected = ($cf["id"] == $JAK_FORM_DATA["showcontact"]) ? TRUE : FALSE;
                              echo $Html->addOption($cf["id"], $cf["title"], $selected);

                            }
                            ?>

                          </select>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc27"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_showdate', '1', ($JAK_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'jak_showdate1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_showdate1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_showdate', '0', ($JAK_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'jak_showdate2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_showdate2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc28"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_comment', '1', ($JAK_FORM_DATA["comments"] == '1') ? TRUE : FALSE, 'jak_comment1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_comment1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_comment', '0', ($JAK_FORM_DATA["comments"] == '0') ? TRUE : FALSE, 'jak_comment2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_comment2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc29"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_social', '1', ($JAK_FORM_DATA["socialbutton"] == '1') ? TRUE : FALSE, 'jak_social1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_social1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_social', '0', ($JAK_FORM_DATA["socialbutton"] == '0') ? TRUE : FALSE, 'jak_social2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_social2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc30"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="input-group">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_img', $JAK_FORM_DATA["previmg"], 'jak_img', 'form-control');
                          ?>

                          <span class="input-group-btn">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=jak_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager jaktip', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
                            ?>

                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc31"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('jak_delete_rate', '', FALSE, 'jak_delete_rate');
                          echo $Html->addLabel('jak_delete_rate', '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc32"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('jak_delete_comment', '', FALSE, 'jak_delete_comment');
                          echo $Html->addLabel('jak_delete_comment', '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc33"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('jak_delete_hits', '', FALSE, 'jak_delete_hits');
                          echo $Html->addLabel('jak_delete_hits', '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlf["faq_box_content"]["faqbc34"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('jak_update_time', '', FALSE, 'jak_update_time');
                          echo $Html->addLabel('jak_update_time', '');
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
                echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <select name="jak_catid" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($JAK_FORM_DATA["catid"] == '0') ? TRUE : FALSE;

                          echo $Html->addOption('0', $tlf["faq_box_content"]["faqbc35"], $selected);
                          if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {

                            $selected = (in_array($z["id"], explode(',', $JAK_FORM_DATA["catid"]))) ? TRUE : FALSE;
                            echo $Html->addOption($z["id"], $z["name"], $selected);

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
            <?php if (JAK_TAGS) { ?>
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', $tlf["faq_box_title"]["faqbt9"], 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Choose tags from predefined list');
                          ?>

                        </div>
                        <div class="col-md-7">
                          <select name="" id="selecttags1" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">
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
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Choose tags from list');
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php $JAK_TAG_ALL = jak_tag_name_admin();
                          if ($JAK_TAG_ALL) { ?>
                            <select name="" id="selecttags2" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">

                              <?php
                              foreach ($JAK_TAG_ALL as $v) {

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
                        <div class="col-md-12">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_tags', '', '', 'form-control tags', array('data-role' => 'tagsinput'));
                          ?>

                        </div>
                      </div>
                      <?php if ($JAK_TAGLIST) { ?>
                        <div class="row-form">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="tags"><?php echo $tlf["faq_box_content"]["faqbc37"]; ?></label>
                              <div class="controls">
                                <?php echo $JAK_TAGLIST; ?>
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
                  echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                  ?>

                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
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

    <?php
    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
    echo $Html->addInput('hidden', 'jak_oldcatid', $JAK_FORM_DATA["catid"]);
    ?>

  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>