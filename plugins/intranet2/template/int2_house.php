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
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '23') ?>" class="btn btn-block btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2">Karlovy Vary</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '20') ?>" class="btn btn-block btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2">Hroznětín</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '30') ?>" class="btn btn-block btn-outline bg-teal-400 text-teal-400 border-teal-400 border-2">Nejdek</a>
						</div>

						<div class="col-md-3 mb-3 mb-sm-0">
							<h6 class="font-weight-bold">Podle Správy</h6>
							<div class="form-group form-group-lg m-0">
								<select name="estatemanagement" class="form-control select2" data-placeholder="Výběr správce" data-search-select2="true" onchange="location = this.value;">

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