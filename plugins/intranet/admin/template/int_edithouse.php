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
        <span class="text">Vchody - Byty</span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
        <span class="text">Nájemníci</span>
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
                        echo $Html->addInput('text', 'envo_housename', $JAK_FORM_DATA["name"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housestreet', $JAK_FORM_DATA["street"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housecity', $JAK_FORM_DATA["city"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housepsc', $JAK_FORM_DATA["psc"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housestate', $JAK_FORM_DATA["state"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_countentranceall', $JAK_FORM_DATA["countentrance"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_countapartmentall', $JAK_FORM_DATA["countapartment"], '', 'form-control');
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
                      <select name="jak_permission[]" multiple="multiple" class="form-control">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ($JAK_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

                        echo $Html->addOption('0', $tlgwl["gwl_box_content"]["gwlbc16"], $selected);
                        if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) {

                          $selected = (in_array($v["id"], explode(',', $JAK_FORM_DATA["permission"]))) ? TRUE : FALSE;
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
                        echo $Html->addInput('text', 'envo_houseic', $JAK_FORM_DATA["ic"], '', 'form-control');
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
                        echo $Html->addInput('text', 'envo_housedic', $JAK_FORM_DATA["dic"], '', 'form-control');
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
        <div class="col-md-12 m-b-20">
          <input type="button" value="Přidat nový řádek" id="addRowEdit" class="btn btn-info pull-right">
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

                  <?php foreach ($JAK_FORM_DATA_ENT as $e) { ?>

                    <tr>
                      <td><?php echo $e["id"]; ?></td>
                      <td><?php echo $e["numberentrance"]; ?></td>
                      <td><?php echo $e["countapartment"]; ?></td>
                      <td><?php echo $e["countetage"]; ?></td>
                      <td><?php echo($e["elevator"] == 1 ? 'Ano' : ($e["elevator"] == 2 ? 'Není známo' : 'Ne')); ?></td>
                    </tr>

                  <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
      <?php foreach ($JAK_FORM_DATA_ENT as $e) { ?>
        <div class="row">
          <div class="col-md-12 m-b-20">
            <div class="col-md-6">
              <h5 style="margin: 2px;">Číslo vchodu: <strong><?php echo $e["numberentrance"]; ?></strong></h5>
            </div>
            <div class="col-md-6">

              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Přidat nový řádek', 'button', 'addRowNew', 'btn btn-info pull-right', array('onclick' => 'add_row(tableapartment' . $e["numberentrance"] . ');'));
              ?>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-body no-padding">
                <div class="table-responsive">
                  <table id="tableapartment<?php echo $e["numberentrance"]; ?>" class="table">
                    <thead>
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-1">Číslo bytu</th>
                      <th class="col-md-1">Patro</th>
                      <th class="col-md-2">Jméno</th>
                      <th class="col-md-2">Telefon</th>
                      <th class="col-md-2">Výbor</th>
                      <th class="col-md-1"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="row1">
                      <td class="id">1</td>
                      <td><input type="text" name="envo_number[]" class="form-control"></td>
                      <td><input type="text" name="envo_etage[]" class="form-control"></td>
                      <td><input type="text" name="envo_name[]" class="form-control"></td>
                      <td><input type="text" name="envo_phone[]" class="form-control"></td>
                      <td>
                        <select name="envo_commission[]" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', 'Není ve Výboru', ((isset($_REQUEST["envo_commission"]) && ($_REQUEST["envo_commission"] == ''))) ? TRUE : FALSE);
                          echo $Html->addOption('Předseda', 'Předseda', ((isset($_REQUEST["envo_commission"]) && ($_REQUEST["envo_commission"] == 'Předseda'))) ? TRUE : FALSE);
                          echo $Html->addOption('Člen Výboru', 'Člen Výboru', ((isset($_REQUEST["envo_commission"]) && ($_REQUEST["envo_commission"] == 'Člen Výboru'))) ? TRUE : FALSE);
                          echo $Html->addOption('Pověřený vlastník', 'Pověřený vlastník', ((isset($_REQUEST["envo_commission"]) && ($_REQUEST["envo_commission"] == 'Pověřený vlastník'))) ? TRUE : FALSE);
                          ?>

                        </select>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
