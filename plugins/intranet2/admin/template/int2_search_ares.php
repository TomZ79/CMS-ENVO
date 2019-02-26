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
	 * @param array $array The array to have grouping performed on.
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
	function array_group_by(array $array, $key)
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
				$params        = array_merge([ $value ], array_slice($args, 2, func_num_args()));
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
						<li>Jelikož počet vybraných subjektů může být dle zvolených vstupních údajů velice různorodý, můžete si již předem zvolit maximální počet subjektů, které budou pro danou vstupní podmínku zobrazeny. Dle úvahy je možné výstup omezit na 200, 500 nebo 1000 subjektů vyhovujících vstupním podmínkám.</li>
						<li> Pokud počet subjektů vyhovujících zadaným kritériím převyšuje povolenou hranici, nezobrazí se žádný subjekt a je vypsáno chybové hlášení. V takovém případě je nutné zpřesnit vyhledávací kritéria nebo zvýšit limitující hodnotu.</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Třídění</p>
					<ul>
						<li>Zobrazení pořadí vyhledaných subjektů.</li>
						<li>Typ třídění lze vybrat ze seznamu, který usnadňuje vyhledávání.</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Filtr slov</p>
					<ul>
						<li>Pomocí filtru slov lze filtrovat výstupní data podle názvu subjektu</li>
						<li>Formát filtru:
							<ul>
								<li>Vyhledávání podle jednoho slova -> slovo1</li>
								<li>Vyhledávání podle více slov -> slovo1, slovo2, slovo3</li>
							</ul>
						</li>
						<li>Prázdné mezery v zadání filtru se při vyhledávání neuplatňují.</li>
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
					<p class="bold sm-p-t-20">Identifikační číslo</p>
					<ul>
						<li>Toto pole slouží k zadání identifikačního čísla organizace hledaného subjektu, které mu přidělil Obchodní rejstřík, Živnostenský úřad nebo Český statistický úřad.</li>
						<li>Maximální počet znaků, který můžete zadat v tomto poli, je 8.</li>
						<li>Identifikační číslo musí být zadáno pouze pomocí číslic.</li>
						<li>Pokud je zadané Identifikační číslo kratší než 8 znaků, budou do řetězce automaticky doplněny uvozující nuly.</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Obec</p>
					<ul>
						<li>Toto pole slouží k zadání obce, v níž hledaný subjekt sídlí.</li>
						<li>Obec lze vybrat ze seznamu, který usnadňuje vyhledávání. Díky výběru obce ze seznamu jsou následující pravidla pro vyhledávání v ARES nepodstatná.</li>
						<li>Vyplňuje se přesný název obce včetně diakritických znamének (nezáleží na velikosti písmen) nebo číslo obce.</li>
						<li>Maximální počet znaků, který můžete zadat je 45.</li>
						<li>Pokud se do tohoto pole nezapíše název obce celý, ale jen některá slova z názvu, vyhledávají se subjekty ve všech obcích, jejichž název obsahuje zadaný text (např. při zadání Boleslav se hledá v obcích Mladá Boleslav i Brandýs nad Labem-Stará Boleslav).</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p class="bold sm-p-t-20">Ulice</p>
					<ul>
						<li>Toto pole slouží k zadání názvu ulice sídla subjektu.</li>
						<li>Maximální počet znaků, který můžete zadat je 45.</li>
						<li>Nerozlišuje se mezi zadáním velkých a malých písmen abecedy, diakritika pro tento parametr není významná.</li>
						<li>Významné pro vyhledávání je prvních 9 znaků každého slova názvu ulice, znaky * a ? nelze použít jako zástupné znaky.</li>
						<li>Hledá se ve slovníku ulic po slovech. Ve slovníku ulic mohou být i názvy části obce, pokud se v datech vyskytly adresy bez názvu ulice (např. pro ulici "V Holešovičkách" se hledá i slovo HOLESOVIC (9 znaků, bez diakritiky) a může se tak stát, že vyhledá i subjekty v části obce Holešovice).</li>
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
						<select name="ares_maxcount" id="ares_maxcount" class="form-control selectpicker">
							<option selected="selected" value="200">200 vět</option>
							<option value="500">500 vět</option>
							<option value="1000">1000 vět</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label class="m-b-10">Třídění</label>
						<select name="ares_sort" id="ares_sort" class="form-control selectpicker">
							<option selected="selected" value="ZADNE">netříděno</option>
							<option value="ICO">IČO</option>
							<option value="OBEC">Obec</option>
							<option value="OBCHJM">Obchodní firma</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">

						<?php
						// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
						echo $Html -> addLabel('', 'Filtr slov', array ('class' => 'm-b-10 m-r-10'));
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', 'formát: slovo1, slovo2, slovo3', 'help');
						?>

						<div class="input-group">

							<?php
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'ares_word', '', 'ares_word', 'form-control');
							?>

							<span class="input-group-append">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'input-group-addon cms-help', array ('data-content' => '<strong>Doporučená slova pro vyhledání bytových domů</strong><br><ul><li>společ</li><li>společenství</li><li>dům</li><li>domu</li></ul>', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
								?>

							</span>
						</div>

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
				<div class="col-sm-3" style="border-right: 1px solid rgba(0,0,0,.1);">
					<form action="" id="searchAresIc" method="POST">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'IČ', array ('class' => 'm-b-10 m-r-5'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-r-5');
									echo $Html -> addTag('span', 'max 8 číslic', 'help');
									// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
									echo $Html -> addInput('text', 'ares_ico', '', 'ares_ico', 'form-control', array ('maxlength' => '8'));
									?>

								</div>
							</div>
						</div>
						<div class="row m-t-20">
							<div class="col-sm-12">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('', 'Vyhledat podle IČ', '', 'btn btn-info ml-2 float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>


							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-9">
					<form action="" id="searchAresOther" method="POST">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Obec', array ('class' => 'm-b-10 m-r-5'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-r-5');
									echo $Html -> addTag('span', 'max 45 znaků', 'help');
									?>

									<select name="ares_obec" class="form-control selectpicker" id="first-choice" data-search-select2="true" data-placeholder="Výběr obce">

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
													echo $Html -> addOption($c["city_cuzk_code"], $c["city_name"], '', '', '', array ('data-city_cuzk_code' => $c["city_cuzk_code"]));

												}

												echo '</optgroup>';

											}
										}

										?>

									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Ulice', array ('class' => 'm-b-10 m-r-5'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-r-5');
									echo $Html -> addTag('span', 'max 45 znaků', 'help');
									?>

									<?php
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html -> addDiv('', '', array ('class' => 'loadingdata_street', 'style' => 'visibility: hidden;min-height: 35px;position: absolute;z-index: 9;bottom: 0px;left: 3px;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;margin-bottom: 10px;'));
									?>

									<select name="ares_ulice" class="form-control selectpicker" id="second-choice" data-search-select2="true" data-placeholder="Výběr ulice">

										<?php
										// First blank option
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', '');
										?>

									</select>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group">

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('', 'Číslo domu', array ('class' => 'm-b-10 m-r-10'));
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('span', 'Č.O - max 5 znaků / Č.P - max 5 znaků', 'help');
									echo '<div class=" row">';
									// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
									echo $Html -> addInput('text', 'ares_corientacni', '', 'ares_corientacni', 'form-control w-25 m-r-10', array ('maxlength' => '5', 'placeholder' => 'č.o.'));
									echo '<span style="font-size: 2em;"> / </span>';
									echo $Html -> addInput('text', 'ares_cpopisne', '', 'ares_cpopisne', 'form-control w-25 m-l-10', array ('maxlength' => '5', 'placeholder' => 'č.p.'));
									echo '</div>';
									?>


								</div>
							</div>
						</div>
						<div class="row m-t-20">
							<div class="col-sm-12">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('', 'Vyhledat podle Adresy', '', 'btn btn-info ml-2 float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
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
					<div id="outputaresdata"></div>
				</div>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>