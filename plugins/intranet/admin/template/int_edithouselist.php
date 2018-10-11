<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page4 == "s") { ?>
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
if ($page3 == "e") { ?>
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

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
  <!-- Fixed Button for save form -->
  <div class="savebutton hidden-xs">

    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html -> addAnchor('index.php?p=intranet&amp;sp=houselist', $tl["button"]["btn19"], '', 'btn btn-info button');
    ?>

  </div>

  <!-- Form Content -->
  <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
    <li class="nav-item">
      <a href="#cmsPage1" class="active" data-toggle="tab">
        <span class="text"><?= $tlint["int_section_tab"]["inttab"] ?></span>
      </a>
    </li>
    <li class="nav-item next">
      <a href="#cmsPage2" class="" data-toggle="tab">
        <span class="text">Popis/Složky</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage3" class="" data-toggle="tab">
        <span class="text">Kontakty</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage4" class="" data-toggle="tab">
        <span class="text">Anténní systém</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage5" data-toggle="tab">
        <span class="text">Dokumenty</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage6" data-toggle="tab">
        <span class="text">Fotogalerie</span>
      </a>
    </li>
    <li class='nav-item dropdown collapsed-menu hidden'>
      <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true"
        aria-expanded="false">
        ... <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
      </div>
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
              echo $Html -> addTag('h3', 'Obecná nastavení', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Datum Zápisu');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_created', $ENVO_FORM_DATA["created"], '', 'form-control', array ( 'readonly' => 'readonly' ));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Datum Poslední Změny');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_updated', $ENVO_FORM_DATA["updated"], '', 'form-control', array ( 'readonly' => 'readonly' ));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Název Domu');
                      echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housename', $ENVO_FORM_DATA["name"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Ulice');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housestreet', $ENVO_FORM_DATA["street"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Město');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">
                        <select name="envo_housecity" class="form-control selectpicker" data-search-select2="true">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["city"] == '0') ? TRUE : FALSE;

                          echo $Html -> addOption('0', $tlint["selection"]["sel"], $selected);
                          if (isset($ENVO_REGION) && is_array($ENVO_REGION)) foreach ($ENVO_REGION as $r) {

                            echo $Html -> addOption($r, $r, ($r == $ENVO_FORM_DATA["city"]) ? TRUE : FALSE);

                          }
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Město - čtvrť');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">
                        <select name="envo_housecityarea" class="form-control selectpicker" data-search-select2="true">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["cityarea"] == '0') ? TRUE : FALSE;

                          echo $Html -> addOption('0', $tlint["selection"]["sel1"], $selected);
                          if (isset($ENVO_REGION_AREA) && is_array($ENVO_REGION_AREA)) foreach ($ENVO_REGION_AREA as $ra) {

                            echo $Html -> addOption($ra, $ra, ($ra == $ENVO_FORM_DATA["cityarea"]) ? TRUE : FALSE);

                          }
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'PSČ');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housepsc', $ENVO_FORM_DATA["psc"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'IČ');
                      echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_houseic', $ENVO_FORM_DATA["ic"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Stát');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housestate', $ENVO_FORM_DATA["state"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form p-t-10 p-b-10">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'GPS - Koordináty');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html -> addAnchor('https://www.gps-coordinates.net/', 'Získat GPS pozici', '', '', array ( 'target' => '_blank' ));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'GPS - Latitude');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housegpslat', $ENVO_FORM_DATA["latitude"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'GPS - Longitude');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housegpslng', $ENVO_FORM_DATA["longitude"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-4">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Web - Justice.cz');
                      ?>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group m-0">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', 'envo_housejustice', $ENVO_FORM_DATA["justice"], '', 'form-control');
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
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12">
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', 'Spojení s bytovým domem', 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">

                    </div>
                  </div>
                </div>
                <div class="box-footer">

                  <?php
                  // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                  echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', 'Popis a složky domu', 'box-title');
                  ?>

                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-3">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', 'Složka domu');
                      ?>

                    </div>
                    <div class="col-sm-9">
                      <div class="input-group">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html -> addInput('text', '', '/' . ENVO_FILES_DIRECTORY . $ENVO_FORM_DATA["folder"], '', 'form-control', array ( 'readonly' => 'readonly' ));
                        ?>

                        <span class="input-group-append">

                              <?php
                              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                              echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=' . $ENVO_FORM_DATA["folder"], '<i class="pg-folder_alt"></i>', '', 'btn btn-info ifManager', array ( 'type' => 'button' ));
                              ?>

                            </span>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-12">

                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html -> addLabel('', '<strong>Popis</strong>', array ( 'class' => 'm-b-10' ));
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html -> addTextarea('envo_housedescription', $ENVO_FORM_DATA["housedescription"], '10', '', array ( 'class' => 'form-control envoEditorLarge' ));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', 'Kontakty - Statutární orgán', 'box-title');
                  ?>

                </div>
                <div class="col d-flex justify-content-end">
                  <div class="form-inline">

                    <?php
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html -> addLabel('', '<strong>Datum poslední online kontroly</strong>', array ( 'class' => 'm-r-10', 'style' => 'font-size: 0.9em' ));
                    ?>

                    <div class="form-group">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html -> addInput('text', 'envo_contactcontrol', $ENVO_FORM_DATA["contactcontrol"], '', 'form-control', array ( 'style' => 'padding: 0 7px;font-size: 0.9em;height: 20px;line-height: 20px;min-height: 20px;', 'readonly' => 'readonly' ));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row p-1 p-t-10" style="background-color: #EBEBEB;">
                        <div class="col-sm-6">

                          <?php
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html -> addLabel('', '<strong>Způsob jednání statutárního orgánu</strong>');
                          ?>

                        </div>
                        <div class="col-sm-6 text-right">

                          <?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html -> addAnchor('', 'Vybrat text', 'textSelect', 'btn btn-info btn-xs m-r-10', array ( 'style' => 'padding: 0 5px;' ));
                          ?>

                        </div>
                      </div>
                      <div class="row p-1 m-b-20" style="background-color: #EBEBEB;">
                        <div class="col-sm-12">

                          <?php
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html -> addTextarea('envo_housejusticelaw', $ENVO_FORM_DATA["housejusticelaw"], '3', '', array ( 'class' => 'form-control', 'id' => 'housejusticelaw' ));
                          ?>

                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Předseda / Pověřený vlastník');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact1', $ENVO_FORM_DATA["contact1"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone1', $ENVO_FORM_DATA["contactphone1"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail1', $ENVO_FORM_DATA["contactmail1"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate1', $ENVO_FORM_DATA["contactdate1"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress1', $ENVO_FORM_DATA["contactaddress1"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Člen výboru 1');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact2', $ENVO_FORM_DATA["contact2"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone2', $ENVO_FORM_DATA["contactphone2"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail2', $ENVO_FORM_DATA["contactmail2"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate2', $ENVO_FORM_DATA["contactdate2"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress2', $ENVO_FORM_DATA["contactaddress2"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Člen výboru 2');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact3', $ENVO_FORM_DATA["contact3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone3', $ENVO_FORM_DATA["contactphone3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail3', $ENVO_FORM_DATA["contactmail3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row m-t-5">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate3', $ENVO_FORM_DATA["contactdate3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress3', $ENVO_FORM_DATA["contactaddress3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                          <div class="row m-t-5">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Facebook');
                              ?>

                            </div>
                            <div class="col-sm-10">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactfacebook3', $ENVO_FORM_DATA["contactfacebook3"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Člen výboru 3');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact4', $ENVO_FORM_DATA["contact4"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone4', $ENVO_FORM_DATA["contactphone4"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail4', $ENVO_FORM_DATA["contactmail4"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate4', $ENVO_FORM_DATA["contactdate4"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress4', $ENVO_FORM_DATA["contactaddress4"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Člen výboru 4');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact5', $ENVO_FORM_DATA["contact5"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone5', $ENVO_FORM_DATA["contactphone5"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail5', $ENVO_FORM_DATA["contactmail5"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate5', $ENVO_FORM_DATA["contactdate5"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress5', $ENVO_FORM_DATA["contactaddress5"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-form p-t-10">
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('strong', 'Člen výboru 5');
                              ?>

                            </div>
                            <div class="col-sm-8">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontact6', $ENVO_FORM_DATA["contact6"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Telefon');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactphone6', $ENVO_FORM_DATA["contactphone6"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="row">
                            <div class="col-sm-3 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Email');
                              ?>

                            </div>
                            <div class="col-sm-9">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactmail6', $ENVO_FORM_DATA["contactmail6"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col m-t-10 m-b-10 p-t-10 p-b-10" style="border-bottom: 1px solid #CCC;">
                          <div class="row">
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Datum narození');
                              ?>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactdate6', $ENVO_FORM_DATA["contactdate6"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                            <div class="col-sm-2 text-center">

                              <?php
                              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                              echo $Html -> addTag('span', 'Adresa Bydliště');
                              ?>

                            </div>
                            <div class="col-sm-6">
                              <div class="form-group m-0">

                                <?php
                                // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                                echo $Html -> addInput('text', 'envo_housecontactaddress6', $ENVO_FORM_DATA["contactaddress6"], '', 'form-control');
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html -> addTag('h3', 'Kontakty - Ostatní', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 1');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact7', $ENVO_FORM_DATA["contact7"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 2');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact8', $ENVO_FORM_DATA["contact8"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 3');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact9', $ENVO_FORM_DATA["contact9"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 4');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact10', $ENVO_FORM_DATA["contact10"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 5');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact11', $ENVO_FORM_DATA["contact11"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-sm-2">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html -> addTag('strong', 'Kontakt 6');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html -> addInput('text', 'envo_housecontact12', $ENVO_FORM_DATA["contact12"], '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', 'Informace o anténním systému', 'box-title');
                  ?>

                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-12">

                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html -> addLabel('', '<strong>Popis</strong>', array ( 'class' => 'm-b-10' ));
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html -> addTextarea('envo_antennadescription', $ENVO_FORM_DATA["antennadescription"], '10', '', array ( 'class' => 'form-control envoEditorLarge' ));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html -> addTag('h3', 'Seznam dokumentů', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                  <div class="bold">
                    Výběr souboru
                  </div>
                  <!-- Upload Files -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12 col-sm-9 col-lg-9 m-t-10">
                        <div id="upload" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

                          <!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_doclist" accept=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai"/>
                          </div>

                        </span>
                          <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                          <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3 col-lg-3 m-t-10">
                        <div class="form-group">

                          <?php
                          // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                          echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadListBtnDocu', 'btn btn-info', array ( 'style' => 'width: 100%;' ));
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 m-t-10">
                        <!-- Upload Files Output -->
                        <div id="listdocuprogress" class="small hint-text" style="display: none;">
                          <div class="progress">
                            <div id="listdocuprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
                          </div>
                          <div>
                            <span>Determinate progress </span><span id="listdocupercent" class="bold"></span>
                            <span> | Bytes received </span><span id="listdocubyterec" class="bold"></span>
                            <span> | Total bytes </span><span id="listdocubytetotal" class="bold"></span>
                          </div>
                        </div>
                        <p id="listdocuoutput" style="display: none;"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table id="listtabledocu" class="table">
                      <thead>
                      <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 15%;">Typ souboru</th>
                        <th style="width: 40%;">Popis</th>
                        <th class="text-center" style="width: 20%;">Soubor</th>
                        <!-- Last 'th' is generated by Jquery plugin Tabledit -->
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_FORM_DATA_DOCU) && is_array($ENVO_FORM_DATA_DOCU)) foreach ($ENVO_FORM_DATA_DOCU as $d) { ?>

                        <tr>
                          <td class="text-center"><?= $d["id"] ?></td>
                          <td class="text-center"><?= envo_extension_icon($d["filename"]) ?></td>
                          <td><?= $d["description"] ?></td>
                          <td class="text-center">

                            <?php
                            echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" target="_blank">Zobrazit</a>';
                            echo ' | ';
                            echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" download>Stáhnout</a>';
                            ?>

                          </td>
                          <!-- Last 'td' is generated by Jquery plugin Tabledit -->
                        </tr>

                      <?php } else {
                        echo '<tr class="noedit" style="height: 49px"><td colspan="6" style="vertical-align: middle;"><span class="bold text-warning-dark">Nenalezen žádný záznam</span></td></tr>';
                      } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <div class="box-footer">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage6" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html -> addTag('h3', 'Fotogalerie', 'box-title');
                  ?>

                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                      <div class="bold">
                        Výběr souboru
                      </div>
                      <!-- Upload Files -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xs-12 col-sm-8 col-lg-9 m-t-10">
                            <div id="upload_img" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

                          <!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_imglist" accept="image/*"/>
                          </div>

                        </span>
                              <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                              <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
                            </div>

                          </div>
                          <div class="col-xs-12 col-sm-4 col-lg-3 m-t-10">
                            <div class="form-group">

                              <?php
                              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                              echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadListBtnImg', 'btn btn-info', array ( 'style' => 'width: 100%;' ));
                              ?>

                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 m-t-10">
                            <!-- Upload Files Output -->
                            <div id="listimgprogress" class="small hint-text" style="display: none;">
                              <div class="progress">
                                <div id="listimgprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
                              </div>
                              <div>
                                <span>Determinate progress </span><span id="listimgpercent" class="bold"></span>
                                <span> | Bytes received </span><span id="listimgbyterec" class="bold"></span>
                                <span> | Total bytes </span><span id="listimgbytetotal" class="bold"></span>
                              </div>
                            </div>
                            <p id="listimgoutput" style="display: none;"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <hr>
                      <button type="button" id="showPhotoList" class="btn btn-complete btn-cons">
                        <span>Seznam</span>
                      </button>
                      <hr>
                    </div>
                  </div>
                  <div id="last_upload" class="row">
                    <div class="col-sm-12">
                      <div class="dateblock_<?= uniqid(); ?> m-b-20 clearfix" style="display:none;">
                        <div class="padding-10 m-b-20 bg-primary bold text-white">Nový upload</div>
                      </div>
                      <div id="last_upload_content"></div>
                    </div>
                  </div>
                  <div id="list_photo" class="row">
                    <div class="col-sm-12">
                      <div id="gallery_envo_0" class="gallery_envo">

                        <?php

                        // print_array($ENVO_FORM_DATA_IMG);

                        if (!empty($ENVO_FORM_DATA_IMG) && is_array($ENVO_FORM_DATA_IMG)) {

                          foreach ($ENVO_FORM_DATA_IMG as $subarray) {

                            // Get first value 'timedefault'
                            echo '<div class="dateblock_' . uniqid() . ' m-b-20 clearfix">';
                            echo '<div class="padding-10 m-b-20" style="background:gray;color:white;font-weight:700;">' . reset($subarray) . '</div>';

                            // Loop photos array
                            foreach ($subarray['photos'] as $imgarray) {

                              echo '<div id="' . $imgarray["id"] . '" class="gallery-item-' . $imgarray["id"] . ' ' . $imgarray["category"] . ' float-left" data-width="1" data-height="1" style="margin: 5px;">';

                              echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" alt=""></div>';

                              echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($imgarray["filenamethumb"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="gallery-0" href="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" data-caption="' . ($imgarray["shortdescription"] ? $imgarray["shortdescription"] : "NO SHORT DESCRIPTION") . ($imgarray["description"] ? " - " . $imgarray["description"] : "") . '">
                                        <button class="btn btn-info btn-xs btn-mini fs-14" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="pg-image"></i>
                                        </button>
                                      </a>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-listimg" type="button" data-dialog="imgitemDetails" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace Informací">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 delete-listimg" type="button" data-id="' . $imgarray["id"] . '" data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';

                              echo '<div class="full-width padding-10">';

                              echo '<p class="bold">Krátký Popis</p><p class="shortdesc">' . $imgarray["shortdescription"] . '</p>';

                              echo '</div>';

                              echo '</div>';
                            }

                            echo '</div>';
                          }

                        }

                        ?>

                      </div>
                    </div>
                  </div>

                  <div id="imgitemDetails" class="dialog item-details">
                    <div class="dialog__overlay"></div>
                    <div class="dialog__content">
                      <div class="container-fluid">
                        <div class="row dialog__overview">
                          <!-- Data over AJAX  -->
                        </div>
                      </div>
                      <button class="closedialog action top-right" type="button" data-dialog-close>
                        <i class="pg-close fs-30"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" name="folderpathlist" value="<?= $ENVO_FORM_DATA["folder"] ?>">

</form>

<?php
include_once APP_PATH . 'plugins/intranet/admin/template/selecttext_modal.php';
include_once APP_PATH . 'admin/template/footer.php';
?>
