<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

	<div class="col-md-12" style="margin: 10px 0 50px 0;">

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-6">
			<div class="row" style="line-height: 34px;">
        <span class="col-xs-12 col-md-6 text-xs-center">
          <?= $tltt["tt_frontend_wizard"]["ttw"] ?><strong> <?= $COUNT_TVPROGRAM_ALL ?></strong>
        </span>
				<span class="col-xs-12 col-md-6 text-xs-center">

          <?php
					if ($COUNT_TVPROGRAM_ALL > 0) {
						echo $tltt["tt_frontend_wizard"]["ttw1"] . '<strong>' . $TIME_TVPROGRAM_ALL . '</strong>';
					}
					?>

        </span>
			</div>
		</div>
	</div>
	<hr>

<?php if (isset($ENVO_TVTOWER) && is_array($ENVO_TVTOWER)) { ?>

	<div class="row" style="margin-bottom: 20px">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
					<label for="selectTrans" style="width: 200px;"><?= $tltt["tt_frontend_wizard"]["ttw2"] ?></label>
					<select id="selectTrans" class="form-control" multiple="multiple">

						<?php
						// EN: Sort array by 'name' keys
						// CZ: Setřídění pole podle 'name'
						$ENVO_TVTOWER = sort_array_mutlidim($ENVO_TVTOWER, 'station ASC');

						foreach ($ENVO_TVTOWER as $tt) {
							if ($tt['active']) {
								echo '<option value="' . $tt['id'] . '">' . $tt['station'] . ' - ' . $tt['name'] . '</option>';
							}
						}
						?>

					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="selectChannel" style="width: 200px;"><?= $tltt["tt_frontend_wizard"]["ttw3"] ?></label>
					<select id="selectChannel" class="" multiple="multiple"></select>
				</div>
			</div>
			<div class="col-md-4">

				<?php
				// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
				echo $Html -> addButtonSubmit('search', $tltt["tt_frontend_button"]["ttbtn"], 'searchprogram', 'btn btn-info', array ('style' => 'margin-top: 28px;'));
				echo $Html -> addButtonSubmit('export', 'Export programů do PDF', 'exportprogram', 'btn btn-info', array ('style' => 'margin-top: 28px;'));
				?>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<div id="bounceLoader">
				<div class="bounce-loader">
					<div class="bounce1"></div>
					<div class="bounce2"></div>
					<div class="bounce3"></div>
				</div>
			</div>
			<div id="resultData"></div>
		</div>
	</div>


<?php } else {
	// Pokud neexistuje žádný záznam s vysílači - bude zobrazeno chybové hlášení

	// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
	echo $Html -> addDiv($tltt["tt_frontend_wizard"]["ttw4"], '', array ('class' => 'alert alert-danger'));

} ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>