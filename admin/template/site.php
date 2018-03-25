<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
<?php }
if ($page1 == "e") { ?>
  <script>
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
  <script>
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
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-sm-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["site_box_title"]["sitebt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_online', '1', ($setting["offline"] == '1') ? TRUE : FALSE, 'envo_online1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_online1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_online', '0', ($setting["offline"] == '0') ? TRUE : FALSE, 'envo_online2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_online2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc1"]);
                    echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["site_help"]["siteh1"], 'data-original-title' => $tl["site_help"]["siteh"]));
                    ?>


                  </div>
                  <div class="col-sm-7">
                    <select name="envo_offpage" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ($setting["offline_page"] == 0) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tl["selection"]["sel"], $selected);
                      if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $c) {
                        if ($c["pluginid"] == '0' && $c["pageid"] > '0') {
                          echo $Html->addOption($c["id"], $c["name"], ($setting["offline_page"] == $c["id"]) ? TRUE : FALSE);
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
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc2"]);
                    echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["site_help"]["siteh2"], 'data-original-title' => $tl["site_help"]["siteh"]));
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <select name="envo_pagenotfound" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ($setting["notfound_page"] == 0) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tl["selection"]["sel"], $selected);
                      if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $nf) {
                        if ($nf["pluginid"] == '0' && $nf["pageid"] > '0') {
                          echo $Html->addOption($nf["id"], $nf["name"], ($setting["notfound_page"] == $nf["id"]) ? TRUE : FALSE);
                        }
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
            echo $Html->addTag('h3', $tl["site_box_title"]["sitebt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc3"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group m-0 <?php if (isset($errors["e2"])) echo "has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_title', $setting["title"], 'sitetitle', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-12">

                    <?php
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('', '<strong>' . $tl["site_box_content"]["sitebc4"] . '</strong>');
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('envo_description', $setting["metadesc"], '3', '', array('id' => 'metadesc', 'class' => 'form-control'));
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-12">

                    <?php
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('', '<strong>' . $tl["site_box_content"]["sitebc5"] . '</strong>');
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_keywords', $setting["metakey"], 'metakey', 'form-control');
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc6"]);
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_author', $setting["metaauthor"], 'metaauthor', 'form-control');
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc7"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_robots', '1', ($setting["robots"] == '1') ? TRUE : FALSE, 'envo_robots1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_robots1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_robots', '0', ($setting["robots"] == '0') ? TRUE : FALSE, 'envo_robots2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_robots2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["site_box_content"]["sitebc8"]);
                    ?>

                  </div>
                  <div class="col-sm-7">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('envo_copy', envo_edit_safe_userpost($setting["copyright"]), '4', '', array('id' => 'copyright', 'class' => 'form-control', 'style' => 'height: auto;'));
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

<?php include "footer.php"; ?>