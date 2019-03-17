<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php

if (!function_exists('array_group_by')) {
	/**
	 * Groups an array by a given key.
	 *
	 * Groups an array into arrays by a given key, or set of keys, shared between all array members.
	 *
	 * Based on {@author Jake Zatecky}'s {@link https://github.com/jakezatecky/array_group_by array_group_by()} function.
	 * This variant allows $key to be closures.
	 *
	 * www: https://gist.github.com/mcaskill/baaee44487653e1afc0d
	 *
	 * @param array $array   The array to have grouping performed on.
	 * @param mixed $key,... The key to group or split by. Can be a _string_,
	 *                       an _integer_, a _float_, or a _callable_.
	 *
	 *                       If the key is a callback, it must return
	 *                       a valid key from the array.
	 *
	 *                       If the key is _NULL_, the iterated element is skipped.
	 *
	 *                       ```
	 *                       string|int callback ( mixed $item )
	 *                       ```
	 *
	 * @return array|null Returns a multidimensional array or `null` if `$key` is invalid.
	 */
	function array_group_by (array $array, $key)
	{
		if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
			trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
			return NULL;
		}
		$func = (!is_string($key) && is_callable($key) ? $key : NULL);
		$_key = $key;
		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($array as $value) {
			$key = NULL;
			if (is_callable($func)) {
				$key = call_user_func($func, $value);
			} elseif (is_object($value) && isset($value ->{$_key})) {
				$key = $value ->{$_key};
			} elseif (isset($value[$_key])) {
				$key = $value[$_key];
			}
			if ($key === NULL) {
				continue;
			}
			$grouped[$key][] = $value;
		}
		// Recursively build a nested grouping if more parameters are supplied
		// Each grouped array value is grouped according to the next sequential key
		if (func_num_args() > 2) {
			$args = func_get_args();
			foreach ($grouped as $key => $value) {
				$params        = array_merge([$value], array_slice($args, 2, func_num_args()));
				$grouped[$key] = call_user_func_array('array_group_by', $params);
			}
		}
		return $grouped;
	}
}

// Group data by the "gender" key
$ENVO_CITY_AREA = array_group_by($ENVO_CITY_AREA, "city");

