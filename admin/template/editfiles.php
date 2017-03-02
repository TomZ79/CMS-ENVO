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

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html->addTag('h3', $tl["tpl_box_title"]["tplbt"], 'box-title');
					?>

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
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html->addLabel('jak_filecontent', $tl["tpl_box_content"]["tplbc3"]);
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html->addDiv('', 'htmleditor');
									// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
									echo $Html->addTextarea('jak_filecontent', $JAK_FILECONTENT, '', '', array('id' => 'jak_filecontent', 'class' => 'form-control hidden'));
									?>

								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>

			<div class="form-actions">
				<?php if ($JAK_GET_TEMPLATE_FILES) { ?><?php if ($JAK_FILEURL) {

					// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
					echo $Html->addButtonSubmit('reset', $tl["button"]["btn11"], '', 'btn btn-success');

				}
					if (!$JAK_FILECONTENT) {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html->addButtonSubmit('edit', $tl["button"]["btn12"], '', 'btn btn-primary pull-right');

					} else {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
					}
				} ?>
			</div>

			<?php
			// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
			echo $Html->addInput('hidden', 'jak_file', $JAK_FILEURL);
			?>

		</form>

	<?php }
} ?>

<?php include "footer.php"; ?>