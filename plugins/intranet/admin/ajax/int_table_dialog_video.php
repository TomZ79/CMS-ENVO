<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_dialog_img.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$videoID = $_POST['videoID'];

$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousevideo WHERE id = "' . $videoID . '"');
$row    = $result->fetch_assoc();

$envodata .= '
<div class="col-sm-4 no-padding full-height hidden-xs"> 
  <div class="full-height bg-master-lighter" style="overflow: hidden;">
    <img src="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" class="img-responsive" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 p-r-35 p-t-35 p-l-35 full-height item-description">
  <div id="notificationcontainer"></div>
  <ul class="nav nav-tabs">
    <li class="nav-item"><a href="#" class="active" data-toggle="tab" data-target="#info1" role="tab" style="padding: 12px 10px;">Hlavní Info</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane fade active show" id="info1" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Krátky Popis</strong> - maxlength 70 characters</p>
          <p><input type="text" id="shortdesc" class="form-control" value="' . $row["shortdescription"] . '" maxlength="70" readonly></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <p><strong>Popis</strong></p>
          <p><textarea id="desc" style="width: 100%;height: 100px;padding: 10px;" readonly>' . $row["description"] . '</textarea></p>
          <div class="float-right">
            <button id="editvideodesc" class="btn btn-info btn-xs" type="button">Editace popisů</button>
            <button id="savevideodesc" class="btn btn-success btn-xs" type="button" style="display:none;" data-id="' . $row["id"] . '">Uložit a Zavřít</button>
            <button id="closevideodesc" class="btn btn-info btn-xs" type="button" style="display:none;">Zavřít</button>
          </div>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Kategorie</strong></p>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-6">
          <div class="form-group m-0">
            <select name="envo_imgcategory_dialog" class="form-control selectpicker" style="width:100%;" disabled>
              <option value="">Bez kategorie</option>
              <option value="service" '. ($row["category"] == "service" ? "selected": "") . '>Servisy</option>
              <option value="reconstruction" '. ($row["category"] == "reconstruction" ? "selected": "") . '>Rekonstrukce</option>
              <option value="installation" '. ($row["category"] == "installation" ? "selected": "") . '>Instalace</option>
              <option value="complaint" '. ($row["category"] == "complaint" ? "selected": "") . '>Reklamace</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="float-right">
            <button id="editvideocat" class="btn btn-info btn-xs" type="button">Editace kategorie</button>
            <button id="savevideocat" class="btn btn-success btn-xs" type="button" style="display:none;" data-id="' . $row["id"] . '">Uložit a Zavřít</button>
            <button id="closevideocat" class="btn btn-info btn-xs" type="button" style="display:none;">Zavřít</button>
          </div>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Datum poslední editace popisů nebo kategorie</strong></p>
          <p id="timeedit">' . $row["timeedit"] . '</p>
        </div>
      </div>
    </div>
  </div>

</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>