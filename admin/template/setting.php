<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
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
        message: '<?php echo $tl["general_error"]["generror1"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 10000,
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
					if (isset($errors["e9"])) echo $errors["e9"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 10000,
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
        message: '<?php if (isset($success["e"])) echo $success["e"];?>',
      }, {
        // settings
        type: 'success',
        delay: 10000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      ?>

    </div>

    <!-- Form Content -->
    <ul id="cmsTabSet" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
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

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc"] . $htmlE->endTag('strong');
                        echo $htmlE->startTag('span', array('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
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
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc1"] . $htmlE->endTag('strong');
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
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc2"] . $htmlE->endTag('strong');
                        echo $htmlE->startTag('span', array('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="jak_lang" class="form-control selectpicker" data-size="5">
                            <?php if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) { ?>
                              <option value="<?php echo $lf; ?>"<?php if ($jkv["lang"] == $lf) { ?> selected="selected"<?php } ?>><?php echo ucwords($lf); ?></option><?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc19"] . $htmlE->endTag('strong');
                        echo $htmlE->startTag('span', array('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="jak_locale" class="form-control selectpicker" data-size="5">
                            <option value="cs_CZ" <?php if ($jkv["locale"] == 'cs_CZ') { ?> selected="selected"<?php } ?>>cs_CZ</option>
                            <option value="en_GB" <?php if ($jkv["locale"] == 'en_GB') { ?> selected="selected"<?php } ?>>en_GB</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc5"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["langdirection"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_langd', 'jak_langd1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_langd1', $tl["checkbox"]["chk4"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["langdirection"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_langd', 'jak_langd2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_langd2', $tl["checkbox"]["chk5"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc8"] . $htmlE->endTag('strong');
                        echo $htmlE->startTag('span', array('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_date', '', 'form-control', $jkv["dateformat"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc9"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_time', '', 'form-control', $jkv["timeformat"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc10"] . $htmlE->endTag('strong');
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
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc11"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["time_ago_show"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_time_ago', 'jak_time_ago1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_time_ago1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["time_ago_show"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_time_ago', 'jak_time_ago2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_time_ago2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc12"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["hvm"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_hvm', 'jak_hvm1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_hvm1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["hvm"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_hvm', 'jak_hvm2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_hvm', $tl["checkbox"]["chk1"]);
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt1"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc13"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="<?php if (isset($errors["e6"])) echo " has-error"; ?>">
                          <select name="jak_mid" class="form-control selectpicker">
                            <option value="2"<?php if ($jkv["adminpagemid"] == 2) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel1"]; ?>
                            </option>
                            <option value="4"<?php if ($jkv["adminpagemid"] == 4) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel2"]; ?>
                            </option>
                            <option value="6"<?php if ($jkv["adminpagemid"] == 6) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel3"]; ?>
                            </option>
                            <option value="8"<?php if ($jkv["adminpagemid"] == 8) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel4"]; ?>
                            </option>
                            <option value="10"<?php if ($jkv["adminpagemid"] == 10) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["selection"]["sel5"]; ?>
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc14"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_item', '', 'form-control', $jkv["adminpageitem"], '');
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
          <div class="col-md-4">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt2"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc15"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["contactform"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_contact', 'jak_contact1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_contact1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["contactform"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_contact', 'jak_contact2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_contact2', $tl["checkbox"]["chk1"]);
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt3"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc16"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <select name="jak_shownews" class="form-control selectpicker" data-size="5">
                          <?php for ($i = 0; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i ?>"<?php if ($jkv["shownews"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt4"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_shortmsg', '', 'form-control', $jkv["shortmsg"], '');
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt5"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc17"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["rss"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_rss', 'jak_rss1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_rss1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["rss"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_rss', 'jak_rss2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_rss2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["gs_box_content"]["gsbc18"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_rssitem', '', 'form-control', $jkv["rssitem"], '');
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
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt6"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc20"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["adv_editor"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_editor', 'jak_editor1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_editor1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["adv_editor"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_editor', 'jak_editor2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_editor2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc21"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_acetheme" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc22"]; ?>">
                            <option value="chrome" <?php if ($jkv["acetheme"] == 'chrome') { ?> selected="selected"<?php } ?>>Chrome</option>
                          </optgroup>
                          <optgroup label="<?php echo $tl["gs_box_content"]["gsbc23"]; ?>">
                            <option value="cobalt" <?php if ($jkv["acetheme"] == 'cobalt') { ?> selected="selected"<?php } ?>>Cobalt</option>
                            <option value="monokai" <?php if ($jkv["acetheme"] == 'monokai') { ?> selected="selected"<?php } ?>>Monokai</option>
                            <option value="vibrant_ink" <?php if ($jkv["acetheme"] == 'vibrant_ink') { ?> selected="selected"<?php } ?>>Vibrant Ink</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc24"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_acetabSize', '', 'form-control', $jkv["acetabSize"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc25"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_acewraplimit', '', 'form-control', $jkv["acewraplimit"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc26"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["acegutter"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_acegutter', 'jak_acegutter1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_acegutter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["acegutter"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_acegutter', 'jak_acegutter2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_acegutter2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc27"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["aceactiveline"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_aceactiveline', 'jak_aceactiveline1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_aceactiveline1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["aceactiveline"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_aceactiveline', 'jak_aceactiveline2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_aceactiveline2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc28"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["aceinvisible"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_aceinvisible', 'jak_aceinvisible1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_aceinvisible1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["aceinvisible"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_aceinvisible', 'jak_aceinvisible2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_aceinvisible2', $tl["checkbox"]["chk1"]);
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt7"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc30"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_or_mail"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_smpt', 'jak_smpt1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_smpt1', $tl["gs_box_content"]["gsbc39"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_or_mail"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_smpt', 'jak_smpt2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_smpt2', $tl["gs_box_content"]["gsbc40"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc31"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                        echo $htmlE->addInput('text', 'jak_host', '', 'form-control', $jkv["smtp_host"], '');
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc32"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                        echo $htmlE->addInput('text', 'jak_port', '', 'form-control', $jkv["smtp_port"], '', array('placeholder' => '25'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc33"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_alive"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_alive', 'jak_alive1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_alive1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_alive"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_alive', 'jak_alive2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_alive2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc34"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_auth"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_auth', 'jak_auth1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_auth1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["smtp_auth"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_auth', 'jak_auth2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_auth2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc35"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                        echo $htmlE->addInput('text', 'jak_prefix', '', 'form-control', $jkv["smtp_prefix"], '', array('placeholder' => 'ssl/tls/true/false'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc36"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                        echo $htmlE->addInput('text', 'jak_smtpusername', '', 'form-control', $jkv["smtp_user"], '');
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc37"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                        echo $htmlE->addInput('password', 'jak_smtppassword', '', 'form-control', $jkv["smtp_password"], '');
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc38"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <button type="submit" name="testMail" class="btn btn-success" id="sendTM">
                          <i id="loader" class="fa fa-spinner fa-pulse"></i> <?php echo $tl["button"]["btn3"]; ?>
                        </button>
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-5">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt8"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc50"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["showloginside"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_loginside', 'jak_loginside1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_loginside1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["showloginside"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_loginside', 'jak_loginside2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_loginside2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc51"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["printme"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_sprint', 'jak_sprint1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_sprint1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["printme"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_sprint', 'jak_sprint2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_sprint2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc52"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["usr_smilies"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_smilies', 'jak_smilies1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_smilies1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["usr_smilies"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_smilies', 'jak_smilies2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_smilies2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc53"] . $htmlE->endTag('strong');
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
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
                ?>

              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt9"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Arguments: for (id of associated form element), text
                        echo $htmlE->addLabelFor('', $tl["gs_box_content"]["gsbc54"]);
                        // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
                        echo $htmlE->addTextArea('ip_block', '5', '50', $jkv["ip_block"], array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p7"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Arguments: for (id of associated form element), text
                        echo $htmlE->addLabelFor('', $tl["gs_box_content"]["gsbc55"]);
                        // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
                        echo $htmlE->addTextArea('email_block', '4', '50', $jkv["email_block"], array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p8"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Arguments: for (id of associated form element), text
                        echo $htmlE->addLabelFor('', $tl["gs_box_content"]["gsbc56"]);
                        // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
                        echo $htmlE->addTextArea('username_block', '3', '50', $jkv["username_block"], array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p9"]));
                        ?>

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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt10"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
                        echo $htmlE->addTextArea('jak_analytics', '5', '60', $jkv["analytics"], array('class' => 'form-control txtautogrow'));
                        ?>

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
          <div class="col-md-4">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt11"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["heatmap"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_heatmap', 'jak_heatmap1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_heatmap1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["heatmap"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_heatmap', 'jak_heatmap2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_heatmap2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="index.php?p=setting&amp;sp=trunheat" class="btn btn-warning btn-sm"><?php echo $tl["button"]["btn2"]; ?></a>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt12"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc60"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["eucookie_enabled"] == '1') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_eucookie_enabled', 'jak_eucookie_enabled1', '', '1', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_eucookie_enabled1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          ($jkv["eucookie_enabled"] == '0') ? $checked = 'yes' : $checked = 'no';
                          echo $htmlE->addInput('radio', 'jak_eucookie_enabled', 'jak_eucookie_enabled2', '', '0', $checked);
                          // Arguments: for (id of associated form element), text
                          echo $htmlE->addLabelFor('jak_eucookie_enabled2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc61"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_name', '', 'form-control', $jkv["eucookie_name"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc62"] . $htmlE->endTag('strong');
                        echo $htmlE->startTag('span') . '&nbsp;' . $tl["gs_box_content"]["gsbc70"] . $htmlE->endTag('span');
                        ?>

                        <a class="cms-help" data-content="<?php echo $tl["gs_help"]["gsh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["gs_help"]["gsh"]; ?>">
                          <i class="fa fa-question-circle"></i>
                        </a>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_expiryDays', '', 'form-control', $jkv["eucookie_expiryDays"], '');
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
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt13"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc63"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_eucookie_position" class="form-control selectpicker" data-size="5">
                          <option value="bottom"<?php if ($jkv["eucookie_position"] == 'bottom') { ?> selected="selected"<?php } ?>>Banner Bottom</option>
                          <option value="top"<?php if ($jkv["eucookie_position"] == 'top') { ?> selected="selected"<?php } ?>>Banner Top</option>
                          <option value="bottom-left"<?php if ($jkv["eucookie_position"] == 'bottom-left') { ?> selected="selected"<?php } ?>>Floating Bottom Left</option>
                          <option value="bottom-right"<?php if ($jkv["eucookie_position"] == 'bottom-right') { ?> selected="selected"<?php } ?>>Floating Bottom Right</option>
                          <option value="top-left"<?php if ($jkv["eucookie_position"] == 'top-left') { ?> selected="selected"<?php } ?>>Floating Top Left</option>
                          <option value="top-right"<?php if ($jkv["eucookie_position"] == 'top-right') { ?> selected="selected"<?php } ?>>Floating Top Right</option>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc69"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <select name="jak_eucookie_style" class="form-control selectpicker" data-size="5">
                          <option value="block"<?php if ($jkv["eucookie_style"] == 'block') { ?> selected="selected"<?php } ?>>Block</option>
                          <option value="edgeless"<?php if ($jkv["eucookie_style"] == 'edgeless') { ?> selected="selected"<?php } ?>>Edgeless</option>
                          <option value="classic"<?php if ($jkv["eucookie_style"] == 'classic') { ?> selected="selected"<?php } ?>>Classic</option>
                          <option value="wire"<?php if ($jkv["eucookie_style"] == 'wire') { ?> selected="selected"<?php } ?>>Wire</option>
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
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt14"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">

                        <div class="cookie-consent-configurator">

                          <input name="jak_eucookie_theme" id="theme7-colour" class="input-hidden" value="eucookie_theme7" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme7') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme7-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#80AA1D;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme1-colour" class="input-hidden" value="eucookie_theme1" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme1') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme1-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#F1D600;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme2-colour" class="input-hidden" value="eucookie_theme2" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme2') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme2-colour">
                            <div class="theme-preview-container" style="background:#000;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme3-colour" class="input-hidden" value="eucookie_theme3" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme3') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme3-colour">
                            <div class="theme-preview-container" style="background:#EAF7F7;">
                              <div class="theme-preview-button" style="background:#56CBDB;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme4-colour" class="input-hidden" value="eucookie_theme4" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme4') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme4-colour">
                            <div class="theme-preview-container" style="background:#252E39;">
                              <div class="theme-preview-button" style="background:#14A7D0;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme5-colour" class="input-hidden" value="eucookie_theme5" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme5') ? 'checked="checked"' : ''; ?> type="radio">
                          <label for="theme5-colour">
                            <div class="theme-preview-container" style="background:#237AFC;">
                              <div class="theme-preview-button" style="background:#FFF;"></div>
                            </div>
                          </label>

                          <input name="jak_eucookie_theme" id="theme6-colour" class="input-hidden" value="eucookie_theme6" <?php echo ($jkv["eucookie_theme"] == 'eucookie_theme6') ? 'checked="checked"' : ''; ?> type="radio">
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
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc64"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-2">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_alpha', '', 'form-control', $jkv["eucookie_alpha"], '');
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
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["gs_box_title"]["gsbt15"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc65"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
                          echo $htmlE->addTextArea('jak_eucookie_message', '2', '', jak_edit_safe_userpost($jkv["eucookie_message"]), array('class' => 'form-control'));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc66"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_dismiss', '', 'form-control', $jkv["eucookie_dismiss"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc67"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_link', '', 'form-control', $jkv["eucookie_link"], '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-3">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $htmlE->startTag('strong') . $tl["gs_box_content"]["gsbc68"] . $htmlE->endTag('strong');
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
                          echo $htmlE->addInput('text', 'jak_eucookie_href', '', 'form-control', $jkv["eucookie_href"], '');
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

      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT) && is_array($JAK_HOOK_ADMIN_SETTING_EDIT)) foreach ($JAK_HOOK_ADMIN_SETTING_EDIT as $hs) { ?>
        <div role="tabpanel" class="tab-pane fade" id="cmsPage7" aria-labelledby="cmsPage7-tab">
          <?php include_once APP_PATH . $hs['phpcode']; ?>
        </div>
      <?php } ?>
    </div>
  </form>

<?php include "footer.php"; ?>