<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

	<div class="col-md-12" style="margin: 10px 0 50px 0;">

		<div class="row" style="margin-bottom: 20px">
			<div class="col-md-6">
				<div class="row" style="line-height: 34px;">
            <span class="col-xs-12 col-md-6 text-xs-center">
              <?= $tltt["tt_frontend_list"]["ttl"] ?><strong> <?= $COUNT_TVPROGRAM_ALL ?></strong>
            </span>
					<span class="col-xs-12 col-md-6 text-xs-center">

              <?php
							if ($COUNT_TVPROGRAM_ALL > 0) {
								echo $tltt["tt_frontend_list"]["ttl1"] . '<strong>' . $TIME_TVPROGRAM_ALL . '</strong>';
							}
							?>

            </span>
				</div>
			</div>
			<div class="col-md-6 text-xs-center">

				<?php if ($COUNT_TVPROGRAM_ALL > 0) { ?>
					<form class="dl-list" action="/plugins/tv_tower/pdf_programlist.php" target="_blank">
						<button type="submit" class="btn btn-info">Export programů do PDF</button>
					</form>
				<?php } ?>

			</div>
		</div>
		<hr>

		<?php

		// Procházení pole se seznamem vysílačů
		if (isset($ENVO_TVTOWER) && is_array($ENVO_TVTOWER)) {

			// EN: Sort array by 'name' keys
			// CZ: Setřídění pole podle 'name'
			$ENVO_TVTOWER = sort_array_mutlidim($ENVO_TVTOWER, 'name ASC');

			foreach ($ENVO_TVTOWER as $tt) {
				// Pokud je vysílač aktivní, není uzamčen -> vypis dat o vysílači, kanálech a programech
				if ($tt['active']) {

					// Počet programů pro daný vysílač
					if (isset($ENVO_TVPROGRAM_ALL) && is_array($ENVO_TVPROGRAM_ALL)) {
						$programcounter = 0;
						foreach ($ENVO_TVPROGRAM_ALL as $tp) {
							if ($tp["towerid"] == $tt['id']) {
								$programcounter++;
							}
						}
					}

					?>

					<div class="row">
						<div class="col-md-12">
							<div id="tramsmitter-<?= $tt['varname'] ?>">
								<h4><?= $tt['name'] . ' - ' . $tt['station'] ?></h4>

								<div class="col-md-12" style="margin-bottom: 20px">
									<div class="col-md-6">

										<?php if ($programcounter > 0) { ?>

											<div class="form-group siteselect">
												<label for="SelectTrans<?= $tt['id'] ?>" class="sitelabel"><?= $tltt["tt_frontend_list"]["ttl2"] ?></label>
												<div class="siteselection">
													<select id="SelectTrans<?= $tt['id'] ?>" class="form-control sumoselect">

														<option value=""><?= $tltt["tt_frontend_list"]["ttl3"] ?></option>
														<?php
														// Zobrazení názvů sítí pro danný vysílač
														if (isset($ENVO_TVCHANNEL_ALL) && is_array($ENVO_TVCHANNEL_ALL)) {
															// Definice pole pro uložení kanálů dle podmínky
															$foundChannel = array ();

															// Procházení pole s daty všech kanálů
															foreach ($ENVO_TVCHANNEL_ALL as $tc) {
																if ($tc["towerid"] == $tt['id']) {
																	// Přídání kanálů vyhovujícím podmínce do pole
																	$foundChannel[] = $tc;
																}
															}

															// Kontrola jestli pole s nalezenými kanály obsahuje kanály nebo je prázdné
															if (count($foundChannel) != 0) {

																// EN: Sort array by 'sitename' keys
																// CZ: Setřídění pole podle 'sitename'
																$foundChannel = sort_array_mutlidim($foundChannel, 'sitename ASC');

																foreach ($foundChannel as $foundChannel) {
																	echo '<option value="' . $foundChannel['id'] . '">' . ($foundChannel['sitename'] ? $foundChannel['sitename'] : $tltt["tt_frontend_list"]["ttl4"]) . '</option>';
																}
															}
														}
														?>

													</select>
												</div>
											</div>

										<?php } ?>
									</div>
									<div class="col-md-6">
										<div class="pull-right" style="margin-top: 7px;">

											<?php
											// Počet programů pro daný vysílač
											echo str_replace("%s", $programcounter, $tltt["tt_frontend_list"]["ttl5"]);
											?>

										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div id="Transmitter<?= $tt['id'] ?>" class="table-responsive">
										<table class="table table-hover table-expandable">
											<thead>
											<tr>
												<th><?= $tltt["tt_frontend_list"]["ttl6"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl7"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl8"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl9"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl10"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl11"] ?></th>
												<th><?= $tltt["tt_frontend_list"]["ttl12"] ?></th>
											</tr>
											</thead>
											<tbody>

											<?php

											// Procházení pole se seznamem programů
											if (isset($ENVO_TVPROGRAM_ALL) && is_array($ENVO_TVPROGRAM_ALL)) {
												// Definice pole pro uložení programů dle podmínky
												$foundProgram = array ();

												// Procházení pole s daty všech programů
												foreach ($ENVO_TVPROGRAM_ALL as $tp) {
													// Pokud program má stejné 'towerid' jako je 'id' procházeného vysílače, potom přidej programy do pole (přidej programy do pole pro danný vysílač)
													if ($tp["towerid"] == $tt['id']) {
														// Přídání programů vyhovujícím podmínce do pole
														$foundProgram[] = $tp;
													}
												}

												// Kontrola jestli pole s nalezenými programy obsahuje programy nebo je prázdné
												if (count($foundProgram) != 0) {

													// EN: Sort array by 'channelnumber, tvr, name' keys
													// CZ: Setřídění pole podle 'channelnumber, tvr, name'
													$foundProgram = sort_array_mutlidim($foundProgram, 'channelnumber ASC,tvr DESC,name ASC');

													foreach ($foundProgram as $foundProgram) {

														// Liché TR - základní informace o programu
														echo '<tr class="' . (($foundProgram['online'] == 1) ? 'online' : 'offline') . '" data-mux="' . $foundProgram['channelid'] . '">';
														echo '<td><img class="programlogo" src="' . $foundProgram['icon'] . '"></td>';
														echo '<td>' . $foundProgram['name'] . '</td>';
														echo '<td>' . (($foundProgram['tvr'] == '1') ? $tltt["tt_frontend_list"]["ttl13"] : (($foundProgram['tvr'] == '2') ? $tltt["tt_frontend_list"]["ttl14"] : $tltt["tt_frontend_list"]["ttl15"])) . '</td>';

														// Zobrazení čísla kanálu a informací o kanálu ve kterém je vysílán danný program
														if (isset($ENVO_TVCHANNEL_ALL) && is_array($ENVO_TVCHANNEL_ALL)) {
															foreach ($ENVO_TVCHANNEL_ALL as $tc) {
																if ($foundProgram["channelid"] == $tc['id']) {
																	echo '<td>' . $tc['number'] . ' K</td>';  // Číslo kanálu
																	echo '<td>' . $tc['frequency'] . ' MHz</td>';  // Kmitočet kanálu
																	echo '<td>' . $tc['sitename'] . '</td>';  // Název sítě kanálu
																	echo '<td>' . $tc['type'] . '</td>';      // Technologie vysílání
																}
															}
														}

														echo '</tr>';
														echo PHP_EOL; // Nový řádek ve zdrojovém kódu

														// Sudé TR rozšířené informace o programu
														echo '<tr>';
														echo '<td colspan="8" style="background: #edf7ee">';
														echo '<div class="rTable col-md-12">';
														echo '<div class="rTableRow">';
														echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl22"] . '<a href="javascript:void(0)" class="help_popover" data-toggle="popover" data-content="<div>Unikátní identifikátor konkrétní služby přenášené transportním tokem<br><br>Hodnota identifikátoru <strong>Service ID</strong> se stanovuje v rozsahu hodnot:<ul><li>Televizní programy - 0x0001 až 0x3FFF</li><li>Rozhlasové programy - 0x4001 až 0x7FFF</li><li>O+statní služby - 0x8001 až 0xEFFF</li></ul></div>"><i class="fa fa-question-circle"></i></a></div>';
														echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl16"] . '</div>';
														echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl17"] . '</div>';
														echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl18"] . '</div>';
														echo '<div class="rTableHead col-md-4 text-center">' . $tltt["tt_frontend_list"]["ttl19"] . '</div>';
														echo '</div>';
														echo '<div class="rTableRow">';
														echo '<div class="rTableCell col-md-2 text-center">' . (!empty($foundProgram['service_id']) ? $foundProgram['service_id'] : '-') . '</div>';
														echo '<div class="rTableCell col-md-2 text-center">' . (!empty($foundProgram['videoencoding']) ? $foundProgram['videoencoding'] : '-') . '</div>';
														echo '<div class="rTableCell col-md-2 text-center">' . (!empty($foundProgram['audioencoding']) ? $foundProgram['audioencoding'] : '-') . '</div>';
														echo '<div class="rTableCell col-md-2 text-center">' . (!empty($foundProgram['videoformat']) ? $foundProgram['videoformat'] : '-') . '</div>';
														echo '<div class="rTableCell col-md-4 text-center">' . (!empty($foundProgram['videosize']) ? $foundProgram['videosize'] : '-') . '</div>';
														echo '</div>';
														echo '<div class="rTableRow">';
														echo '<div class="rTableHead col-md-4 text-center">' . $tltt["tt_frontend_list"]["ttl20"] . '</div>';
														echo '<div class="rTableHead col-md-8 text-left">' . $tltt["tt_frontend_list"]["ttl21"] . '</div>';
														echo '</div>';
														echo '<div class="rTableRow">';
														echo '<div class="rTableCell col-md-4 text-center">' . (!empty($foundProgram['bitrate']) ? $foundProgram['bitrate'] : '-') . '</div>';
														echo '<div class="rTableCell col-md-8 text-left">' . (!empty($foundProgram['services']) ? $foundProgram['services'] : '-') . '</div>';
														echo '</div>';

														if (ENVO_ACCESS) {

															echo '<div class="rTableRow">';
															echo '<div class="rTableCell col-md-12 text-right" style="height: auto;"><a href="' . BASE_URL . 'admin/index.php?p=tv-tower&sp=tvprogram&ssp=editprogram&id=' . $foundProgram["id"] . '" title="' . $tl["button"]["btn1"] . '" class="btn btn-info btn-sm"><span class="visible-xs"><i class="fa fa-edit"></i></span><span class="hidden-xs">' . $tl["button"]["btn1"] . '</span></a></div>';
															echo '</div>';
														}

														echo '</div>';
														echo '</td>';
														echo '</tr>';
														echo PHP_EOL; // Nový řádek ve zdrojovém kódu
													}
												} else {
													// Nebyly nalezené žádné programy dle podmínky - zobrazení infa o nulovém výsledku
													echo '<tr class="noresult"><td colspan="8">' . $tltt["tt_frontend_list"]["ttl30"] . '</td></tr>';
												}
											}

											?>

											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>

				<?php }
			}

		} else {
			// Pokud neexistuje žádný záznam s vysílači - bude zobrazeno chybové hlášení

			// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
			echo $Html -> addDiv($tltt["tt_frontend_list"]["ttl31"], '', array ('class' => 'alert alert-danger'));

		} ?>

	</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>