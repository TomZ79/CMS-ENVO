<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "e") { ?>
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
        icon: 'fa fa-warning',
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];
          if (isset($errors["e8"])) echo $errors["e8"];
          if (isset($errors["e9"])) echo $errors["e9"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php }
if ($success) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'pg-mail',
        message: '<?php if (isset($success["e"])) echo $success["e"];?>'
      }, {
        // settings
        type: 'success',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab3"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab4"]; ?></span>
        </a>
      </li>

      <li role="presentation">
        <a href="#cmsPage6" role="tab" id="cmsPage6-tab" data-toggle="tab" aria-controls="cmsPage6">
          <span class="text"><?php echo $tl["gs_section_tab"]["gstab6"]; ?></span>
        </a>
      </li>
      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT)) { ?>
        <li role="presentation">
          <a href="#cmsPage7" role="tab" id="cmsPage7-tab" data-toggle="tab" aria-controls="cmsPage7">
            <span class="text"><?php echo $tl["gs_section_tab"]["gstab5"]; ?></span>
          </a>
        </li>
      <?php } ?>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                          <input type="text" name="jak_email" class="form-control" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                            if ($v["varname"] == 'email') {
                              echo $v["value"];
                            }
                          } ?>" placeholder="<?php echo $tl["placeholder"]["p13"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc1"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <input type="radio" id="jak_shttp1" name="jak_shttp" value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '0') { ?> checked="checked"<?php }
                          } ?> />
                          <label for="jak_shttp1"><?php echo $tl["gs_box_content"]["gsbc3"]; ?></label>

                          <input type="radio" id="jak_shttp2" name="jak_shttp" value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '1') { ?> checked="checked"<?php }
                          } ?> />
                          <label for="jak_shttp2"><?php echo $tl["gs_box_content"]["gsbc4"]; ?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc2"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="jak_lang" class="form-control selectpicker" data-size="5">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) {
                              echo $Html->addOption($lf, ucwords($lf), ($JAK_SETTING_VAL["lang"] == $lf) ? TRUE : FALSE);
                            }
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc19"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="jak_locale" class="form-control selectpicker" data-size="5">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('cs_CZ', 'cs_CZ', ($JAK_SETTING_VAL["locale"] == 'cs_CZ') ? TRUE : FALSE);
                            echo $Html->addOption('en_GB', 'en_GB', ($JAK_SETTING_VAL["locale"] == 'en_GB') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc8"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                          <select name="jak_date" class="form-control selectpicker" data-size="7">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($JAK_SETTING_VAL['dateformat'] == '') ? TRUE : FALSE);

                            echo $Html->addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($JAK_SETTING_VAL['dateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('d F Y', 'd F Y (01 January 2017)', ($JAK_SETTING_VAL['dateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html->addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($JAK_SETTING_VAL['dateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('l F Y', 'l F Y (Monday January 2017)', ($JAK_SETTING_VAL['dateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc9"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">
                          <select name="jak_time" class="form-control selectpicker" data-size="7">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($JAK_SETTING_VAL['timeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?php echo $tl["selection"]["sel111"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($JAK_SETTING_VAL['timeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($JAK_SETTING_VAL['timeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($JAK_SETTING_VAL['timeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($JAK_SETTING_VAL['timeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?php echo $tl["selection"]["sel112"]; ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - H:i', ' - H:i ( - 13:00)', ($JAK_SETTING_VAL['timeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($JAK_SETTING_VAL['timeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($JAK_SETTING_VAL['timeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
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
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc10"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_timezone_server" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <?php include_once "timezoneserver.php"; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc11"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_time_ago', '1', ($JAK_SETTING_VAL["time_ago_show"] == '1') ? TRUE : FALSE, 'jak_time_ago1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_time_ago1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_time_ago', '0', ($JAK_SETTING_VAL["time_ago_show"] == '0') ? TRUE : FALSE, 'jak_time_ago2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_time_ago2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc12"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_hvm', '1', ($JAK_SETTING_VAL["hvm"] == '1') ? TRUE : FALSE, 'jak_hvm1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_hvm1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_hvm', '0', ($JAK_SETTING_VAL["hvm"] == '0') ? TRUE : FALSE, 'jak_hvm2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_hvm2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt1"], 'box-title');
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
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc13"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["gs_help"]["gsh2"], 'data-original-title' => $tl["gs_help"]["gsh"]));
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
                          <select name="jak_mid" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('2', $tl["selection"]["sel1"], ($JAK_SETTING_VAL['adminpagemid'] == 2) ? TRUE : FALSE);
                            echo $Html->addOption('4', $tl["selection"]["sel2"], ($JAK_SETTING_VAL['adminpagemid'] == 4) ? TRUE : FALSE);
                            echo $Html->addOption('6', $tl["selection"]["sel3"], ($JAK_SETTING_VAL['adminpagemid'] == 6) ? TRUE : FALSE);
                            echo $Html->addOption('8', $tl["selection"]["sel4"], ($JAK_SETTING_VAL['adminpagemid'] == 8) ? TRUE : FALSE);
                            echo $Html->addOption('10', $tl["selection"]["sel5"], ($JAK_SETTING_VAL['adminpagemid'] == 10) ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc14"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_item', $JAK_SETTING_VAL["adminpageitem"], '', 'form-control');
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
          <div class="col-md-4">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc15"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_contact', '1', ($JAK_SETTING_VAL["contactform"] == '1') ? TRUE : FALSE, 'jak_contact1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_contact1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_contact', '0', ($JAK_SETTING_VAL["contactform"] == '0') ? TRUE : FALSE, 'jak_contact2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_contact2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc16"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <select name="jak_shownews" class="form-control selectpicker" data-size="5">

                          <?php for ($i = 0; $i <= 10; $i++) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($i, $i, ($JAK_SETTING_VAL["shownews"] == $i) ? TRUE : FALSE);

                          } ?>

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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt4"], 'box-title');
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
                          echo $Html->addInput('text', 'jak_shortmsg', $JAK_SETTING_VAL["shortmsg"], '', 'form-control');
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt5"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc17"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_rss', '1', ($JAK_SETTING_VAL["rss"] == '1') ? TRUE : FALSE, 'jak_rss1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_rss1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_rss', '0', ($JAK_SETTING_VAL["rss"] == '0') ? TRUE : FALSE, 'jak_rss2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_rss2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc18"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_rssitem', $JAK_SETTING_VAL["rssitem"], '', 'form-control');
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt6"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc20"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_editor', '1', ($JAK_SETTING_VAL["adv_editor"] == '1') ? TRUE : FALSE, 'jak_editor1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_editor1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_editor', '0', ($JAK_SETTING_VAL["adv_editor"] == '0') ? TRUE : FALSE, 'jak_editor2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_editor2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc21"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_acetheme" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc22"]; ?>">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('chrome', 'Chrome', ($JAK_SETTING_VAL["acetheme"] == 'chrome') ? TRUE : FALSE);
                            ?>

                          </optgroup>
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc23"]; ?>">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('cobalt', 'Cobalt', ($JAK_SETTING_VAL["acetheme"] == 'cobalt') ? TRUE : FALSE);
                            echo $Html->addOption('monokai', 'Monokai', ($JAK_SETTING_VAL["acetheme"] == 'monokai') ? TRUE : FALSE);
                            echo $Html->addOption('vibrant_ink', 'Vibrant Ink', ($JAK_SETTING_VAL["acetheme"] == 'vibrant_ink') ? TRUE : FALSE);
                            ?>

                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc24"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_acetabSize', $JAK_SETTING_VAL["acetabSize"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc25"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_acewraplimit', $JAK_SETTING_VAL["acewraplimit"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc26"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_acegutter', '1', ($JAK_SETTING_VAL["acegutter"] == '1') ? TRUE : FALSE, 'jak_acegutter1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_acegutter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_acegutter', '0', ($JAK_SETTING_VAL["acegutter"] == '0') ? TRUE : FALSE, 'jak_acegutter2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_acegutter2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc27"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceactiveline', '1', ($JAK_SETTING_VAL["aceactiveline"] == '1') ? TRUE : FALSE, 'jak_aceactiveline1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceactiveline1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceactiveline', '0', ($JAK_SETTING_VAL["aceactiveline"] == '0') ? TRUE : FALSE, 'jak_aceactiveline2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceactiveline2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc28"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceinvisible', '1', ($JAK_SETTING_VAL["aceinvisible"] == '1') ? TRUE : FALSE, 'jak_aceinvisible1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceinvisible1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceinvisible', '0', ($JAK_SETTING_VAL["aceinvisible"] == '0') ? TRUE : FALSE, 'jak_aceinvisible2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceinvisible2', $tl["checkbox"]["chk1"]);
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc30"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smpt', '0', ($JAK_SETTING_VAL["smtp_or_mail"] == '0') ? TRUE : FALSE, 'jak_smpt1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smpt1', $tl["gs_box_content"]["gsbc39"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smpt', '1', ($JAK_SETTING_VAL["smtp_or_mail"] == '1') ? TRUE : FALSE, 'jak_smpt2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smpt2', $tl["gs_box_content"]["gsbc40"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div id="smtpsettings" <?php echo ($JAK_SETTING_VAL["smtp_or_mail"] == '0') ? 'style="display: none;"' : '' ?>>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc31"]);
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_host', $JAK_SETTING_VAL["smtp_host"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc32"]);
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_port', $JAK_SETTING_VAL["smtp_port"], '', 'form-control', array('placeholder' => '25'));
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc33"]);
                          ?>

                        </div>
                        <div class="col-md-7">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_alive', '1', ($JAK_SETTING_VAL["smtp_alive"] == '1') ? TRUE : FALSE, 'jak_alive1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_alive1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_alive', '0', ($JAK_SETTING_VAL["smtp_alive"] == '0') ? TRUE : FALSE, 'jak_alive2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_alive2', $tl["checkbox"]["chk1"]);
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc34"]);
                          ?>

                        </div>
                        <div class="col-md-7">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_auth', '1', ($JAK_SETTING_VAL["smtp_auth"] == '1') ? TRUE : FALSE, 'jak_auth1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_auth1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_auth', '0', ($JAK_SETTING_VAL["smtp_auth"] == '0') ? TRUE : FALSE, 'jak_auth2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_auth2', $tl["checkbox"]["chk1"]);
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc35"]);
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_prefix', $JAK_SETTING_VAL["smtp_prefix"], '', 'form-control', array('placeholder' => 'ssl/tls/true/false'));
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc36"]);
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_smtpusername', $JAK_SETTING_VAL["smtp_user"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc37"]);
                          ?>

                        </div>
                        <div class="col-md-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('password', 'jak_smtppassword', $JAK_SETTING_VAL["smtp_password"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc38"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                        echo $Html->addButtonSubmit('btnTestMail', $tl["button"]["btn3"], 'btnTestMail', 'btn btn-success', array('data-loading-text' => $tl["button"]["btn41"]));
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-5">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt8"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc50"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_loginside', '1', ($JAK_SETTING_VAL["showloginside"] == '1') ? TRUE : FALSE, 'jak_loginside1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_loginside1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_loginside', '0', ($JAK_SETTING_VAL["showloginside"] == '0') ? TRUE : FALSE, 'jak_loginside2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_loginside2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc51"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_sprint', '1', ($JAK_SETTING_VAL["printme"] == '1') ? TRUE : FALSE, 'jak_sprint1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sprint1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_sprint', '0', ($JAK_SETTING_VAL["printme"] == '0') ? TRUE : FALSE, 'jak_sprint2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sprint2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc52"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smilies', '1', ($JAK_SETTING_VAL["usr_smilies"] == '1') ? TRUE : FALSE, 'jak_smilies1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smilies1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smilies', '0', ($JAK_SETTING_VAL["usr_smilies"] == '0') ? TRUE : FALSE, 'jak_smilies2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smilies2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc53"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e8"])) echo " has-error"; ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" name="jak_avatwidth" class="form-control" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                if ($v["varname"] == 'useravatwidth') {
                                  echo $v["value"];
                                }
                              } ?>" placeholder="<?php echo $tl["placeholder"]["p5"]; ?>"/>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="jak_avatheight" class="form-control" value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                if ($v["varname"] == 'useravatheight') {
                                  echo $v["value"];
                                }
                              } ?>" placeholder="<?php echo $tl["placeholder"]["p6"]; ?>"/>
                            </div>
                          </div>
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
          <div class="col-md-7">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt9"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc54"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('ip_block', $JAK_SETTING_VAL["ip_block"], '5', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p7"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc55"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('email_block', $JAK_SETTING_VAL["email_block"], '4', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p8"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc56"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('username_block', $JAK_SETTING_VAL["username_block"], '3', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p9"]));
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt10"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('jak_analytics', $JAK_SETTING_VAL["analytics"], '5', '60', array('class' => 'form-control txtautogrow'));
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
          <div class="col-md-4">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt11"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_heatmap', '1', ($JAK_SETTING_VAL["heatmap"] == '1') ? TRUE : FALSE, 'jak_heatmap1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_heatmap1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_heatmap', '0', ($JAK_SETTING_VAL["heatmap"] == '0') ? TRUE : FALSE, 'jak_heatmap2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_heatmap2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=setting&amp;sp=trunheat', $tl["button"]["btn2"], '', 'btn btn-warning btn-sm', array('data-loading-text' => $tl["button"]["btn41"]));
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane fade" id="cmsPage6" aria-labelledby="cmsPage6-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt12"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc60"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_eucookie_enabled', '1', ($JAK_SETTING_VAL["eucookie_enabled"] == '1') ? TRUE : FALSE, 'jak_eucookie_enabled1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_eucookie_enabled1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_eucookie_enabled', '0', ($JAK_SETTING_VAL["eucookie_enabled"] == '0') ? TRUE : FALSE, 'jak_eucookie_enabled2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_eucookie_enabled2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc61"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_name', $JAK_SETTING_VAL["eucookie_name"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc62"]);
                        echo $Html->addTag('span', '&nbsp;' . $tl["gs_box_content"]["gsbc70"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["gs_help"]["gsh1"], 'data-original-title' => $tl["gs_help"]["gsh"]));
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_expiryDays', $JAK_SETTING_VAL["eucookie_expiryDays"], '', 'form-control');
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt13"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc63"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_eucookie_position" class="form-control selectpicker" data-size="5">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('bottom', 'Banner Bottom', ($JAK_SETTING_VAL["eucookie_position"] == 'bottom') ? TRUE : FALSE);
                          echo $Html->addOption('top', 'Banner Top', ($JAK_SETTING_VAL["eucookie_position"] == 'top') ? TRUE : FALSE);
                          echo $Html->addOption('bottom-left', 'Floating Bottom Left', ($JAK_SETTING_VAL["eucookie_position"] == 'bottom-left') ? TRUE : FALSE);
                          echo $Html->addOption('bottom-right', 'Floating Bottom Right', ($JAK_SETTING_VAL["eucookie_position"] == 'bottom-right') ? TRUE : FALSE);
                          echo $Html->addOption('top-left', 'Floating Top Left', ($JAK_SETTING_VAL["eucookie_position"] == 'top-left') ? TRUE : FALSE);
                          echo $Html->addOption('top-right', 'Floating Top Right', ($JAK_SETTING_VAL["eucookie_position"] == 'top-right') ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc69"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_eucookie_style" class="form-control selectpicker" data-size="5">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('block', 'Block', ($JAK_SETTING_VAL["eucookie_style"] == 'block') ? TRUE : FALSE);
                          echo $Html->addOption('edgeless', 'Edgeless', ($JAK_SETTING_VAL["eucookie_style"] == 'edgeless') ? TRUE : FALSE);
                          echo $Html->addOption('classic', 'Classic', ($JAK_SETTING_VAL["eucookie_style"] == 'classic') ? TRUE : FALSE);
                          echo $Html->addOption('wire', 'Wire', ($JAK_SETTING_VAL["eucookie_style"] == 'wire') ? TRUE : FALSE);
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
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt14"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <div class="cookie-consent-configurator">

                          <input name="jak_eucookie_theme" id="theme7-colour" class="input-hidden" value="eucookie_theme7" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme7') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme7-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#80AA1D;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme1-colour" class="input-hidden" value="eucookie_theme1" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme1') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme1-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#F1D600;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme2-colour" class="input-hidden" value="eucookie_theme2" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme2') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme2-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme3-colour" class="input-hidden" value="eucookie_theme3" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme3') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme3-colour">
                            <div class="theme-preview-container" style="background:#EAF7F7;">
                              <div class="theme-preview-button" style="background:#56CBDB;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme4-colour" class="input-hidden" value="eucookie_theme4" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme4') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme4-colour">
                            <div class="theme-preview-container" style="background:#252E39;">
                              <div class="theme-preview-button" style="background:#14A7D0;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme5-colour" class="input-hidden" value="eucookie_theme5" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme5') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme5-colour">
                            <div class="theme-preview-container" style="background:#237AFC;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme6-colour" class="input-hidden" value="eucookie_theme6" <?php echo ($JAK_SETTING_VAL["eucookie_theme"] == 'eucookie_theme6') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme6-colour">
                            <div class="theme-preview-container" style="background:#EDEFF5;">
                              <div class="theme-preview-button" style="background:#4B81E8;"></div>
                            </div>
                          </label>

                        </div>
                      </div>
                    </div>

                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc64"]);
                        ?>

                      </div>
                      <div class="col-md-2">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_alpha', $JAK_SETTING_VAL["eucookie_alpha"], '', 'form-control');
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
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt15"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc65"]);
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_eucookie_message', jak_edit_safe_userpost($JAK_SETTING_VAL["eucookie_message"]), '2', '', array('class' => 'form-control'));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc66"]);
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_dismiss', $JAK_SETTING_VAL["eucookie_dismiss"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc67"]);
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_link', $JAK_SETTING_VAL["eucookie_link"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc68"]);
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_href', $JAK_SETTING_VAL["eucookie_href"], '', 'form-control');
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

      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT) && is_array($JAK_HOOK_ADMIN_SETTING_EDIT)) foreach ($JAK_HOOK_ADMIN_SETTING_EDIT as $hs) { ?>
        <div role="tabpanel" class="tab-pane fade" id="cmsPage7" aria-labelledby="cmsPage7-tab">
          <?php include_once APP_PATH . $hs['phpcode']; ?>
        </div>
      <?php } ?>
    </div>
  </form>

<?php include "footer.php"; ?>