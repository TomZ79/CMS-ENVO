<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page4 == "s") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
	</script>
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
					if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<?php
setlocale(LC_TIME, $site_locale);
for ($m = 1; $m <= 12; $m++) {
	$MONTHS[$m] = array (
		'months_number' => $m,
		'months_name'   => ucwords(strftime('%B', mktime(0, 0, 0, $m, 1)))
	);
}
$curYear = date('Y');

$STATUS[] = array ('status_number' => '0', 'status_name' => 'Bez statusu');
$STATUS[] = array ('status_number' => '1', 'status_name' => 'V řešení');
$STATUS[] = array ('status_number' => '2', 'status_name' => 'Realizace');
$STATUS[] = array ('status_number' => '3', 'status_name' => 'Uzavřeno - Vyfakturováno');
$STATUS[] = array ('status_number' => '4', 'status_name' => 'Storno');
?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<!-- Action button block -->
		<div class="actionbtn-block d-none d-sm-block">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">
					<span class="text">Nastavení</span>
				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" data-toggle="tab">
					<span class="text">Termíny</span>
				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage3" data-toggle="tab">
					<span class="text">Dokumenty</span>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-info" role="alert">
							<button class="close" data-dismiss="alert"></button>
							<strong>Info: </strong>Po vyplnění základních údajů o zakázce a následném uložení budou zpřístupněny další záložky pro práci se zakázkou.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'Základní informace o bytovém domě', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col col-sm-12 col-md-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Datum Zápisu');
												?>

											</div>
											<div class="col col-sm-12 col-md-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_created', $ENVO_FORM_DATA["created"], '', 'form-control', array ('readonly' => 'readonly'));
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col col-sm-12 col-md-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Datum Poslední Změny');
												?>

											</div>
											<div class="col col-sm-12 col-md-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_updated', $ENVO_FORM_DATA["updated"], '', 'form-control', array ('readonly' => 'readonly'));
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Číslo Zakázky');
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractnumber', $ENVO_FORM_DATA["number"], '', 'form-control', array ('readonly' => 'readonly'));
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Název Zakázky');
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractname', $ENVO_FORM_DATA["name"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Subjekt');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractobject', $ENVO_FORM_DATA["object"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Předmět');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractsubject', $ENVO_FORM_DATA["subject"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Číslo Rozpočtu');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractbudget', $ENVO_FORM_DATA["contractbudget"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Cena');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_contractprice', $ENVO_FORM_DATA["contractprice"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Status');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">
													<select name="envo_contractstatus" class="form-control selectpicker" data-placeholder="Výběr statusu">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														if (isset($STATUS) && is_array($STATUS)) foreach ($STATUS as $s) {

															$selected = ($s["status_number"] == $ENVO_FORM_DATA["status"]) ? TRUE : FALSE;
															echo $Html -> addOption($s["status_number"], $s["status_name"], $selected, '', '');

														}
														?>

													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
								?>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<div class="row">
									<div class="d-flex align-items-center">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('h3', 'Popis a složky zakázky', 'box-title');
										?>

									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-3">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Složka zakázky');
												?>

											</div>
											<div class="col-sm-9">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', '', '/' . ENVO_FILES_DIRECTORY . $ENVO_FORM_DATA["folder"], '', 'form-control', array ('readonly' => 'readonly'));
													?>

													<span class="input-group-append">

                              <?php
															// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
															echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=' . $ENVO_FORM_DATA["folder"], '<i class="pg-folder_alt"></i>', '', 'btn btn-info ifManager', array ('type' => 'button'));
															?>

                            </span>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-12">

												<?php
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('', '<strong>Popis zakázky</strong>', array ('class' => 'm-b-10'));
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_contractdescription', $ENVO_FORM_DATA["description"], '10', '', array ('class' => 'form-control envoEditorLarge'));
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<div class="row">
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'Plánovaný termín realizace - Start', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Měsíc');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_plannedmonths_start" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr měsíce">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														if (isset($MONTHS) && is_array($MONTHS)) foreach ($MONTHS as $m) {

															$selected = ($m["months_number"] == $ENVO_FORM_DATA["plannedmonths_start"]) ? TRUE : FALSE;
															echo $Html -> addOption($m["months_number"], $m["months_name"], $selected, '', '');

														}
														?>

													</select>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Rok');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_plannedyear_start" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr roku">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														echo $Html -> addOption($curYear, $curYear, ($curYear == $ENVO_FORM_DATA["plannedyear_start"]) ? TRUE : FALSE);
														echo $Html -> addOption(($curYear + 1), ($curYear + 1), (($curYear + 1) == $ENVO_FORM_DATA["plannedyear_start"]) ? TRUE : FALSE);
														?>

													</select>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
								?>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'Plánovaný termín realizace - Konec', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Měsíc');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_plannedmonths_end" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr měsíce">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														if (isset($MONTHS) && is_array($MONTHS)) foreach ($MONTHS as $m) {

															$selected = ($m["months_number"] == $ENVO_FORM_DATA["plannedmonths_end"]) ? TRUE : FALSE;
															echo $Html -> addOption($m["months_number"], $m["months_name"], $selected, '', '');

														}
														?>

													</select>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Rok');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_plannedyear_end" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr roku">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();
														echo $Html -> addOption($curYear, $curYear, ($curYear == $ENVO_FORM_DATA["plannedyear_end"]) ? TRUE : FALSE);
														echo $Html -> addOption(($curYear + 1), ($curYear + 1), (($curYear + 1) == $ENVO_FORM_DATA["plannedyear_end"]) ? TRUE : FALSE);
														?>

													</select>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'Seznam dokumentů', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
									<div class="col-sm-5">
										<div class="bold">
											Výběr souboru
										</div>
										<div class="form-group">
											<div class="m-t-10">
												<div id="upload" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

													<!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_doc" accept=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai, jpg, jpeg, png"/>
                          </div>

                        </span>
													<input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
													<span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="bold">
											Popis
										</div>
										<div class="form-group  m-t-10">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_constractdescdocu', '', '', 'form-control', array ('placeholder' => 'Popis souboru'));
											?>

										</div>
									</div>
									<div class="col-sm-2">
										<div class="bold">
											&nbsp;
										</div>
										<div class="form-group">
											<div class="row">
												<div class="w-100 m-t-10">
													<div class="form-group">

														<?php
														// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
														echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadBtnContractDocu', 'btn btn-info btn-block');
														?>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="padding: 0 12px 12px 12px; background-color: #FEF6DD;">
									<div class="col-sm-6">

									</div>
									<div class="col-sm-6">
										<div class="m-t-10">
											<!-- Upload Files Output -->
											<div id="docuprogress" class="small hint-text" style="display: none;">
												<div class="progress">
													<div id="docuprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
												</div>
												<div>
													<span>Determinate progress </span><span id="docupercent" class="bold"></span>
													<span> | Bytes received </span><span id="docubyterec" class="bold"></span>
													<span> | Total bytes </span><span id="docubytetotal" class="bold"></span>
												</div>
											</div>
											<p id="docuoutput" style="display: none;"></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table id="tabledocu" class="table">
												<thead>
												<tr>
													<th class="text-center" style="width: 5%;">#</th>
													<th class="text-center" style="width: 15%;">Soubor</th>
													<th style="width: 40%;">Popis</th>
													<th class="text-center" style="width: 20%;">Soubor</th>
													<!-- Last 'th' is generated by Jquery plugin Tabledit -->
												</tr>
												</thead>
												<tbody>

												<?php if (!empty($ENVO_FORM_DATA_DOCU) && is_array($ENVO_FORM_DATA_DOCU)) foreach ($ENVO_FORM_DATA_DOCU as $d) { ?>

													<tr>
														<td class="text-center"><?= $d["id"] ?></td>
														<td class="text-center"><?= envo_extension_icon($d["fname"]) ?></td>
														<td><?= $d["description"] ?></td>
														<td class="text-center">

															<?php
															echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" target="_blank">Zobrazit</a>';
															echo ' | ';
															echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" download>Stáhnout</a>';
															?>

														</td>
														<!-- Last 'td' is generated by Jquery plugin Tabledit -->
													</tr>

												<?php } else {
													echo '<tr class="noedit" style="height: 49px"><td colspan="6" style="vertical-align: middle;"><span class="bold text-warning-dark">Nenalezen žádný záznam</span></td></tr>';
												} ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="box-footer">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Hidden element with folder path -->
		<input type="hidden" name="folderpath" value="<?= $ENVO_FORM_DATA["folder"] ?>">
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>