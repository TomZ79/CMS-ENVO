<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
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
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvchannel', $tl["button"]["btn19"], '', 'btn btn-info button');
    ?>

  </div>

  <!-- Form Content -->
  <div class="row tab-content-singel">
    <div class="col-sm-6">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', 'Obecná nastavení kanálu', 'box-title');
          ?>

        </div>
        <div class="box-body">
          <div class="block">
            <div class="block-content">
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Vysílač');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="<?php if (isset($errors["e2"])) echo "has-error"; ?>">
                    <select name="envo_tvtower" class="form-control selectpicker">

                      <?php
                      // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ((isset($_REQUEST["envo_tvtower"]) && $_REQUEST["envo_tvtower"] == '0') || !isset($_REQUEST["envo_tvtower"])) ? TRUE : FALSE;

                      echo $Html->addOption('0', 'Archiv', $selected);
                      if (isset($ENVO_TVTOWER_ALL) && is_array($ENVO_TVTOWER_ALL)) foreach ($ENVO_TVTOWER_ALL as $tt) {

                        if (isset($_REQUEST["envo_tvtower"]) && ($_REQUEST["envo_tvtower"] != '0')) {
                          if ($_REQUEST["envo_tvtower"] == $tt["id"]) {
                            $selected = TRUE;
                          } else {
                            $selected = FALSE;
                          }
                        } else {
                          $selected = FALSE;
                        }

                        echo $Html->addOption($tt["id"], $tt["name"], $selected);

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
                  echo $Html->addTag('strong', 'Číslo Kanálu');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_channelnumber', (isset($_REQUEST["envo_channelnumber"]) ? $_REQUEST["envo_channelnumber"] : ''), 'channelnumber', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Kmitočet Kanálu (MHz)');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_channelfrequency', (isset($_REQUEST["envo_channelfrequency"]) ? $_REQUEST["envo_channelfrequency"] : ''), 'channelfrequency', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Kmitočtový Rozsah Kanálu (MHz)');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_channelfreqrange', (isset($_REQUEST["envo_channelfreqrange"]) ? $_REQUEST["envo_channelfreqrange"] : ''), 'channelfreqrange', 'form-control');
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
          echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
          ?>

        </div>
      </div>
    </div>
    <div class="col-sm-6" style="height: 500px;">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', 'Rozšířená nastavení kanálu', 'box-title');
          ?>

        </div>
        <div class="box-body">
          <div class="block">
            <div class="block-content">
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Název Sítě');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_sitename', (isset($_REQUEST["envo_sitename"]) ? $_REQUEST["envo_sitename"] : ''), '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Technologie Vysílání');
                  ?>

                </div>
                <div class="col-sm-7">
                  <select name="envo_type" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('', 'Žádná', ((isset($_REQUEST["envo_type"]) && ($_REQUEST["envo_type"] == ''))) ? TRUE : FALSE);
                    echo $Html->addOption('DVB-T', 'DVB-T', ((isset($_REQUEST["envo_type"]) && ($_REQUEST["envo_type"] == 'DVB-T'))) ? TRUE : FALSE);
                    echo $Html->addOption('DVB-T2', 'DVB-T2', ((isset($_REQUEST["envo_type"]) && ($_REQUEST["envo_type"] == 'DVB-T2'))) ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Polarita Vysílání');
                  ?>

                </div>
                <div class="col-sm-7">
                  <select name="envo_polarization" class="form-control selectpicker">

                    <?php
                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                    echo $Html->addOption('0', 'Žádná', ((isset($_REQUEST["envo_type"]) && ($_REQUEST["envo_type"] == ''))) ? TRUE : FALSE);
                    echo $Html->addOption('H', 'Horizontální - H', ((isset($_REQUEST["envo_polarization"]) && ($_REQUEST["envo_polarization"] == 'H'))) ? TRUE : FALSE);
                    echo $Html->addOption('V', 'Vertikální - V', ((isset($_REQUEST["envo_polarization"]) && ($_REQUEST["envo_polarization"] == 'V'))) ? TRUE : FALSE);
                    ?>

                  </select>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Výkon ERP (kW)');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_erpkw', (isset($_REQUEST["envo_erpkw"]) ? $_REQUEST["envo_erpkw"] : ''), '', 'form-control');
                    ?>

                  </div>
                </div>
              </div>
              <div class="row-form">
                <div class="col-sm-5">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', 'Výkon ERP (dBW)');
                  ?>

                </div>
                <div class="col-sm-7">
                  <div class="form-group no-margin">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_erpdbw', (isset($_REQUEST["envo_erpdbw"]) ? $_REQUEST["envo_erpdbw"] : ''), '', 'form-control');
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
          echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
          ?>

        </div>
      </div>
    </div>
  </div>
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
