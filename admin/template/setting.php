<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
<?php }
if ($page1 == "e") { ?>
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
  <script>
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

  <form method="post" class="envo_form" action="<?=$_SERVER['REQUEST_URI']?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li class="nav-item">
        <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab"]?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab1"]?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage3" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab2"]?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage4" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab3"]?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage5" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab4"]?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage6" role="tab">
          <span class="text"><?=$tl["gs_section_tab"]["gstab6"]?></span>
        </a>
      </li>
      <?php if (isset($ENVO_HOOK_ADMIN_SETTING_EDIT)) { ?>
        <li class="nav-item">
          <a href="#" class="" data-toggle="tab" data-target="#cmsPage7" role="tab">
            <span class="text"><?=$tl["gs_section_tab"]["gstab5"]?></span>
          </a>
        </li>
      <?php } ?>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-8">
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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                          <input type="text" name="envo_email" class="form-control" value="<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $v) {
                            if ($v["varname"] == 'email') {
                              echo $v["value"];
                            }
                          } ?>" placeholder="<?=$tl["placeholder"]["p13"]?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc1"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <input type="radio" id="envo_shttp1" name="envo_shttp" value="0"<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '0') { ?> checked="checked"<?php }
                          } ?> />
                          <label for="envo_shttp1"><?=$tl["gs_box_content"]["gsbc3"]?></label>

                          <input type="radio" id="envo_shttp2" name="envo_shttp" value="1"<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '1') { ?> checked="checked"<?php }
                          } ?> />
                          <label for="envo_shttp2"><?=$tl["gs_box_content"]["gsbc4"]?></label>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc2"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="envo_lang" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) {
                              echo $Html->addOption($lf, ucwords($lf), ($ENVO_SETTING_VAL["lang"] == $lf) ? TRUE : FALSE);
                            }
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc19"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="envo_locale" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('cs_CZ', 'cs_CZ', ($ENVO_SETTING_VAL["locale"] == 'cs_CZ') ? TRUE : FALSE);
                            echo $Html->addOption('en_GB', 'en_GB', ($ENVO_SETTING_VAL["locale"] == 'en_GB') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc8"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                          <select name="envo_date" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['dateformat'] == '') ? TRUE : FALSE);

                            echo $Html->addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($ENVO_SETTING_VAL['dateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('d F Y', 'd F Y (01 January 2017)', ($ENVO_SETTING_VAL['dateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html->addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($ENVO_SETTING_VAL['dateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('l F Y', 'l F Y (Monday January 2017)', ($ENVO_SETTING_VAL['dateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc9"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">
                          <select name="envo_time" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['timeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?=$tl["selection"]["sel111"]?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($ENVO_SETTING_VAL['timeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($ENVO_SETTING_VAL['timeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($ENVO_SETTING_VAL['timeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($ENVO_SETTING_VAL['timeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?=$tl["selection"]["sel112"]?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - H:i', ' - H:i ( - 13:00)', ($ENVO_SETTING_VAL['timeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($ENVO_SETTING_VAL['timeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($ENVO_SETTING_VAL['timeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
                              ?>

                            </optgroup>

                          </select>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc10"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_timezone_server" class="form-control selectpicker">
                          <?php include_once "timezoneserver.php"; ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc11"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_time_ago', '1', ($ENVO_SETTING_VAL["time_ago_show"] == '1') ? TRUE : FALSE, 'envo_time_ago1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_time_ago1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_time_ago', '0', ($ENVO_SETTING_VAL["time_ago_show"] == '0') ? TRUE : FALSE, 'envo_time_ago2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_time_ago2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc12"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_hvm', '1', ($ENVO_SETTING_VAL["hvm"] == '1') ? TRUE : FALSE, 'envo_hvm1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_hvm1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_hvm', '0', ($ENVO_SETTING_VAL["hvm"] == '0') ? TRUE : FALSE, 'envo_hvm2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_hvm2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc13"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["gs_help"]["gsh2"], 'data-original-title' => $tl["gs_help"]["gsh"]));
                        ?>

                      </div>
                      <div class="col-sm-6">
                        <div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
                          <select name="envo_mid" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('2', $tl["selection"]["sel1"], ($ENVO_SETTING_VAL['adminpagemid'] == 2) ? TRUE : FALSE);
                            echo $Html->addOption('4', $tl["selection"]["sel2"], ($ENVO_SETTING_VAL['adminpagemid'] == 4) ? TRUE : FALSE);
                            echo $Html->addOption('6', $tl["selection"]["sel3"], ($ENVO_SETTING_VAL['adminpagemid'] == 6) ? TRUE : FALSE);
                            echo $Html->addOption('8', $tl["selection"]["sel4"], ($ENVO_SETTING_VAL['adminpagemid'] == 8) ? TRUE : FALSE);
                            echo $Html->addOption('10', $tl["selection"]["sel5"], ($ENVO_SETTING_VAL['adminpagemid'] == 10) ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc14"]);
                        ?>

                      </div>
                      <div class="col-sm-6">
                        <div class="form-group m-0<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_item', $ENVO_SETTING_VAL["adminpageitem"], '', 'form-control');
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
          </div>
          <div class="col-sm-4">
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
                      <div class="col-sm-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc16"]);
                        ?>

                      </div>
                      <div class="col-sm-6">
                        <select name="envo_shownews" class="form-control selectpicker">

                          <?php for ($i = 0; $i <= 10; $i++) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($i, $i, ($ENVO_SETTING_VAL["shownews"] == $i) ? TRUE : FALSE);

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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
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
                      <div class="col-sm-12">
                        <div class="form-group m-0<?php if (isset($errors["e4"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_shortmsg', $ENVO_SETTING_VAL["shortmsg"], '', 'form-control');
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt5"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc17"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_rss', '1', ($ENVO_SETTING_VAL["rss"] == '1') ? TRUE : FALSE, 'envo_rss1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_rss1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_rss', '0', ($ENVO_SETTING_VAL["rss"] == '0') ? TRUE : FALSE, 'envo_rss2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_rss2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc18"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e7"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_rssitem', $ENVO_SETTING_VAL["rssitem"], '', 'form-control');
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt6"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc20"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_editor', '1', ($ENVO_SETTING_VAL["adv_editor"] == '1') ? TRUE : FALSE, 'envo_editor1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_editor1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_editor', '0', ($ENVO_SETTING_VAL["adv_editor"] == '0') ? TRUE : FALSE, 'envo_editor2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_editor2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc21"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_acetheme" class="form-control selectpicker">
                          <optgroup label="<?=$tl["gs_box_content"]["gsbc22"]?>">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('chrome', 'Chrome', ($ENVO_SETTING_VAL["acetheme"] == 'chrome') ? TRUE : FALSE);
                            ?>

                          </optgroup>
                          <optgroup label="<?=$tl["gs_box_content"]["gsbc23"]?>">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('cobalt', 'Cobalt', ($ENVO_SETTING_VAL["acetheme"] == 'cobalt') ? TRUE : FALSE);
                            echo $Html->addOption('monokai', 'Monokai', ($ENVO_SETTING_VAL["acetheme"] == 'monokai') ? TRUE : FALSE);
                            echo $Html->addOption('vibrant_ink', 'Vibrant Ink', ($ENVO_SETTING_VAL["acetheme"] == 'vibrant_ink') ? TRUE : FALSE);
                            ?>

                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc24"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_acetabSize', $ENVO_SETTING_VAL["acetabSize"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc25"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_acewraplimit', $ENVO_SETTING_VAL["acewraplimit"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc29"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_acefontsize', $ENVO_SETTING_VAL["acefontsize"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc26"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_acegutter', '1', ($ENVO_SETTING_VAL["acegutter"] == '1') ? TRUE : FALSE, 'envo_acegutter1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_acegutter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_acegutter', '0', ($ENVO_SETTING_VAL["acegutter"] == '0') ? TRUE : FALSE, 'envo_acegutter2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_acegutter2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc27"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_aceactiveline', '1', ($ENVO_SETTING_VAL["aceactiveline"] == '1') ? TRUE : FALSE, 'envo_aceactiveline1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_aceactiveline1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_aceactiveline', '0', ($ENVO_SETTING_VAL["aceactiveline"] == '0') ? TRUE : FALSE, 'envo_aceactiveline2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_aceactiveline2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc28"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_aceinvisible', '1', ($ENVO_SETTING_VAL["aceinvisible"] == '1') ? TRUE : FALSE, 'envo_aceinvisible1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_aceinvisible1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_aceinvisible', '0', ($ENVO_SETTING_VAL["aceinvisible"] == '0') ? TRUE : FALSE, 'envo_aceinvisible2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_aceinvisible2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addTag('h3', $tl["gs_box_title"]["gsbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc30"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_smpt', '0', ($ENVO_SETTING_VAL["smtp_or_mail"] == '0') ? TRUE : FALSE, 'envo_smpt1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_smpt1', $tl["gs_box_content"]["gsbc39"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_smpt', '1', ($ENVO_SETTING_VAL["smtp_or_mail"] == '1') ? TRUE : FALSE, 'envo_smpt2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_smpt2', $tl["gs_box_content"]["gsbc40"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div id="smtpsettings" <?=(empty($ENVO_SETTING_VAL["smtp_or_mail"])) ? 'style="display: none;"' : ''?>>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc31"]);
                          ?>

                        </div>
                        <div class="col-sm-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_host', $ENVO_SETTING_VAL["smtp_host"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc32"]);
                          ?>

                        </div>
                        <div class="col-sm-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_port', $ENVO_SETTING_VAL["smtp_port"], '', 'form-control', array('placeholder' => '25'));
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc33"]);
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_alive', '1', ($ENVO_SETTING_VAL["smtp_alive"] == '1') ? TRUE : FALSE, 'envo_alive1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_alive1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_alive', '0', ($ENVO_SETTING_VAL["smtp_alive"] == '0') ? TRUE : FALSE, 'envo_alive2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_alive2', $tl["checkbox"]["chk1"]);
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc34"]);
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_auth', '1', ($ENVO_SETTING_VAL["smtp_auth"] == '1') ? TRUE : FALSE, 'envo_auth1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_auth1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_auth', '0', ($ENVO_SETTING_VAL["smtp_auth"] == '0') ? TRUE : FALSE, 'envo_auth2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_auth2', $tl["checkbox"]["chk1"]);
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc35"]);
                          ?>

                        </div>
                        <div class="col-sm-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_prefix', $ENVO_SETTING_VAL["smtp_prefix"], '', 'form-control', array('placeholder' => 'ssl/tls/true/false'));
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc36"]);
                          ?>

                        </div>
                        <div class="col-sm-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_smtpusername', $ENVO_SETTING_VAL["smtp_user"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc37"]);
                          ?>

                        </div>
                        <div class="col-sm-7">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('password', 'envo_smtppassword', $ENVO_SETTING_VAL["smtp_password"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc38"]);
                        ?>

                      </div>
                      <div class="col-sm-7">

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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">
          <div class="col-sm-5">
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
                      <div class="col-sm-6">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc51"]);
                        ?>

                      </div>
                      <div class="col-sm-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sprint', '1', ($ENVO_SETTING_VAL["printme"] == '1') ? TRUE : FALSE, 'envo_sprint1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sprint1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sprint', '0', ($ENVO_SETTING_VAL["printme"] == '0') ? TRUE : FALSE, 'envo_sprint2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sprint2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc53"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e8"])) echo " has-error"; ?>">
                          <div class="row">
                            <div class="col-sm-6">
                              <input type="text" name="envo_avatwidth" class="form-control" value="<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $v) {
                                if ($v["varname"] == 'useravatwidth') {
                                  echo $v["value"];
                                }
                              } ?>" placeholder="<?=$tl["placeholder"]["p5"]?>"/>
                            </div>
                            <div class="col-sm-6">
                              <input type="text" name="envo_avatheight" class="form-control" value="<?php if (isset($ENVO_SETTING) && is_array($ENVO_SETTING)) foreach ($ENVO_SETTING as $v) {
                                if ($v["varname"] == 'useravatheight') {
                                  echo $v["value"];
                                }
                              } ?>" placeholder="<?=$tl["placeholder"]["p6"]?>"/>
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-7">
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
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc54"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('ip_block', $ENVO_SETTING_VAL["ip_block"], '5', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p7"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc55"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('email_block', $ENVO_SETTING_VAL["email_block"], '4', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p8"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc56"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('username_block', $ENVO_SETTING_VAL["username_block"], '3', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p9"]));
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
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
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
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('envo_analytics', $ENVO_SETTING_VAL["analytics"], '10', '60', array('class' => 'form-control txtautogrow'));
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
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage6" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc60"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_eucookie_enabled', '1', ($ENVO_SETTING_VAL["eucookie_enabled"] == '1') ? TRUE : FALSE, 'envo_eucookie_enabled1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_eucookie_enabled1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_eucookie_enabled', '0', ($ENVO_SETTING_VAL["eucookie_enabled"] == '0') ? TRUE : FALSE, 'envo_eucookie_enabled2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_eucookie_enabled2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc61"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_name', $ENVO_SETTING_VAL["eucookie_name"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc62"]);
                        echo $Html->addTag('span', '&nbsp;' . $tl["gs_box_content"]["gsbc70"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["gs_help"]["gsh1"], 'data-original-title' => $tl["gs_help"]["gsh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_expiryDays', $ENVO_SETTING_VAL["eucookie_expiryDays"], '', 'form-control');
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
          </div>
          <div class="col-sm-6">
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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc63"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_eucookie_position" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('bottom', 'Banner Bottom', ($ENVO_SETTING_VAL["eucookie_position"] == 'bottom') ? TRUE : FALSE);
                          echo $Html->addOption('top', 'Banner Top', ($ENVO_SETTING_VAL["eucookie_position"] == 'top') ? TRUE : FALSE);
                          echo $Html->addOption('bottom-left', 'Floating Bottom Left', ($ENVO_SETTING_VAL["eucookie_position"] == 'bottom-left') ? TRUE : FALSE);
                          echo $Html->addOption('bottom-right', 'Floating Bottom Right', ($ENVO_SETTING_VAL["eucookie_position"] == 'bottom-right') ? TRUE : FALSE);
                          echo $Html->addOption('top-left', 'Floating Top Left', ($ENVO_SETTING_VAL["eucookie_position"] == 'top-left') ? TRUE : FALSE);
                          echo $Html->addOption('top-right', 'Floating Top Right', ($ENVO_SETTING_VAL["eucookie_position"] == 'top-right') ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc69"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_eucookie_style" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('block', 'Block', ($ENVO_SETTING_VAL["eucookie_style"] == 'block') ? TRUE : FALSE);
                          echo $Html->addOption('edgeless', 'Edgeless', ($ENVO_SETTING_VAL["eucookie_style"] == 'edgeless') ? TRUE : FALSE);
                          echo $Html->addOption('classic', 'Classic', ($ENVO_SETTING_VAL["eucookie_style"] == 'classic') ? TRUE : FALSE);
                          echo $Html->addOption('wire', 'Wire', ($ENVO_SETTING_VAL["eucookie_style"] == 'wire') ? TRUE : FALSE);
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
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
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
                      <div class="col-sm-12">

                        <div class="cookie-consent-configurator">

                          <input name="envo_eucookie_theme" id="theme7-colour" class="input-hidden" value="eucookie_theme7" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme7') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme7-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#80AA1D;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme1-colour" class="input-hidden" value="eucookie_theme1" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme1') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme1-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#F1D600;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme2-colour" class="input-hidden" value="eucookie_theme2" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme2') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme2-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme3-colour" class="input-hidden" value="eucookie_theme3" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme3') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme3-colour">
                            <div class="theme-preview-container" style="background:#EAF7F7;">
                              <div class="theme-preview-button" style="background:#56CBDB;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme4-colour" class="input-hidden" value="eucookie_theme4" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme4') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme4-colour">
                            <div class="theme-preview-container" style="background:#252E39;">
                              <div class="theme-preview-button" style="background:#14A7D0;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme8-colour" class="input-hidden" value="eucookie_theme8" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme8') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme8-colour">
                            <div class="theme-preview-container" style="background:#252E39;">
                              <div class="theme-preview-button" style="background:#08C;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme5-colour" class="input-hidden" value="eucookie_theme5" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme5') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme5-colour">
                            <div class="theme-preview-container" style="background:#237AFC;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme9-colour" class="input-hidden" value="eucookie_theme9" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme9') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme9-colour">
                            <div class="theme-preview-container" style="background:#1AB2FF;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="envo_eucookie_theme" id="theme6-colour" class="input-hidden" value="eucookie_theme6" <?=($ENVO_SETTING_VAL["eucookie_theme"] == 'eucookie_theme6') ? 'checked="checked"' : ''?> type="radio">
                          <label for="theme6-colour">
                            <div class="theme-preview-container" style="background:#EDEFF5;">
                              <div class="theme-preview-button" style="background:#4B81E8;"></div>
                            </div>
                          </label>

                        </div>
                      </div>
                    </div>

                    <div class="row-form">
                      <div class="col-sm-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc64"]);
                        ?>

                      </div>
                      <div class="col-sm-2">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_alpha', $ENVO_SETTING_VAL["eucookie_alpha"], '', 'form-control');
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
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
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
                      <div class="col-sm-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc65"]);
                        ?>

                      </div>
                      <div class="col-sm-9">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_eucookie_message', envo_edit_safe_userpost($ENVO_SETTING_VAL["eucookie_message"]), '2', '', array('class' => 'form-control'));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc66"]);
                        ?>

                      </div>
                      <div class="col-sm-9">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_dismiss', $ENVO_SETTING_VAL["eucookie_dismiss"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc67"]);
                        ?>

                      </div>
                      <div class="col-sm-9">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_link', $ENVO_SETTING_VAL["eucookie_link"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-3">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc68"]);
                        ?>

                      </div>
                      <div class="col-sm-9">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_eucookie_href', $ENVO_SETTING_VAL["eucookie_href"], '', 'form-control');
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
          </div>
        </div>
      </div>

      <?php if (isset($ENVO_HOOK_ADMIN_SETTING_EDIT) && is_array($ENVO_HOOK_ADMIN_SETTING_EDIT)) foreach ($ENVO_HOOK_ADMIN_SETTING_EDIT as $hs) { ?>
        <div role="tabpanel" class="tab-pane fade" id="cmsPage7" aria-labelledby="cmsPage7-tab">
          <?php include_once APP_PATH . $hs['phpcode']; ?>
        </div>
      <?php } ?>
    </div>
  </form>

<?php include "footer.php"; ?>