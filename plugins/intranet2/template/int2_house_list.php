<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Seznam Bytových Domů</h5>
		</div>

		<div class="card-body">

			<?php if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) { ?>

				<table class="table table-striped table-hover m-b-10" id="datatable">
					<thead>
					<tr>
						<th style="width:5%">#</th>
						<th style="width:37%">Název</th>
						<th style="width:23%">Sídlo</th>
						<th style="width:15%">Město</th>
						<th class="no-sort" style="width:10%">IČ</th>
						<th class="no-sort" style="width:10%">&nbsp</th>
					</tr>
					</thead>
					<tbody>

					<?php
					// Loop Array at second item
					foreach (array_slice($ENVO_HOUSE_ALL, 1) as $ha) { ?>
						<tr>
							<td><?= $ha["id"] ?></td>
							<td>

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor($ha["parseurl"], $ha["name"]);
								?>

							</td>
							<td>
								<?= $ha["street"] ?>
							</td>
							<td>
								<?= $ha["city_name"] ?>
							</td>
							<td>
								<?= $ha["ic"] ?>
							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// EDIT
								echo $Html -> addAnchor($ha["parseurl"], '<i class="icon-eye"></i>', '', 'btn btn-info btn-sm', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tlint["int_frontend_icons"]["intficon"]));
								?>

							</td>
						</tr>
					<?php } ?>

					</tbody>
				</table>

			<?php } else if (!empty($ENVO_HOUSE_SEARCH) && is_array($ENVO_HOUSE_SEARCH)) { ?>

				<div class="table-responsive">
					<table class="table table-striped table-hover m-b-10" id="datatable">
						<thead>
						<tr>
							<th style="width:5%">#</th>
							<th style="width:37%">Název</th>
							<th style="width:23%">Sídlo</th>
							<th style="width:15%">Město</th>
							<th class="no-sort" style="width:10%">IČ</th>
							<th class="no-sort" style="width:10%">&nbsp</th>
						</tr>
						</thead>
						<tbody>

						<?php
						// Loop Array at second item
						foreach (array_slice($ENVO_HOUSE_SEARCH, 1) as $hs) { ?>
							<tr>
								<td><?= $hs["id"] ?></td>
								<td>

									<?php

									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor($hs["parseurl"], ($hs["searchdata"]["searchobject"] ? str_highlight($hs["name"], $hs["searchdata"]["searchobject"], 'text-orange-800 font-weight-bold') : $hs["name"]));
									?>

								</td>
								<td>
									<?= $hs["street"] ?>
								</td>
								<td>
									<?= $hs["city_name"] ?>
								</td>
								<td>
									<?= $hs["ic"] ?>
								</td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									// EDIT
									echo $Html -> addAnchor($hs["parseurl"], '<i class="icon-eye"></i>', '', 'btn btn-info btn-sm', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tlint["int_frontend_icons"]["intficon"]));
									?>

								</td>
							</tr>
						<?php } ?>

						</tbody>
					</table>
				</div>

			<?php } else { ?>

				<?php
				// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
				echo $Html -> addDiv('Nejsou dostupná <strong>žádná</strong> data.', '', array ('class' => 'alert border-0 text-orange-800 alpha-orange'));
				?>

			<?php } ?>

		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>