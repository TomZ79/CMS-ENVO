<?php if (!isset($blog_exist)) { ?>

	<li class="jakcontent">
		<div class="form-group">
			<label class="control-label"><?php echo $tlblog["blog_connect"]["blogc"]; ?></label>
			<div class="row">
				<div class="col-md-6">
					<select name="jak_showblogorder" class="form-control selectpicker" data-size="5">
						<option value="ASC" selected="selected"><?php echo $tl["selection"]["sel13"]; ?></option>
						<option value="DESC"><?php echo $tl["selection"]["sel14"]; ?></option>
					</select>
				</div>
				<div class="col-md-6">
					<select name="jak_showblogmany" class="form-control selectpicker" data-size="5">

						<?php for ($i = 0; $i <= 10; $i ++) {

							if (isset($_REQUEST["jak_showblogmany"]) && $_REQUEST["jak_showblogmany"] == $i) {
								$selected = TRUE;
							} elseif (!isset($_REQUEST["jak_showblogmany"]) && ($i == 0)) {
								$selected = TRUE;
							} else {
								$selected = FALSE;
							}

							// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
							echo $Html->addOption($i, $i, $selected);

						} ?>

					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label"><?php echo $tlblog["blog_connect"]["blogc1"]; ?></label>
			<select name="jak_showblog[]" multiple="multiple" class="form-control">
				<option value="0" selected="selected"><?php echo $tlblog["blog_connect"]["blogc2"]; ?></option>
				<?php if (isset($JAK_GET_BLOG) && is_array ($JAK_GET_BLOG)) foreach ($JAK_GET_BLOG as $bl) { ?>
					<option value="<?php echo $bl["id"]; ?>"><?php echo $bl["title"]; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="actions">
			<input type="hidden" name="corder_new[]" class="corder" value="3"/>
			<input type="hidden" name="real_plugin_id[]" value="<?php echo JAK_PLUGIN_BLOG; ?>"/>
		</div>
	</li>

<?php } ?>