<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/test.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

?>

<div class="col-sm-12 p-t-10 full-height item-description">
	<div class="p-b-10"><h4 class="bold">Nový Vchod</h4></div>
	<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;">
		<div class="block-content" id="addent">
			<div id="ent_notify_add" class="notify_add"></div>
			<!-- START CONTENT -->
			<div class="clearfix">
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Ulice');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
						echo $Html -> addInput('text', 'envo_entstreet', '', '', 'form-control');
						?>

					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Výtah');
						?>

					</div>
					<div class="col-sm-8">
						<div class="radio radio-success">

							<?php
							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_entelevator', '1', FALSE, 'envo_entelevator1');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_entelevator1', $tl["checkbox"]["chk"]);

							// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
							echo $Html -> addRadio('envo_entelevator', '0', TRUE, 'envo_entelevator2');
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('envo_entelevator2', $tl["checkbox"]["chk1"]);
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'Počet bytů');
						?>

					</div>
					<div class="col-sm-8">
						<div class="form-group m-0">

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'envo_entapartment', '', '', 'form-control');
							?>

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

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'GPS - Koordináty');
						?>

					</div>
					<div class="col-sm-8">
						<div class="form-group m-0">

							<?php
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('https://www.latlong.net/', 'LATLONG.net', '', '', array ('target' => 'NewGPS'));
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('#', '<strong>Získat GPS z OpenStreetMap</strong>', '', 'getgps');
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'GPS - Latitude');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html -> addDiv('', '', array ('class' => 'loadingdata_gps', 'style' => 'visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;'));
						?>

						<div class="form-group m-0">

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'envo_housegpslat', '', '', 'form-control', array ('readonly' => 'readonly'));
							?>

						</div>
					</div>
				</div>
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'GPS - Longitude');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html -> addDiv('', '', array ('class' => 'loadingdata_gps', 'style' => 'visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;'));
						?>

						<div class="form-group m-0">

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'envo_housegpslng', '', '', 'form-control', array ('readonly' => 'readonly'));
							?>

						</div>
					</div>
				</div>
				<div class="row-form p-t-10 p-b-10 gps_link" style="display: none;">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'GPS - Mapy');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('#', 'Zobrazit na Mapy.cz', '', 'mapycz', array ('target' => 'MapGPS'));
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('#', 'Zobrazit na OpenStreetMaps', '', 'openstreet', array ('target' => 'MapGPS'));
						?>

					</div>
				</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			<div class="clearfix">
				<div class="row-form">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'iKatastr');
						?>

					</div>
					<div class="col-sm-8">

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html -> addDiv('', '', array ('class' => 'loadingdata_ikatastr', 'style' => 'visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0px; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;'));
						?>

						<div class="form-group m-0 ikatastr">

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'envo_houseikatastr', '', '', 'form-control', array ('readonly' => 'readonly'));
							?>

						</div>
					</div>
				</div>
				<div class="row-form p-t-10 p-b-10">
					<div class="col-sm-4">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('strong', 'iKatastr - Link');
						?>

					</div>
					<div class="col-sm-8">
						<div class="form-group m-0 ikatastrlink">

							<?php
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('https://www.ikatastr.cz/', 'Zobrazit informace z Katastru', '', 'ikatastr', array ('target' => 'WindowKATASTR'));
							?>

						</div>
					</div>
				</div>
			</div>
			<!-- END CONTENT -->
		</div>
	</div>
</div>