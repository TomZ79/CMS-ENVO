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
                        echo $Html->addInput('text', 'envo_housename', $ENVO_FORM_DATA["name"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housestreet', $ENVO_FORM_DATA["street"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housecity', $ENVO_FORM_DATA["city"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'PSC');
                      ?>

                    </div>
                    <div class="col-md-7">
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housepsc', $ENVO_FORM_DATA["psc"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housestate', $ENVO_FORM_DATA["state"], '', 'form-control');
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
        <div class="col-md-3">
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
                        echo $Html->addInput('text', 'envo_countentranceall', $ENVO_FORM_DATA["countentrance"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_countapartmentall', $ENVO_FORM_DATA["countapartment"], '', 'form-control');
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
        <div class="col-md-4">
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
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ($ENVO_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

                        echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc16"], $selected);
                        if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

                          $selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["permission"]))) ? TRUE : FALSE;
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
                        echo $Html->addInput('text', 'envo_houseic', $ENVO_FORM_DATA["ic"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housedic', $ENVO_FORM_DATA["dic"], '', 'form-control');
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
      <div class="row m-b-20">
        <div class="col-md-12 p-l-15 p-r-15 ">
          <div class="form-inline pull-right-sm pull-right-md pull-right-lg">
            <div class="form-group">
              <label for="name">Jméno: </label>

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'addRowCont', (isset($_REQUEST["addRowCont"])) ? $_REQUEST["addRowCont"] : '', '', 'form-control', array('style' => 'height: 35px;', 'placeholder' => 'Celé jméno'));
              ?>

            </div>
            <div class="form-group">

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('button', '', 'Přidat nový kontakt', 'addRowCont', 'btn btn-info');
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-body no-padding">
              <div class="table-responsive">
                <table id="tablecontacts" class="table table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Jméno</th>
                    <th>Adresa</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Výbor</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php if (!empty($ENVO_FORM_DATA_CONT) && is_array($ENVO_FORM_DATA_CONT)) foreach ($ENVO_FORM_DATA_CONT as $c) { ?>

                    <tr>
                      <td><?php echo $c["id"]; ?></td>
                      <td><?php echo $c["name"]; ?></td>
                      <td><?php echo $c["address"]; ?></td>
                      <td><?php echo $c["phone"]; ?></td>
                      <td><?php echo $c["email"]; ?></td>
                      <td>

                        <?php
                        switch ($foundApt["commission"]) {
                          case '0':
                            echo 'Není ve Výboru';
                            break;
                          case '1':
                            echo 'Předseda';
                            break;
                          case '2':
                            echo 'Člen Výboru';
                            break;
                          case '3':
                            echo 'Pověřený vlastník';
                            break;
                        }
                        ?>

                    </tr>

                  <?php } else {
                    echo '<tr class="noedit" style="height: 49px"><td colspan="6">Nenalezen žádný záznam</td></tr>';
                  } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
      <div class="row m-b-20">
        <div class="col-md-12 p-l-15 p-r-15 ">
          <div class="form-inline pull-right-sm pull-right-md pull-right-lg">
            <div class="form-group">
              <label for="name">Číslo vchodu: </label>

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'addRowEnt', (isset($_REQUEST["addRowEnt"])) ? $_REQUEST["addRowEnt"] : '', 'addRowEnt', 'form-control', array('style' => 'height: 35px;', 'placeholder' => 'Číslo vchodu'));
              ?>

            </div>
            <div class="form-group">

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('button', '', 'Přidat nový řádek', 'addRowEdit', 'btn btn-info');
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-body no-padding">
              <div class="table-responsive">
                <table id="tableentrance" class="table table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Číslo vchodu</th>
                    <th>Počet bytů</th>
                    <th>Počet pater</th>
                    <th>Výtah</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php if (!empty($ENVO_FORM_DATA_ENT) && is_array($ENVO_FORM_DATA_ENT)) foreach ($ENVO_FORM_DATA_ENT as $e) { ?>

                    <tr>
                      <td><?php echo $e["id"]; ?></td>
                      <td><?php echo $e["entrance"]; ?></td>
                      <td><?php echo $e["countapartment"]; ?></td>
                      <td><?php echo $e["countetage"]; ?></td>
                      <td>

                        <?php
                        switch ($e["elevator"]) {
                          case '0':
                            echo 'Není známo';
                            break;
                          case '1':
                            echo 'Ano';
                            break;
                          case '2':
                            echo 'Ne';
                            break;
                        }
                        ?>
                      </td>
                    </tr>

                  <?php } else {
                    echo '<tr class="noedit" style="height: 49px"><td colspan="6">Nenalezen žádný záznam</td></tr>';
                  } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">

      <?php if (!empty($ENVO_FORM_DATA_ENT) && is_array($ENVO_FORM_DATA_ENT)) {
        foreach ($ENVO_FORM_DATA_ENT as $e) { ?>

          <div class="row">
            <div class="col-md-12 m-b-20">
              <div class="col-md-6">
                <h5 style="margin: 2px;">Číslo vchodu:
                  <strong><?php echo($e["entrance"] ? $e["entrance"] : '0'); ?></strong></h5>
              </div>
              <div class="col-md-6">

                <?php
                // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                echo $Html->addButton('button', '', 'Přidat nový řádek', 'button', '', 'btn btn-info pull-right addRowEditApt', array('data-entrance' => ($e["entrance"] ? $e["entrance"] : '0')));
                ?>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-body no-padding">
                  <div class="table-responsive">
                    <table id="tableapartment_<?php echo($e["entrance"] ? $e["entrance"] : '0'); ?>" class="table">
                      <thead>
                      <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-1">Číslo bytu</th>
                        <th class="col-md-1">Patro</th>
                        <th class="col-md-2">Jméno</th>
                        <th class="col-md-2">Telefon</th>
                        <th class="col-md-2">Výbor</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php

                      if (isset($ENVO_FORM_DATA_APT) && is_array($ENVO_FORM_DATA_APT)) {
                        $foundApt = array();
                        foreach ($ENVO_FORM_DATA_APT as $a) {
                          if ($a["entrance"] == $e["entrance"]) {
                            $foundApt[] = $a;
                          }
                        }

                        if (count($foundApt) != 0) {

                          foreach ($foundApt as $foundApt) {

                            echo '<tr>';

                            echo '<td>' . $foundApt['id'] . '</td>';
                            echo '<td>' . $foundApt['number'] . '</td>';
                            echo '<td>' . $foundApt['etage'] . '</td>';
                            echo '<td>' . $foundApt['name'] . '</td>';
                            echo '<td>' . $foundApt['phone'] . '</td>';
                            echo '<td>';

                            switch ($foundApt["commission"]) {
                              case '0':
                                echo 'Není ve Výboru';
                                break;
                              case '1':
                                echo 'Předseda';
                                break;
                              case '2':
                                echo 'Člen Výboru';
                                break;
                              case '3':
                                echo 'Pověřený vlastník';
                                break;
                            }

                            echo '</td>';

                            echo '</tr>';

                          }

                        } else {
                          echo '<tr class="noedit" style="height: 49px"><td colspan="6">Nenalezen žádný záznam</td></tr>';
                        }

                      }

                      ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php }
      } else { ?>

        <div class="row">
          <div class="col-md-12">

            <?php
            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
            ?>

          </div>
        </div>

      <?php } ?>

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
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Seznam dokumentů', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="col-sm-6">
                <p class="padding-15 no-margin">Složka dokumentů: <strong><?php echo '/' . JAK_FILES_DIRECTORY . $ENVO_FORM_DATA["folder"] . '/documents'; ?></strong></p>
              </div>
              <div class="col-sm-6">
                <!-- Upload Files -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-12 col-sm-9 col-lg-10 m-t-10">
                      <div class="input-group file" style="width: 100%;">
                      <span class="input-group-btn" style="width: 1%;">
                        <!-- File-clear button -->
                        <button type="button" class="btn btn-default file-clear" style="display:none;">
                          <span class="fa fa-remove"></span> Smazat
                        </button>
                        <!-- File-input button-->
                        <div class="btn btn-default file-input">
                          <span class="fa fa-folder-open"></span>
                          <span class="file-input-title">Vybrat Soubor</span>
                          <input type="file" name="input-file" id="fileinput" accept=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf"/>
                        </div>
                      </span>
                        <input type="text" class="form-control file-filename" style="margin-left: -1px;" disabled>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-lg-2 m-t-10">
                      <div class="form-group">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('button', '', 'Upload', 'uploadBtn', 'btn btn-info');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 m-t-10">
                      <!-- Upload Files Output -->
                      <p id="docuprogress" class="small hint-text" style="display: none;">Determinate progress
                        <span id="percent"></span>
                      </p>
                      <p id="docuoutput" style="display: none;"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table id="tableadocu" class="table">
                      <thead>
                      <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-2">Typ souboru</th>
                        <th class="col-md-7">Popis</th>
                        <th class="col-md-2">Soubor</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_FORM_DATA_DOCU) && is_array($ENVO_FORM_DATA_DOCU)) foreach ($ENVO_FORM_DATA_DOCU as $d) { ?>

                        <tr>
                          <td><?php echo $d["id"]; ?></td>
                          <td> </td>
                          <td><?php echo $d["description"]; ?></td>
                          <td><?php echo '<a href="/' . JAK_FILES_DIRECTORY . $d["filepath"] . '">Soubor</a>'; ?></td>
                        </tr>

                      <?php } else {
                        echo '<tr class="noedit" style="height: 49px"><td colspan="6">Nenalezen žádný záznam</td></tr>';
                      } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <input type="hidden" name="folderdocumentspath" value="<?php echo $ENVO_FORM_DATA["folder"]; ?>">

            </div>
            <div class="box-footer">

            </div>
          </div>
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
