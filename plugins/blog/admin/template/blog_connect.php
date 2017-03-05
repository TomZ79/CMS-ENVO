<?php if ($pg["pluginid"] == JAK_PLUGIN_BLOG) { ?>

	<li class="jakcontent">
		<div class="form-group">
			<label class="control-label"><?php echo $tlblog["blog_connect"]["blogc"]; ?></label>
			<div class="row">
				<div class="col-md-6">
					<select name="jak_showblogorder" class="form-control selectpicker" data-size="5">

						<?php
						// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
						echo $Html->addOption('ASC', $tl["selection"]["sel13"], (isset($JAK_FORM_DATA["showblogorder"]) && $JAK_FORM_DATA["showblogorder"] == "ASC") ? TRUE : FALSE);
						echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($JAK_FORM_DATA["showblogorder"]) && $JAK_FORM_DATA["showblogorder"] == "DESC") ? TRUE : FALSE);
						?>

					</select>
				</div>
				<div class="col-md-6">
					<select name="jak_showblogmany" class="form-control selectpicker" data-size="5">

						<?php for ($i = 0; $i <= 10; $i ++) {

							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html->addOption($i, $i, ($JAK_FORM_DATA["showblogmany"] == $i) ? TRUE : FALSE);

						} ?>

					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $tlblog["blog_connect"]["blogc1"]; ?></label>
			<select name="jak_showblog[]" multiple="multiple" class="form-control">

				<?php
				// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
				$selected = (isset($JAK_FORM_DATA["showblog"]) && $JAK_FORM_DATA["showblog"] == 0) ? TRUE : FALSE;

				echo $Html->addOption('0', $tlblog["blog_connect"]["blogc2"], $selected);
				if (isset($JAK_GET_BLOG) && is_array ($JAK_GET_BLOG)) foreach ($JAK_GET_BLOG as $fq) {

					echo $Html->addOption($fq["id"], $fq["title"], (isset($JAK_FORM_DATA["showblog"]) && (in_array ($fq["id"], explode (',', $JAK_FORM_DATA["showblog"]))) ) ? TRUE : FALSE);

				}
				?>

			</select>
		</div>

		<div class="actions">

			<?php
			// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
			echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
			echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
			?>

		</div>
	</li>

	<?php $blog_exist = 1;
} ?>

