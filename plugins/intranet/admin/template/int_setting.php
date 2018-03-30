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
        message: '<?=$tl["notification"]["n7"]?>'
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
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
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
        icon: 'fa fa-warning',
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

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab"] ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab1"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage3" role="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab2"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="" data-toggle="tab" data-target="#cmsPage4" role="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab3"] ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlint["int_box_title"]["intbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlint["int_box_content"]["intbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $ENVO_SETTING_VAL["intranettitle"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlint["int_box_content"]["intbc2"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="envo_date" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['intranetdateformat'] == '') ? TRUE : FALSE);

                            echo $Html->addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('d F Y', 'd F Y (01 January 2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html->addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html->addOption('l F Y', 'l F Y (Monday January 2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlint["int_box_content"]["intbc3"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">
                          <select name="envo_time" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['intranettimeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?= $tl["selection"]["sel111"] ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html->addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?= $tl["selection"]["sel112"] ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption(' - H:i', ' - H:i ( - 13:00)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html->addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
                              ?>

                            </optgroup>

                          </select>

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
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlint["int_box_title"]["intbt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tlint["int_box_content"]["intbc1"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_skin" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', 'Default', ($ENVO_SETTING_VAL["intranetskin"] == "") ? TRUE : FALSE);
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlint["int_box_title"]["intbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html->addButtonSubmit('addRowTower', 'Přidat vysílač', 'addRowTower', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>
                    <div id="contentTower">

                      <?php if (!empty($ENVO_TOWER_ALL) && is_array($ENVO_TOWER_ALL)) {
                        foreach ($ENVO_TOWER_ALL as $t) { ?>

                          <div class="row-form">
                            <div class="col-sm-5">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html->addTag('strong', str_replace("%s", $t["id"], $tlint["int_box_content"]["intbc4"]));
                              ?>

                            </div>
                            <div class="col-sm-7">

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html->addInput('text', 'envo_towername[' . $t["id"] . ']', $t["name"], '', 'form-control', array('data-id' => $t["id"]));
                              ?>

                            </div>
                          </div>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));

                      } ?>

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
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tlint["int_box_title"]["intbt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html->addButtonSubmit('addRowChannel', 'Přidat kanál', 'addRowChannel', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>
                    <div id="contentChannel">

                      <?php if (!empty($ENVO_CHANNEL_ALL) && is_array($ENVO_CHANNEL_ALL)) {
                        foreach ($ENVO_CHANNEL_ALL as $c) { ?>

                          <div class="row-form">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html->addTag('strong', str_replace("%s", $c["id"], $tlint["int_box_content"]["intbc5"]));
                              ?>

                            </div>
                            <div class="col-sm-4">
                              <select name="envo_tower" class="form-control selectpicker">

                                <?php
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                $selected = ($c["towerid"] == '0') ? TRUE : FALSE;

                                echo $Html->addOption('0', 'Žádný', $selected);

                                if (isset($ENVO_TOWER_ALL) && is_array($ENVO_TOWER_ALL)) foreach ($ENVO_TOWER_ALL as $t) {

                                  $selected = (in_array($t["id"], explode(',', $c["towerid"]))) ? TRUE : FALSE;
                                  echo $Html->addOption($t["id"], $t["name"], $selected);

                                }
                                ?>

                              </select>
                            </div>
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html->addInput('text', 'envo_channelname[]', $c["number"], '', 'form-control');
                              ?>

                            </div>
                          </div>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));

                      } ?>

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
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
        <div class="row">

        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">

        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>