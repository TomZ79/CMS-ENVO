<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_dialog_cont.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$contID = $_POST['contID'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housecontacts WHERE id = "' . $contID . '"');
$row    = $result -> fetch_assoc();

if ($result) {

	$envodata .= '
<div class="col-sm-12 p-t-10 full-height item-description">
		<div class="p-b-10"><h4 class="bold">Editace Kontaktu</h4></div>
		<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;padding-right: 20px;">
			<div class="block-content">
				<div id="cont_notify_edit" class="notify_edit"></div>
				<!-- START CONTENT -->
				<div class="clearfix">
					<div class="row-form">
						
					</div>
					<div class="row-form">
						<div class="col-sm-1">
							<strong>Titul</strong>
						</div>
						<div class="col-sm-2">
							<input type="text" name="envo_contdegree" class="form-control" value="' . $row["degree"] . '">
						</div>
						<div class="col-sm-1">
							<strong class="p-l-10">Jméno</strong>
						</div>
						<div class="col-sm-3">
							<input type="text" name="envo_contname" class="form-control" value="' . $row["name"] . '">
						</div>
						<div class="col-sm-1">
							<strong class="p-l-10">Příjmení</strong>
						</div>
						<div class="col-sm-4">
							<input type="text" name="envo_contsurname" class="form-control" value="' . $row["surname"] . '">
						</div>
					</div>
				</div>
				<div class="clearfix">
					<hr>
				</div>
				<div class="clearfix">
					<div class="row-form">
						<div class="col-sm-4">
							<strong>Adresa bydliště</strong>
						</div>
						<div class="col-sm-8">
							<input type="text" name="envo_contaddress" class="form-control" value="' . $row["address"] . '">
						</div>
					</div>
				</div>
				<div class="clearfix">
					<hr>
				</div>
				<div class="clearfix">
					<div class="row-form p-t-10 p-b-10">
						<div class="col-sm-3">
							<strong>Telefon</strong>
						</div>
						<div class="col-sm-3">
							<input type="text" name="envo_contphone" class="form-control" value="' . $row["phone"] . '" placeholder="Formát: +420123456789">
						</div>
						<div class="col-sm-2">
							<strong class="p-l-50">Email</strong>
						</div>
						<div class="col-sm-4">
							<input type="text" name="envo_contemail" class="form-control" value="' . $row["email"] . '" placeholder="Formát: email@email.com">
						</div>
					</div>
					<div class="row-form">
						<div class="col-sm-3">
							<strong>Funkce</strong>
						</div>
						<div class="col-sm-3">
							<div class="form-group m-b-0">
								<select name="envo_contstatus" class="form-control selectpicker" data-placeholder="Výběr funkce">
									<option value="0" ' . ($row["status"] == 0 ? "selected" : "") . '>Bez funkce</option>
									<option value="1" ' . ($row["status"] == 1 ? "selected" : "") . '>Předseda</option>
									<option value="2" ' . ($row["status"] == 2 ? "selected" : "") . '>Místopředseda</option>
									<option value="3" ' . ($row["status"] == 3 ? "selected" : "") . '>Člen výboru</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3"></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row-form">
						<div class="col-sm-3">
							<strong>Datum Narození</strong>
						</div>
						<div class="col-sm-3">
							<input type="text" name="envo_birthdate" class="form-control" value="' . (!empty((int)$row['birthdate']) ? date($dateformat, strtotime($row['birthdate'])) : '') . '">
						</div>
						<div class="col-sm-2">
							<strong class="p-l-50">Pohlaví</strong>
						</div>
						<div class="col-sm-4">
							<div class="radio radio-success">
								<input type="radio" name="envo_gender" id="envo_gender1" value="1" ' . ($row["gender"] == "1" ? "checked='checked'" : "") . '>
								<label for="envo_gender1">Muž</label>
								
								<input type="radio" name="envo_gender" id="envo_gender2" value="2" ' . ($row["gender"] == "2" ? "checked='checked'" : "") . '>
								<label for="envo_gender2">Žena</label>
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
							<strong>Facebook</strong>
						</div>
						<div class="col-sm-8">
							<input type="text" name="envo_contfcb" class="form-control" value="' . $row["facebook"] . '">
						</div>
					</div>
				</div>
				<div class="clearfix">
					<hr>
				</div>
				<div class="clearfix">
					<div class="row-form p-b-10">
						<div class="col-sm-12">
							<label for="" class="m-t-10 m-b-10"><strong>Popis</strong></label>
							<textarea name="envo_contdescription" rows="10" id="envoEditorSmall" class="form-control envoEditorSmall">' . $row["description"] . '</textarea>
						</div>
					</div>
				</div>
				<input type="hidden" name="envo_editcontid" value="' . $row["id"] . '">
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