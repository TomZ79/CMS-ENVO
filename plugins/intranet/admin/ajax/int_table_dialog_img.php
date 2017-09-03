<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_apt.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$imageID = $_POST['imageID'];

$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseimg WHERE id = "' . $imageID . '"');
$row    = $result->fetch_assoc();

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
    <img src="/' . JAK_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" class="img-responsive" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 p-r-35 p-t-35 p-l-35 full-height item-description">
  <div id="notificationcontainer"></div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#info1">Description</a></li>
    <li><a data-toggle="tab" href="#info2">Thumbnail</a></li>
    <li><a data-toggle="tab" href="#info3">Original</a></li>
  </ul>
  <div class="tab-content">
    <div id="info1" class="tab-pane fade in active" style="height:350px;overflow-y:auto;width:100%;">
      <p><strong>Description</strong></p>
      <p><textarea id="desc" style="width: 100%;height: 100px;padding: 10px;" disabled>' . $row["description"] . '</textarea></p>
      <p><strong>Date of edit description</strong></p>
      <p id="timeedit">' . $row["timeedit"] . '</p>
      <div class="pull-right">
        <button id="editdesc" class="btn btn-info" type="button">Edit Description</button>
        <button id="savedesc" class="btn btn-success" type="button" style="display:none;" data-id="' . $row["id"] . '">Save and Close</button>
        <button id="closedesc" class="btn btn-info" type="button" style="display:none;">Close</button>
      </div>
    </div>
    <div id="info2" class="tab-pane fade" style="height:350px;overflow-y:auto;width:100%;">
      <p><strong>Main Folder</strong></p>
      <p>/' . JAK_FILES_DIRECTORY . $row["mainfolder"] . '</p>
      <p><strong>Thumb Name</strong></p>
      <p>' . $row["filenamethumb"] . '</p>
      <p><strong>Thumb Type</strong></p>
      <p>' . strtolower(pathinfo($row["filenamethumb"], PATHINFO_EXTENSION)) . '</p>
      <p><strong>Thumb Dimensions ( width x height )</strong></p>
      <p>' . $row["widththumb"] . ' x ' . $row["heightthumb"] . ' px </p>
      <p><strong>Date of upload thumb</strong></p>
      <p>' . $row["timedefault"] . '</p>
    </div>
    <div id="info3" class="tab-pane fade" style="height:350px;overflow-y:auto;width:100%;">
      <h6><strong>BASIC INFO</strong></h6>
      <hr>
      <p><strong>Main Folder</strong></p>
      <p>/' . JAK_FILES_DIRECTORY . $row["mainfolder"] . '</p>
      <p><strong>Name of original image</strong></p>
      <p>' . $row["filenameoriginal"] . '</p>
      <p><strong>Type of original image</strong></p>
      <p>' . strtolower(pathinfo($row["filenameoriginal"], PATHINFO_EXTENSION)) . '</p>
      <p><strong>Dimensions of original image ( width x height )</strong></p>
      <p>' . $row["widthoriginal"] . ' x ' . $row["heightoriginal"] . ' px </p>
      <h6 class="m-t-20"><strong>EXIF DATA</strong></h6>
      <hr>
      <p><strong>Exif Make</strong></p>
      <p>' . $row["exifmake"] . '</p>
      <p><strong>Exif Model</strong></p>
      <p>' . $row["exifmodel"] . '</p>
      <p><strong>Exif Software</strong></p>
      <p>' . $row["exifsoftware"] . '</p>
      <p><strong>Exif Image Dimensions ( width x height )</strong></p>
      <p>' . $row["exifimagewidth"] . ' x ' . $row["exifimageheight"] . ' px </p>
      <p><strong>Exif Orientation</strong></p>
      <p>' . $exiforientation . '</p>
      <p><strong>Exif Create Date</strong></p>
      <p>' . $row["exifcreatedate"] . '</p>
    </div>
  </div>

</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>