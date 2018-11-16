<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_list_table_dialog_img.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$imageID = $_POST['imageID'];

// Define select
$select = array('Bez popisu', 'Obhlídka ( xxx )');
foreach($select as $item){
  $selectoption .= '<option value="' . $item . '">' . $item . '</option>';
}

//
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_houseanalyticsimg WHERE id = "' . $imageID . '"');
$row    = $result -> fetch_assoc();

switch ($row["exiforientation"]) {
  case '1':
    $exiforientation = '1 = Horizontal (normal)';
    break;
  case '2':
    $exiforientation = '2 = Mirror horizontal';
    break;
  case '3':
    $exiforientation = '3 = Rotate 180';
    break;
  case '4':
    $exiforientation = '4 = Mirror vertical';
    break;
  case '5':
    $exiforientation = '5 = Mirror horizontal and rotate 270 CW';
    break;
  case '6':
    $exiforientation = '6 = Rotate 90 CW';
    break;
  case '7':
    $exiforientation = '7 = Mirror horizontal and rotate 90 CW';
    break;
  case '8':
    $exiforientation = '8 = Rotate 270 CW';
    break;
}

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
    <li class="nav-item"><a href="#" class="" data-toggle="tab" data-target="#info2" role="tab" style="padding: 12px 10px;">Náhled</a></li>
    <li class="nav-item"><a href="#" class="" data-toggle="tab" data-target="#info3" role="tab" style="padding: 12px 10px;">Originál</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane fade active show" id="info1" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Krátky Popis</strong> - maxlength 70 characters</p>
          <p><input type="text" id="listshortdesc" class="form-control" value="' . $row["shortdescription"] . '" maxlength="70" readonly></p>
        </div>
      </div>
      <div class="row m-b-10" style="display:none;">
        <div class="col-sm-12">
          <p><span class="text-uppercase">Předdefinované texty</span></p>
          <p>Text <span class="text-danger">xxx</span> nahradit měsícem a rokem ve formátu "Září 2018"</p>
          <div class="form-group m-0">
            <select name="envo_listshortdesc" class="form-control" style="width:100%;"><option selected disabled>Choose Text for Short Description</option>' . $selectoption . '</select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <p><strong>Popis</strong></p>
          <p><textarea id="listdesc" style="width: 100%;height: 100px;padding: 10px;" readonly>' . $row["description"] . '</textarea></p>
          <div class="float-right">
            <button id="editlistimgdesc" class="btn btn-info btn-xs" type="button">Editace popisů</button>
            <button id="savelistimgdesc" class="btn btn-success btn-xs" type="button" style="display:none;" data-id="' . $row["id"] . '">Uložit a Zavřít</button>
            <button id="closelistimgdesc" class="btn btn-info btn-xs" type="button" style="display:none;">Zavřít</button>
          </div>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Datum poslední editace popisů</strong></p>
          <p id="timeedit">' . $row["timeedit"] . '</p>
        </div>
      </div>
      <div class="row m-b-20">
        <div class="col-sm-12">
          <p><strong>Ke stažení</strong></p>
        </div>
        <div class="col-sm-6 col-xs-12">
          <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" class="btn btn-info btn-block" download="">Stáhnout Náhled</a>
        </div>
        <div class="col-sm-6 col-xs-12">
          <a href="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenameoriginal"] . '" class="btn btn-info btn-block" download="">Stáhnout Originál</a>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="info2" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <!-- THUMBS - BASIC INFO -->
      <h6><strong>BASIC INFO</strong></h6>
      <hr>
      <!-- Main Folder -->
      <p><strong>Main Folder</strong></p>
      <p>/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . '</p>
      <!-- Name -->
      <p><strong>Name of thumb</strong></p>
      <p>' . $row["filenamethumb"] . '</p>
      <!-- Type -->
      <p><strong>Type of thumb</strong></p>
      <p>' . strtolower(pathinfo($row["filenamethumb"], PATHINFO_EXTENSION)) . '</p>
      <!-- Dimensions -->
      <p><strong>Dimensions of thumb image ( width x height )</strong></p>
      <p>' . $row["widththumb"] . ' x ' . $row["heightthumb"] . ' px </p>
      <!-- Upload date -->
      <p><strong>Date of upload thumb</strong></p>
      <p>' . $row["timeupload"] . '</p>
      <!-- Size of image -->
      <p><strong>Size of thumb</strong></p>
      <p>' . ($row["sizethumb"] > 0 ? formatSizeUnits($row["sizethumb"]) : "<span class='bold text-warning-dark'>No data</span>") . '</p>
    </div>
    <div class="tab-pane fade" id="info3" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <!-- ORIGINAL IMAGE - BASIC INFO -->
      <h6><strong>BASIC INFO</strong></h6>
      <hr>
      <!-- Main Folder -->
      <p><strong>Main Folder</strong></p>
      <p>/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . '</p>
      <!-- Name -->
      <p><strong>Name of original image</strong></p>
      <p>' . $row["filenameoriginal"] . '</p>
      <!-- Type -->
      <p><strong>Type of original image</strong></p>
      <p>' . strtolower(pathinfo($row["filenameoriginal"], PATHINFO_EXTENSION)) . '</p>
      <!-- Dimensions -->
      <p><strong>Dimensions of original image ( width x height )</strong></p>
      <p>' . $row["widthoriginal"] . ' x ' . $row["heightoriginal"] . ' px </p>
      <!-- Upload date -->
      <p><strong>Date of upload original image</strong></p>
      <p>' . $row["timeupload"] . '</p>
      <!-- Size of image -->
      <p><strong>Size of original image</strong></p>
      <p>' . ($row["sizeoriginal"] > 0 ? formatSizeUnits($row["sizeoriginal"]) : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- EXIF DATA -->
      <h6 class="m-t-20"><strong>EXIF DATA</strong></h6>
      <hr>
      <!-- Exif Make -->
      <p><strong>Exif Make</strong></p>
      <p>' . ($row["exifmake"] ? $row["exifmake"] : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- Exif Model -->
      <p><strong>Exif Model</strong></p>
      <p>' . ($row["exifmodel"] ? $row["exifmodel"] : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- Exif Software -->
      <p><strong>Exif Software</strong></p>
      <p>' . ($row["exifsoftware"] ? $row["exifsoftware"] : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- Exif Image Dimensions -->
      <p><strong>Exif Image Dimensions ( width x height )</strong></p>
      <p>' . (($row["exifimagewidth"] && $row["exifimageheight"]) ? $row["exifimagewidth"] . " x " . $row["exifimageheight"] . " px" : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- Exif Orientation -->
      <p><strong>Exif Orientation</strong></p>
      <p>' . ($exiforientation ? $exiforientation : "<span class='bold text-warning-dark'>No data</span>") . '</p>
      <!-- Exif Create Date -->
      <p><strong>Exif Create Date</strong></p>
      <p>' . ((isset($row["exifcreatedate"]) && $row["exifcreatedate"] > 0) ? $row["exifcreatedate"] : "<span class='bold text-warning-dark'>No data</span>") . '</p>
    </div>
  </div>

</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>