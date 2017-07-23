<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page4 == "s") { ?>
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
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page4 == "e") { ?>
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
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];?>'
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
      echo $Html->addAnchor('index.php?p=newsletter&sp=usergroup', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>


    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc13"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_name', $JAK_FORM_DATA["name"], 'jak_name', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc14"]);
                    ?>

                  </div>
                  <div class="col-md-7">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('jak_desc', $JAK_FORM_DATA["description"], '4', '', array('id' => 'jakEditor', 'class' => 'form-control jakEditorLight'));
                    ?>

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
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>