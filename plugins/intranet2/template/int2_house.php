<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="row">
		<div class="col-md-12">

			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Live <strong>vyhledávání</strong> <br class="d-block d-sm-none"/> (podle názvu bytového domu)</h5>
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
					<p><strong>Nápověda: </strong>Pro vyhledání záznamu lze použít jen část slova např: <code>kru</code> vyhledá všechny záznamy obsahující tyto písmena. Dále je možné vyhledat podle záznam podle více slov, které můžeme oddělit <code>,</code> <code>,  mezera</code>   <code>|</code> <code>:</code> <code>+</code> <code>-</code> <code> mezera</code> např: <code>kru,20</code> vyhledá všechny záznamy obsahující tyto písmena a číslo.</p>
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
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist') ?>" class="btn btn-block btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2">Zobrazit vše</a>
						</div>

						<div class="col-md-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle měst</h6>
							<div class="form-group form-group-lg m-0">
								<select class="form-control select2" data-placeholder="Výběr města" data-search-select2="true" onchange="location = this.value;">
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
							<div class="form-group form-group-lg m-0">
								<select class="form-control select2" data-placeholder="Výběr správce" data-search-select2="true" onchange="location = this.value;">

									<?php
									// First blank option
									// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
									echo $Html -> addOption();

									if (isset($ENVO_MANAGEMENT) && is_array($ENVO_MANAGEMENT)) foreach ($ENVO_MANAGEMENT as $m) {

										echo $Html -> addOption(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement', $m["id"]), $m["name"]);

									}
									?>

								</select>
							</div>
						</div>
					</div>


				</div>
			</div>

		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>