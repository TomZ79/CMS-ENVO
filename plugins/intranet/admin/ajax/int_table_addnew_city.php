<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_city.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// CZ: Získání dat z DB
$resultmax = $envodb -> query('SELECT MAX(id) AS max FROM ' . DB_PREFIX . 'int_settings_city LIMIT 1');
$rowmax    = $resultmax -> fetch_assoc();
$row_id    = $rowmax['max'];
$row_newid = $rowmax['max'] + 1;

$resultcity = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_city');


// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cntcity = $resultcity -> num_rows;

// CZ: Přidání nového řádku
if ($row_id) {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');

  $dataregion0 .= $Html -> addOption('0', '--------');

  while ($rowregion = $resultregion -> fetch_assoc()) {
    $dataregion0 .= $Html -> addOption($rowregion["id"], $rowregion["region"], FALSE);
  }

  //
  $resultdistrict = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_district');

  $datadistrict0 .= $Html -> addOption('0', '--------');

  while ($rowdistrict = $resultdistrict -> fetch_assoc()) {
    $datadistrict0 .= $Html -> addOption($rowdistrict["id"], $rowdistrict["district"], FALSE);
  }

  $envodata .= '
  <tr>
    <td class="text-center">' . $row_newid . '<input type="hidden" name="envo_city_0[]" class="rowid" value="' . $row_newid . '"/></td>
    <td><div class="form-group m-0"><select name="envo_city_1[]" class="form-control selectpicker">' . $dataregion0 . '</select></div></td>
    <td><div class="form-group m-0"><select name="envo_city_2[]" class="form-control selectpicker">' . $datadistrict0 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_city_3[]', '', '', 'form-control') . '</td>
    <td class="text-center">' . $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow') . '</td>
  </tr>
  ';

} else {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');

  $dataregion1 .= $Html -> addOption('0', '--------');

  while ($rowregion = $resultregion -> fetch_assoc()) {
    $dataregion1 .= $Html -> addOption($rowregion["id"], $rowregion["region"], FALSE);
  }

  //
  $resultdistrict = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_district');

  while ($rowdistrict = $resultdistrict -> fetch_assoc()) {
    $datadistrict1 .= $Html -> addOption($rowdistrict["id"], $rowdistrict["district"], FALSE);
  }

  $envodata .= '
  <tr>
    <td class="text-center">1<input type="hidden" name="envo_city_0[]" class="rowid" value="1"/></td>
    <td><div class="form-group m-0"><select name="envo_city_1[]" class="form-control selectpicker">' . $dataregion1 . '</select></div></td>
    <td><div class="form-group m-0"><select name="envo_city_2[]" class="form-control selectpicker">' . $datadistrict1 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_city_3[]', '', '', 'form-control') . '</td>
    <td class="text-center">' . $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow') . '</td>
  </tr>
  ';

}

if ($row_cntcity > 0) {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');
  $dataregion2 .= $Html -> addOption('0', '--------');

  //
  $resultdistrict = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_district');
  $datadistrict2 .= $Html -> addOption('0', '--------');

  while ($rowcity = $resultcity -> fetch_assoc()) {

    while ($rowregion = $resultregion -> fetch_assoc()) {
      $dataregion2 .= $Html -> addOption($rowregion["id"], $rowregion["region"], ($rowcity["region_id"] == $rowregion["id"]) ? TRUE : FALSE);
    }

    while ($rowdistrict = $resultdistrict -> fetch_assoc()) {
      $datadistrict2 .= $Html -> addOption($rowdistrict["id"], $rowdistrict["district"], ($rowcity["district_id"] == $rowdistrict["id"]) ? TRUE : FALSE);
    }

    $envodata .= '
    <tr>
    <td class="text-center">' . $rowcity["id"] . '<input type="hidden" name="envo_city_0[]" class="rowid" value="' . $rowcity["id"] . '"/></td>
    <td><div class="form-group m-0"><select name="envo_city_1[]" class="form-control selectpicker">' . $dataregion2 . '</select></div></td>
    <td><div class="form-group m-0"><select name="envo_city_2[]" class="form-control selectpicker">' . $datadistrict2 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_city_3[]', $rowcity["city"], '', 'form-control') . '</td>
    <td class="text-center">' . $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow') . '</td>
    </tr>
    ';
  }

} else {

  $envodata .= '';

}

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>