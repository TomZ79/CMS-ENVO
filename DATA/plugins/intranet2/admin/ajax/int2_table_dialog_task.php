<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_dialog_task.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$taskID = $_POST['taskID'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housetasks WHERE id = "' . $taskID . '"');
$row    = $result -> fetch_assoc();

if ($result) {

	$envodata .= '
<div class="col-sm-12 p-t-10 full-height item-description">
		<div class="p-b-10"><h4 class="bold">Editace Úkolu</h4></div>
		<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;padding-right: 20px;">
			<div class="block-content">
				<div id="task_notify_edit" class="notify_edit"></div>
				<!-- START CONTENT -->
				<div class="row-form">
					<div class="col-sm-6">
						<strong>Titulek</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="envo_edittasktitle" class="form-control" value="' . $row["title"] . '">
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-6">
						<strong>Priorita</strong>
					</div>
					<div class="col-sm-6">
						<div class="form-group m-0">
							<select name="envo_edittaskpriority" class="form-control selectpicker">
								<option value="0" ' . ($row["priority"] == 0 ? "selected" : "") . '>Nedůležitá</option>
								<option value="1" ' . ($row["priority"] == 1 ? "selected" : "") . '>Nízká priorita</option>
								<option value="2" ' . ($row["priority"] == 2 ? "selected" : "") . '>Střední priorita</option>
								<option value="3" ' . ($row["priority"] == 3 ? "selected" : "") . '>Vysoká priorita</option>
								<option value="4" ' . ($row["priority"] == 4 ? "selected" : "") . '>Nejvyšší priorita</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-6">
						<strong>Status</strong>
					</div>
					<div class="col-sm-6">
						<div class="form-group m-0">
							<select name="envo_edittaskstatus" class="form-control selectpicker">
								<option value="0" ' . ($row["status"] == 0 ? "selected" : "") . '>Žádný status</option>
								<option value="1" ' . ($row["status"] == 1 ? "selected" : "") . '>Zápis</option>
								<option value="2" ' . ($row["status"] == 2 ? "selected" : "") . '>V řešení</option>
								<option value="3" ' . ($row["status"] == 3 ? "selected" : "") . '>Vyřešeno - Uzavřeno</option>
								<option value="4" ' . ($row["status"] == 4 ? "selected" : "") . '>Stornováno</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-6">
						<strong>Datum Úkolu</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="envo_edittasktime" class="form-control" value="' . date($dateformat, strtotime($row["time"])) . '">
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-6">
						<strong>Datum Připomenutí</strong>
					</div>
					<div class="col-sm-6">
						<input type="text" name="envo_edittaskreminder" class="form-control" value="' . date($dateformat, strtotime($row["reminder"])) . '">
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-12">
						<label for="" class="m-t-10 m-b-10"><strong>Popis</strong></label>
						<textarea name="envo_edittaskdescription" rows="10" id="envoEditorSmall" class="form-control envoEditorSmall">' . $row["description"] . '</textarea>
					</div>
				</div>
				<input type="hidden" name="envo_edittaskid" value="' . $row["id"] . '">
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