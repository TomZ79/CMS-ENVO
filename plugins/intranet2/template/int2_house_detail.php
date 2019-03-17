<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>
	<style>
		.nav-tabs-solid .nav-item {
			margin-bottom: 0;
			float: none;
			display: table-cell;
			vertical-align: middle;
		}

		fieldset.section-info {
			border: 1px groove #DDD !important;
			padding: 0 1.4em 1.4em 1.4em !important;
			margin-bottom: 1.5em;
		}

		fieldset.section-info legend {
			width: inherit; /* Or auto */
			padding: 0 10px; /* To give a bit of padding on the left and right */
			font-weight: 700;
			text-transform: uppercase;
			font-size: 1.1em;
			border-bottom: none;
		}
	</style>


	<div class="card">
		<div class="card-body">

			<div class="tabs-section-nav" style="overflow: auto;width: 100%;text-align: center;">
				<div class="tbl" style="display: table;width: 100%;border-collapse: collapse;">
					<ul class="nav nav-tabs nav-tabs-responsive nav-tabs-solid border-0" id="responsiveTabs" style="display: table-row;">
						<li class="nav-item">
							<a class="nav-link active" href="#tabs1" data-toggle="tab">
								<span class="text">Obecné Info</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs2" data-toggle="tab">
								<span class="text">Vchody</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs3" data-toggle="tab">
								<span class="text">Detail</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs4" data-toggle="tab">
								<span class="text">Kontakty</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs5" data-toggle="tab">
								<span class="text">Anténní systém</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs6" data-toggle="tab">
								<span class="text">Úkoly</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs7" data-toggle="tab">
								<span class="text">Servisy</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs8" data-toggle="tab">
								<span class="text">Dokumenty</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs9" data-toggle="tab">
								<span class="text">Fotogalerie</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#tabs10" data-toggle="tab">
								<span class="text">Videogalerie</span>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<?php
			if ($ENVO_HOUSE_DETAIL['blacklist'] == '1') {
				echo '<div class="row"><div class="col-12 col-sm-12 px-0 px-sm-2 my-2">
								<span class="alert border-0 text-danger-800 alpha-danger d-block m-0 p-2"><strong>Varování:</strong> Bytový dům je umístěn na blacklistu. Důvod umístění je uveden na kartě "Detail".</span>
							</div></div>';
			}
			?>

			<div class="tab-content">
				<div class="tab-pane fade show active" id="tabs1">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">

						<div class="col-12 col-sm-5 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Základní informace</legend>
								<div class="form-group">
									<label class="font-weight-semibold">Název domu:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['name'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Sídlo domu:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['street'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Město:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['city_name'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">PSČ:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['psc'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">IČ:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['ic'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Stát:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['state'] ?>" readonly>
								</div>
							</fieldset>
						</div>

						<div class="col-12 col-sm-4 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Katastrální informace</legend>
								<div class="form-group">
									<label class="font-weight-semibold">Obec:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['city_name'] . ' (kód ČÚZK ' . $ENVO_HOUSE_DETAIL['city_cuzk_code'] . ')' ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Katastrální území:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['ku_name'] . ' (kód ČÚZK ' . $ENVO_HOUSE_DETAIL['ku_cuzk_code'] . ')' ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Kód objektu:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['cuzk_objcode'] ?>" readonly>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Detail stavebního objektu:</label>
									<div class="form-control-plaintext">

										<?php
										if (isset($ENVO_HOUSE_DETAIL["cuzk_objcode"])) {

											$ocodearray = explode(', ', $ENVO_HOUSE_DETAIL["cuzk_objcode"]);
											foreach ($ocodearray as $oc) {
											?>

											<a href="http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/<?= $oc ?>" target="_blank">Zobrazit detail objektu</a><br>

										<?php } } else { ?>

											<span class="alert border-0 text-orange-800 alpha-orange d-block m-0 p-2">Odkaz na výpis neexistuje</span>

										<?php } ?>

									</div>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">iKatastr:</label>
									<div class="form-control-plaintext">

										<?php if (!empty($ENVO_HOUSE_DETAIL["maingpslat"]) && !empty($ENVO_HOUSE_DETAIL["maingpslng"])) { ?>

											<a href="https://www.ikatastr.cz/#kde=<?= $ENVO_HOUSE_DETAIL["maingpslat"] ?>,<?= $ENVO_HOUSE_DETAIL["maingpslng"] ?>,19&mapa=osm&vrstvy=parcelybudovy&info=<?= $ENVO_HOUSE_DETAIL["maingpslat"] ?>,<?= $ENVO_HOUSE_DETAIL["maingpslng"] ?>" target="_blank">Zobrazit katastr nemovitostí</a>

										<?php } else { ?>

											<span class="alert border-0 text-orange-800 alpha-orange d-block m-0 p-2">Odkaz na výpis neexistuje</span>

										<?php } ?>

									</div>
								</div>
							</fieldset>
						</div>

						<div class="col-12 col-sm-3 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Ares</legend>
								<div class="form-group">
									<label class="font-weight-semibold">Výpis RES:</label>
									<div class="form-control-plaintext">

										<?php if (!empty($ENVO_HOUSE_DETAIL["ares"])) { ?>

											<a href="https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=<?= $ENVO_HOUSE_DETAIL["ic"] ?>&jazyk=cz&xml=1" target="_blank">Zobrazit výpis RES</a>

										<?php } else { ?>

											<span class="alert border-0 text-orange-800 alpha-orange d-block m-0 p-2">Odkaz na výpis neexistuje</span>

										<?php } ?>

									</div>
								</div>
								<div class="form-group">
									<label class="font-weight-semibold">Výpis VREO:</label>
									<div class="form-control-plaintext">

										<?php if (!empty($ENVO_HOUSE_DETAIL["ares"])) { ?>

											<a href="https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_vreo.cgi?ico=<?= $ENVO_HOUSE_DETAIL["ic"] ?>&jazyk=cz&xml=1" target="_blank">Zobrazit výpis VREO</a>

										<?php } else { ?>

											<span class="alert border-0 text-orange-800 alpha-orange d-block m-0 p-2">Odkaz na výpis neexistuje</span>

										<?php } ?>

									</div>
								</div>
							</fieldset>
							<fieldset class="section-info">
								<legend>Justice</legend>
								<div class="form-group">
									<label class="font-weight-semibold">Výpisy VŠECHNY:</label>
									<div class="form-control-plaintext">

										<?php if (!empty($ENVO_HOUSE_DETAIL["justice"])) { ?>

											<a href="https://or.justice.cz/ias/ui/rejstrik-$firma?ico=<?= $ENVO_HOUSE_DETAIL["ic"] ?>&jenPlatne=VSECHNY" target="_blank">Zobrazit výpis RES</a>

										<?php } else { ?>

											<span class="alert border-0 text-orange-800 alpha-orange d-block m-0 p-2">Odkaz na výpis neexistuje</span>

										<?php } ?>

									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tabs2">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">

						<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
						<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet'/>
						<style>
							div[id^="map_"] {
								width: 100%;
								height: 100%;
								min-height: 200px;
							}

							.mapboxgl-ctrl-logo {
								display: none !important;
							}
						</style>

						<?php
						if (!empty($ENVO_HOUSE_ENT) && is_array($ENVO_HOUSE_ENT)) {
							foreach ($ENVO_HOUSE_ENT as $he) { ?>
								<div class="col-12 px-0 px-sm-2">
									<fieldset class="section-info">
										<legend><?= $he["street"] ?></legend>
										<div class="row">
											<div class="col-12 col-sm-3">
												<div class="form-group">
													<label class="font-weight-semibold">Ulice:</label>
													<input type="text" class="form-control" value="<?= $he["street"] ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">Výtah:</label>
													<input type="text" class="form-control" value="<?= ($he["elevator"] ? ($he["elevator"] == 1 ? 'Ano' : 'Není známo') : 'Ne') ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">Počet bytů:</label>
													<input type="text" class="form-control" value="<?= $he["apartment"] ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-sm-4">
												<div class="form-group">
													<label class="font-weight-semibold">GPS - Latitude:</label>
													<input type="text" class="form-control" value="<?= $he["gpslat"] ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">GPS - Longitude:</label>
													<input type="text" class="form-control" value="<?= $he["gpslng"] ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">GPS - Mapy:</label>
													<div class="form-control-plaintext">
														<a href="http://www.mapy.cz/#q=<?= $he["gpslat"] ?>,<?= $he["gpslng"] ?>" target="_blank">Zobrazit na Mapy.cz</a> |
														<a href="https://www.openstreetmap.org/?mlat=<?= $he["gpslat"] ?>&mlon=<?= $he["gpslng"] ?>&zoom=16#map=18/<?= $he["gpslat"] ?>/<?= $he["gpslng"] ?>" target="_blank">Zobrazit na OpenStreetMaps</a>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-5">
												<div id='map_<?= $he["id"] ?>'></div>
												<script>
                          mapboxgl.accessToken = 'pk.eyJ1Ijoic2t5bmRhcyIsImEiOiJjanNnZW1ybG8xbHMzNDRvNmF2dXUyemI5In0.xHIDNnFsF3T_n3blJxDjDg';
                          if (!mapboxgl.supported()) {
                            alert('Your browser does not support Mapbox GL');
                          } else {
                            var map = new mapboxgl.Map({
                              // container id
                              container: 'map_<?= $he["id"] ?>',
                              // stylesheet location
                              style: 'mapbox://styles/skyndas/cjsgf2sm10j2h1foc7wwxe2w7',
                              // starting position [lng, lat]
                              center: [<?= $he["gpslng"] ?>, <?= $he["gpslat"] ?>],
                              // starting zoom
                              zoom: 18,
                              // causes pan & zoom handlers not to be applied, similar to
                              // .dragging.disable() and other handler .disable() funtions in Leaflet.
                              interactive: true,
                              attributionControl: false
                            });

                            // View a fullscreen map
                            map.addControl(new mapboxgl.FullscreenControl());
                          }
												</script>
											</div>
										</div>
									</fieldset>
								</div>
							<?php }
						}
						?>

					</div>
				</div>
				<div class="tab-pane fade" id="tabs3">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">
						<div class="col-12 col-sm-4 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Správa nemovitosti</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Správa nemovitosti:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['estatemanagement_name'] ?>" readonly>
								</div>
							</fieldset>
						</div>
						<div class="col-12 col-sm-4 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Digitální správa domu</legend>
								<div class="form-group ">
									<label class="d-block font-weight-semibold">Správa domu:</label>
									<div class="form-control-plaintext" style="padding-bottom: inherit;">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-input-styled" name="administration" <?= ($ENVO_HOUSE_DETAIL['administration'] == 1 ? 'checked' : '') ?> data-fouc onclick="return false;">
												Ano
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-input-styled" name="administration" <?= ($ENVO_HOUSE_DETAIL['administration'] == 0 ? 'checked' : '') ?> data-fouc onclick="return false;">
												Ne
											</label>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-12 col-sm-4 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Blacklist</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Umístění na blacklistu:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_DETAIL['blacklist'] ? 'Ano' : 'Ne' ?>" readonly>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row m-0 m-sm-2">
						<div class="col-12 col-sm-12 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Blacklist - důvod umístění</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Důvod umístění na blacklistu:</label>
									<div class="form-control-plaintext" style="border-top: 1px solid #DDD">
										<?= $ENVO_HOUSE_DETAIL['blacklistdesc'] ?>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-12 col-sm-12 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Popis</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Popis bytového domu:</label>
									<div class="form-control-plaintext" style="border-top: 1px solid #DDD">
										<?= $ENVO_HOUSE_DETAIL['housedescription'] ?>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tabs4">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">
						<div class="col-12 col-sm-5 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Kontakty - všeobecné informace</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Celkový počet kontaktů:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_CONT['count_of_cont'] ?>" readonly>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row m-0 m-sm-2">

						<?php if (!empty($ENVO_HOUSE_CONT) && is_array($ENVO_HOUSE_CONT) && $ENVO_HOUSE_CONT["count_of_cont"] > 0) { ?>

							<?php
							// Loop Array at second item
							foreach (array_slice($ENVO_HOUSE_CONT, 1) as $cont) { ?>

								<div class="col-12 col-sm-12" id="cont_<?= $cont["id"] ?>">
									<fieldset class="section-info">
										<legend>Jméno: <?= $cont["degree"] . ' ' . $cont["name"] . ' ' . $cont["surname"] ?></legend>
										<div class="row">
											<div class="col-12 col-sm-4">
												<div class="form-group">
													<label class="font-weight-semibold">Funkce:</label>
													<input type="text" class="form-control" value="<?= $cont["status"] ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">Adresa bydliště:</label>
													<input type="text" class="form-control" value="<?= $cont["address"] ?>" readonly>
												</div>
												<div class="form-group">
													<label class="font-weight-semibold">Datum narození:</label>
													<input type="text" class="form-control" value="<?= $cont["birthdate"] ?>" readonly>
												</div>
											</div>
											<div class="col-12 col-sm-4">
												<div class="form-group">
													<label class="font-weight-semibold">Telefon:</label>

													<?php if (!empty($cont["phone"])) { ?>
														<div class="input-group">
															<input type="text" class="form-control" value="<?= $cont["phone"] ?>" readonly>
															<span class="input-group-append">
																<a href="tel:<?= $cont["phone"] ?>" class="btn btn-light legitRipple" data-toggle="tooltipEnvo" data-placemen="bottom" title="Volat"><i class="icon-phone-outgoing"></i></a>
															</span>
														</div>
													<?php } else { ?>
														<input type="text" class="form-control" value="<?= $cont["phone"] ?>" readonly>
													<?php } ?>

												</div>
												<div class="form-group">
													<label class="font-weight-semibold">Email:</label>

													<?php if (!empty($cont["phone"])) { ?>
														<div class="input-group">
															<input name="useremail_<?= $cont["id"] ?>" type="text" class="form-control" value="<?= $cont["email"] ?>" readonly>
															<span class="input-group-append">
																<button class="btn btn-light legitRipple copyitem" type="button" data-toggle="tooltipEnvo" data-placemen="bottom" title="Kopírovat" onclick="copyToClipboard('input[name=useremail_<?= $cont["id"] ?>]', this)"><i class="icon-copy4"></i></button>
															</span>
														</div>
													<?php } else { ?>
														<input type="text" class="form-control" value="<?= $cont["email"] ?>" readonly>
													<?php } ?>

												</div>
											</div>
											<div class="col-12 col-sm-4">
												<div class="form-group ">
													<label class="font-weight-semibold">Popis:</label>
													<div class="form-control-plaintext" style="border-top: 1px solid #DDD">
														<?= $cont['description'] ?>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>

							<?php } ?>


						<?php } else { ?>

							<?php
							// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
							echo $Html -> addDiv('Nejsou dostupné <strong>žádné</strong> kontakty.', '', array ('class' => 'alert border-0 text-orange-800 alpha-orange'));
							?>

						<?php } ?>

					</div>
				</div>
				<div class="tab-pane fade" id="tabs5">Tab 5</div>
				<div class="tab-pane fade" id="tabs6">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">
						<div class="col-12 col-sm-4 px-0 px-sm-2">
							<fieldset class="section-info">
								<legend>Úkoly - všeobecné informace</legend>
								<div class="form-group ">
									<label class="font-weight-semibold">Celkový počet úkolů:</label>
									<input type="text" class="form-control" value="<?= $ENVO_HOUSE_TASK['count_of_task'] ?>" readonly>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row m-0 m-sm-2">
						<div class="col-12 col-sm-12">

							<?php if (!empty($ENVO_HOUSE_TASK) && is_array($ENVO_HOUSE_TASK) && $ENVO_HOUSE_TASK["count_of_task"] > 0) { ?>

								<div id="tasklist">

									<?php
									// Loop Array at second item
									foreach (array_slice($ENVO_HOUSE_TASK, 1) as $htask) { ?>

										<div class="task_<?= $htask["id"] ?>">
											<div class="taskheader bg-slate">
												<span>Task ID <?= $htask["id"] ?></span>
												<span class="float-right collapsetask">+</span>
											</div>
											<div class="taskinfo">
												<div class="container-fluid">
													<div class="row m-b-10">
														<div class="col-sm-2">
															<strong>Bytový dům: </strong>
														</div>
														<div class="col-sm-10">
															<a href="<?= $htask["houseparseurl"] ?>" class="font-weight-semibold all-caps"><?= $htask["housename"] ?></a>
														</div>
													</div>
													<div class="table-responsive">
														<table class="table table-xs table-task">
															<thead>
															<tr>
																<th>Titulek</th>
																<th>Priorita</th>
																<th>Status</th>
																<th>Datum Úkolu</th>
																<th>Datum Připomenutí</th>
															</tr>
															</thead>
															<tbody>
															<tr>
																<td><?= $htask["title"] ?></td>
																<td><?= $htask["priority"] ?></td>
																<td><?= $htask["status"] ?></td>
																<td><?= $htask["time"] ?></td>
																<td><?= $htask["reminder"] ?></td>
															</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div class="taskcontent alpha-slate">
												<p><strong>Popis Úkolu:</strong></p>
												<div class="taskdescription">
													<?= $htask["description"] ?>
												</div>
											</div>
										</div>

									<?php } ?>

								</div>

							<?php } else { ?>

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv('Nejsou dostupné <strong>žádné</strong> úkoly.', '', array ('class' => 'alert border-0 text-orange-800 alpha-orange'));
								?>

							<?php } ?>

						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tabs7">Tab 7</div>
				<div class="tab-pane fade" id="tabs8">
					<div class="row m-0 m-sm-2 mt-3 mt-sm-3">
						<div class="col-12 col-sm-12">

						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tabs9">Tab 9</div>
				<div class="tab-pane fade" id="tabs10">
					<?php
					print_array($ENVO_HOUSE_DETAIL);
					?>
				</div>
			</div>

		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>