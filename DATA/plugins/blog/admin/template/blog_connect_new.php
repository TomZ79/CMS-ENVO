<?php if (!isset($blog_exist)) { ?>

	<li class="envocontent">
		<div class="envocontent_header"><?= $tlblog["blog_connect"]["blogc10"] ?></div>
		<div class="form-group">
			<label class="control-label"><?= $tlblog["blog_connect"]["blogc"] ?></label>
			<div class="row">
				<div class="col-sm-6">
					<select name="envo_showblogorder" class="form-control selectpicker">

						<?php
						// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
						echo $Html -> addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["envo_showblogorder"]) && $_REQUEST["envo_showblogorder"] == "ASC") || !isset($_REQUEST["envo_showblogorder"])) ? TRUE : FALSE);
						echo $Html -> addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["envo_showblogorder"]) && $_REQUEST["envo_showblogorder"] == "DESC") ? TRUE : FALSE);
						?>

					</select>
				</div>
				<div class="col-sm-6">
					<select name="envo_showblogmany" class="form-control selectpicker">

						<?php for ($i = 0; $i <= 10; $i++) {

							if (isset($_REQUEST["envo_showblogmany"]) && $_REQUEST["envo_showblogmany"] == $i) {
								$selected = TRUE;
							} elseif (!isset($_REQUEST["envo_showblogmany"]) && ($i == 0)) {
								$selected = TRUE;
							} else {
								$selected = FALSE;
							}

							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html -> addOption($i, $i, $selected);

						} ?>

					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label"><?= $tlblog["blog_connect"]["blogc1"] ?></label>
			<select name="envo_showblog[]" multiple="multiple" class="form-control">

				<?php
				// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
				$selected = ((isset($_REQUEST["envo_showblog"]) && ($_REQUEST["envo_showblog"] == '0' || (in_array('0', $_REQUEST["envo_showblog"]))) || !isset($_REQUEST["envo_showblog"]))) ? TRUE : FALSE;

				echo $Html -> addOption('0', $tlblog["blog_connect"]["blogc2"], $selected);
				if (isset($ENVO_GET_BLOG) && is_array($ENVO_GET_BLOG)) foreach ($ENVO_GET_BLOG as $bl) {

					if (isset($_REQUEST["envo_showblog"]) && (in_array($bl["id"], $_REQUEST["envo_showblog"]))) {
						if (isset($_REQUEST["envo_showblog"]) && (in_array('0', $_REQUEST["envo_showblog"]))) {
							$selected = FALSE;
						} else {
							$selected = TRUE;
						}
					} else {
						$selected = FALSE;
					}

					echo $Html -> addOption($bl["id"], $bl["title"], $selected);

				}
				?>

			</select>
		</div>
		<div class="actions">

			<?php
			// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
			echo $Html -> addInput('hidden', 'corder_new[]', '3', '', 'corder');
			echo $Html -> addInput('hidden', 'real_plugin_id[]', ENVO_PLUGIN_BLOG);
			?>

		</div>
	</li>

<?php } ?>