<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Seznam <span class="semi-bold">bytových domů</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-6">
							<input name="" type="text" class="no-boarder " placeholder="Vyhledat bytový dům" style="width: 100%;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="row">

						<div class="col-md-4">
							<h3>Města</h3>
							<p>Zobrazení bytových domů podle měst</p>
							<br>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city_1', '') ?>" class="btn btn-block btn-white">Karlovy Vary</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'city_2', '') ?>" class="btn btn-block btn-white">Nejdek</a>
						</div>

						<div class="col-md-4">
							<h3>Správa nemovitosti</h3>
							<p>Zobrazení bytových domů podle správce nemovitosti</p>
							<br>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_1', '') ?>" class="btn btn-block btn-white">FIMA KV s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_2', '') ?>" class="btn btn-block btn-white">MACHEX KV s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_3', '') ?>" class="btn btn-block btn-white">IKON spol. s r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_4', '') ?>" class="btn btn-block btn-white">Aval Rent s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_5', '') ?>" class="btn btn-block btn-white">ORBYT KV s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_8', '') ?>" class="btn btn-block btn-white">REBA s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_9', '') ?>" class="btn btn-block btn-white">ALFABYT s.r.o.</a>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'house', 'houselist', 'estatemanagement_10', '') ?>" class="btn btn-block btn-white">Bronislava Hánělová</a>


						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>