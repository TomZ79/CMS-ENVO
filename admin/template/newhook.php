<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=plugins&sp=hooks', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["hook_box_title"]["hookbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_name', $_REQUEST["envo_name"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc1"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                      <select name="envo_hook" class="form-control selectpicker" data-search-select2="true">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ((isset($_REQUEST["envo_hook"]) && ($_REQUEST["envo_hook"] == '0')) || !isset($_REQUEST["envo_hook"])) ? TRUE : FALSE;

                        echo $Html->addOption('0', $tl["selection"]["sel7"], $selected);
                        if (isset($ENVO_HOOK_LOCATIONS) && is_array($ENVO_HOOK_LOCATIONS)) foreach ($ENVO_HOOK_LOCATIONS as $h) {

                          if (isset($_REQUEST["envo_hook"]) && ($_REQUEST["envo_hook"] != '0')) {
                            if (isset($_REQUEST["envo_hook"]) && ($h == $_REQUEST["envo_hook"])) {
                              $selected = TRUE;
                            } else {
                              $selected = FALSE;
                            }
                          } else {
                            $selected = FALSE;
                          }

                          echo $Html->addOption($h, $h, $selected);

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
                    echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc2"]);
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <select name="envo_plugin" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ((isset($_REQUEST["envo_plugin"]) && ($_REQUEST["envo_plugin"] == '0')) || !isset($_REQUEST["envo_plugin"])) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tl["global_text"]["globaltxt13"], $selected);
                      if (isset($ENVO_PLUGINS) && is_array($ENVO_PLUGINS)) foreach ($ENVO_PLUGINS as $p) {

                        if (isset($_REQUEST["envo_plugin"]) && ($_REQUEST["envo_plugin"] != '0')) {
                          if (isset($_REQUEST["envo_plugin"]) && ($p["id"] == $_REQUEST["envo_plugin"])) {
                            $selected = TRUE;
                          } else {
                            $selected = FALSE;
                          }
                        } else {
                          $selected = FALSE;
                        }

                        echo $Html->addOption($p["id"], $p["name"], $selected);

                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-sm-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc3"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-sm-7">
                    <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">

                      <?php
                      (isset($_REQUEST["envo_exorder"]) && (!empty($_REQUEST["envo_exorder"]))) ? $value = $_REQUEST["envo_exorder"] : $value = '4';
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_exorder', $value, '', 'form-control', array('maxlength' => '5'));
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
            echo $Html->addTag('h3', $tl["hook_box_title"]["hookbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">

            <?php
            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv('', 'htmleditor');
            // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
            echo $Html->addTextarea('envo_phpcode', $_REQUEST["envo_phpcode"], '', '', array('id' => 'envo_phpcode', 'class' => 'form-control hidden'));
            ?>

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
  </form>

<?php include "footer.php"; ?>