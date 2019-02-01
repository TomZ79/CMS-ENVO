<?php include_once APP_PATH . 'admin/template/header.php'; ?>

	<div id="loadingdata" style="min-height: 100%;position: absolute;z-index: 10;top: 0;left: 0;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: none;align-items: center;justify-content: center;"></div>

	<div class="card card-default">
		<div class="card-header ">
			<div class="card-title">Nastavení vyhledávání
			</div>
			<div class="card-controls">
				<ul>
					<li><a href="#" class="card-collapse" data-toggle="collapse"><i class="card-icon card-icon-collapse"></i></a>
					</li>
					<li><a href="#" class="card-maximize" data-toggle="maximize"><i class="card-icon card-icon-maximize"></i></a>
					</li>
					<li><a href="#" class="card-close" data-toggle="close"><i class="card-icon card-icon-close"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="card-block">
			<form action="">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label class="m-b-10">Počet výstupních záznamů</label>
							<select name="maxpoc" id="zobr" class="form-control selectpicker">
								<option selected="selected" value="200">200 vět</option>
								<option value="500">500 vět</option>
								<option value="1000">1000 vět</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="m-b-10">Třídění</label>
							<select name="setrid" id="trid" class="form-control selectpicker">
								<option selected="selected" value="ZADNE">netříděno</option>
								<option value="ICO">IČO</option>
								<option value="OBEC">Obec</option>
								<option value="OBCHJM">Obchodní firma</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="m-b-10">Filtr</label>
							<select name="filtr" id="filt" class="form-control selectpicker">
								<!--07062016          <option value="0">všechny subjekty</option> -->
								<option value="1" selected="selected">jen aktivní</option>
								<!--07062016          <option value="2">jen zaniklé</option>  -->
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">

							<?php
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('', 'IČ', array ('class' => 'm-b-10'));
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'ares_ico', '', 'ares_ico', 'form-control', array ('maxlength' => '8'));
							?>

						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<?php
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('', 'Obec', array ('class' => 'm-b-10'));
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'ares_obec', '', 'ares_obec', 'form-control', array ('maxlength' => '45'));
							?>

						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<?php
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('', 'Ulice', array ('class' => 'm-b-10'));
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'ares_ulice', '', 'ares_ulice', 'form-control', array ('maxlength' => '45'));
							?>

						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<?php
							// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
							echo $Html -> addLabel('', 'Číslo domu', array ('class' => 'm-b-10'));
							echo '<div class=" row">';
							// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
							echo $Html -> addInput('text', 'ares_corientacni', '', 'ares_corientacni', 'form-control w-25 m-r-10', array ('maxlength' => '5'));
							echo '<span style="font-size: 2em;"> / </span>';
							echo $Html -> addInput('text', 'ares_cpopisne', '', 'ares_cpopisne', 'form-control w-25 m-l-10', array ('maxlength' => '5'));
							echo '</div>';
							?>


						</div>
					</div>
				</div>
				<div class="row m-t-15">
					<div class="col-sm-12">

						<?php
						// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
						echo $Html -> addButton('button', '', 'Vyhledat', '', 'searchAres', 'btn btn-info ml-2 float-right');
						?>

					</div>
				</div>
			</form>
		</div>
	</div>


	<form name="f_ares_frup" action="https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi" method="get" target="vystup">
		<input name="jazyk" type="hidden" value="cz">
		<div>
			<table class="TForm">
				<tbody>
				<tr>
					<td class="ttl">Obchodní firma:</td>
					<td class="inp"><input id="jm" name="obch_jm" maxlength="255" size="20" tabindex="2"></td>
					<td class="ttl">IČO:</td>
					<td class="inp"><input class="FFocus" id="ic" maxlength="8" name="ico" size="8" tabindex="1"></td>
					<td class="ttl">Diakritika:</td>
					<td class="inp"><select id="diak" name="cestina" tabindex="12">
							<option value="">ASCII</option>
							<option selected="selected" value="cestina">česká</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="ttl">
						<a href="https://wwwinfo.mfcr.cz/ares/obce/ares_obce.html.cz" target="vystup" title="Mapa - seznam obcí - viz Nápověda, důležité!">Obec</a>:
					</td>
					<td class="inp"><input id="ob" maxlength="45" name="obec" size="20" tabindex="3"></td>
					<td class="ttl">
						<a href="https://wwwinfo.mfcr.cz/ares/ares_fu.html.cz" target="vystup" title="Seznam finančních úřadů - viz Nápověda, důležité!">Fin.úřad</a>:
					</td>
					<td class="inp"><input id="fu" name="k_fu" maxlength="3" size="5" tabindex="4"></td>
					<td class="ttl">Zobrazit:</td>
					<td class="inp">
						<select id="zobr" name="maxpoc" tabindex="13">
							<option selected="selected" value="200">200 vět</option>
							<option value="500">500 vět</option>
							<option value="1000">1000 vět</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="ttl">Ulice:</td>
					<td class="inp"><input id="ul" name="ulice" maxlength="45" size="20" tabindex="5"></td>
					<td class="ttl">Č. domu:</td>
					<td class="inp">
						<input id="cd1" name="cis_or" maxlength="5" size="5" tabindex="6">
						<input id="cd2" name="cis_po" maxlength="5" size="5" tabindex="7">
					</td>
					<td class="ttl">Třídění:</td>
					<td class="inp"><select id="trid" name="setrid" tabindex="14">
							<option selected="selected" value="ZADNE">netříděno</option>
							<option value="ICO">IČO</option>
							<option value="OBEC">Obec</option>
							<option value="OBCHJM">Obchodní firma</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="ttl">
						<a href="https://wwwinfo.mfcr.cz/ares/aresPrFor.html.cz" target="vystup" title="Seznam právních forem">Právní forma</a>:
					</td>
					<td class="inp"><input id="pf" name="pr_for" maxlength="3" size="5" tabindex="8"></td>
					<td class="ttl">
						<a href="https://wwwinfo.mfcr.cz/ares/nace/ares_nace.html.cz" target="vystup" title="Klasifikace ekonomických činností v rámci Evropského společenství">CZ-NACE</a>:
					</td>
					<td class="inp">
						<input id="na1" name="nace" maxlength="5" size="5" tabindex="9">
						<!-- do 1.1.2012:
										<input id="na1" name="nace" maxlength="6" size="6" tabindex="9">
										<input id="na2" name="nace_h" maxlength="6" size="6" tabindex="10">
						-->
					</td>
					<td class="ttl">Výstup:</td>
					<td class="inp">
						<select id="vyst" name="xml" tabindex="15">
							<option value="1" selected="selected">HTML</option>
							<option value="2">HTML server</option>
							<option value="0">XML</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="ttl">Filtr:</td>
					<td class="inp">
						<select id="filt" name="filtr" tabindex="11">
							<!--07062016          <option value="0">všechny subjekty</option> -->
							<option value="1" selected="selected">jen aktivní</option>
							<!--07062016          <option value="2">jen zaniklé</option>  -->
						</select>
					</td>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td class="TButtArea ttl"><!-- Docasna zmena dle req1161 Související aplikace:--></td>
					<td class="TLinkArea" colspan="3"><!-- Docasna zmena dle req1161 <a href="ares_fo.html.cz" target="_parent" title="Vyhledávání osob (veřejných dle zákona)">Osoby</a>--></td>
					<td colspan="6" class="TButtArea">
						<input alt="Vyhledat" class="aresButt" type="submit" value="Vyhledat" tabindex="16"><input alt="Nové zadání" class="aresButt" type="reset" tabindex="17" value="Nové zadání">
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>