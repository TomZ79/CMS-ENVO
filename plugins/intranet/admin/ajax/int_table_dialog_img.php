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
$imageID = $_POST['imageID'];

$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseimg WHERE id = "' . $imageID . '"');
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
    <img src="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" class="img-responsive" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 p-r-35 p-t-35 p-l-35 full-height item-description">
  <div id="notificationcontainer"></div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#info1" style="padding: 12px 10px;">Main</a></li>
    <li><a data-toggle="tab" href="#info2" style="padding: 12px 10px;">Thumbnail</a></li>
    <li><a data-toggle="tab" href="#info3" style="padding: 12px 10px;">Original</a></li>
  </ul>
  <div class="tab-content">
    <div id="info1" class="tab-pane fade in active" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Short Description</strong> - maxlength 70 characters</p>
          <p><input type="text" id="shortdesc" class="form-control" value="' . $row["shortdescription"] . '" maxlength="70" readonly></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <p><strong>Description</strong></p>
          <p><textarea id="desc" style="width: 100%;height: 100px;padding: 10px;" readonly>' . $row["description"] . '</textarea></p>
          <div class="pull-right">
            <button id="editdesc" class="btn btn-info btn-xs" type="button">Edit Description</button>
            <button id="savedesc" class="btn btn-success btn-xs" type="button" style="display:none;" data-id="' . $row["id"] . '">Save and Close</button>
            <button id="closedesc" class="btn btn-info btn-xs" type="button" style="display:none;">Close</button>
          </div>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Category</strong></p>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-6">
          <div class="form-group no-margin">
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
          <div class="pull-right">
            <button id="editcat" class="btn btn-info btn-xs" type="button">Edit Category</button>
            <button id="savecat" class="btn btn-success btn-xs" type="button" style="display:none;" data-id="' . $row["id"] . '">Save and Close</button>
            <button id="closecat" class="btn btn-info btn-xs" type="button" style="display:none;">Close</button>
          </div>
        </div>
      </div>
      <div class="row m-b-10">
        <div class="col-sm-12">
          <p><strong>Date of edit description or category</strong></p>
          <p id="timeedit">' . $row["timeedit"] . '</p>
        </div>
      </div>
    </div>
    <div id="info2" class="tab-pane fade" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <p><strong>Main Folder</strong></p>
      <p>/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . '</p>
      <p><strong>Thumb Name</strong></p>
      <p>' . $row["filenamethumb"] . '</p>
      <p><strong>Thumb Type</strong></p>
      <p>' . strtolower(pathinfo($row["filenamethumb"], PATHINFO_EXTENSION)) . '</p>
      <p><strong>Thumb Dimensions ( width x height )</strong></p>
      <p>' . $row["widththumb"] . ' x ' . $row["heightthumb"] . ' px </p>
      <p><strong>Date of upload thumb</strong></p>
      <p>' . $row["timedefault"] . '</p>
    </div>
    <div id="info3" class="tab-pane fade" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <h6><strong>BASIC INFO</strong></h6>
      <hr>
      <p><strong>Main Folder</strong></p>
      <p>/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . '</p>
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