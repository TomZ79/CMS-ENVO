<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/int_table_dialog_img.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$imageID = $_POST['imageID'];

$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int_houseimg WHERE id = "' . $imageID . '"');
$row    = $result->fetch_assoc();

switch ($row["category"]) {
  case '':
    $category = 'Bez kategorie';
    break;
  case 'service':
    $category = 'Servisy';
    break;
  case 'reconstruction':
    $category = 'Rekonstrukce';
    break;
  case 'installation':
    $category = 'Instalace';
    break;
  case 'complaint':
    $category = 'Reklamace';
    break;
}

$envodata .= '
<div class="col-sm-4 no-padding full-height hidden-xs"> 
  <div class="full-height bg-master-lighter" style="overflow: hidden;">
    <img src="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 p-r-50 p-t-50 p-l-50 full-height">
  <div class="row m-b-10">
    <div class="col-sm-12">
      <p><strong>Krátky Popis</strong></p>
      <p>
         <input type="text" class="form-control" value="' . $row["shortdescription"] . '" readonly>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <p><strong>Popis</strong></p>
      <p><textarea style="width: 100%;height: 100px;padding: 10px;" readonly>' . $row["description"] . '</textarea></p>
    </div>
  </div>
  <div class="row m-b-10">
    <div class="col-sm-12">
      <p><strong>Kategorie</strong></p>
      <p><input type="text" class="form-control" value="' . $category . '" readonly></p>
    </div>
  </div>
  <div class="row m-b-10">
    <div class="col-sm-12">
      <p><strong>Datum poslední editace popisů nebo kategorie</strong></p>
      <p>' . $row["timeedit"] . '</p>
    </div>
  </div>
  <div class="row m-b-20">
    <div class="col-sm-6 col-xs-12">
      <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenameoriginal"] . '" class="btn btn-success btn-block m-r-15" download>Stáhnout Originál</a>
    </div>
    <div class="col-sm-6 col-xs-12">
      <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" class="btn btn-info btn-block" download>Stáhnout Náhled</a>
    </div>
  </div>
</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>