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

// Group data by the key
$ENVO_CITY = array_group_by($ENVO_CITY, 'district_name');

?>

	<div id="loadingdata" style="min-height: 100%;position: absolute;z-index: 10;top: 0;left: 0;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: none;align-items: center;justify-content: center;"></div>

	<div class="card card-default" id="card-help">
		<div class="card-header">
			<div class="card-title">Nápověda</div>

			<div class="card-controls">
				<ul>
					<li><a class="card-collapse" data-toggle="collapse" href="#"><i class="pg-arrow_maximize"></i></a></li>
					<li><a class="card-maximize" data-toggle="maximize" href="#"><i class="card-icon card-icon-maximize"></i></a>
					</li>
					<li><a class="card-close" data-toggle="close" href="#"><i class="card-icon card-icon-close"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="card-block" style="display: none;">
			<h3><span class="semi-bold">Nápověda</span> pro Vyhledávání</h3>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Počet výstupních záznamů</p>
					<ul>
						<li>Jelikož počet vybraných subjektů může být dle zvolených vstupních údajů velice různorodý, můžete si již předem zvolit maximální počet subjektů, které budou pro danou vstupní podmínku zobrazeny. Dle úvahy je možné výstup omezit na 50, 200 nebo 500 subjektů vyhovujících vstupním podmínkám.</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Zobrazit uložené záznamy v DB</p>
					<ul>
						<li></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Název subjektu</p>
					<ul>
						<li>Toto pole slouží k zadání názvu hledaného subjektu. Neuvádějte standardní texty označení právní formy na konci názvu (např. a.s., s.r.o.), ani dovětek v likvidaci na konci názvu - pro vyhledání je standardní podoba těchto textů ignorována.</li>
						<li>Maximální počet znaků, který lze zadat, je 40.</li>
						<li>Není třeba vypisovat celé jméno, stačí zadat několik znaků (minimálně však alespoň 3). Pak výsledkem dotazu na databázový server bude vrácení různého množství subjektů, jejichž jméno začíná zadaným textem nebo obsahuje zadaná slova (v závislosti na volbě typu hledání, viz níže).</li>
						<li>Pro výběr subjektu není u tohoto pole významná diakritika (název subjektu lze zadat s diakritikou nebo bez ní a výsledek bude stejný).</li>
						<li>Není nutné při zadávání jména rozlišovat mezi velkými a malými písmeny abecedy.</li>
						<li>Při vyhledávání jsou ignorovány mezery a speciální znaky, které se nevyskytují v abecedě (např. $ % & < > ( ) ! ? + - / * = ).</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Obec</p>
					<ul>
						<li>Toto pole slouží k zadání obce, v níž hledaný subjekt sídlí.</li>
						<li>Obec lze vybrat ze seznamu, který usnadňuje vyhledávání. Díky výběru obce ze seznamu jsou následující pravidla pro vyhledávání v JUSTICI nepodstatná.</li>
						<li>Maximální počet znaků, který můžete zadat v tomto poli, je 150.</li>
						<li>Není třeba vypisovat celý název obce, stačí zadat jen několik znaků (minimálně však alespoň 2).</li>
						<li>Pro výběr není u tohoto pole významná diakritika (obec lze zadat s diakritikou nebo bez ní a výsledek bude stejný).</li>
						<li>Není nutné při zadávání rozlišovat mezi velkými a malými písmeny abecedy.</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Ulice</p>
					<ul>
						<li>Toto pole slouží k zadání názvu ulice sídla subjektu.</li>
						<li>Maximální počet znaků, který můžete zadat je 150.</li>
						<li>Pro úspěšné hledání dle tohoto kritéria je nutné zadat název ulice přesně z hlediska diakritiky, rozlišení velkých a malých písmen abecedy. Pro úspěšné vyhledávání je nutné zadat úplný název ulice (není možné vyhledávat podle počátečních znaků názvu ulice).</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Číslo domu (číslo orientační / číslo popisné)</p>
					<ul>
						<li>Pro tento parametr slouží dvě pole. Maximální počet znaků, který můžete zadat je 5.</li>
						<li>Číslo domu musí být zadáno pouze pomocí číslic.</li>
						<li>Může se zadat číslo jedno nebo obě, na pořadí čísel nezáleží.</li>
						<li>Zadání tohoto parametru vyžaduje současné zadání buď parametru Obec</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-default card-collapsed" id="card-basic">
		<div class="card-header">
			<div class="card-title">Nastavení vyhledávání</div>

			<div class="card-controls">
				<ul>
					<li><a class="card-collapse" data-toggle="collapse" href="#"><i class="pg-arrow_minimize"></i></a></li>
					<li><a class="card-maximize" data-toggle="maximize" href="#"><i class="card-icon card-icon-maximize"></i></a>
					</li>
					<li><a class="card-close" data-toggle="close" href="#"><i class="card-icon card-icon-close"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label class="m-b-10">Počet výstupních záznamů</label>
						<select name="justice_maxcount" id="justice_maxcount" class="form-control selectpicker">
							<option selected="selected" value="50">50 vět</option>
							<option value="200">200 vět</option>
							<option value="500">500 vět</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label class="m-b-10">Zobrazit uložené záznamy v DB</label>
						<div class="radio radio-success">
							<input type="radio" value="1" name="recordDb" id="recordDb1" checked="checked">
							<label for="recordDb1">Ano</label>
							<input type="radio" value="0" name="recordDb" id="recordDb0">
							<label for="recordDb0">Ne</label>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<form action="" id="searchJusticeOther" method="POST">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Název subjektu', array ('class' => 'm-b-10 m-r-5'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-r-5');
									echo $Html -> addTag('span', 'min 3, max 40 znaků', 'help');

									?>

									<div class="input-group">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html -> addInput('text', 'justice_subject', '', 'justice_subject', 'form-control', array ('maxlength' => '40'));
										?>

										<span class="input-group-append">

											<?php
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'input-group-addon cms-help', array ('data-content' => '<strong>Doporučená slova pro vyhledání bytových domů</strong><br><ul><li>společenství</li><li>dům</li><li>domu</li></ul>', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
											?>

										</span>
									</div>

								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Obec', array ('class' => 'm-b-10 m-r-10'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', 'max 150 znaků', 'help');
									?>

									<select name="justice_obec" class="form-control selectpicker" id="first-choice" data-search-select2="true" data-placeholder="Výběr obce">

										<?php
										// First blank option
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption();

										if (isset($ENVO_CITY) && is_array($ENVO_CITY)) {
											foreach ($ENVO_CITY as $keydistrict => $districtitem) {

												foreach ($districtitem as $item) {
													// Get District ID from first item - is same for all items
													$districtid = $item["district_id"];
													// Break loop after first iteration
													break;
												}

												// to know what's in $item
												echo '<optgroup label="Okres ' . $keydistrict . '" data-district_name="' . $keydistrict . '" data-district_id="' . $districtid . '">';

												foreach ($districtitem as $c) {

													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													echo $Html -> addOption($c["city_name"], $c["city_name"], '', '', '', array ('data-city_cuzk_code' => $c["city_cuzk_code"]));

												}

												echo '</optgroup>';

											}
										}

										?>

									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Ulice', array ('class' => 'm-b-10 m-r-10'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', 'max 150 znaků', 'help');
									?>

									<?php
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html -> addDiv('', '', array ('class' => 'loadingdata_street', 'style' => 'visibility: hidden;min-height: 35px;position: absolute;z-index: 9;bottom: 0px;left: 3px;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;margin-bottom: 10px;'));
									?>

									<select name="justice_ulice" class="form-control selectpicker" id="second-choice" data-search-select2="true" data-placeholder="Výběr ulice">

										<?php
										// First blank option
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', '');
										?>

									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Číslo domu', array ('class' => 'm-b-10 m-r-10'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', 'Č.O - max 5 znaků / Č.P - max 5 znaků', 'help');
									echo '<div class=" row">';
									// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
									echo $Html -> addInput('text', 'justice_corientacni', '', 'justice_corientacni', 'form-control w-25 m-r-10', array ('maxlength' => '5', 'placeholder' => 'č.o.'));
									echo '<span style="font-size: 2em;"> / </span>';
									echo $Html -> addInput('text', 'justice_cpopisne', '', 'justice_cpopisne', 'form-control w-25 m-l-10', array ('maxlength' => '5', 'placeholder' => 'č.p.'));
									echo '</div>';
									?>


								</div>
							</div>
						</div>
						<div class="row m-t-20">
							<div class="col-sm-12">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('', 'Vyhledat podle Adresy', '', 'btn btn-info ml-2 float-right');
								?>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-default card-collapsed" id="card-result">
		<div class="card-header">
			<div class="card-title">Výsledky vyhledávání</div>
			<div class="card-controls">
				<ul>
					<li><a class="card-collapse" data-toggle="collapse" href="#"><i class="pg-arrow_minimize"></i></a></li>
					<li><a class="card-maximize" data-toggle="maximize" href="#"><i class="card-icon card-icon-maximize"></i></a>
					</li>
					<li><a class="card-close" data-toggle="close" href="#"><i class="card-icon card-icon-close"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12">
					<div id="outputjusticedata"></div>
				</div>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>