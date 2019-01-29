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
			return null;
		}
		$func = (!is_string($key) && is_callable($key) ? $key : null);
		$_key = $key;
		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($array as $value) {
			$key = null;
			if (is_callable($func)) {
				$key = call_user_func($func, $value);
			} elseif (is_object($value) && isset($value ->{$_key})) {
				$key = $value ->{$_key};
			} elseif (isset($value[$_key])) {
				$key = $value[$_key];
			}
			if ($key === null) {
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
$ENVO_KU = array_group_by($ENVO_KU, "city");

?>

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
		<!-- Fixed Button for save form -->
		<div class="savebutton hidden-xs" style="width: 590px;">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('https://www.ikatastr.cz/', 'iKatastr', '', 'btn btn-info button', array ('target' => 'WindowKATASTR', 'style' => 'margin: 10px 8px;'));
			// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
			echo $Html -> addButton('button', '', 'Kopírovat adresu', '', '', 'btn btn-info copyadress', array ('style' => 'margin: 10px 8px;'));
			echo $Html -> addButton('button', '', 'Kopírovat data domu', '', 'houseSelect', 'btn btn-info', array ('style' => 'margin: 10px 8px;'));
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ('data-loading-text' => $tl["button"]["btn41"], 'style' => 'margin: 10px 8px;'));
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house', $tl["button"]["btn19"], '', 'btn btn-info button', array ('style' => 'margin: 10px 8px;'));
			?>

		</div>

		<div id="loadingdata_ares" style="min-height: 100%;position: absolute;z-index: 10;top: 0;left: 0;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: none;align-items: center;justify-content: center;"></div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">
					<span class="text">Nastavení</span>
				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">
					<span class="text">Detail</span>
				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage3" class="" data-toggle="tab">
					<span class="text">Popis/Složky</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">
					<span class="text">Kontakty</span>
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
					<div class="col-sm-12">
						<div class="alert alert-info" role="alert">
							<button class="close" data-dismiss="alert"></button>
							<strong>Info: </strong>Po vyplnění základních údajů o bytovém domu a následném uložení budou zpřístupněny další záložky pro práci s bytovým domem.
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
												echo $Html -> addTag('strong', 'Název Domu');
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housename', (isset($_REQUEST["envo_housename"]) ? $_REQUEST["envo_housename"] : ''), '', 'form-control');
													?>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Sídlo');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_househeadquarters', (isset($_REQUEST["envo_househeadquarters"]) ? $_REQUEST["envo_househeadquarters"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Ulice');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housestreet', (isset($_REQUEST["envo_housestreet"]) ? $_REQUEST["envo_housestreet"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Město');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">
													<select name="envo_housecity" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr města">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														$selected = ((isset($_REQUEST["envo_housecity"]) && ($_REQUEST["envo_housecity"] == '0')) || !isset($_REQUEST["envo_housecity"])) ? TRUE : FALSE;

														// First blank option
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption();

														if (isset($ENVO_CITY) && is_array($ENVO_CITY)) foreach ($ENVO_CITY as $c) {

															if (isset($_REQUEST["envo_housecity"]) && ($_REQUEST["envo_housecity"] != '0')) {
																if (isset($_REQUEST["envo_housecity"]) && ($c == $_REQUEST["envo_housecity"])) {
																	$selected = TRUE;
																} else {
																	$selected = FALSE;
																}
															} else {
																$selected = FALSE;
															}

															echo $Html -> addOption($c["id"], $c["city"], $selected);

														}
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Katastrální území');
												?>

											</div>
											<div class="col-sm-8">

												<?php
												// Start - Select Tag
												echo '<div class="form-group m-0"><select name="envo_houseku" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr katastrálního území">';

												//
												$selected = ((isset($_REQUEST["envo_houseku"]) && ($_REQUEST["envo_houseku"] == '0')) || !isset($_REQUEST["envo_houseku"])) ? TRUE : FALSE;

												// First blank option
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html -> addOption();

												foreach ($ENVO_KU as $keyku => $itemku) {

													foreach ($itemku as $item) {
														// Get City ID from first item - is same for all items
														$cityid = $item["city_id"];
														// Break loop after first iteration
														break;
													}

													// To know what's in $item
													echo '<optgroup label="' . $keyku . '" data-cityname="' . $keyku . '" data-cityid="' . $cityid . '">';

													foreach ($itemku as $item) {

														if (isset($_REQUEST["envo_houseku"]) && ($_REQUEST["envo_houseku"] != '0')) {
															if (isset($_REQUEST["envo_houseku"]) && ($item["id"] == $_REQUEST["envo_houseku"])) {
																$selected = TRUE;
															} else {
																$selected = FALSE;
															}
														} else {
															$selected = FALSE;
														}

														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption($item["id"], $item["ku"], $selected, '', '', array ('data-kuname' => $item["ku"], 'data-kuid' => $item["id"]));

													}

													echo '</optgroup>';

												}

												// End - Select Tag
												echo '</select></div>';

												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'PSČ');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housepsc', (isset($_REQUEST["envo_housepsc"]) ? $_REQUEST["envo_housepsc"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'IČ');
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_houseic', (isset($_REQUEST["envo_houseic"]) ? $_REQUEST["envo_houseic"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Stát');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housestate', (isset($_REQUEST["envo_housestate"]) ? $_REQUEST["envo_housestate"] : 'Česká Republika'), '', 'form-control');
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
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
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Název');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefname', (isset($_REQUEST["envo_housefname"]) ? $_REQUEST["envo_housefname"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Ulice');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefstreet', (isset($_REQUEST["envo_housefstreet"]) ? $_REQUEST["envo_housefstreet"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Město');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefcity', (isset($_REQUEST["envo_housefcity"]) ? $_REQUEST["envo_housefcity"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'PSČ');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefpsc', (isset($_REQUEST["envo_housefpsc"]) ? $_REQUEST["envo_housefpsc"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'IČ');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0<?php if (isset($errors["e6"]) || isset($errors["e7"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefic', (isset($_REQUEST["envo_housefic"]) ? $_REQUEST["envo_housefic"] : ''), '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'DIČ');
												?>

											</div>
											<div class="col-sm-8">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_housefdic', (isset($_REQUEST["envo_housefdic"]) ? $_REQUEST["envo_housefdic"] : ''), '', 'form-control');
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
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
													// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ((isset($_REQUEST["envo_permission"]) && ($_REQUEST["envo_permission"] == '0' || (in_array('0', $_REQUEST["envo_permission"]))) || !isset($_REQUEST["envo_permission"]))) ? TRUE : FALSE;

													echo $Html -> addOption('0', 'Všechny skupiny', $selected);
													if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

														if (isset($_REQUEST["envo_permission"]) && (in_array($v["id"], $_REQUEST["envo_permission"]))) {
															if (isset($_REQUEST["envo_permission"]) && (in_array('0', $_REQUEST["envo_permission"]))) {
																$selected = FALSE;
															} else {
																$selected = TRUE;
															}
														} else {
															$selected = FALSE;
														}

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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'ARES podle IČ', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'ARES - Upload data');
												?>

											</div>
											<div class="col-sm-4">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_dataares', '', '', 'form-control', array ('placeholder' => 'Zadejte IČ'));
													?>

												</div>
											</div>
											<div class="col-sm-4 text-center">

												<?php
												// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
												echo $Html -> addButton('button', '', 'Upload Data', '', 'loadAres', 'btn btn-default');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Web - ARES');
												?>

											</div>
											<div class="col-sm-4">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_houseares', '1', ((isset($_REQUEST["envo_houseares"]) && $_REQUEST["envo_houseares"] == '1')) ? TRUE : FALSE, 'envo_houseares1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_houseares1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_houseares', '0', ((isset($_REQUEST["envo_houseares"]) && $_REQUEST["envo_houseares"] == '0') || !isset($_REQUEST["envo_houseares"])) ? TRUE : FALSE, 'envo_houseares2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_houseares2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
											<div class="col-sm-4">
												<div id="ares_res" <?= ((isset($_REQUEST["envo_houseares"]) && $_REQUEST["envo_houseares"] == '1')) ? '' : 'style="display: none;"' ?>>

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('#', 'Výpis - RES', '', '', array ('target' => 'WindowARES'));
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html -> addTag('span', '|', 'm-l-10 m-r-10');
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('#', 'Výpis - VREO', '', '', array ('target' => 'WindowARES'));
													?>

												</div>
											</div>
										</div>
										<div id="aresoutput" class="row p-3" style="background-color: #FFF5CC;display: none;"></div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
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
											<div class="col-sm-4">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Web - Justice.cz');
												?>

											</div>
											<div class="col-sm-4">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_housejustice', '1', ((isset($_REQUEST["envo_housejustice"]) && $_REQUEST["envo_housejustice"] == '1')) ? TRUE : FALSE, 'envo_housejustice1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_housejustice1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_housejustice', '0', ((isset($_REQUEST["envo_housejustice"]) && $_REQUEST["envo_housejustice"] == '0') || !isset($_REQUEST["envo_housejustice"])) ? TRUE : FALSE, 'envo_housejustice2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_housejustice2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
											<div class="col-sm-4">
												<div id="justice_vor" <?= ((isset($_REQUEST["envo_housejustice"]) && $_REQUEST["envo_housejustice"] == '1')) ? '' : 'style="display: none;"' ?>>

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('#', 'Výpis - Justice.cz', '', '', array ('target' => 'WindowJUSTICE'));
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
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
								echo $Html -> addTag('h3', 'Správa nemovitosti', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-12">
												<select name="envo_estatemanagement" class="form-control selectpicker" data-search-select2="true">

													<?php
													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ((isset($_REQUEST["envo_estatemanagement"]) && ($_REQUEST["envo_estatemanagement"] == '0')) || !isset($_REQUEST["envo_estatemanagement"])) ? TRUE : FALSE;

													echo $Html -> addOption('0', '----------------', $selected);
													if (isset($ENVO_RESTMANA) && is_array($ENVO_RESTMANA)) foreach ($ENVO_RESTMANA as $em) {

														if (isset($_REQUEST["envo_estatemanagement"]) && ($_REQUEST["envo_estatemanagement"] != '0')) {
															if (isset($_REQUEST["envo_estatemanagement"]) && ($em == $_REQUEST["envo_estatemanagement"])) {
																$selected = TRUE;
															} else {
																$selected = FALSE;
															}
														} else {
															$selected = FALSE;
														}

														echo $Html -> addOption($em["id"], $em["name"], $selected);

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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', 'Digitální správa domu', 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Správa domu');
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_houseadministration', '1', ((isset($_REQUEST["envo_houseadministration"]) && $_REQUEST["envo_houseadministration"] == '1')) ? TRUE : FALSE, 'envo_houseadministration1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_houseadministration1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_houseadministration', '0', ((isset($_REQUEST["envo_houseadministration"]) && $_REQUEST["envo_houseadministration"] == '0') || !isset($_REQUEST["envo_houseadministration"])) ? TRUE : FALSE, 'envo_houseadministration2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_houseadministration2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Datum převzetí do správy');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_datedministration', (isset($_REQUEST["envo_datedministration"])) ? $_REQUEST["envo_datedministration"] : '', 'datepickerTime', 'form-control', array ('readonly' => 'readonly'));
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
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
										<div class="row-form p-t-10 p-b-10">
											<div class="col-sm-3">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', 'Složka domu');
												?>

											</div>
											<div class="col-sm-9">
												<span>Složky domu budou vytvořeny po uložení dat.</span>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-12">

												<?php
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('', '<strong>Popis bytového domu</strong>', array ('class' => 'm-b-10'));
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_housedescription', (isset($_REQUEST["envo_housedescription"]) ? $_REQUEST["envo_housedescription"] : ''), '10', '', array ('class' => 'form-control envoEditorLarge'));
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage4" role="tabpanel">
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
															echo $Html -> addInput('text', 'envo_houseemail', (isset($_REQUEST["envo_houseemail"]) ? $_REQUEST["envo_houseemail"] : ''), '', 'form-control');
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</form>

<?php
include_once APP_PATH . 'plugins/intranet2/admin/template/selecthouse_modal.php';
include_once APP_PATH . 'admin/template/footer.php';
?>