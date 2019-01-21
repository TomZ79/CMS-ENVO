<?php include "header.php"; ?>

<?php if ($ENVO_FILE_SUCCESS) { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?=$tl["notification"]["n7"]?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php }
if ($ENVO_FILE_ERROR) { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?=$tl["general_error"]["generror30"]?></div>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } else { ?>

	<?php if (!isset($setting["cms_tpl"])) { ?>
		<div class="row">
			<div class="col-sm-6 text-center error-page">

				<?php
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('h1', $tl["notetemplate"]["ntpl"], 'text-warning bold');

				// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
				echo $Html -> startTag('div', array ('class' => 'error-content'));

				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('h3', $Html -> addTag('i', '', 'fa fa-warning text-warning') . $tl["notetemplate"]["ntpl2"]);
				echo $Html -> addTag('p', $tl["notetemplate"]["ntpl3"]);

				// Add Html Element -> endTag (Arguments: tag)
				echo $Html -> endTag('div');
				?>

			</div>
		</div>

	<?php } else { ?>
		<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', $tl["tpl_box_title"]["tplbt"], 'box-title');
					?>

				</div>
				<div class="box-body">
					<table class="table">
						<tr <?= ($ENVO_FILECONTENT ? 'class="hidden"' : '') ?>>
							<td>

								<?php
								// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
								echo $Html -> addLabel('envo_file_edit', '<strong>' . $tl["tpl_box_content"]["tplbc4"] . '</strong>', array ('class' => 'm-b-10'));
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('select', array ('id' => 'envo_file_edit', 'class' => 'form-control selectpicker', 'name' => 'envo_file_edit', 'data-search-select2' => 'true'));

								$pathLen = strlen($ROOT_DIR);
								getTemplateFiles($ROOT_DIR, 0, strlen($ROOT_DIR));

								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('select');
								?>

							</td>
						</tr>
						<tr <?= (!$ENVO_FILECONTENT ? 'class="hidden"' : '') ?>>
							<td>

								<?php
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h4');
								echo $tl["tpl_box_content"]["tplbc2"];
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('small', $Html -> addTag('strong', $ENVO_FILEURL));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h4');
								?>

							</td>
						</tr>

						<?php if ($ENVO_FILECONTENT) { ?>
							<tr>
								<td>

									<?php
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addLabel('envo_filecontent', $tl["tpl_box_content"]["tplbc3"]);
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html -> addDiv('', 'htmleditor');
									// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
									echo $Html -> addTextarea('envo_filecontent', $ENVO_FILECONTENT, '', '', array ('id' => 'envo_filecontent', 'class' => 'form-control d-none'));
									?>

								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
			</div>

			<div class="form-actions">

				<?php
				if ($ENVO_GET_TEMPLATE_FILES) {
					if ($ENVO_FILEURL) {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('reset', $tl["button"]["btn11"], '', 'btn btn-success');

					}
					if (!$ENVO_FILECONTENT) {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('edit', $tl["button"]["btn12"], '', 'btn btn-primary float-right');

					} else {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
					}
				}
				?>

			</div>

			<?php
			// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
			echo $Html -> addInput('hidden', 'envo_file', $ENVO_FILEURL);
			?>

		</form>

	<?php }
} ?>

<?php include "footer.php"; ?>