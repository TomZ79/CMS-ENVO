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
    echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvprogram', $tl["button"]["btn19"], '', 'btn btn-info button');
    ?>

  </div>

  <!-- Form Content -->
  <div class="row tab-content-singel">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', 'Obecná nastavení programu', 'box-title');
          ?>

        </div>
        <div class="box-body">
          <div class="block">
            <div class="block-content">
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Vysílač / Kanál');
                  ?>

                </div>
                <div class="col-md-7">
                  <select name="envo_tvchannel" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                    $selected = ($JAK_FORM_DATA["towerid"] == '0') ? TRUE : FALSE;

                    echo $Html->addOption('0', 'Archiv', $selected);


                    if (isset($JAK_TVTOWER_ALL) && is_array($JAK_TVTOWER_ALL)) foreach ($JAK_TVTOWER_ALL as $tt) {

                      echo '<optgroup label="' . $tt["name"] . '">';

                      if (isset($JAK_TVCHANNEL_ALL) && is_array($JAK_TVCHANNEL_ALL)) foreach ($JAK_TVCHANNEL_ALL as $tc) {

                        if ($tt["id"] == $tc["towerid"]) {
                          if ($JAK_FORM_DATA["channelid"] != '0') {
                            if ($JAK_FORM_DATA["channelid"] == $tc["id"]) {
                              $selected = TRUE;
                            } else {
                              $selected = FALSE;
                            }
                          } else {
                            $selected = FALSE;
                          }
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption($tt["id"] . ',' . $tc["id"], $tc["number"] . ' K', $selected);
                        }

                      }

                      echo '</optgroup>';

                    }
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Program je vysílán');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="radio radio-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    echo $Html->addRadio('envo_programonline', '1', ($JAK_FORM_DATA["online"] == '1') ? TRUE : FALSE, 'envo_programonline1');
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('envo_programonline1', $tl["checkbox"]["chk"]);

                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    echo $Html->addRadio('envo_programonline', '0', ($JAK_FORM_DATA["online"] == '0') ? TRUE : FALSE, 'envo_programonline2');
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('envo_programonline2', $tl["checkbox"]["chk1"]);
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Název Programu');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_programname', $JAK_FORM_DATA["name"], '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Ikona programu');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="input-group">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_programicons', $JAK_FORM_DATA["icon"], 'envo_programicons', 'form-control');
                    ?>

                    <span class="input-group-btn">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang=' . $managerlang . '&fldr=&field_id=envo_programicons', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
                            ?>

													</span>
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
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', 'Rozšířená nastavení programu', 'box-title');
          ?>

        </div>
        <div class="box-body">
          <div class="block">
            <div class="block-content">
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Kódování Obrazu');
                  ?>

                </div>
                <div class="col-md-7">
                  <select name="envo_videoencoding" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('', 'Žádné', ($JAK_FORM_DATA["videoencoding"] == '') ? TRUE : FALSE);
                    echo $Html->addOption('MPEG-2', 'MPEG-2', ($JAK_FORM_DATA["videoencoding"] == 'MPEG-2') ? TRUE : FALSE);
                    echo $Html->addOption('MPEG-2 MP@ML', 'MPEG-2 MP@ML', ($JAK_FORM_DATA["videoencoding"] == 'MPEG-2 MP@ML') ? TRUE : FALSE);
                    echo $Html->addOption('MPEG-4', 'MPEG-4', ($JAK_FORM_DATA["videoencoding"] == 'MPEG-4') ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Kódování Zvuku');
                  ?>

                </div>
                <div class="col-md-7">
                  <select name="envo_audioencoding" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('', 'Žádné', ($JAK_FORM_DATA["audioencoding"] == '') ? TRUE : FALSE);
                    echo $Html->addOption('MPEG-1', 'MPEG-1', ($JAK_FORM_DATA["audioencoding"] == 'MPEG-1') ? TRUE : FALSE);
                    echo $Html->addOption('MPEG-1 Layer II', 'MPEG-1 Layer II', ($JAK_FORM_DATA["audioencoding"] == 'MPEG-1 Layer II') ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Formát Obrazu');
                  ?>

                </div>
                <div class="col-md-7">
                  <select name="envo_videoformat" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('', 'Žádný', ($JAK_FORM_DATA["videoformat"] == '') ? TRUE : FALSE);
                    echo $Html->addOption('16:9', '16:9', ($JAK_FORM_DATA["videoformat"] == '16:9') ? TRUE : FALSE);
                    echo $Html->addOption('4:3', '4:3', ($JAK_FORM_DATA["videoformat"] == '4:3') ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Rozlišení Obrazu');
                  ?>

                </div>
                <div class="col-md-7">
                  <select name="envo_videosize" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('', 'Žádné', ($JAK_FORM_DATA["videosize"] == '') ? TRUE : FALSE);
                    echo $Html->addOption('704 x 576i', '704 x 576i', ($JAK_FORM_DATA["videosize"] == '704 x 576i') ? TRUE : FALSE);
                    echo $Html->addOption('720 x 576i', '720 x 576i', ($JAK_FORM_DATA["videosize"] == '720 x 576i') ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-md-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Datový Tok Programu (Mbit/s)');
                  ?>

                </div>
                <div class="col-md-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_bitrate', $JAK_FORM_DATA["bitrate"], '', 'form-control');
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
  </div>
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
