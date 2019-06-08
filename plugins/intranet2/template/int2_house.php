<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="row">
		<div class="col-md-12">

			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Live <strong>vyhledávání</strong>
						<br class="d-block d-sm-none"/> (podle názvu bytového domu)</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">
					<form method="post" action="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'livesearch') ?>">
						<div class="form-group row">
							<label class="col-form-label col-lg-2">Bytový dům</label>
							<div class="col-lg-10">
								<div class="input-group">
									<input name="searchtext" type="text" class="form-control" placeholder="Zadejte ulici, č.p. nebo č.o">
									<span class="input-group-append">
										<button class="btn btn-light" type="submit">Vyhledat</button>
									</span>
								</div>
							</div>
						</div>
					</form>
					<p><strong>Nápověda: </strong>Pro vyhledání záznamu lze použít jen část slova např:
						<code>kru</code> vyhledá všechny záznamy obsahující tyto písmena. Dále je možné vyhledat podle záznam podle více slov, které můžeme oddělit
						<code>,</code> <code>, mezera</code> <code>|</code> <code>:</code> <code>+</code> <code>-</code>
						<code> mezera</code> např: <code>kru,20</code> vyhledá všechny záznamy obsahující tyto písmena a číslo.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Vyhledávání <strong>podle kritérií</strong></h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">

					<div class="row">

						<div class="col-md-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Základní zobrazení</h6>
							<div class="form-group form-group-lg">
								<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist') ?>" class="btn btn-block btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2">Zobrazit vše</a>
							</div>
						</div>

						<div class="col-md-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle měst <small class="font-weight-light ml-1">(pouze okres KV)</small></h6>
							<div class="form-group form-group-lg">
								<select class="form-control select2" data-placeholder="Výběr města" data-search-select2="true" onchange="location = this.value;" data-fouc>
									<option value=""></option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '1') ?>">Abertamy</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '3') ?>">Bečov nad Teplou</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '4') ?>">Bochov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '6') ?>">Božičany</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '5') ?>">Boží Dar</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '8') ?>">Březová u KV</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '10') ?>">Chyše</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '11') ?>">Čichalov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '13') ?>">Dalovice</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '14') ?>">Děpoltovice</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '16') ?>">Hájek</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '20') ?>">Hroznětín</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '18') ?>">Hory</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '21') ?>">Jáchymov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '22') ?>">Jenišov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '23') ?>">Karlovy Vary</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '25') ?>">Krásné Údolí</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '27') ?>">Kyselka</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '28') ?>">Merklín</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '30') ?>">Nejdek</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '31') ?>">Nová Role</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '83') ?>">Nové Sedlo</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '33') ?>">Ostrov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '34') ?>">Otovice</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '36') ?>">Pernink</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '38') ?>">Pšov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '40') ?>">Sadov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '88') ?>">Sokolov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '42') ?>">Stanovice</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '44') ?>">Stružná</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '43') ?>">Stráž nad Ohří</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '46') ?>">Štědrá</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '48') ?>">Toužim</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '49') ?>">Útvina</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '50') ?>">Valeč</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '51') ?>">Velichov</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '52') ?>">Verušičky</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '54') ?>">Vrbice</option>
									<option value="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '56') ?>">Žlutice</option>
								</select>
							</div>
						</div>

						<div class="col-md-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle Správy</h6>
							<div class="form-group form-group-lg">
								<select class="form-control select2" data-placeholder="Výběr správce" data-search-select2="true" onchange="location = this.value;" data-fouc>

									<?php
									// First blank option
									// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
									echo $Html -> addOption();

									if (isset($ENVO_MANAGEMENT) && is_array($ENVO_MANAGEMENT)) foreach ($ENVO_MANAGEMENT as $m) {

										if ($ENVO_ACCESS_ANALYTICS) {

											echo $Html -> addOption(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement', $m["id"]), $m["name"]);

										} else {
											if (ENVO_USERGROUPID == '7' && $m["id"] == '1') {
												echo $Html -> addOption(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement', $m["id"]), $m["name"]);
											}

											if (ENVO_USERGROUPID == '6' && $m["id"] == '5') {
												echo $Html -> addOption(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement', $m["id"]), $m["name"]);
											}
										}

									}
									?>

								</select>
							</div>
						</div>

					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Vyhledávání <strong>podle dostupných technologií</strong></h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
						</div>
					</div>
				</div>

				<div class="card-body" style="">

					<form method="POST" action="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'searchtechnology') ?>">

						<div class="row">
							<div class="col col-md-12">
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Bytový dům</label>
									<div class="col-lg-10">
										<input name="searchobject" type="text" class="form-control" placeholder="Zadejte ulici, č.p. nebo č.o">
									</div>
								</div>
								<p><strong>Nápověda: </strong>Pro vyhledání záznamu lze použít jen část slova např:
									<code>kru</code> vyhledá všechny záznamy obsahující tyto písmena. Dále je možné vyhledat podle záznam podle více slov, které můžeme oddělit
									<code>,</code> <code>, mezera</code> <code>|</code> <code>:</code> <code>+</code> <code>-</code>
									<code> mezera</code> např:
									<code>kru,20</code> vyhledá všechny záznamy obsahující tyto písmena a číslo.</p>
								<hr>
							</div>
						</div>

						<div class="row">

							<div class="col col-md-3 mb-3 mb-sm-0">
								<h6 class="font-weight-bold">Výběr Správy</h6>
								<div class="form-group form-group-lg">
									<select name="searchestatemanagement" class="form-control select2" data-placeholder="Výběr správce" data-search-select2="true" data-fouc>

										<?php
										// First blank option
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption();

										if (isset($ENVO_MANAGEMENT) && is_array($ENVO_MANAGEMENT)) foreach ($ENVO_MANAGEMENT as $m) {

											if ($ENVO_ACCESS_ANALYTICS) {

												echo $Html -> addOption($m["id"], $m["name"]);

											} else {
												if (ENVO_USERGROUPID == '7' && $m["id"] == '1') {
													echo $Html -> addOption($m["id"], $m["name"]);
												}

												if (ENVO_USERGROUPID == '6' && $m["id"] == '5') {
													echo $Html -> addOption($m["id"], $m["name"]);
												}
											}

										}
										?>

									</select>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-12 col-md-6 mb-3 mb-sm-0">
								<h6 class="font-weight-bold">Připravenost na DVB-T2</h6>
								<div class="form-group" style="padding-top: 8px;">
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="radio" class="form-check-input-styled" name="preparedness_dvbt2" value="1" data-fouc>
											Ano
										</label>
									</div>

									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="radio" class="form-check-input-styled" name="preparedness_dvbt2" value="2" data-fouc>
											Ne
										</label>
									</div>

									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="radio" class="form-check-input-styled" name="preparedness_dvbt2" value="0" data-fouc>
											Není známo
										</label>
									</div>

								</div>
							</div>

							<?php if (ENVO_USERID == '1') { ?>
								<div class="col-12 col-md-6 mb-3 mb-sm-0">
									<h6 class="font-weight-bold">Výběr Příjmu Televizního Signálu</h6>
									<div class="form-group" style="padding-top: 8px;">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_1" class="form-check-input-styled" data-fouc>
												DVB-T
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_2" class="form-check-input-styled" data-fouc>
												DVB-T/T2
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_3" class="form-check-input-styled" data-fouc>
												DVB-S/S2
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_4" class="form-check-input-styled" data-fouc>
												Není známo
											</label>
										</div>

									</div>
								</div>
							<?php } ?>

						</div>
						<?php if (ENVO_USERID == '1') { ?>

							<div class="row">
								<div class="col-12 mb-3 mb-sm-0">
									<h6 class="font-weight-bold">Výběr Typu Kabelových Rozvodů</h6>
									<div class="form-group" style="padding-top: 8px;">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_5" class="form-check-input-styled" data-fouc>
												TV - Stupací vedení kabeláže
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_6" class="form-check-input-styled" data-fouc>
												TV/SAT - Hvězdicové vedení kabeláže
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_7" class="form-check-input-styled" data-fouc>
												LAN - Datové rozvody
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_8" class="form-check-input-styled" data-fouc>
												Není známo
											</label>
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 mb-3 mb-sm-0">
									<h6 class="font-weight-bold">Výběr Stožáru</h6>
									<div class="form-group" style="padding-top: 8px;">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_9" class="form-check-input-styled" data-fouc>
												Rekonstrukce stožáru
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_10" class="form-check-input-styled" data-fouc>
												Nový stožár
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" name="search_technology_11" class="form-check-input-styled" data-fouc>
												Není známo
											</label>
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-12">
									<hr>
									<p>
										<strong>Nápověda: </strong>Pro vyhledání záznamu o instalovaných technologiích na objektu lze využít filtr s výběrem technologie.
									</p>
									<ul>
										<li>
											<strong>DVB-T</strong> - objekt přijímá pozemní signál DVB-T a není zaručeno fungování pozemního signálu DVB-T2
										</li>
										<li><strong>DVB-T/T2</strong> - objekt přijímá pozemní signál DVB-T i DVB-T2</li>
										<li><strong>DVB-S/S2</strong> - objekt přijímá satelitní signál DVB-S i DVB-S2</li>
										<li>
											<strong>Stupací vedení kabeláže</strong> - objekt má instalované pouze stupací (staré) vedení kabeláže. Pokud přijímá satelitní signál, tak je tento signál zkonvertován do technologie DVB-T nebo DVB-T2.
										</li>
										<li>
											<strong>Hvězdicové vedení kabeláže</strong> - objekt má instalován hvězdicové (satelitní) vedení kabeláže. Toto vedení je určeno pro přímé vedení kabeláže do (bytové) jednotky.
										</li>
									</ul>
									<hr>
								</div>
							</div>

						<?php } ?>

						<div class="row">
							<div class="col-12 col-md-12">
								<button class="btn btn-light float-right" type="submit">Vyhledat</button>
							</div>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>