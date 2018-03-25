<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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

<?php if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=contactform', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_title', $_REQUEST["envo_title"], 'envo_title', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc1"]);
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
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc2"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_email', $_REQUEST["envo_email"], '', 'form-control', array('placeholder' => $tl["placeholder"]["p14"]));
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form <?php if (isset($errors["e2"])) echo " has-error"; ?>">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc3"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('envo_lcontent', envo_edit_safe_userpost($_REQUEST["envo_lcontent"]), '4', '', array('id' => 'envoEditor', 'class' => 'envoEditorLight form-control', 'style' => 'width:100%;'));
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

        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('i', '', 'fa fa-plus-square');
            echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">

            <ul class="cform_drag">
              <li id="cform_drag">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">

                      <?php
                      echo $tl["cf_box_content"]["cfbc4"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_option[]', '', '', 'form-control envoread', array('readonly' => 'readonly'));
                      ?>

                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc5"]; ?>
                      <select name="envo_optionmandatory[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc9"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc10"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc5"]; ?>
                      <select name="envo_optiontype[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('1', $tl["cf_box_content"]["cfbc11"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc12"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc13"]);
                        echo $Html->addOption('4', $tl["cf_box_content"]["cfbc14"]);
                        echo $Html->addOption('5', $tl["cf_box_content"]["cfbc15"]);
                        echo $Html->addOption('6', $tl["cf_box_content"]["cfbc16"]);
                        echo $Html->addOption('7', $tl["cf_box_content"]["cfbc17"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">

                      <?php
                      echo $tl["cf_box_content"]["cfbc7"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_options[]', 'female,male', '', 'form-control envoread', array('readonly' => 'readonly'));
                      ?>

                    </div>
                  </div>

                  <?php
                  // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                  echo $Html->addInput('hidden', 'envo_optionsort[]', '', '', 'cforder-orig');
                  ?>

                </div>
              </li>
            </ul>

            <div class="callout callout-info">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-arrow-up mr-1');
              echo $tl["cf_box_content"]["cfbc8"];
              echo $Html->addTag('i', '', 'fa fa-arrow-down m-l-5');
              ?>

            </div>

            <ul id="cform_sort">
              <li class="envocform">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">

                      <?php
                      echo $tl["cf_box_content"]["cfbc4"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_option[]', '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc5"]; ?>
                      <select name="envo_optionmandatory[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc9"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc10"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <?php echo $tl["cf_box_content"]["cfbc6"]; ?>
                      <select name="envo_optiontype[]" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('1', $tl["cf_box_content"]["cfbc11"]);
                        echo $Html->addOption('2', $tl["cf_box_content"]["cfbc12"]);
                        echo $Html->addOption('3', $tl["cf_box_content"]["cfbc13"]);
                        echo $Html->addOption('4', $tl["cf_box_content"]["cfbc14"]);
                        echo $Html->addOption('5', $tl["cf_box_content"]["cfbc15"]);
                        echo $Html->addOption('6', $tl["cf_box_content"]["cfbc16"]);
                        echo $Html->addOption('7', $tl["cf_box_content"]["cfbc17"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">

                      <?php
                      echo $tl["cf_box_content"]["cfbc7"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_options[]', '', '', 'form-control');
                      echo $Html->addInput('hidden', 'envo_optionsort[]', '', '', 'cforder');
                      ?>

                    </div>
                  </div>
                </div>
              </li>
            </ul>
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

<?php include "footer.php"; ?>