?>

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
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];
					if (isset($errors["e5"])) echo $errors["e5"];
					if (isset($errors["e6"])) echo $errors["e6"];
					if (isset($errors["e7"])) echo $errors["e7"];?>'
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
		echo $Html -> addAnchor('index.php?p=intranet&amp;sp=house', $tl["button"]["btn19"], '', 'btn btn-info button');
		?>

	</div>

	<!-- Form Content -->
	<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
		<li class="nav-item">
			<a href="#cmsPage1" class="active" data-toggle="tab">
				<span class="text"><?= $tlint["int_section_tab"]["inttab"] ?></span>
			</a>
		</li>
		<li class="nav-item next">
			<a href="#cmsPage2" data-toggle="tab">
				<span class="text">Fakturace</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage3" class="" data-toggle="tab">
				<span class="text">Popis/Složky</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage4" data-toggle="tab">
				<span class="text">Úkoly</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage5" data-toggle="tab">
				<span class="text">Hlavní kontakty</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage6" data-toggle="tab">
				<span class="text">Vchody - Byty</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage7" data-toggle="tab">
				<span class="text">Nájemníci</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage8" data-toggle="tab">
				<span class="text">Anténní systém</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage9" data-toggle="tab">
				<span class="text">Servisy</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage10" data-toggle="tab">
				<span class="text">Dokumenty</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage11" data-toggle="tab">
				<span class="text">Fotogalerie</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage12" data-toggle="tab">
				<span class="text">Videogalerie</span>
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
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Název Domu');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housename', $ENVO_FORM_DATA["name"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Sídlo');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_househeadquarters', $ENVO_FORM_DATA["headquarters"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Ulice');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housestreet', $ENVO_FORM_DATA["street"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Město');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">
												<select name="envo_housecity" class="form-control selectpicker" data-search-select2="true">

													<?php
													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ($ENVO_FORM_DATA["city"] == '0') ? TRUE : FALSE;

													echo $Html -> addOption('0', $tlint["selection"]["sel"], $selected);
													if (isset($ENVO_CITY) && is_array($ENVO_CITY)) foreach ($ENVO_CITY as $c) {

														echo $Html -> addOption($c["id"], $c["city"], ($c["id"] == $ENVO_FORM_DATA["city"]) ? TRUE : FALSE);

													}
													?>

												</select>
											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Město - čtvrť');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">

											<?php
											// Start - Select Tag
											echo '<div class="form-group m-0"><select name="envo_housecityarea" class="form-control selectpicker" data-search-select2="true">';

											//
											$selected = ($ENVO_FORM_DATA["cityarea"] == '0') ? TRUE : FALSE;

											// First blank option
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											echo $Html -> addOption('0', '----------------', $selected);

											foreach ($ENVO_CITY_AREA as $keycity => $cityitem) {

												foreach ($cityitem as $item) {
													// Get City ID from first item - is same for all items
													$cityid = $item["city_id"];
													// Break loop after first iteration
													break;
												}

												// to know what's in $item
												echo '<optgroup label="' . $keycity . '" data-cityname="' . $keycity . '" data-cityid="' . $cityid . '">';

												foreach ($cityitem as $cityarea) {

													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													echo $Html -> addOption($cityarea["id"], $cityarea["city_area"], ($cityarea["id"] == $ENVO_FORM_DATA["cityarea"]) ? TRUE : FALSE, '', '', array ('data-cityareaname' => $cityarea["city_area"], 'data-cityareaid' => $cityarea["id"]));

												}

												echo '</optgroup>';

											}

											// End - Select Tag
											echo '</select></div>';

											?>

										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'PSČ');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housepsc', $ENVO_FORM_DATA["psc"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'IČ');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0<?php if (isset($errors["e6"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_houseic', $ENVO_FORM_DATA["ic"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Stát');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housestate', $ENVO_FORM_DATA["state"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'GPS - Koordináty');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('https://www.latlong.net/', 'LATLONG.net', '', '', array ('target' => 'NewGPS'));
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('#', 'Získat GPS z OpenStreetMap', 'getgpscoordinates', '');
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('hidden', 'data_gps');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'GPS - Latitude');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housegpslat', $ENVO_FORM_DATA["latitude"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'GPS - Longitude');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housegpslng', $ENVO_FORM_DATA["longitude"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form p-t-10 p-b-10" id="gps_link" <?= ((isset($ENVO_FORM_DATA["latitude"]) && isset($ENVO_FORM_DATA["longitude"]) == '1')) ? '' : 'style="display: none;"' ?>>
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'GPS - Mapy');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">

											<?php
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('http://www.mapy.cz/#q=' . $ENVO_FORM_DATA["latitude"] . '%2C' . $ENVO_FORM_DATA["longitude"], 'Zobrazit na Mapy.cz', '', 'mapycz', array ('target' => 'MapGPS'));
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('https://www.openstreetmap.org/?mlat=' . $ENVO_FORM_DATA["latitude"] . '&mlon=' . $ENVO_FORM_DATA["longitude"] . '&zoom=16#map=18/' . $ENVO_FORM_DATA["latitude"] . '/' . $ENVO_FORM_DATA["longitude"], 'Zobrazit na OpenStreetMaps', '', 'openstreet', array ('target' => 'MapGPS'));
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
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
							echo $Html -> startTag('h3', array ('class' => 'box-title'));
							echo $tl["cat_box_title"]["catbt3"];
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tl["cat_help"]["cath3"], 'data-original-title' => $tl["cat_help"]["cath"]));
							// Add Html Element -> endTag (Arguments: tag)
							echo $Html -> endTag('h3');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-12">
											<select name="envo_permission[]" multiple="multiple" class="form-control">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												$selected = ($ENVO_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

												echo $Html -> addOption('0', 'Všechny skupiny', $selected);
												if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

													$selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["permission"]))) ? TRUE : FALSE;
													echo $Html -> addOption($v["id"], $v["name"], $selected);

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
							echo $Html -> addTag('h3', 'ARES', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'ARES - Upload data');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_dataares', '', '', 'form-control', array ('placeholder' => 'Zadejte IČ'));
												?>

											</div>
										</div>
										<div class="col col-sm-12 col-md-4 text-center">

											<?php
											// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
											echo $Html -> addButton('button', '', 'Upload Data', '', 'loadAres', 'btn btn-default');
											?>

										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Web - ARES');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_houseares', '1', ($ENVO_FORM_DATA["ares"] == '1') ? TRUE : FALSE, 'envo_houseares1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_houseares1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_houseares', '0', ($ENVO_FORM_DATA["ares"] == '0') ? TRUE : FALSE, 'envo_houseares2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_houseares2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
										<div class="col col-sm-12 col-md-4">
											<div id="ares_res" <?= ($ENVO_FORM_DATA["ares"] == '1') ? '' : 'style="display: none;"' ?>>

												<?php
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' . $ENVO_FORM_DATA["ic"] . '&jazyk=cz&xml=1', 'Výpis - RES', '', '', array ('target' => 'WindowARES'));
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_vreo.cgi?ico=' . $ENVO_FORM_DATA["ic"] . '&jazyk=cz&xml=1', 'Výpis - VREO', '', '', array ('target' => 'WindowARES'));
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
							echo $Html -> addTag('h3', 'Justice.cz', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Web - Justice.cz');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_housejustice', '1', ($ENVO_FORM_DATA["justice"] == '1') ? TRUE : FALSE, 'envo_housejustice1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_housejustice1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_housejustice', '0', ($ENVO_FORM_DATA["justice"] == '0') ? TRUE : FALSE, 'envo_housejustice2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_housejustice2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
										<div class="col col-sm-12 col-md-4">
											<div id="justice_vor" <?= ($ENVO_FORM_DATA["justice"] == '1') ? '' : 'style="display: none;"' ?>>

												<?php
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor('https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' . $ENVO_FORM_DATA["ic"] . '&jenPlatne=VSECHNY', 'Výpis - Justice.cz', '', '', array ('target' => 'WindowJUSTICE'));
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
							echo $Html -> addTag('h3', 'Katastr', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'iKatastr');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0" id="ikatastr">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_houseikatastr', $ENVO_FORM_DATA["ikatastr"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form p-t-10 p-b-10">
										<div class="col col-sm-12 col-md-4">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'iKatastr - Link');
											?>

										</div>
										<div class="col col-sm-12 col-md-8">
											<div class="form-group m-0" id="ikatastrlink">

												<?php
												// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
												echo $Html -> addAnchor(($ENVO_FORM_DATA["ikatastr"] ? $ENVO_FORM_DATA["ikatastr"] : 'https://www.ikatastr.cz/'), 'Zobrazit informace z Katastru', '', '', array ('target' => 'WindowKATASTR'));
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
							echo $Html -> addTag('h3', 'Vchody a Byty', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col col-sm-12 col-md-8">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Celkový Počet Vchodů');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="form-group m-0<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_countentranceall', $ENVO_FORM_DATA["countentrance"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-8">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Celkový Počet Bytů');
											echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="form-group m-0<?php if (isset($errors["e4"]) || isset($errors["e5"])) echo " has-error"; ?>">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_countapartmentall', $ENVO_FORM_DATA["countapartment"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col col-sm-12 col-md-8">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Výtah');
											?>

										</div>
										<div class="col col-sm-12 col-md-4">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_elevator', '1', ($ENVO_FORM_DATA["elevator"] == '1') ? TRUE : FALSE, 'envo_elevator1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_elevator1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_elevator', '0', ($ENVO_FORM_DATA["elevator"] == '0') ? TRUE : FALSE, 'envo_elevator2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_elevator2', $tl["checkbox"]["chk1"]);
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
							echo $Html -> addTag('h3', 'Spojení s bytovým domem', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">

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
							echo $Html -> addTag('h3', 'Nastavení Fakturace', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row">
										<div class="col-sm-6">
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Název');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefname', $ENVO_FORM_DATA["housefname"], '', 'form-control');
														?>

													</div>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Ulice');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefstreet', $ENVO_FORM_DATA["housefstreet"], '', 'form-control');
														?>

													</div>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Město');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefcity', $ENVO_FORM_DATA["housefcity"], '', 'form-control');
														?>

													</div>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'PSČ');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefpsc', $ENVO_FORM_DATA["housefpsc"], '', 'form-control');
														?>

													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'IČ');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0<?php if (isset($errors["e7"])) echo " has-error"; ?>">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefic', $ENVO_FORM_DATA["housefic"], '', 'form-control');
														?>

													</div>
												</div>
											</div>
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'DIČ');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_housefdic', $ENVO_FORM_DATA["housefdic"], '', 'form-control');
														?>

													</div>
												</div>
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
							<div class="row">
								<div class="d-flex align-items-center">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h3', 'Popis a složky domu', 'box-title');
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
											echo $Html -> addTag('strong', 'Složka domu');
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
															echo $Html -> addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&lang=' . $managerlang . '&fldr=' . $ENVO_FORM_DATA["folder"], '<i class="pg-folder_alt"></i>', '', 'btn btn-info ifManager', array ('type' => 'button'));
															?>

                            </span>
											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-12">

											<?php
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('', '<strong>Popis</strong>', array ('class' => 'm-b-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('envo_housedescription', $ENVO_FORM_DATA["housedescription"], '10', '', array ('class' => 'form-control envoEditorLarge'));
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
			<div class="row m-b-20">
				<div class="col-sm-12 p-l-15 p-r-15">
					<div class="float-lg-right float-md-right float-sm-right">

						<?php
						// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
						echo $Html -> addButton('button', '', 'Přidat nový úkol', '', 'addTask', 'btn btn-info', array ('data-dialog' => 'taskDialogAdd', 'style' => 'width: 100%;'));
						?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="tasklist">

						<?php if (!empty($ENVO_FORM_DATA_TASK) && is_array($ENVO_FORM_DATA_TASK)) foreach ($ENVO_FORM_DATA_TASK as $t) { ?>
							<div id="task_<?= $t["id"] ?>" class="task_<?= $t["id"] ?>">
								<div class="taskheader">
									<span>Task ID <?= $t["id"] ?></span>
									<span class="float-right collapsetask">+</span>
								</div>
								<div class="taskinfo">
									<div class="container-fluid">
										<div class="table-responsive">
											<table class="table table-task">
												<thead>
												<tr>
													<th>Titulek</th>
													<th>Priorita</th>
													<th>Status</th>
													<th>Datum Úkolu</th>
													<th>Datum Připomenutí</th>
													<th></th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td><?= $t["title"] ?></td>
													<td><?= $t["priority"] ?></td>
													<td><?= $t["status"] ?></td>
													<td><?= $t["time"] ?></td>
													<td><?= $t["reminder"] ?></td>
													<td class="text-center">

														<?php
														// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
														// EDIT
														echo $Html -> addButton('button', '', '<i class="fa fa-edit"></i>', '', 'editTask', 'btn btn-default btn-xs m-r-20 editTask', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"], 'data-dialog' => 'taskDialogEdit', 'data-id' => $t["id"]));
														// DELETE
														echo $Html -> addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '', 'btn btn-danger btn-xs deleteTask', array ('data-confirm-deltask' => sprintf('Jste si jistý, že chcete odstranit úkol <strong>%s</strong>', $t["title"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"], 'data-id' => $t["id"]));
														?>

													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="taskcontent">
									<p><strong>Popis Úkolu:</strong></p>
									<div class="taskdescription">
										<?= $t["description"] ?>
									</div>
								</div>
							</div>
						<?php } else { ?>

							<div class="col-sm-12">

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
								?>

							</div>

						<?php } ?>

					</div>
				</div>
			</div>

			<div id="taskDialogAdd" class="dialog task-details">
				<div class="dialog__overlay"></div>
				<div class="dialog__content">
					<div class="container-fluid">
						<div class="row dialog__overview">
							<!-- Data over AJAX  -->
							<div class="col-sm-12 p-t-10 full-height item-description">
								<div class="p-b-10"><h4 class="bold">Nový Úkol</h4></div>
								<div class="block" style="height:calc(100% - 75px);overflow-y:auto;width:100%;padding-right: 20px;">
									<div class="block-content">
										<div id="notificationcontainer_add"></div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Titulek');
												?>

											</div>
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_addtasktitle', '', '', 'form-control');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Priorita');
												?>

											</div>
											<div class="col-sm-6">
												<div class="form-group m-0">
													<select name="envo_addtaskpriority" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('0', 'Nedůležitá');
														echo $Html -> addOption('1', 'Nízká priorita');
														echo $Html -> addOption('2', 'Střední priorita');
														echo $Html -> addOption('3', 'Vysoká priorita');
														echo $Html -> addOption('4', 'Nejvyšší priorita');
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Status');
												?>

											</div>
											<div class="col-sm-6">
												<div class="form-group m-0">
													<select name="envo_addtaskstatus" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('0', 'Žádný status');
														echo $Html -> addOption('1', 'Zápis');
														echo $Html -> addOption('2', 'V řešení');
														echo $Html -> addOption('3', 'Vyřešeno - Uzavřeno');
														echo $Html -> addOption('4', 'Stornováno');
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Datum Úkolu');
												?>

											</div>
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_addtasktime', '', '', 'form-control');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Datum Připomenutí');
												?>

											</div>
											<div class="col-sm-6">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_addtaskreminder', '', '', 'form-control');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-12">

												<?php
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('', '<strong>Popis</strong>');
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_addtaskdescription', '', '10', '', array ('id' => 'envoEditorSmall', 'class' => 'form-control envoEditorSmall'));
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="dialog__footer">
						<div class="col-sm-12 p-l-20 p-r-20">
							<button id="saveTask" class="btn btn-success m-t-20 m-l-20 float-right" type="button">
								Uložit
							</button>
							<button class="btn btn-info m-t-20 float-right action" type="button" data-dialog-close>
								Zavřít
							</button>
						</div>
					</div>
				</div>
			</div>
			<div id="taskDialogEdit" class="dialog task-details">
				<div class="dialog__overlay"></div>
				<div class="dialog__content">
					<div class="container-fluid">
						<div class="row dialog__overview">
							<!-- Data over AJAX  -->
						</div>
					</div>
					<div class="dialog__footer">
						<div class="col-sm-12 p-l-20 p-r-20">
							<button id="udpateTask" class="btn btn-success m-t-20 m-l-20 float-right" type="button">
								Uložit
							</button>
							<button class="btn btn-info m-t-20 float-right action" type="button" data-dialog-close>
								Zavřít
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage5" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Hlavní kontakty domu', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row">
										<div class="col-sm-12">
											<div class="row-form">
												<div class="col-sm-2">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('strong', 'Email');
													?>

												</div>
												<div class="col-sm-10">
													<div class="form-group m-0">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html -> addInput('text', 'envo_houseemail', $ENVO_FORM_DATA["mainemail"], '', 'form-control');
														?>

													</div>
												</div>
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
			<div class="row m-b-20">
				<div class="col-sm-12 p-l-15 p-r-15 ">
					<div class="form-inline float-lg-right float-md-right float-sm-right">
						<div class="form-group">
							<label for="name">Jméno: </label>

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'addRowCont', (isset($_REQUEST["addRowCont"])) ? $_REQUEST["addRowCont"] : '', '', 'form-control ml-2', array ('style' => 'height: 35px;', 'placeholder' => 'Celé jméno'));
							?>

						</div>
						<div class="form-group">

							<?php
							// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
							echo $Html -> addButton('button', '', 'Přidat nový kontakt', '', 'addRowCont', 'btn btn-info ml-2', array ('style' => 'width: 100%;'));
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-body no-padding">
							<div class="table-responsive">
								<table id="tablecontacts" class="table table-hover">
									<thead>
									<tr>
										<th>Id</th>
										<th>Jméno</th>
										<th>Adresa</th>
										<th>Telefon</th>
										<th>Email</th>
										<th>Výbor</th>
									</tr>
									</thead>
									<tbody>

									<?php if (!empty($ENVO_FORM_DATA_CONT) && is_array($ENVO_FORM_DATA_CONT)) foreach ($ENVO_FORM_DATA_CONT as $c) { ?>

										<tr>
											<td><?= $c["id"] ?></td>
											<td><?= $c["name"] ?></td>
											<td><?= $c["address"] ?></td>
											<td><?= $c["phone"] ?></td>
											<td><?= $c["email"] ?></td>
											<td>

												<?php
												switch ($c["commission"]) {
													case '0':
														echo 'Není ve Výboru';
														break;
													case '1':
														echo 'Předseda';
														break;
													case '2':
														echo 'Člen Výboru';
														break;
													case '3':
														echo 'Pověřený vlastník';
														break;
												}
												?>

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
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage6" role="tabpanel">
			<div class="row m-b-20">
				<div class="col-sm-12 p-l-15 p-r-15 ">
					<div class="form-inline float-lg-right float-md-right float-sm-right">
						<div class="form-group">
							<label for="name">Číslo vchodu: </label>

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'addRowEnt', (isset($_REQUEST["addRowEnt"])) ? $_REQUEST["addRowEnt"] : '', '', 'form-control ml-2', array ('style' => 'height: 35px;', 'placeholder' => 'Číslo vchodu'));
							?>

						</div>
						<div class="form-group">

							<?php
							// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
							echo $Html -> addButton('button', '', 'Přidat nový vchod', '', 'addRowEnt', 'btn btn-info ml-2', array ('style' => 'width: 100%;'));
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-body no-padding">
							<div class="table-responsive">
								<table id="tableentrance" class="table table-hover">
									<thead>
									<tr>
										<th>Id</th>
										<th>Číslo vchodu</th>
										<th>Počet bytů</th>
										<th>Počet pater</th>
										<th>Výtah</th>
									</tr>
									</thead>
									<tbody>

									<?php if (!empty($ENVO_FORM_DATA_ENT) && is_array($ENVO_FORM_DATA_ENT)) foreach ($ENVO_FORM_DATA_ENT as $e) { ?>

										<tr>
											<td><?= $e["id"] ?></td>
											<td><?= $e["entrance"] ?></td>
											<td><?= $e["countapartment"] ?></td>
											<td><?= $e["countetage"] ?></td>
											<td>

												<?php
												switch ($e["elevator"]) {
													case '0':
														echo 'Není známo';
														break;
													case '1':
														echo 'Ano';
														break;
													case '2':
														echo 'Ne';
														break;
												}
												?>
											</td>
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
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage7" role="tabpanel">

			<?php if (!empty($ENVO_FORM_DATA_ENT) && is_array($ENVO_FORM_DATA_ENT)) {
				foreach ($ENVO_FORM_DATA_ENT as $e) { ?>

					<div class="row m-b-20">
						<div class="col-sm-6">
							<h5 style="margin: 2px;">Číslo vchodu:
								<strong><?php echo($e["entrance"] ? $e["entrance"] : '0'); ?></strong>
							</h5>
						</div>
						<div class="col-sm-6">

							<?php
							// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
							echo $Html -> addButton('button', '', 'Přidat nový Byt', 'button', '', 'btn btn-info float-right addRowApt', array ('data-entrance' => ($e["entrance"] ? $e["entrance"] : '0')));
							?>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="box box-success">
								<div class="box-body no-padding">
									<div class="table-responsive">
										<table id="tableapartment_<?php echo($e["entrance"] ? $e["entrance"] : '0'); ?>" class="table">
											<thead>
											<tr>
												<th>#</th>
												<th>Číslo bytu</th>
												<th>Patro</th>
												<th>Jméno</th>
												<th>Telefon</th>
												<th>Výbor</th>
											</tr>
											</thead>
											<tbody>

											<?php

											if (isset($ENVO_FORM_DATA_APT) && is_array($ENVO_FORM_DATA_APT)) {
												$foundApt = array ();
												foreach ($ENVO_FORM_DATA_APT as $a) {
													if ($a["entrance"] == $e["entrance"]) {
														$foundApt[] = $a;
													}
												}

												if (count($foundApt) != 0) {

													foreach ($foundApt as $foundApt) {

														echo '<tr>';

														echo '<td>' . $foundApt['id'] . '</td>';
														echo '<td>' . $foundApt['number'] . '</td>';
														echo '<td>' . $foundApt['etage'] . '</td>';
														echo '<td>' . $foundApt['name'] . '</td>';
														echo '<td>' . $foundApt['phone'] . '</td>';
														echo '<td>';

														switch ($foundApt["commission"]) {
															case '0':
																echo 'Není ve Výboru';
																break;
															case '1':
																echo 'Předseda';
																break;
															case '2':
																echo 'Člen Výboru';
																break;
															case '3':
																echo 'Pověřený vlastník';
																break;
														}

														echo '</td>';

														echo '</tr>';

													}

												} else {
													echo '<tr class="noedit" style="height: 49px"><td colspan="6" style="vertical-align: middle;"><span class="bold text-warning-dark">Nenalezen žádný záznam</span></td></tr>';
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
			} else { ?>

				<div class="col-sm-12">

					<?php
					// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
					echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
					?>

				</div>

			<?php } ?>

		</div>
		<div class="tab-pane fade" id="cmsPage8" role="tabpanel">
			<div class="row">
				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Obecné Informace', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Přijímané kanály');
											?>

										</div>
										<div class="col-sm-7">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housechannels', $ENVO_FORM_DATA["countentrance"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Přijímané vysílače');
											?>

										</div>
										<div class="col-sm-7">
											<div class="form-group m-0">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_housetowers', $ENVO_FORM_DATA["countapartment"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addTag('strong', 'Příprava na DVB-T2');
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => 'Připravenost bytového domu na příjem DVB-T2', 'data-original-title' => 'Nápověda'));
											?>

										</div>
										<div class="col-sm-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_housedvbt2', '1', ($ENVO_FORM_DATA["preparationdvb"] == '1') ? TRUE : FALSE, 'envo_housedvbt2_1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_housedvbt2_1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html -> addRadio('envo_housedvbt2', '0', ($ENVO_FORM_DATA["preparationdvb"] == '0') ? TRUE : FALSE, 'envo_housedvbt2_2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_housedvbt2_2', $tl["checkbox"]["chk1"]);
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
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Popis anténního systému', 'box-title');
							?>

						</div>
						<div class="box-body">

							<?php

							// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
							echo $Html -> addTextarea('envo_antennadescription', envo_edit_safe_userpost($ENVO_FORM_DATA["antennadescription"]), '40', '', array ('id' => 'envoEditorLarge', 'class' => 'form-control envoEditorLarge'));

							?>

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
		<div class="tab-pane fade" id="cmsPage9" role="tabpanel">
			<div class="row m-b-20">
				<div class="col-sm-12 p-l-15 p-r-15 ">
					<div class="form-inline float-lg-right float-md-right float-sm-right">
						<div class="form-group">

							<?php
							// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
							echo $Html -> addButton('button', '', 'Přidat nový servis', '', 'addRowServ', 'btn btn-info', array ('style' => 'width: 100%;'));
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-body no-padding">
							<div class="table-responsive">
								<table id="tableservice" class="table table-hover">
									<thead>
									<tr>
										<th>Id</th>
										<th>Popis</th>
										<th>Datum Zadání</th>
										<th>Datum Nahlášení</th>
										<th>Datum Ukončení</th>
									</tr>
									</thead>
									<tbody>

									<?php

									if (!empty($ENVO_FORM_DATA_SERV) && is_array($ENVO_FORM_DATA_SERV)) foreach ($ENVO_FORM_DATA_SERV as $s) {

										if ($s["deleted"] == 0) {

											// Records - active

											echo '<tr>';
											echo '<td>' . $s["id"] . '</td>';
											echo '<td>' . $s["description"] . '</td>';
											echo '<td>' . $s["timedefault"] . '</td>';
											echo '<td>' . $s["timestart"] . '</td>';
											echo '<td>' . $s["timeend"] . '</td>';
											echo '</tr>';

										} else {

											// Records - deleted

											echo '<tr class="strikeout noedit">';
											echo '<td>' . $s["id"] . '</td>';
											echo '<td>' . $s["description"] . '</td>';
											echo '<td>' . $s["timedefault"] . '</td>';
											echo '<td>' . $s["timestart"] . '</td>';
											echo '<td>' . $s["timeend"] . '</td>';
											echo '</tr>';

										}


									} else {
										echo '<tr class="noedit" style="height: 49px"><td colspan="6" style="vertical-align: middle;"><span class="bold text-warning-dark">Nenalezen žádný záznam</span></td></tr>';
									} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage10" role="tabpanel">
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
								<div class="col-sm-6">

								</div>
								<div class="col-sm-6">
									<div class="bold">
										Výběr souboru
									</div>
									<!-- Upload Files -->
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-lg-9 m-t-10">
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
                            <input type="file" name="input-file" id="fileinput_doc" accept=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai"/>
                          </div>

                        </span>
													<input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
													<span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-lg-3 m-t-10">
												<div class="form-group">

													<?php
													// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
													echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadBtnDocu', 'btn btn-info', array ('style' => 'width: 100%;'));
													?>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 m-t-10">
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
												<th class="text-center" style="width: 15%;">Typ souboru</th>
												<th style="width: 40%;">Popis</th>
												<th class="text-center" style="width: 20%;">Soubor</th>
												<!-- Last 'th' is generated by Jquery plugin Tabledit -->
											</tr>
											</thead>
											<tbody>

											<?php if (!empty($ENVO_FORM_DATA_DOCU) && is_array($ENVO_FORM_DATA_DOCU)) foreach ($ENVO_FORM_DATA_DOCU as $d) { ?>

												<tr>
													<td class="text-center"><?= $d["id"] ?></td>
													<td class="text-center"><?= envo_extension_icon($d["filename"]) ?></td>
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
		<div class="tab-pane fade" id="cmsPage11" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Fotogalerie', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
								<div class="col col-sm-12 col-md-4">

								</div>
								<div class="col-sm-2">
									<div class="bold">
										Výběr kategorie
									</div>
									<div class="form-group  m-t-10">
										<select name="envo_imgcategory" class="form-control selectpicker" data-placeholder="Výběr kategorie">

											<?php
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											echo $Html -> addOption('*', 'Bez kategorie');
											echo $Html -> addOption('service', 'Servisy');
											echo $Html -> addOption('reconstruction', 'Rekonstrukce');
											echo $Html -> addOption('installation', 'Instalace');
											echo $Html -> addOption('complaint', 'Reklamace');
											?>

										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="bold">
										Výběr souboru
									</div>
									<!-- Upload Files -->
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12 col-sm-8 col-lg-9 m-t-10">
												<div id="upload_img" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

													<!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_img" accept="image/*"/>
                          </div>

                        </span>
													<input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
													<span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
												</div>

											</div>
											<div class="col-xs-12 col-sm-4 col-lg-3 m-t-10">
												<div class="form-group">

													<?php
													// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
													echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadBtnImg', 'btn btn-info', array ('style' => 'width: 100%;'));
													?>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 m-t-10">
												<!-- Upload Files Output -->
												<div id="imgprogress" class="small hint-text" style="display: none;">
													<div class="progress">
														<div id="imgprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
													</div>
													<div>
														<span>Determinate progress </span><span id="imgpercent" class="bold"></span>
														<span> | Bytes received </span><span id="imgbyterec" class="bold"></span>
														<span> | Total bytes </span><span id="imgbytetotal" class="bold"></span>
													</div>
												</div>
												<p id="imgoutput" style="display: none;"></p>
											</div>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<hr>
									<button type="button" id="showPhotoList" class="btn btn-complete btn-cons">
										<span>Seznam</span>
									</button>

									<button type="button" id="showFiltrPhoto" class="btn btn-info btn-cons">
										<span>Filtr / Editace</span>
									</button>
									<hr>
								</div>
							</div>
							<div id="list_photo" class="row">
								<div class="col-sm-12">
									<div id="gallery_envo_0" class="gallery_envo">

										<?php

										if (!empty($test0_array) && is_array($test0_array)) {

											foreach ($test0_array as $subarray) {

												// Get first value 'timedefault'
												echo '<div class="dateblock_' . uniqid() . ' m-b-20 clearfix">';
												echo '<div class="padding-10 m-b-20" style="background:gray;color:white;font-weight:700;">' . reset($subarray) . '</div>';

												// Loop photos array
												foreach ($subarray['photos'] as $imgarray) {

													echo '<div id="' . $imgarray["id"] . '" class="gallery-item-' . $imgarray["id"] . ' ' . $imgarray["category"] . ' float-left" data-width="1" data-height="1" style="margin: 5px;">';

													echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" alt=""></div>';

													echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($imgarray["filenamethumb"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="gallery-0" href="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" data-caption="' . ($imgarray["shortdescription"] ? $imgarray["shortdescription"] : "NO SHORT DESCRIPTION") . ($imgarray["description"] ? " - " . $imgarray["description"] : "") . '">
                                        <button class="btn btn-info btn-xs btn-mini fs-14" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="pg-image"></i>
                                        </button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>';

													echo '<div class="full-width padding-10">';

													echo '<p class="bold">Krátký Popis</p><p class="shortdesc">' . $imgarray["shortdescription"] . '</p>';

													echo '</div>';

													echo '</div>';
												}

												echo '</div>';
											}

										} else {

											echo '<div class="col-sm-12">';
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
											echo '</div>';

										} ?>

									</div>
								</div>
							</div>
							<div id="isotope_photo" class="row" style="display: none;">
								<div class="col-sm-3 padding-20">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h5', 'Kategorie', 'bold');
									?>

									<ul id="imagefilters">
										<li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
									</ul>

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h5', 'Vyhledat', 'bold');
									?>

									<p>

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array ('placeholder' => 'Vyhledat ...'));
										?>

									</p>
								</div>
								<div class="col-sm-9">

									<?php
									if (!empty($ENVO_FORM_DATA_IMG) && is_array($ENVO_FORM_DATA_IMG)) {

										echo '<div id="gallery_envo_1" class="gallery_envo">';

										foreach ($ENVO_FORM_DATA_IMG as $img) {

											echo '<div id="' . $img["id"] . '" class="gallery-item-' . $img["id"] . ' ' . $img["category"] . '" data-width="1" data-height="1">';

											echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $img["mainfolder"] . $img["filenamethumb"] . '" alt=""></div>';


											echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($img["filenamethumb"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="gallery-1" href="/' . ENVO_FILES_DIRECTORY . $img["mainfolder"] . $img["filenamethumb"] . '" data-caption="' . ($img["shortdescription"] ? $img["shortdescription"] : "NO SHORT DESCRIPTION") . ($img["description"] ? " - " . $img["description"] : "") . '">
                                        <button class="btn btn-info btn-xs btn-mini fs-14" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="pg-image"></i>
                                        </button>
                                      </a>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-img" type="button" data-dialog="imgitemDetails" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace Informací">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 delete-img" type="button" data-id="' . $img["id"] . '" data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';

											echo '<div class="full-width padding-10">';

											echo '<p class="bold">Krátký Popis</p><p class="shortdesc">' . $img["shortdescription"] . '</p>';

											echo '</div>';

											echo '</div>';

										}

										echo '</div>';
									} else { ?>

										<div class="col-sm-12 m-t-20">

											<?php
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
											?>

										</div>

									<?php } ?>

									<div id="imgitemDetails" class="dialog item-details">
										<div class="dialog__overlay"></div>
										<div class="dialog__content">
											<div class="container-fluid">
												<div class="row dialog__overview">
													<!-- Data over AJAX  -->
												</div>
											</div>
											<button class="closedialog action top-right" type="button" data-dialog-close>
												<i class="pg-close fs-30"></i>
											</button>
										</div>
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
		<div class="tab-pane fade" id="cmsPage12" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', 'Videogalerie', 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
								<div class="col-sm-2">
									<div class="bold">
										Výběr kategorie
									</div>
									<div class="form-group m-t-10">
										<select name="envo_videocategory" class="form-control selectpicker" data-placeholder="Výběr kategorie">

											<?php
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											echo $Html -> addOption('*', 'Bez kategorie');
											echo $Html -> addOption('service', 'Servisy');
											echo $Html -> addOption('reconstruction', 'Rekonstrukce');
											echo $Html -> addOption('installation', 'Instalace');
											echo $Html -> addOption('complaint', 'Reklamace');
											?>

										</select>
									</div>
								</div>
								<div class="col-sm-10">
									<div class="bold">
										Výběr video souboru a náhledového obrázku
									</div>
									<!-- Upload Files -->
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12 col-sm-4 col-lg-5 m-t-10">
												<div id="upload_video" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

													<!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_video" accept="video/mp4,video/x-m4v,video/*"/>
                          </div>

                        </span>
													<input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
													<span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".wmv, .mp4, .mpg, .avi" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-facetime-video"></i></span>
												</div>

											</div>
											<div class="col-xs-12 col-sm-4 col-lg-5 m-t-10">
												<div id="upload_videothumb" class="input-group">
                          <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                            <!-- File-clear button -->
                            <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                              <i class="fa fa-remove"></i> Smazat
                            </button>

														<!-- File-input button-->
                            <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                              <i class="fa fa-folder-open"></i>
                              <span class="file-input-title">Vybrat Soubor</span>
                              <input type="file" name="input-file" id="fileinput_videothumb" accept="image/*"/>
                            </div>

                          </span>
													<input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
													<span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
												</div>

											</div>
											<div class="col-xs-12 col-sm-4 col-lg-2 m-t-10">
												<div class="form-group">

													<?php
													// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
													echo $Html -> addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '', 'uploadBtnVideo', 'btn btn-info', array ('style' => 'width: 100%;'));
													?>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 m-t-10">
												<!-- Upload Files Output -->
												<div id="videoprogress" class="small hint-text" style="display: none;">
													<div class="progress">
														<div id="videoprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
													</div>
													<div>
														<span>Determinate progress </span><span id="videopercent" class="bold"></span>
														<span> | Bytes received </span><span id="videobyterec" class="bold"></span>
														<span> | Total bytes </span><span id="videobytetotal" class="bold"></span>
													</div>
												</div>
												<p id="videooutput" style="display: none;"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 padding-20">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h5', 'Kategorie', 'bold');
									?>

									<ul id="videofilters">
										<li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
										<li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
									</ul>

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h5', 'Vyhledat', 'bold');
									?>

									<p>

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'videoquicksearch', '', 'videoquicksearch', 'form-control', array ('placeholder' => 'Vyhledat ...'));
										?>

									</p>
								</div>
								<div class="col-sm-9">
									<div id="videogallery_envo" class="gallery_envo">

										<?php
										if (!empty($ENVO_FORM_DATA_VIDEO) && is_array($ENVO_FORM_DATA_VIDEO)) {

											foreach ($ENVO_FORM_DATA_VIDEO as $video) {

												echo '<div id="' . $video["id"] . '" class="gallery-item-' . $video["id"] . ' ' . $video["category"] . '" data-width="1" data-height="1">';

												echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $video["mainfolder"] . $video["filenamethumb"] . '" alt=""></div>';


												echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($video["filename"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a class="video" data-fancybox-video data-type="iframe" data-src="/' . ENVO_FILES_DIRECTORY . $video["mainfolder"] . $video["filename"] . '" href="javascript:;">
                                        <button class="btn btn-info btn-xs btn-mini fs-14" type="button">
                                         <i class="pg-video"></i>
                                        </button>
                                      </a>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-video" type="button" data-dialog="videoitemDetails">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 delete-video" type="button" data-id="' . $video["id"] . '" data-confirm-delvideo="Jste si jistý, že chcete odstranit video?">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';

												echo '<div class="full-width padding-10">';

												echo '<p class="bold">Krátký Popis</p><p class="shortdesc">' . $video["shortdescription"] . '</p>';

												echo '</div>';

												echo '</div>';

											}
										} ?>

									</div>

									<div id="videoitemDetails" class="dialog item-details">
										<div class="dialog__overlay"></div>
										<div class="dialog__content">
											<div class="container-fluid">
												<div class="row dialog__overview">
													<!-- Data over AJAX  -->
												</div>
											</div>
											<button class="closedialog action top-right" type="button" data-dialog-close>
												<i class="pg-close fs-30"></i>
											</button>
										</div>
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

	<div id="pickercontainer" style="position: relative;"></div>

	<input type="hidden" name="folderpath" value="<?= $ENVO_FORM_DATA["folder"] ?>">
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
