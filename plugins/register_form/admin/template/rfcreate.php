<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
if ($page1 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
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

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('i', '', 'fa fa-plus-square');
            echo $Html->addTag('h3', $tlrf["reg_box_content"]["regbc10"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <ul class="cform_drag">
              <li id="cform_drag">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">

                      <?php
                      echo $tlrf["reg_box_content"]["regbc17"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_option[]', '', '', 'form-control jakread', array('readonly' => 'readonly'));
                      ?>

                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tlrf["reg_box_content"]["regbc18"]; ?>
                      <select name="jak_optiontype[]" class="form-control selectpicker" data-size="5">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('1', $tlrf["reg_box_content"]["regbc19"]);
                        echo $Html->addOption('2', $tlrf["reg_box_content"]["regbc20"]);
                        echo $Html->addOption('3', $tlrf["reg_box_content"]["regbc21"]);
                        echo $Html->addOption('4', $tlrf["reg_box_content"]["regbc22"]);
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">

                      <?php
                      echo $tlrf["reg_box_content"]["regbc23"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_options[]', 'female,male', '', 'form-control jakread', array('readonly' => 'readonly'));
                      ?>

                    </div>

                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tlrf["reg_box_content"]["regbc24"]; ?>
                      <select name="jak_optionmandatory[]" class="form-control selectpicker" data-size="5">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"]);
                        echo $Html->addOption('2', $tlrf["reg_box_content"]["regbc25"]);
                        echo $Html->addOption('3', $tlrf["reg_box_content"]["regbc26"]);
                        echo $Html->addOption('4', $tlrf["reg_box_content"]["regbc13"]);
                        echo $Html->addOption('5', $tlrf["reg_box_content"]["regbc14"]);
                        ?>

                      </select>
                    </div>
                    <input type="hidden" name="jak_optionsort[]" class="cforder-orig" value=""/>
                  </div>
                </div>
              </li>
            </ul>

            <div class="callout callout-info">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-arrow-up m-r-5');
              echo $tlrf["reg_box_content"]["regbc27"];
              echo $Html->addTag('i', '', 'fa fa-arrow-down m-l-5');
              ?>

            </div>

            <ul id="cform_sort">

              <?php if (isset($JAK_REGISTEROPTION_ALL) && is_array($JAK_REGISTEROPTION_ALL)) foreach ($JAK_REGISTEROPTION_ALL as $o) { ?>

                <li class="jakcform">
                  <div class="row">
                    <div class="col-md-3">

                      <div class="form-group">

                        <?php
                        echo $tlrf["reg_box_content"]["regbc17"];
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'jak_option_old[]', $o["name"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <?php echo $tlrf["reg_box_content"]["regbc18"]; ?>
                        <select name="jak_optiontype_old[]" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('1', $tlrf["reg_box_content"]["regbc19"], ($o["typeid"] == 1) ? TRUE : FALSE);
                          echo $Html->addOption('2', $tlrf["reg_box_content"]["regbc20"], ($o["typeid"] == 2) ? TRUE : FALSE);
                          echo $Html->addOption('3', $tlrf["reg_box_content"]["regbc21"], ($o["typeid"] == 3) ? TRUE : FALSE);
                          echo $Html->addOption('4', $tlrf["reg_box_content"]["regbc22"], ($o["typeid"] == 4) ? TRUE : FALSE);
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">

                      <?php
                      echo $tlrf["reg_box_content"]["regbc23"];
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_options_old[]', $o["options"], '', 'form-control', array('placeholder' => $tlrf["reg_box_content"]["regbc15"]));
                      ?>

                    </div>
                    <div class="col-md-2">
                      <?php echo $tlrf["reg_box_content"]["regbc24"]; ?>
                      <select name="jak_optionmandatory_old[]" class="form-control selectpicker">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"], ($o["mandatory"] == 0) ? TRUE : FALSE);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"], ($o["mandatory"] == 1) ? TRUE : FALSE);
                        echo $Html->addOption('2', $tlrf["reg_box_content"]["regbc25"], ($o["mandatory"] == 2) ? TRUE : FALSE);
                        echo $Html->addOption('3', $tlrf["reg_box_content"]["regbc26"], ($o["mandatory"] == 3) ? TRUE : FALSE);
                        echo $Html->addOption('4', $tlrf["reg_box_content"]["regbc13"], ($o["mandatory"] == 4) ? TRUE : FALSE);
                        echo $Html->addOption('5', $tlrf["reg_box_content"]["regbc14"], ($o["mandatory"] == 5) ? TRUE : FALSE);
                        ?>

                      </select>
                    </div>
                    <div class="col-md-1">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('i', '', 'fa fa-user-plus');
                      ?>

                      <select name="jak_showregister[]" class="form-control selectpicker">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('0', $tl["checkbox"]["chk1"], ($o["typeid"] == 0) ? TRUE : FALSE);
                        echo $Html->addOption('1', $tl["checkbox"]["chk"], ($o["typeid"] == 1) ? TRUE : FALSE);
                        ?>

                      </select>
                    </div>
                    <div class="col-md-1">
                      <?php if ($o["id"] > 3) { ?>
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('i', '', 'fa fa-trash-o');

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('jak_sod[]', $o["id"], FALSE, 'jak_sod' . $o["id"]);
                          echo $Html->addLabel('jak_sod' . $o["id"], '');
                          ?>

                        </div>
                      <?php }

                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'jak_option_name_old[]', $o["name"]);
                      echo $Html->addInput('hidden', 'jak_optionsort_old[]', $o["forder"], '', 'cforder');
                      echo $Html->addInput('hidden', 'jak_optionid[]', $o["id"]);
                      ?>

                    </div>
                  </div>
                </li>

              <?php } ?>

            </ul>

          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-success pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["button"]["btn1"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>

  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>