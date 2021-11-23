<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
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
<?php }
if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
          if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
    <!-- Action button block -->
    <div class="actionbtn-block d-none d-sm-block">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=users', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-sm-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["user_box_title"]["userbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc3"]);
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_name', $ENVO_FORM_DATA["name"], 'envo_name', 'form-control');
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc4"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_email', $ENVO_FORM_DATA["email"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc5"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_username', $ENVO_FORM_DATA["username"], '', 'form-control');
                      echo $Html->addInput('hidden', 'envo_username_old', $ENVO_FORM_DATA["username"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc6"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <select name="envo_usergroup" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) {
                        if ($v["id"] != "1") {
                          echo $Html->addOption($v["id"], $v["name"], ($v["id"] == $ENVO_FORM_DATA["usergroupid"]) ? TRUE : FALSE);
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc8"]);
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_backtime', $ENVO_FORM_DATA["backtime"], 'datepicker', 'form-control', array('readonly' => 'readonly'));
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc9"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <select name="envo_usergroupback" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      echo $Html->addOption('0', $tl["selection"]["sel8"]);

                      if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) {
                        if ($v["id"] != "1") {
                          echo $Html->addOption($v["id"], $v["name"], ($v["id"] == $ENVO_FORM_DATA["backtogroup"]) ? TRUE : FALSE);
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc7"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_access', '1', ($ENVO_FORM_DATA["access"] == '1') ? TRUE : FALSE, 'envo_access1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_access1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_access', '0', ($ENVO_FORM_DATA["access"] == '0') ? TRUE : FALSE, 'envo_access2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_access2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc10"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

                        <?php
                        // Add Html Element -> addImg (Arguments: src, optional assoc. array)
                        echo $Html->addImg(BASE_URL_ORIG . basename(ENVO_FILES_DIRECTORY) . '/userfiles/' . $ENVO_FORM_DATA["picture"], array('alt' => 'Avatar'));
                        ?>

                      </div>
                      <div>
                        <span class="btn btn-default btn-file">

													<?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('span', $tl["button"]["btn22"], 'fileinput-new');
                          echo $Html->addTag('span', $tl["button"]["btn16"], 'fileinput-exists');
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('file', 'uploadpp', '', '', '', array('accept' => 'image/*'));
                          ?>

                        </span>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('#', $tl["button"]["btn23"], '', 'btn btn-default fileinput-exists', array('data-dismiss' => 'fileinput'));
                        ?>

                      </div>
                    </div>
                  </div>
                </div>

                <?php if ($ENVO_FORM_DATA["picture"] != "/standard.png") { ?>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["user_box_content"]["userbc11"]);
                      ?>

                    </div>
                    <div class="col-sm-7">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addCheckbox('envo_delete_avatar');
                      ?>

                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
            ?>

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["user_box_title"]["userbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc12"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0">
                      <div class="label-indicator-absolute">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_password', '', '', 'form-control');
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span', '', 'label password-indicator-label-absolute');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc13"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0">
                      <div class="label-indicator-absolute">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_confirm_password', '', '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonF (Arguments: fieldname, value, optional assoc. array)
            echo $Html->addButtonF('', $tl["button"]["btn24"], array('type' => 'button', 'class' => 'btn btn-info generate-label-absolute'));
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
            ?>

          </div>
        </div>
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["user_box_title"]["userbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">

                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc14"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0<?php if (isset($errors["e5"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_phone', $ENVO_FORM_DATA["phone"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["user_box_content"]["userbc15"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0">

                      <?php
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html->addTextarea('envo_description', $ENVO_FORM_DATA["description"], '4', '', array('class' => 'form-control'));
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
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
            ?>

          </div>
        </div>

        <?php
        if (isset($ENVO_HOOK_ADMIN_USER_EDIT) && is_array($ENVO_HOOK_ADMIN_USER_EDIT)) foreach ($ENVO_HOOK_ADMIN_USER_EDIT as $hsue) {
          include_once APP_PATH . $hsue['phpcode'];
        }
        if ($extrafields) { ?>
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tl["user_box_title"]["userbt3"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">

                  <?= $extrafields ?>

                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
              ?>

            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </form>

<?php include "footer.php"; ?>