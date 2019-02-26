<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<style>
		/*
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
		@media only screen and (max-width: 760px) {

			#responsivetable {
				width: 100%;
			}

			/* Force table to not be like tables anymore */
			#responsivetable,
			#responsivetable thead,
			#responsivetable tbody,
			#responsivetable th,
			#responsivetable td,
			#responsivetable tr {
				display: block;
			}

			/* Hide table headers (but not display: none;, for accessibility) */
			#responsivetable thead tr {
				position: absolute;
				top: -9999px;
				left: -9999px;
			}

			#responsivetable td,
			#responsivetable th {
				white-space: normal;
			}

			#responsivetable tr {
				border: 1px solid #CCC;
			}

			#responsivetable td {
				/* Behave  like a "row" */
				border: none;
				border-bottom: 1px solid #EEE;
				position: relative;
				padding-left: 25% !important;
			}

			#responsivetable td:before {
				/* Now like a table header */
				position: absolute;
				/* Top/left values mimic padding */
				top: 12px;
				left: 6px;
				width: 45%;
				padding-right: 10px;
				white-space: nowrap;
				/* Label the data */
				content: attr(data-column);
				color: #000;
				font-weight: bold;
			}

		}
	</style>

	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Seznam Bytových Domů</h5>
		</div>

		<div class="card-body">

			<?php if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) { ?>

				<table class="table table-striped table-hover m-b-10" id="datatable">
					<thead>
					<tr>
						<th class="no-sort" style="width:5%">#</th>
						<th style="width:45%">Název</th>
						<th style="width:20%">Sídlo</th>
						<th style="width:20%">Město</th>
						<th class="no-sort" style="width:10%"></th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($ENVO_HOUSE_ALL as $ha) { ?>
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
					<table class="table table-striped table-hover m-b-10" id="responsivetable">
						<thead>
						<tr>
							<th style="width:5%">#</th>
							<th style="width:45%">Název</th>
							<th style="width:20%">Sídlo</th>
							<th style="width:20%">Město</th>
							<th style="width:10%"></th>
						</tr>
						</thead>
						<tbody>

						<?php foreach ($ENVO_HOUSE_SEARCH as $hs) { ?>
							<tr>
								<td data-column="ID"><?= $hs["id"] ?></td>
								<td data-column="Název">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor($hs["parseurl"], str_highlight($hs["name"], $hs["searchtext"], 'text-orange-800 font-weight-bold'));
									?>

								</td>
								<td data-column="Sídlo">
									<?= $hs["street"] ?>
								</td>
								<td data-column="Město">
									<?= $hs["city_name"] ?>
								</td>
								<td class="text-center d-none d-sm-block">

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