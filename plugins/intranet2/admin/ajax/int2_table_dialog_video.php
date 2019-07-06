<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_dialog_video.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

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

$envodata .= '
<div class="col-sm-4 no-padding full-height hidden-xs"> 
  <div class="full-height bg-master-lighter" style="overflow: hidden;">
    <img src="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filenamethumb"] . '" alt="" class="img-responsive" style="object-fit: cover;width: 100%;height: 100%;">
  </div>
</div>
<div class="col-sm-8 p-r-35 p-t-35 p-l-35 full-height item-description">
  <div id="video_notify_edit"></div>
  <!-- START CONTENT -->
  <ul class="nav nav-tabs">
    <li class="nav-item"><a href="#" class="active" data-toggle="tab" data-target="#info1" role="tab" style="padding: 12px 10px;">Hlavní Info</a></li>
    <li class="nav-item"><a href="#" class="" data-toggle="tab" data-target="#info2" role="tab" style="padding: 12px 10px;">Náhled</a></li>
    <li class="nav-item"><a href="#" class="" data-toggle="tab" data-target="#info3" role="tab" style="padding: 12px 10px;">Video</a></li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane fade active show" id="info1" role="tabpanel">
			<div class="row" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
				<div class="col-sm-12">
					<div class="row m-b-10">
						<div class="col-sm-12">
							<p><strong>Krátký Popis</strong> - maxlength 70 characters</p>
							<p><input type="text" id="shortdesc_video" class="form-control" value="' . $row["shortdescription"] . '" maxlength="70"></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p><strong>Popis</strong></p>
							<p><textarea id="desc_video" style="width: 100%;height: 100px;padding: 10px;">' . $row["description"] . '</textarea></p>
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
								<select name="envo_videocategory_dialog" class="form-control selectpicker" style="width:100%;" data-placeholder="Výběr kategorie">
									<option value=""></option>
									<option value="*" ' . ($row["category"] == "*" ? "selected" : "") . '>Bez kategorie</option>
									<option value="exploration" ' . ($row["category"] == "exploration" ? "selected" : "") . '>Obhlídka</option>
									<option value="installation" ' . ($row["category"] == "installation" ? "selected" : "") . '>Instalace</option>
									<option value="reconstruction" ' . ($row["category"] == "reconstruction" ? "selected" : "") . '>Rekonstrukce</option>
									<option value="service" ' . ($row["category"] == "service" ? "selected" : "") . '>Servisy</option>
									<option value="complaint" ' . ($row["category"] == "complaint" ? "selected" : "") . '>Reklamace</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6"></div>
					</div>
					<div class="row m-b-10">
						<div class="col-sm-12">
							<p><strong>Datum poslední editace popisů nebo kategorie</strong></p>
							<p id="timeedit">' . $row["updated"] . '</p>
						</div>
					</div>
				</div>
      </div>
    </div>
    <div class="tab-pane fade" id="info2" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <h6><strong>BASIC INFO</strong></h6>
    </div>
    <div class="tab-pane fade" id="info3" role="tabpanel" style="height:350px;overflow-y:auto;width:100%;padding-right: 20px;">
      <h6><strong>BASIC INFO</strong></h6>
      
    </div>
  </div>
  
  <input type="hidden" name="envo_editvideoid" value="' . $row["id"] . '">
  <input type="hidden" name="" id="videofolderoriginal_path" value="/' . ENVO_FILES_DIRECTORY . $row["mainfolder"] . $row["filename"] . '">
	<!-- END CONTENT -->
</div>
               ';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>