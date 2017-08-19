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
        <span class="text">Vchody - Byty</span>
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
                      echo $Html->addTag('strong', 'PSC');
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
                        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ((isset($_REQUEST["jak_permission"]) && ($_REQUEST["jak_permission"] == '0' || (in_array('0', $_REQUEST["jak_permission"]))) || !isset($_REQUEST["jak_permission"]))) ? TRUE : FALSE;

                        echo $Html->addOption('0', $tl["cat_box_content"]["catbc7"], $selected);
                        if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) {

                          if (isset($_REQUEST["jak_permission"]) && (in_array($v["id"], $_REQUEST["jak_permission"]))) {
                            if (isset($_REQUEST["jak_permission"]) && (in_array('0', $_REQUEST["jak_permission"]))) {
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
        <div class="col-md-12 m-b-20">

          <?php
          // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
          echo $Html->addButton('button', '', 'Přidat nový řádek', 'button', 'addRowNew', 'btn btn-info pull-right', array('onclick' => 'add_row(tableentrance);'));
          ?>

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-body no-padding">
              <div class="table-responsive">
                <table id="tableentrance" class="table">
                  <thead>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-2">Číslo vchodu</th>
                    <th class="col-md-2">Počet bytů</th>
                    <th class="col-md-2">Počet pater</th>
                    <th class="col-md-2">Výtah</th>
                    <th class="col-md-3 text-center">Akce</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr id="row1">
                    <td class="id">1</td>
                    <td>
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_numberentrance[]', (isset($_REQUEST["envo_numberentrance"])) ? $_REQUEST["envo_numberentrance"] : '', '', 'form-control');
                        ?>

                      </div>
                    </td>
                    <td>
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_countapartment[]', (isset($_REQUEST["envo_countapartment"])) ? $_REQUEST["envo_countapartment"] : '', '', 'form-control');
                        ?>

                      </div>
                    </td>
                    <td>
                      <div class="form-group no-margin">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_countetage[]', (isset($_REQUEST["envo_countetage"])) ? $_REQUEST["envo_countetage"] : '', '', 'form-control');
                        ?>

                      </div>
                    </td>
                    <td>
                      <select name="envo_elevator[]" class="form-control selectpicker">

                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        echo $Html->addOption('2', 'Není známo', ((isset($_REQUEST["envo_elevator"]) && ($_REQUEST["envo_elevator"] == '2'))) ? TRUE : FALSE);
                        echo $Html->addOption('1', 'Ano', ((isset($_REQUEST["envo_elevator"]) && ($_REQUEST["envo_elevator"] == '1'))) ? TRUE : FALSE);
                        echo $Html->addOption('0', 'Ne', ((isset($_REQUEST["envo_elevator"]) && ($_REQUEST["envo_elevator"] == '0'))) ? TRUE : FALSE);
                        ?>

                      </select>
                    </td>
                    <td></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
