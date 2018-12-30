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
      echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
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
          <span class="text"><?= $tlint["int_section_tab"]["inttab2"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage3" class="" data-toggle="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab3"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage4" class="" data-toggle="tab">
          <span class="text"><?= $tlint["int_section_tab"]["inttab1"] ?></span>
        </a>
      </li>
      <li class='nav-item dropdown collapsed-menu hidden'>
        <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
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
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlint["int_box_content"]["intbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html -> addInput('text', 'envo_title', $ENVO_SETTING_VAL["intranettitle"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlint["int_box_content"]["intbc2"]);
                        echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <select name="envo_date" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html -> addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['intranetdateformat'] == '') ? TRUE : FALSE);

                            echo $Html -> addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'd.m.Y') ? TRUE : FALSE);
                            echo $Html -> addOption('d F Y', 'd F Y (01 January 2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'd F Y') ? TRUE : FALSE);
                            echo $Html -> addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'l m.Y') ? TRUE : FALSE);
                            echo $Html -> addOption('l F Y', 'l F Y (Monday January 2017)', ($ENVO_SETTING_VAL['intranetdateformat'] == 'l F Y') ? TRUE : FALSE);
                            ?>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlint["int_box_content"]["intbc3"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">
                          <select name="envo_time" class="form-control selectpicker">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html -> addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['intranettimeformat'] == '') ? TRUE : FALSE);
                            ?>

                            <optgroup label="<?= $tl["selection"]["sel111"] ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html -> addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - h:i A') ? TRUE : FALSE);
                              echo $Html -> addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - h:i:s A') ? TRUE : FALSE);
                              echo $Html -> addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - g:i A') ? TRUE : FALSE);
                              echo $Html -> addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - g:i:s A') ? TRUE : FALSE);
                              ?>

                            </optgroup>
                            <optgroup label="<?= $tl["selection"]["sel112"] ?>">

                              <?php
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html -> addOption(' - H:i', ' - H:i ( - 13:00)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i') ? TRUE : FALSE);
                              echo $Html -> addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i:s') ? TRUE : FALSE);
                              echo $Html -> addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($ENVO_SETTING_VAL['intranettimeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html -> addTag('strong', $tlint["int_box_content"]["intbc1"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="envo_skin" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html -> addOption('', 'Default', ($ENVO_SETTING_VAL["intranetskin"] == "") ? TRUE : FALSE);
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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowRegion', 'Přidat Kraj', 'addRowRegion', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>

                    <table id="setting_table_region" class="table">
                      <thead>
                      <tr>
                        <th class="col-sm-1 text-center">#</th>
                        <th class="col-sm-10">Kraj</th>
                        <th class="col-sm-1"></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_REGION) && is_array($ENVO_REGION)) {
                        foreach ($ENVO_REGION as $r) { ?>

                          <tr>
                            <td class="text-center">
                              <?= $r["id"] ?>
                              <input type="hidden" name="envo_region_0[]" class="rowid" value="<?= $r["id"] ?>"/>
                            </td>
                            <td>

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_region_1[]', $r["region"], '', 'form-control');
                              ?>

                            </td>
                            <td class="text-center">

                              <?php
                              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                              echo $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow');

                              ?>

                            </td>
                          </tr>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo '<tr class="nodata">';
                        echo '<td colspan="5">';
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));
                        echo '</td>';
                        echo '</tr>';

                      } ?>

                      </tbody>
                    </table>

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
          <div class="col-sm-7">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt6"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowDistrict', 'Přidat Okres', 'addRowDistrict', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>

                    <table id="setting_table_district" class="table">
                      <thead>
                      <tr>
                        <th class="col-sm-1 text-center">#</th>
                        <th class="col-sm-5">Kraj</th>
                        <th class="col-sm-5">Okres</th>
                        <th class="col-sm-1"></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_DISTRICT) && is_array($ENVO_DISTRICT)) {
                        foreach ($ENVO_DISTRICT as $d) { ?>

                          <tr>
                            <td class="text-center">
                              <?= $d["id"] ?>
                              <input type="hidden" name="envo_district_0[]" class="rowid" value="<?= $d["id"] ?>"/>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_district_1[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_REGION) && is_array($ENVO_REGION)) foreach ($ENVO_REGION as $r) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($r["id"], $r["region"], ($r["id"] == $d["region_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_district_2[]', $d["district"], '', 'form-control');
                              ?>

                            </td>
                            <td class="text-center">

                              <?php
                              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                              echo $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow');

                              ?>

                            </td>
                          </tr>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo '<tr class="nodata">';
                        echo '<td colspan="5">';
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));
                        echo '</td>';
                        echo '</tr>';

                      } ?>

                      </tbody>
                    </table>

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
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt7"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowCity', 'Přidat Město', 'addRowCity', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>

                    <table id="setting_table_city" class="table">
                      <thead>
                      <tr>
                        <th class="col-sm-1 text-center">#</th>
                        <th class="col-sm-3">Kraj</th>
                        <th class="col-sm-3">Okres</th>
                        <th class="col-sm-4">Město</th>
                        <th class="col-sm-1"></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_CITY) && is_array($ENVO_CITY)) {
                        foreach ($ENVO_CITY as $c) { ?>

                          <tr>
                            <td class="text-center">
                              <?= $c["id"] ?>
                              <input type="hidden" name="envo_city_0[]" class="rowid" value="<?= $c["id"] ?>"/>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_city_1[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_REGION) && is_array($ENVO_REGION)) foreach ($ENVO_REGION as $r) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($r["id"], $r["region"], ($r["id"] == $c["region_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_city_2[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_DISTRICT) && is_array($ENVO_DISTRICT)) foreach ($ENVO_DISTRICT as $d) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($d["id"], $d["district"], ($d["id"] == $c["district_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_city_3[]', $c["city"], '', 'form-control');
                              ?>

                            </td>
                            <td class="text-center">

                              <?php
                              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                              echo $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow');

                              ?>

                            </td>
                          </tr>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo '<tr class="nodata">';
                        echo '<td colspan="5">';
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));
                        echo '</td>';
                        echo '</tr>';

                      } ?>

                      </tbody>
                    </table>

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
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt8"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowCityArea', 'Přidat Oblast Města', 'addRowCityArea', 'btn btn-info btn-sm');
                      ?>

                    </div>
                    <div class="clearfix m-b-20"></div>

                    <table id="setting_table_cityarea" class="table">
                      <thead>
                      <tr>
                        <th class="col-sm-1 text-center">#</th>
                        <th class="col-sm-2">Kraj</th>
                        <th class="col-sm-2">Okres</th>
                        <th class="col-sm-2">Město</th>
                        <th class="col-sm-4">Oblast/Čtvrť</th>
                        <th class="col-sm-1"></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php if (!empty($ENVO_CITYAREA) && is_array($ENVO_CITYAREA)) {
                        foreach ($ENVO_CITYAREA as $ca) { ?>

                          <tr>
                            <td class="text-center">
                              <?= $ca["id"] ?>
                              <input type="hidden" name="envo_cityarea_0[]" class="rowid" value="<?= $ca["id"] ?>"/>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_cityarea_1[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_REGION) && is_array($ENVO_REGION)) foreach ($ENVO_REGION as $r) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($r["id"], $r["region"], ($r["id"] == $ca["region_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_cityarea_2[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_DISTRICT) && is_array($ENVO_DISTRICT)) foreach ($ENVO_DISTRICT as $d) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($d["id"], $d["district"], ($d["id"] == $ca["district_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="form-group m-0">
                                <select name="envo_cityarea_3[]" class="form-control selectpicker">

                                  <?php
                                  echo $Html -> addOption('0', '--------');
                                  if (isset($ENVO_CITY) && is_array($ENVO_CITY)) foreach ($ENVO_CITY as $c) {

                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html -> addOption($c["id"], $c["city"], ($c["id"] == $ca["city_id"]) ? TRUE : FALSE);

                                  }
                                  ?>

                                </select>
                              </div>
                            </td>
                            <td>

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_cityarea_4[]', $ca["city_area"], '', 'form-control');
                              ?>

                            </td>
                            <td class="text-center">

                              <?php
                              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                              echo $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow');

                              ?>

                            </td>
                          </tr>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo '<tr id="nodata">';
                        echo '<td colspan="6">';
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));
                        echo '</td>';
                        echo '</tr>';

                      } ?>

                      </tbody>
                    </table>

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
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">

        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                echo $Html -> startTag('h3', array ( 'class' => 'box-title' ));
                echo $tlint["int_box_title"]["intbt5"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ( 'data-content' => $tl["cat_help"]["cath3"], 'data-original-title' => $tl["cat_help"]["cath"] ));
                // Add Html Element -> endTag (Arguments: tag)
                echo $Html -> endTag('h3');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <p>Přístupová práva jednotlivých uživatelů podle uživatelské skupiny do frontend rozhraní analýzy bytových domů.</p>
                    <div class="row-form">
                      <div class="col-sm-12">
                        <select name="envo_permission[]" multiple="multiple" class="form-control" size="10">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          // $selected = (empty($ENVO_SETTING_PERMISSION)) ? TRUE : FALSE;

                          echo $Html -> addOption('0', 'Žádná skupina', $selected);
                          if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

                            if (isset($ENVO_SETTING_PERMISSION) && is_array($ENVO_SETTING_PERMISSION)) foreach ($ENVO_SETTING_PERMISSION as $ep) {

                              if ($v["id"] == $ep["id"]) {

                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                $selected = ($ep["intranetanalytics"] == '1') ? TRUE : FALSE;

                                echo $Html -> addOption($v["id"], $v["name"], $selected);
                              }

                            }

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
                echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ( 'data-loading-text' => $tl["button"]["btn41"] ));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowTower', 'Přidat vysílač', 'addRowTower', 'btn btn-info btn-sm');
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
                              echo $Html -> addTag('strong', str_replace("%s", $t["id"], $tlint["int_box_content"]["intbc4"]));
                              ?>

                            </div>
                            <div class="col-sm-7">

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_towername[' . $t["id"] . ']', $t["name"], '', 'form-control', array ( 'data-id' => $t["id"] ));
                              ?>

                            </div>
                          </div>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));

                      } ?>

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
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html -> addTag('h3', $tlint["int_box_title"]["intbt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="float-right">

                      <?php
                      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                      echo $Html -> addButtonSubmit('addRowChannel', 'Přidat kanál', 'addRowChannel', 'btn btn-info btn-sm');
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
                              echo $Html -> addTag('strong', str_replace("%s", $c["id"], $tlint["int_box_content"]["intbc5"]));
                              ?>

                            </div>
                            <div class="col-sm-4">
                              <select name="envo_tower" class="form-control selectpicker">

                                <?php
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                $selected = ($c["towerid"] == '0') ? TRUE : FALSE;

                                echo $Html -> addOption('0', 'Žádný', $selected);

                                if (isset($ENVO_TOWER_ALL) && is_array($ENVO_TOWER_ALL)) foreach ($ENVO_TOWER_ALL as $t) {

                                  $selected = (in_array($t["id"], explode(',', $c["towerid"]))) ? TRUE : FALSE;
                                  echo $Html -> addOption($t["id"], $t["name"], $selected);

                                }
                                ?>

                              </select>
                            </div>
                            <div class="col-sm-4">

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html -> addInput('text', 'envo_channelname[]', $c["number"], '', 'form-control');
                              ?>

                            </div>
                          </div>

                        <?php }
                      } else {

                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ( 'class' => 'alert bg-info text-white' ));

                      } ?>

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
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>