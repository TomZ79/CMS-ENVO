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
        message: '<?php echo $tl["general_error"]["generror1"]; ?>'
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
          if (isset($errors["e1"])) echo $errors["e1"];?>'
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
    echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvtower', $tl["button"]["btn19"], '', 'btn btn-info button');
    ?>

  </div>

  <!-- Form Content -->
  <div class="row tab-content-singel">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', 'Obecná nastavení', 'box-title');
          ?>

        </div>
        <div class="box-body">
          <div class="block">
            <div class="block-content">
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Název Vysílače');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowername', $JAK_FORM_DATA["name"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Stanoviště');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowerstation', $JAK_FORM_DATA["station"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Okres');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowerdistrict', $JAK_FORM_DATA["district"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Výška nad mořem (m)');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowerhsea', $JAK_FORM_DATA["heightsea"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Východní délka');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowerlongitude', $JAK_FORM_DATA["eastlongitude"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Severní šířka');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_tvtowerlatitude', $JAK_FORM_DATA["northlatitude"], '', 'form-control');
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
    </div>
    <div class="col-md-6" style="height: 500px;">

    </div>
  </div>
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
