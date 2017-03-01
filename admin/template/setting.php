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
                            <?php if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) { ?>
                              <option value="<?php echo $lf; ?>"<?php if ($jkv["lang"] == $lf) { ?> selected="selected"<?php } ?>><?php echo ucwords($lf); ?></option><?php } ?>
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
                            <option value="cs_CZ" <?php if ($jkv["locale"] == 'cs_CZ') { ?> selected="selected"<?php } ?>>cs_CZ</option>
                            <option value="en_GB" <?php if ($jkv["locale"] == 'en_GB') { ?> selected="selected"<?php } ?>>en_GB</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc5"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_langd', '1', ($jkv["langdirection"] == '1') ? TRUE : FALSE, 'jak_langd1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_langd1', $tl["checkbox"]["chk4"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_langd', '0', ($jkv["langdirection"] == '0') ? TRUE : FALSE, 'jak_langd2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_langd2', $tl["checkbox"]["chk5"]);
                          ?>

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

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_date', $jkv["dateformat"], '', 'form-control');
                          ?>

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

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_time', $jkv["timeformat"], '', 'form-control');
                          ?>

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
                          echo $Html->addRadio('jak_time_ago', '1', ($jkv["time_ago_show"] == '1') ? TRUE : FALSE, 'jak_time_ago1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_time_ago1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_time_ago', '0', ($jkv["showfooter"] == '0') ? TRUE : FALSE, 'jak_time_ago2');
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
                          echo $Html->addRadio('jak_hvm', '1', ($jkv["hvm"] == '1') ? TRUE : FALSE, 'jak_hvm1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_hvm1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_hvm', '0', ($jkv["hvm"] == '0') ? TRUE : FALSE, 'jak_hvm2');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc13"]);
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc14"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_item', $jkv["adminpageitem"], '', 'form-control');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc15"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_contact', '1', ($jkv["contactform"] == '1') ? TRUE : FALSE, 'jak_contact1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_contact1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_contact', '0', ($jkv["contactform"] == '0') ? TRUE : FALSE, 'jak_contact2');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc16"]);
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
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_shortmsg', $jkv["shortmsg"], '', 'form-control');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc17"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_rss', '1', ($jkv["rss"] == '1') ? TRUE : FALSE, 'jak_rss1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_rss1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_rss', '0', ($jkv["rss"] == '0') ? TRUE : FALSE, 'jak_rss2');
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
                          echo $Html->addInput('text', 'jak_rssitem', $jkv["rssitem"], '', 'form-control');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc20"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_editor', '1', ($jkv["adv_editor"] == '1') ? TRUE : FALSE, 'jak_editor1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_editor1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_editor', '0', ($jkv["adv_editor"] == '0') ? TRUE : FALSE, 'jak_editor2');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc24"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_acetabSize', $jkv["acetabSize"], '', 'form-control');
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
                          echo $Html->addInput('text', 'jak_acewraplimit', $jkv["acewraplimit"], '', 'form-control');
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
                          echo $Html->addRadio('jak_acegutter', '1', ($jkv["acegutter"] == '1') ? TRUE : FALSE, 'jak_acegutter1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_acegutter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_acegutter', '0', ($jkv["acegutter"] == '0') ? TRUE : FALSE, 'jak_acegutter2');
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
                          echo $Html->addRadio('jak_aceactiveline', '1', ($jkv["aceactiveline"] == '1') ? TRUE : FALSE, 'jak_aceactiveline1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceactiveline1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceactiveline', '0', ($jkv["aceactiveline"] == '0') ? TRUE : FALSE, 'jak_aceactiveline2');
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
                          echo $Html->addRadio('jak_aceinvisible', '1', ($jkv["aceinvisible"] == '1') ? TRUE : FALSE, 'jak_aceinvisible1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_aceinvisible1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_aceinvisible', '0', ($jkv["aceinvisible"] == '0') ? TRUE : FALSE, 'jak_aceinvisible2');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc30"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smpt', '0', ($jkv["smtp_or_mail"] == '0') ? TRUE : FALSE, 'jak_smpt1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smpt1', $tl["gs_box_content"]["gsbc39"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smpt', '1', ($jkv["smtp_or_mail"] == '1') ? TRUE : FALSE, 'jak_smpt2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smpt2', $tl["gs_box_content"]["gsbc40"]);
                          ?>

                        </div>
                      </div>
                    </div>
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
                        echo $Html->addInput('text', 'jak_host', $jkv["smtp_host"], '', 'form-control');
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
                        echo $Html->addInput('text', 'jak_port', $jkv["smtp_port"], '', 'form-control', array('placeholder' => '25'));
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
                          echo $Html->addRadio('jak_alive', '1', ($jkv["smtp_alive"] == '1') ? TRUE : FALSE, 'jak_alive1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_alive1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_alive', '0', ($jkv["smtp_alive"] == '0') ? TRUE : FALSE, 'jak_alive2');
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
                          echo $Html->addRadio('jak_auth', '1', ($jkv["smtp_auth"] == '1') ? TRUE : FALSE, 'jak_auth1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_auth1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_auth', '0', ($jkv["smtp_auth"] == '0') ? TRUE : FALSE, 'jak_auth2');
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
                        echo $Html->addInput('text', 'jak_prefix', $jkv["smtp_prefix"], '', 'form-control', array('placeholder' => 'ssl/tls/true/false'));
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
                        echo $Html->addInput('text', 'jak_smtpusername', $jkv["smtp_user"], '', 'form-control');
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
                        echo $Html->addInput('password', 'jak_smtppassword', $jkv["smtp_password"], '', 'form-control');
                        ?>

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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc50"]);
                        ?>

                      </div>
                      <div class="col-md-6">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_loginside', '1', ($jkv["showloginside"] == '1') ? TRUE : FALSE, 'jak_loginside1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_loginside1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_loginside', '0', ($jkv["showloginside"] == '0') ? TRUE : FALSE, 'jak_loginside2');
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
                          echo $Html->addRadio('jak_sprint', '1', ($jkv["printme"] == '1') ? TRUE : FALSE, 'jak_sprint1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_sprint1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_sprint', '0', ($jkv["printme"] == '0') ? TRUE : FALSE, 'jak_sprint2');
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
                          echo $Html->addRadio('jak_smilies', '1', ($jkv["usr_smilies"] == '1') ? TRUE : FALSE, 'jak_smilies1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_smilies1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_smilies', '0', ($jkv["usr_smilies"] == '0') ? TRUE : FALSE, 'jak_smilies2');
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
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc54"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('ip_block', $jkv["ip_block"], '5', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p7"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc55"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('email_block', $jkv["email_block"], '4', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p8"]));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["gs_box_content"]["gsbc56"]);
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('username_block', $jkv["username_block"], '3', '50', array('class' => 'form-control txtautogrow', 'placeholder' => $tl["placeholder"]["p9"]));
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
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('jak_analytics', $jkv["analytics"], '5', '60', array('class' => 'form-control txtautogrow'));
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
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_heatmap', '1', ($jkv["heatmap"] == '1') ? TRUE : FALSE, 'jak_heatmap1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_heatmap1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_heatmap', '0', ($jkv["heatmap"] == '0') ? TRUE : FALSE, 'jak_heatmap2');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc60"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_eucookie_enabled', '1', ($jkv["eucookie_enabled"] == '1') ? TRUE : FALSE, 'jak_eucookie_enabled1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_eucookie_enabled1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_eucookie_enabled', '0', ($jkv["eucookie_enabled"] == '0') ? TRUE : FALSE, 'jak_eucookie_enabled2');
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
                          echo $Html->addInput('text', 'jak_eucookie_name', $jkv["eucookie_name"], '', 'form-control');
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
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help',  array ('data-content' => $tl["gs_help"]["gsh1"], 'data-original-title' => $tl["gs_help"]["gsh"]));
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_expiryDays', $jkv["eucookie_expiryDays"], '', 'form-control');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc63"]);
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc69"]);
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc64"]);
                        ?>

                      </div>
                      <div class="col-md-2">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_eucookie_alpha', $jkv["eucookie_alpha"], '', 'form-control');
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
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["gs_box_content"]["gsbc65"]);
                        ?>

                      </div>
                      <div class="col-md-9">
                        <div class="form-group no-margin">

                          <?php
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('jak_eucookie_message', jak_edit_safe_userpost($jkv["eucookie_message"]), '2', '', array('class' => 'form-control'));
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
                          echo $Html->addInput('text', 'jak_eucookie_dismiss', $jkv["eucookie_dismiss"], '', 'form-control');
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
                          echo $Html->addInput('text', 'jak_eucookie_link', $jkv["eucookie_link"], '', 'form-control');
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
                          echo $Html->addInput('text', 'jak_eucookie_href', $jkv["eucookie_href"], '', 'form-control');
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