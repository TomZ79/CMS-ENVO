<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">
					<div class="grid-title no-border">
						<h4>Live <span class="semi-bold">vyhledávání</span></h4>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
						</div>
					</div>
					<div class="grid-body no-border">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-label">Bytový dům</label>
									<span class="help">Ulice a č.p/č.o</span>
									<div class="input-group input-group-lg">
										<input type="text"  name="livesearch"  class="form-control" placeholder="Vyhledat bytový dům" >
										<div class="input-group-addon primary" style="padding: 0;">
											<span class="arrow"></span>
											<button type="button" class="btn btn-primary" style="padding: 12px 19px;"><i class="fas fa-search"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">
					<div class="grid-title no-border">
						<h4>Vyhledávání <span class="semi-bold">podle kritérií</span></h4>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
						</div>
					</div>
					<div class="grid-body no-border">
						<div class="row">

							<div class="col-md-3">
								<h4 class="bold">Základní zobrazení</h4>
								<br>
								<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist') ?>" class="btn btn-block btn-white">Zobrazit vše</a>
							</div>

							<div class="col-md-3">
								<h4 class="bold">Podle měst</h4>
								<br>
								<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '23') ?>" class="btn btn-block btn-white">Karlovy Vary</a>
								<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city', '30') ?>" class="btn btn-block btn-white">Nejdek</a>
							</div>

							<div class="col-md-3">
								<h4 class="bold">Podle Správy</h4>
								<br>
								<div class="form-group m-0">
									<select name="estatemanagement" id="" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr správce nemovitosti" onchange="location = this.value;">

										<?php

										// First blank option
										// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
										echo $Html -> addOption('', '');

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
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>