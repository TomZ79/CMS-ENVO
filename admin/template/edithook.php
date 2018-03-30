<?php include "header.php"; ?>

<?php if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
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

  <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks', $tl["button"]["btn19"], '', 'btn btn-info button');
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
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> m-0">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_name', $ENVO_FORM_DATA["name"], 'envo_name', 'form-control');
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
                    <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> m-0">
                      <select name="envo_hook" class="form-control selectpicker" data-search-select2="true">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ($ENVO_FORM_DATA["hook_name"] == '0') ? TRUE : FALSE;

                        echo $Html->addOption('0', $tl["selection"]["sel7"], $selected);
                        if (isset($ENVO_HOOK_LOCATIONS) && is_array($ENVO_HOOK_LOCATIONS)) foreach ($ENVO_HOOK_LOCATIONS as $h) {

                          echo $Html->addOption($h, $h, ($h == $ENVO_FORM_DATA["hook_name"]) ? TRUE : FALSE);

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
                    <select name="envo_plugin" class="form-control selectpicker" data-search-select2="true">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ($ENVO_FORM_DATA["pluginid"] == '0') ? TRUE : FALSE;

                      echo $Html->addOption('0', $tl["global_text"]["globaltxt13"], $selected);
                      if (isset($ENVO_PLUGINS) && is_array($ENVO_PLUGINS)) foreach ($ENVO_PLUGINS as $p) {

                        echo $Html->addOption($p["id"], $p["name"], ($p["id"] == $ENVO_FORM_DATA["pluginid"]) ? TRUE : FALSE);

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
                    <div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> m-0">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_exorder', $ENVO_FORM_DATA["exorder"], '', 'form-control', array('maxlength' => '5'));
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
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
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
            echo $Html->addTextarea('envo_phpcode', $ENVO_FORM_DATA["phpcode"], '', '', array('id' => 'envo_phpcode', 'class' => 'form-control d-none'));
            ?>

          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>