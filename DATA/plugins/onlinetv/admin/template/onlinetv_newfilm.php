<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<!-- Action button block -->
	<div class="actionbtn-block d-none d-sm-block">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
		// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
		echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film', $tl["button"]["btn19"], '', 'btn btn-info button');
		?>

	</div>

	<!-- Form Content -->
	<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
		<li class="nav-item">
			<a href="#cmsPage1" class="active" data-toggle="tab">
				<span class="text"><?= $tlotv["otv_menu"]["otvm1"] ?></span>
			</a>
		</li>
		<li class="nav-item next">
			<a href="#cmsPage2" class="" data-toggle="tab">
				<span class="text">Lidé</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage3" class="" data-toggle="tab">
				<span class="text">Popis/Složky</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage4" class="" data-toggle="tab">
				<span class="text">Video</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage5" class="" data-toggle="tab">
				<span class="text">Titulky</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage6" class="" data-toggle="tab">
				<span class="text">Trailer/Poster</span>
			</a>
		</li>
		<li class='nav-item dropdown collapsed-menu hidden'>
			<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
				... <span class="glyphicon glyphicon-chevron-right"></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
			</div>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
			<div class="row">
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Obecná nastavení', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Datum Zápisu');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_created', (isset($_REQUEST["envo_created"]) ? $_REQUEST["envo_created"] : date("Y-m-d H:i:s")), '', 'form-control', array ('readonly' => 'readonly'));
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Originální Název Filmu');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmname', (isset($_REQUEST["envo_filmname"]) ? $_REQUEST["envo_filmname"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Název Filmu (English)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmname_en', (isset($_REQUEST["envo_filmname_en"]) ? $_REQUEST["envo_filmname_en"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Název Filmu (Česky)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmname_cz', (isset($_REQUEST["envo_filmname_cz"]) ? $_REQUEST["envo_filmname_cz"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Název Filmu (Slovensky)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmname_sk', (isset($_REQUEST["envo_filmname_sk"]) ? $_REQUEST["envo_filmname_sk"] : ''), '', 'form-control');
												?>

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
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Detailní nastavení', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Rok Výroby');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmyear', (isset($_REQUEST["envo_filmyear"]) ? $_REQUEST["envo_filmyear"] : ''), '', 'form-control');
												?>

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
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Odkazy na film', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'ČSFD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmcsfd', (isset($_REQUEST["envo_filmcsfd"]) ? $_REQUEST["envo_filmcsfd"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'IMDb');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmimdb', (isset($_REQUEST["envo_filmimdb"]) ? $_REQUEST["envo_filmimdb"] : ''), '', 'form-control');
												?>

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
							echo $Html -> addTag('h3', 'Žánr', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-12">
											<select name="envo_filmgenre[]" multiple="multiple" class="form-control" size="10">

												<?php
												// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
												$selected = (!isset($_REQUEST["envo_filmgenre"]) || $_REQUEST["envo_filmgenre"] == '0' || (in_array('0', $_REQUEST["envo_filmgenre"]))) ? TRUE : FALSE;

												echo $Html -> addOption('0', 'Žádný', $selected);
												if (isset($ENVO_GENRE) && is_array($ENVO_GENRE)) foreach ($ENVO_GENRE as $g) {

													if (isset($_REQUEST["envo_filmgenre"]) && (in_array($g["id"], $_REQUEST["envo_filmgenre"]))) {
														if (isset($_REQUEST["envo_filmgenre"]) && (in_array('0', $_REQUEST["envo_filmgenre"]))) {
															$selected = FALSE;
														} else {
															$selected = TRUE;
														}
													}  else {
														$selected = FALSE;
													}

													echo $Html -> addOption($g["id"], $g["genre_name_cz"], $selected);

												}
												?>

											</select>
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
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Stát', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-12">
											<select name="envo_filmcountry" class="form-control selectpicker" data-search-select2="true">

												<?php
												//
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												$selected = (!isset($_REQUEST["envo_filmcountry"]) || $_REQUEST["envo_filmcountry"] == '0') ? TRUE : FALSE;

												// First blank option
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html -> addOption('0', 'Žádná země', $selected);

												if (isset($ENVO_COUNTRY) && is_array($ENVO_COUNTRY)) foreach ($ENVO_COUNTRY as $c) {

													if (isset($_REQUEST["envo_filmcountry"]) && ($_REQUEST["envo_filmcountry"] != '0')) {
														if (isset($_REQUEST["envo_filmcountry"]) && ($c["id"] == $_REQUEST["envo_filmcountry"])) {
															$selected = TRUE;
														} else {
															$selected = FALSE;
														}
													} else {
														$selected = FALSE;
													}

													echo $Html -> addOption($c["id"], $c["country_name_cz"], $selected, '', '');

												}

												?>

											</select>
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
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Režie, Předloha, Scénář, Herci', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Režie');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmdirection', (isset($_REQUEST["envo_filmdirection"]) ? $_REQUEST["envo_filmdirection"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Předloha');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmtemplate', (isset($_REQUEST["envo_filmtemplate"]) ? $_REQUEST["envo_filmtemplate"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Scénář');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmscreenplay', (isset($_REQUEST["envo_filmscreenplay"]) ? $_REQUEST["envo_filmscreenplay"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Herci');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmactors', (isset($_REQUEST["envo_filmactors"]) ? $_REQUEST["envo_filmactors"] : ''), '', 'form-control');
												?>

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
							echo $Html -> addTag('h3', 'Popis a složky filmu', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form p-t-10 p-b-10">
										<div class="col-sm-3">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Složka filmu');
											?>

										</div>
										<div class="col-sm-9">
											<span>Složky filmu budou vytvořeny po uložení dat.</span>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-12">

											<?php
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('', '<strong>Popis</strong>', array ('class' => 'm-t-10 m-b-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('envo_filmdesc', '', '10', '', array ('id' => 'envoEditorSmall', 'class' => 'form-control envoEditorSmall'));
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
		<div class="tab-pane fade" id="cmsPage4" role="tabpanel">
			<div class="row">
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Video - Originální znění', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (2160) 4K');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_2160', (isset($_REQUEST["envo_filmvideo_o_2160"]) ? $_REQUEST["envo_filmvideo_o_2160"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (1440) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_1440', (isset($_REQUEST["envo_filmvideo_o_1440"]) ? $_REQUEST["envo_filmvideo_o_1440"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (1080) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_1080', (isset($_REQUEST["envo_filmvideo_o_1080"]) ? $_REQUEST["envo_filmvideo_o_1080"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (720) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_720', (isset($_REQUEST["envo_filmvideo_o_720"]) ? $_REQUEST["envo_filmvideo_o_720"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (576) SD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_576', (isset($_REQUEST["envo_filmvideo_o_576"]) ? $_REQUEST["envo_filmvideo_o_576"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (360) SD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_o_360', (isset($_REQUEST["envo_filmvideo_o_360"]) ? $_REQUEST["envo_filmvideo_o_360"] : ''), '', 'form-control');
												?>

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
							echo $Html -> addTag('h3', 'Video - Český dabing', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (2160) 4K');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_2160', (isset($_REQUEST["envo_filmvideo_cs_2160"]) ? $_REQUEST["envo_filmvideo_cs_2160"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (1440) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_1440', (isset($_REQUEST["envo_filmvideo_cs_1440"]) ? $_REQUEST["envo_filmvideo_cs_1440"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (1080) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_1080', (isset($_REQUEST["envo_filmvideo_cs_1080"]) ? $_REQUEST["envo_filmvideo_cs_1080"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (720) HD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_720', (isset($_REQUEST["envo_filmvideo_cs_720"]) ? $_REQUEST["envo_filmvideo_cs_720"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (576) SD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_576', (isset($_REQUEST["envo_filmvideo_cs_576"]) ? $_REQUEST["envo_filmvideo_cs_576"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Video (360) SD');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmvideo_cs_360', (isset($_REQUEST["envo_filmvideo_cs_360"]) ? $_REQUEST["envo_filmvideo_cs_360"] : ''), '', 'form-control');
												?>

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
		<div class="tab-pane fade" id="cmsPage5" role="tabpanel">
			<div class="row">
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Titulky', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Titulky - Anglicky (EN)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmsubtitle_en', (isset($_REQUEST["envo_filmsubtitle_en"]) ? $_REQUEST["envo_filmsubtitle_en"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Titulky - Česky (CS)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmsubtitle_cs', (isset($_REQUEST["envo_filmsubtitle_cs"]) ? $_REQUEST["envo_filmsubtitle"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Titulky - Slovensky (SK)');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmsubtitle_sk', (isset($_REQUEST["envo_filmsubtitle_sk"]) ? $_REQUEST["envo_filmsubtitle_sk"] : ''), '', 'form-control');
												?>

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
		<div class="tab-pane fade" id="cmsPage6" role="tabpanel">
			<div class="row">
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Poster', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Poster 1');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmposter_1', (isset($_REQUEST["envo_filmposter_1"]) ? $_REQUEST["envo_filmposter_1"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Poster 2');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmposter_2', (isset($_REQUEST["envo_filmposter_2"]) ? $_REQUEST["envo_filmposter_2"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Poster 3');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmposter_3', (isset($_REQUEST["envo_filmposter_3"]) ? $_REQUEST["envo_filmposter_2"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Poster 4');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmposter_4', (isset($_REQUEST["envo_filmposter_4"]) ? $_REQUEST["envo_filmposter_4"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Poster 5');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmposter_5', (isset($_REQUEST["envo_filmposter_5"]) ? $_REQUEST["envo_filmposter_5"] : ''), '', 'form-control');
												?>

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
							echo $Html -> addTag('h3', 'Trailer', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Trailer 1 - links');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmtrailer_1_link', (isset($_REQUEST["envo_filmtrailer_1_link"]) ? $_REQUEST["envo_filmtrailer_1_link"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Trailer 1 - text');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmtrailer_1_text', (isset($_REQUEST["envo_filmtrailer_1_text"]) ? $_REQUEST["envo_filmtrailer_1_text"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Trailer 2 - links');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmtrailer_2_link', (isset($_REQUEST["envo_filmtrailer_2_link"]) ? $_REQUEST["envo_filmtrailer_2_link"] : ''), '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Trailer 2 - text');
											?>

										</div>
										<div class="col-sm-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_filmtrailer_2_text', (isset($_REQUEST["envo_filmtrailer_2_text"]) ? $_REQUEST["envo_filmtrailer_2_text"] : ''), '', 'form-control');
												?>

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
	</div>

</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
