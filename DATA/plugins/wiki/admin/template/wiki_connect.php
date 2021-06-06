<?php if ($pg["pluginid"] == ENVO_PLUGIN_WIKI) { ?>

	<li class="envocontent">
		<div class="envocontent_header"><?= $tlw["wiki_connect"]["wikic10"] ?></div>
		<div class="form-group">
			<label class="control-label"><?= $tlw["wiki_connect"]["wikic7"] ?></label>
			<div class="row">
				<div class="col-sm-6">
					<select name="envo_showwikiorder" class="form-control selectpicker">

						<?php
						// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
						echo $Html -> addOption('ASC', $tl["selection"]["sel13"], (isset($ENVO_FORM_DATA["showwikiorder"]) && $ENVO_FORM_DATA["showwikiorder"] == "ASC") ? TRUE : FALSE);
						echo $Html -> addOption('DESC', $tl["selection"]["sel14"], (isset($ENVO_FORM_DATA["showwikiorder"]) && $ENVO_FORM_DATA["showwikiorder"] == "DESC") ? TRUE : FALSE);
						?>

					</select>
				</div>
				<div class="col-sm-6">
					<select name="envo_showwikimany" class="form-control selectpicker">

						<?php for ($i = 0; $i <= 10; $i++) {

							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html -> addOption($i, $i, ((isset($ENVO_FORM_DATA["showwikimany"]) && $ENVO_FORM_DATA["showwikimany"] == $i)) ? TRUE : FALSE);

						} ?>

					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label"><?= $tlw["wiki_connect"]["wikic8"] ?></label>
			<select name="envo_showwiki[]" multiple="multiple" class="form-control">

				<?php
				// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
				$selected = (isset($ENVO_FORM_DATA["showwiki"]) && $ENVO_FORM_DATA["showwiki"] == 0) ? TRUE : FALSE;

				echo $Html -> addOption('0', $tlw["wiki_connect"]["wikic9"], $selected);
				if (isset($ENVO_GET_WIKI) && is_array($ENVO_GET_WIKI)) foreach ($ENVO_GET_WIKI as $w) {

					echo $Html -> addOption($w["id"], $w["title"], (isset($ENVO_FORM_DATA["showwiki"]) && (in_array($w["id"], explode(',', $ENVO_FORM_DATA["showwiki"])))) ? TRUE : FALSE);

				}
				?>

			</select>
		</div>

		<div class="actions">

			<?php
			// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
			echo $Html -> addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
			echo $Html -> addInput('hidden', 'real_id[]', $pg["id"]);
			?>

		</div>
	</li>

	<?php
	// only fire new form when not exist
	$wiki_exist = 1;
} ?>
