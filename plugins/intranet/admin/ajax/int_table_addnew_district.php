<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_district.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// CZ: Získání dat z DB
$resultmax = $envodb -> query('SELECT MAX(id) AS max FROM ' . DB_PREFIX . 'int_settings_district LIMIT 1');
$rowmax    = $resultmax -> fetch_assoc();
$row_id    = $rowmax['max'];
$row_newid = $rowmax['max'] + 1;

$resultdistrict = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_district');


// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cntdistrict = $resultdistrict -> num_rows;

// CZ: Přidání nového řádku
if ($row_id) {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');

  $dataselect0 .= $Html -> addOption('0', '--------');

  while ($rowregion = $resultregion -> fetch_assoc()) {
    $dataselect0 .= $Html -> addOption($rowregion["id"], $rowregion["region"], FALSE);
  }

  $envodata .= '
  <tr>
    <td class="text-center">' . $row_newid . '<input type="hidden" name="envo_district_0[]" class="rowid" value="' . $row_newid . '"/></td>
    <td><div class="form-group m-0"><select name="envo_district_1[]" class="form-control selectpicker">' . $dataselect0 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_district_2[]', '', '', 'form-control') . '</td>
    <td class="text-center">' . $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow') . '</td>
  </tr>
  ';

} else {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');

  $dataselect1 .= $Html -> addOption('0', '--------');

  while ($rowregion = $resultregion -> fetch_assoc()) {
    $dataselect1 .= $Html -> addOption($rowregion["id"], $rowregion["region"], FALSE);
  }

  $envodata .= '
  <tr>
    <td class="text-center">1<input type="hidden" name="envo_district_0[]" class="rowid" value="1"/></td>
    <td><div class="form-group m-0"><select name="envo_district_1[]" class="form-control selectpicker">' . $dataselect1 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_district_2[]', '', '', 'form-control') . '</td>
    <td class="text-center">' . $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteRow') . '</td>
  </tr>
  ';
}

if ($row_cntdistrict > 0) {

  //
  $resultregion = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_settings_region');

  $dataselect2 .= $Html -> addOption('0', '--------');

  while ($rowdistrict = $resultdistrict -> fetch_assoc()) {

    while ($rowregion = $resultregion -> fetch_assoc()) {
      $dataselect2 .= $Html -> addOption($rowregion["id"], $rowregion["region"], ($rowdistrict["region_id"] == $rowregion["id"]) ? TRUE : FALSE);
    }

    $envodata .= '
    <tr>
    <td class="text-center">' . $rowdistrict["id"] . '<input type="hidden" name="envo_district_0[]" class="rowid" value="' . $rowdistrict["id"] . '"/></td>
    <td><div class="form-group m-0"><select name="envo_district_1[]" class="form-control selectpicker">' . $dataselect2 . '</select></div></td>
    <td>' . $Html -> addInput('text', 'envo_district_2[]', $rowdistrict["district"], '', 'form-control') . '</td>
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