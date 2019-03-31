<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/int2_table_dialog_video.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$videoID = $_POST['videoID'];

$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int2_housevideo WHERE id = "' . $videoID . '"');
$row    = $result->fetch_assoc();

switch ($row["category"]) {
	case '*':
		$category = 'Bez kategorie';
		break;
	case 'exploration':
		$category = 'Obhlídka';
		break;
	case 'installation':
		$category = 'Instalace';
		break;
	case 'reconstruction':
		$category = 'Rekonstrukce';
		break;
	case 'service':
		$category = 'Servisy';
		break;
	case 'complaint':
		$category = 'Reklamace';
		break;
}

$envodata .= '
<div class="col-sm-4 p-0 h-100 d-none d-sm-block"> 
  <div class="h-100 bg-master-lighter" style="overflow: hidden;">
    <img src="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 pr-5 pt-5 pl-5 h-100" style="overflow: auto;">
  <div class="row mb-2">
    <div class="col-12 col-sm-12">
      <p><strong>Krátky Popis</strong></p>
      <p>
         <input type="text" class="form-control" value="' . $row["shortdescription"] . '" readonly>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-12">
      <p><strong>Popis</strong></p>
      <p><textarea style="width: 100%;height: 100px;padding: 10px;" readonly>' . $row["description"] . '</textarea></p>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-12 col-sm-12">
      <p><strong>Kategorie</strong></p>
      <p><input type="text" class="form-control" value="' . $category . '" readonly></p>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-12 col-sm-12">
      <p><strong>Datum poslední editace popisů nebo kategorie</strong></p>
      <p>' . date('d.m.Y H:i', strtotime($row['updated'])) . '</p>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-12 col-sm-6">
      <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filename"] . '" class="btn btn-success btn-block m-r-15" download>Stáhnout Video</a>
    </div>
    <div class="col-12 col-sm-6">
      <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" class="btn btn-info btn-block" download>Stáhnout Náhled</a>
    </div>
  </div>
</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>