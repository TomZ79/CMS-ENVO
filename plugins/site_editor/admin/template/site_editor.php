<?php include_once APP_PATH . 'admin/template/header.php'; ?>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $tlsedi["siteedit_sec_title"]["set"]; ?></h3>
				</div>
				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<div class="box-body">
						<p><?php echo $tlsedi["siteedit_sec_desc"]["sed"]; ?></p>
						<input type="hidden" name="action" value="form1"/>
						<?php
						// Content of file
						$file = APP_PATH . "robots.txt";
						if (file_exists ($file)) {
							// File exist, get content
							$content = file_get_contents ($file);
						} else {
							// File not exist, create new file
							file_put_contents ($file, '');
						}
						?>
						<div class="form-group">
							<textarea id="jak_file1" name="jak_file1" rows="8" placeholder="<?php echo $tlsedi["siteedit_placeholder"]["sep"]; ?>" class="form-control" disabled><?php echo htmlspecialchars ($content); ?></textarea>
						</div>
					</div>
					<div class="box-footer">
						<div class="pull-right">
							<button id="editfile1" class="btn btn-primary" style="margin-right: 10px"><?php echo $tl["button"]["btn12"]; ?></button>

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
							echo $htmlE->addButtonSubmit('reset1', '', 'btn btn-primary hidden', $tl["button"]["btn11"], array ('style' => 'margin-right: 10px'));
							echo $htmlE->addButtonSubmit('save1', '', 'btn btn-success pull-right', $tl["button"]["btn1"], array ('disabled' => 'disabled'));
							?>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>