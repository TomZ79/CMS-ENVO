<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page2 == "s") { ?>
  <script>
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
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
  <script>
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
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<?php
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
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_title', $ENVO_SETTING_VAL["nltitle"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc1"]);
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('envo_description', $ENVO_SETTING_VAL["nlsignoff"], '4', '', array('class' => 'form-control envoEditorLight', 'id' => 'envoEditor'));
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc2"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_thankyou', $ENVO_SETTING_VAL["nlthankyou"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc3"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group<?php if (isset($errors["e4"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_email', $ENVO_SETTING_VAL["nlemail"], '', 'form-control', array('placeholder' => $tl["placeholder"]["p13"]));
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc4"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="radio">
                      <div class="radio radio-success">

                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_smpt', '0', ($ENVO_SETTING_VAL["nlsmtp_mail"] == '0') ? TRUE : FALSE, 'envo_smpt1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_smpt1', $tl["checkbox"]["chk6"]);

                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_smpt', '1', ($ENVO_SETTING_VAL["nlsmtp_mail"] == '1') ? TRUE : FALSE, 'envo_smpt2');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_smpt2', $tl["checkbox"]["chk7"]);
                        ?>

                      </div>
                    </div>
                  </div>
                </div>

                <div id="smtpsettings" <?php echo (empty($ENVO_SETTING_VAL["smtp_or_mail"])) ? 'style="display: none;"' : '' ?>>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc5"]);
                      ?>

                    </div>
                    <div class="col-sm-7">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_host', $ENVO_SETTING_VAL["nlsmtphost"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc6"]);
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_port', $ENVO_SETTING_VAL["nlsmtpport"], '', 'form-control', array('placeholder' => '25'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc7"]);
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="radio radio-success">

                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_alive', '1', ($ENVO_SETTING_VAL["nlsmtp_alive"] == '1') ? TRUE : FALSE, 'envo_alive1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_alive1', $tl["checkbox"]["chk"]);

                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_alive', '0', ($ENVO_SETTING_VAL["nlsmtp_alive"] == '0') ? TRUE : FALSE, 'envo_alive2');
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
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc8"]);
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="radio radio-success">

                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_auth', '1', ($ENVO_SETTING_VAL["nlsmtp_auth"] == '1') ? TRUE : FALSE, 'envo_auth1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_auth1', $tl["checkbox"]["chk"]);

                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_auth', '0', ($ENVO_SETTING_VAL["nlsmtp_auth"] == '0') ? TRUE : FALSE, 'envo_auth2');
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
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc9"]);
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_prefix', $ENVO_SETTING_VAL["nlsmtp_prefix"], '', 'form-control', array('placeholder' => 'ssl/true/false'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc10"]);
                      ?>

                    </div>
                    <div class="col-sm-7">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_username', base64_decode($ENVO_SETTING_VAL["nlsmtpusername"]), '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc11"]);
                      ?>

                    </div>
                    <div class="col-sm-7">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_password', base64_decode($ENVO_SETTING_VAL["nlsmtppassword"]), '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc12"]);
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
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>