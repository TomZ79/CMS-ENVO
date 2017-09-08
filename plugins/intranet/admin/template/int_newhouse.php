<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
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
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];?>'
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
    echo $Html->addAnchor('index.php?p=intranet&amp;sp=house', $tl["button"]["btn19"], '', 'btn btn-info button');
    ?>

  </div>

  <!-- Form Content -->
  <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
    <li role="presentation" class="active">
      <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
        <span class="text"><?php echo $tlint["int_section_tab"]["inttab"]; ?></span>
      </a>
    </li>
    <li role="presentation" class="next">
      <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
        <span class="text">Fakturace</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
        <span class="text">Hlavní kontakty</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
        <span class="text">Vchody - Byty</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
        <span class="text">Nájemníci</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage6" role="tab" id="cmsPage6-tab" data-toggle="tab" aria-controls="cmsPage6">
        <span class="text">Servisy</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage7" role="tab" id="cmsPage7-tab" data-toggle="tab" aria-controls="cmsPage7">
        <span class="text">Dokumenty</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage8" role="tab" id="cmsPage8-tab" data-toggle="tab" aria-controls="cmsPage8">
        <span class="text">Fotogalerie</span>
      </a>
    </li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
      <div class="row">
        <div class="col-md-5">
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
                      echo $Html->addTag('strong', 'Název Domu');
                      echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housename', (isset($_REQUEST["envo_housename"]) ? $_REQUEST["envo_housename"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Ulice');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housestreet', (isset($_REQUEST["envo_housestreet"]) ? $_REQUEST["envo_housestreet"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Město');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housecity', (isset($_REQUEST["envo_housecity"]) ? $_REQUEST["envo_housecity"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'PSČ');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housepsc', (isset($_REQUEST["envo_housepsc"]) ? $_REQUEST["envo_housepsc"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Stát');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housestate', (isset($_REQUEST["envo_housestate"]) ? $_REQUEST["envo_housestate"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'GPS - Koordináty');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://www.gps-coordinates.net/', 'Získat GPS pozici', '', '', array('target' => '_blank'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'GPS - Latitude');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housegpslat', (isset($_REQUEST["envo_housegpslat"]) ? $_REQUEST["envo_housegpslat"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'GPS - Longitude');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housegpslng', (isset($_REQUEST["envo_housegpslng"]) ? $_REQUEST["envo_housegpslng"] : ''), '', 'form-control');
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
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', 'Vchody a Byty', 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-8">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Celkový Počet Vchodů');
                          echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                          ?>

                        </div>
                        <div class="col-md-4">
                          <div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html->addInput('text', 'envo_countentranceall', (isset($_REQUEST["envo_countentranceall"]) ? $_REQUEST["envo_countentranceall"] : ''), '', 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-8">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Celkový Počet Bytů');
                          echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                          ?>

                        </div>
                        <div class="col-md-4">
                          <div class="form-group no-margin<?php if (isset($errors["e4"]) || isset($errors["e5"])) echo " has-error"; ?>">

                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html->addInput('text', 'envo_countapartmentall', (isset($_REQUEST["envo_countapartmentall"]) ? $_REQUEST["envo_countapartmentall"] : ''), '', 'form-control');
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
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                  echo $Html->startTag('h3', array('class' => 'box-title'));
                  echo $tl["cat_box_title"]["catbt3"];
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["cat_help"]["cath3"], 'data-original-title' => $tl["cat_help"]["cath"]));
                  // Add Html Element -> endTag (Arguments: tag)
                  echo $Html->endTag('h3');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-12">
                          <select name="envo_permission[]" multiple="multiple" class="form-control">

                            <?php
                            // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                            $selected = ((isset($_REQUEST["envo_permission"]) && ($_REQUEST["envo_permission"] == '0' || (in_array('0', $_REQUEST["envo_permission"]))) || !isset($_REQUEST["envo_permission"]))) ? TRUE : FALSE;

                            echo $Html->addOption('0', $tl["cat_box_content"]["catbc7"], $selected);
                            if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

                              if (isset($_REQUEST["envo_permission"]) && (in_array($v["id"], $_REQUEST["envo_permission"]))) {
                                if (isset($_REQUEST["envo_permission"]) && (in_array('0', $_REQUEST["envo_permission"]))) {
                                  $selected = FALSE;
                                } else {
                                  $selected = TRUE;
                                }
                              } else {
                                $selected = FALSE;
                              }

                              echo $Html->addOption($v["id"], $v["name"], $selected);

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
                  echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
                  ?>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', 'Popis', 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-12">

                          <?php
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('', '<strong>Popis</strong>');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_housedescription', (isset($_REQUEST["envo_housedescription"]) ? $_REQUEST["envo_housedescription"] : ''), '4', '', array('class' => 'form-control'));
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
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Nastavení Fakturace', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-2">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'IČ');
                      ?>

                    </div>
                    <div class="col-md-10">
                      <div class="form-group no-margin<?php if (isset($errors["e6"]) || isset($errors["e7"])) echo " has-error"; ?>">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_houseic', (isset($_REQUEST["envo_houseic"]) ? $_REQUEST["envo_houseic"] : ''), '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'DIČ');
                      ?>

                    </div>
                    <div class="col-md-10">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housedic', (isset($_REQUEST["envo_housedic"]) ? $_REQUEST["envo_housedic"] : ''), '', 'form-control');
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
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Hlavních kontaků</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Vchodů a Bytů</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Nájemníků</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage6" aria-labelledby="cmsPage6-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Servisů</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage7" aria-labelledby="cmsPage7-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Dokumentů</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage8" aria-labelledby="cmsPage8-tab">
      <div class="row">
        <div class="col-md-12">
          <h5>Zadání <strong>Fotogalerie</strong> je dostupné v editaci domu po uložení základních dat o domu.</h5>
        </div>
      </div>
    </div>
  </div>

</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
