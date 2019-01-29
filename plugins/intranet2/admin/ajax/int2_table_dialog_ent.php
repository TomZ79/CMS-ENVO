<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_dialog_ent.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$entID = $_POST['entID'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_houseent WHERE id = "' . $entID . '"');
$row    = $result -> fetch_assoc();

// Set variable
if ($row["katastr"]) {
	$katastr = $row["katastr"];
} else {
	$katastr = 'https://www.ikatastr.cz/';
}

if ($row["gpslat"] && $row["gpslng"]) {
	$mapycz = 'http://www.mapy.cz/#q=' . $row["gpslat"] . '%2C' . $row["gpslng"];
	$osm    = 'https://www.openstreetmap.org/?mlat=' . $row["gpslat"] . '&amp;mlon=' . $row["gpslng"] . '&amp;zoom=16#map=18/' . $row["gpslat"] . '/' . $row["gpslng"];
} else {
	$mapycz = '';
	$osm    = '';
}

if ($result) {

	$envodata .= '
<div class="col-sm-12 p-t-10 full-height item-description">
		<div class="p-b-10"><h4 class="bold">Editace Vchod</h4></div>
		<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;">
			<div class="block-content" id="addent">
				<div id="ent_notify_edit" class="notify_edit"></div>
				<!-- START CONTENT -->
				<div class="clearfix">
					<div class="row-form">
						<div class="col-sm-4">
							<strong>Ulice</strong>
						</div>
						<div class="col-sm-8">
							<input type="text" name="envo_entstreet" class="form-control" value="' . $row["street"] . '">
						</div>
					</div>
					<div class="row-form">
						<div class="col-sm-4">
							<strong>Výtah</strong>
						</div>
						<div class="col-sm-8">
							<div class="radio radio-success">
								<input type="radio" name="envo_entelevator" id="envo_entelevator1" value="1" ' . ($row["elevator"] == "1" ? "checked='checked'" : "") . '>
								<label for="envo_entelevator1">Ano</label>
								<input type="radio" name="envo_entelevator" id="envo_entelevator2" value="0" ' . ($row["elevator"] == "0" ? "checked='checked'" : "") . '>
								<label for="envo_entelevator2">Ne</label>
								<input type="radio" name="envo_entelevator" id="envo_entelevator3" value="2" ' . ($row["elevator"] == "2" ? "checked='checked'" : "") . '>
								<label for="envo_entelevator3">Není známo</label>
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="col-sm-4">
							<strong>Počet bytů</strong>
						</div>
						<div class="col-sm-8">
							<div class="form-group m-0">
								<input type="text" name="envo_entapartment" class="form-control" value="' . $row["apartment"] . '">
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix">
					<hr>
				</div>
				<div class="clearfix">
					<div class="row-form p-t-10 p-b-10">
					<div class="col-sm-4">
						<strong>GPS - Koordináty</strong>
					</div>
					<div class="col-sm-8">
						<div class="form-group m-0">
							<a href="https://www.latlong.net/" target="NewGPS">LATLONG.net</a>
							<span class="m-l-10 m-r-10">|</span>
							<a href="#" class="getgps"><strong>Získat GPS z OpenStreetMap</strong></a>
						</div>
					</div>
				</div>
					<div class="row-form">
						<div class="col-sm-4">
							<strong>GPS - Latitude</strong>
						</div>
						<div class="col-sm-8">
							<div class="loadingdata_gps" style="visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;"></div>
							<div class="form-group m-0">
								<input type="text" name="envo_housegpslat" class="form-control" value="' . $row["gpslat"] . '">
							</div>
						</div>
					</div>
					<div class="row-form">
						<div class="col-sm-4">
							<strong>GPS - Longitude</strong>
						</div>
						<div class="col-sm-8">
							<div class="loadingdata_gps" style="visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;"></div>
							<div class="form-group m-0">
								<input type="text" name="envo_housegpslng" class="form-control" value="' . $row["gpslng"] . '">
							</div>
						</div>
					</div>
					<div class="row-form p-t-10 p-b-10">
						<div class="col-sm-4">
							<strong>GPS - Mapy</strong>
						</div>
						<div class="col-sm-8">
							<div class="form-group m-0">
								<a href="' . $mapycz . '" class="mapycz" target="MapGPS">Zobrazit na Mapy.cz</a>
								<span class="m-l-10 m-r-10">|</span>
								<a href="' . $osm . '" class="openstreet" target="MapGPS">Zobrazit na OpenStreetMaps</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix">
					<hr>
				</div>
				<div class="clearfix">
					<div class="row-form">
						<div class="col-sm-4">
							<strong>iKatastr</strong>
						</div>
						<div class="col-sm-8">
							<div class="form-group m-0 ikatastr">
								<input type="text" name="envo_houseikatastr" class="form-control" value="' . $row["katastr"] . '">
							</div>
						</div>
					</div>
					<div class="row-form p-t-10 p-b-10">
						<div class="col-sm-4">
							<strong>iKatastr - Link</strong>
						</div>
						<div class="col-sm-8">
							<div class="loadingdata_ikatastr" style="visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;"></div>
							<div class="form-group m-0 ikatastrlink">
								<a href="' . $katastr . '" target="WindowKATASTR">Zobrazit informace z Katastru</a>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="envo_editentid" value="' . $row["id"] . '">
				<!-- END CONTENT -->
			</div>
		</div>
	</div>
               ';

} else {

	$envodata .= '
<div style="margin: auto;"><strong>Error loading data from DB !</strong></div>	
		';

}

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>