<?php include "header.php"; ?>

<?php if ($JAK_FILE_SUCCESS) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php }
if ($JAK_FILE_ERROR) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["error"]["e37"];?></div>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } else { ?>

	<?php if (!isset($jkv["cms_tpl"])) { ?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 error-page">
				<h1 class="text-warning bold"><?php echo $tl["notetemplate"]["ntpl"]; ?></h1>
				<div class="error-content">
					<h3><i class="fa fa-warning text-warning"></i> <?php echo $tl["notetemplate"]["ntpl2"]; ?></h3>
					<p><?php echo $tl["notetemplate"]["ntpl3"]; ?></p>
				</div>
			</div>
		</div>

	<?php } else { ?>
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $tl["tpl_box_title"]["tplbt"]; ?></h3>
				</div>
				<div class="box-body">
					<table class="table">
						<tr <?php if ($JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
							<td>
								<label for="jak_file_edit"><?php echo $tl["tpl_box_content"]["tplbc4"]; ?></label>
								<select name="jak_file_edit" id="jak_file_edit" class="form-control selectpicker" data-live-search="true" data-size="5">
									<?php
									$pathLen = strlen ($ROOT_DIR);
									getTemplateFiles ($ROOT_DIR, 0, strlen ($ROOT_DIR));
									?>
								</select>
							</td>
						</tr>
						<tr <?php if (!$JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
							<td>
								<h4><?php echo $tl["tpl_box_content"]["tplbc2"]; ?>
									<small><strong><?php echo $JAK_FILEURL; ?></strong></small>
								</h4>
							</td>
						</tr>
						<?php if ($JAK_FILECONTENT) { ?>
							<tr>
								<td>

									<?php
									// Arguments: for (id of associated form element), text
									echo $htmlE->addLabelFor ('jak_filecontent', $tl["tpl_box_content"]["tplbc3"]);
									// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
									echo $htmlE->addSimpleDiv ('htmleditor', '');
									// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
									echo $htmlE->addTextArea ('jak_filecontent', '', '', $JAK_FILECONTENT, array ('id' => 'jak_filecontent', 'class' => 'form-control hidden'));
									?>

								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>

			<div class="form-actions">
				<?php if ($JAK_GET_TEMPLATE_FILES) { ?><?php if ($JAK_FILEURL) { ?>
					<button type="submit" name="reset" class="btn btn-success"><?php echo $tl["button"]["btn11"]; ?></button>
				<?php }
					if (!$JAK_FILECONTENT) { ?>
						<button type="submit" name="edit" class="btn btn-primary pull-right"><?php echo $tl["button"]["btn12"]; ?></button>
					<?php } else { ?>
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					<?php }
				} ?>
			</div>

			<input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>
		</form>

	<?php }
} ?>

<?php include "footer.php"; ?>