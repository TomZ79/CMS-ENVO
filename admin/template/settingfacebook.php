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
				message: '<?=$tl["general_error"]["generror30"]?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton-small hidden-xs">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ('data-loading-text' => $tl["button"]["btn41"]));
		?>

	</div>

	<!-- Form Content -->
	<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
		<li class="nav-item">
			<a href="#cmsPage1" class="active" data-toggle="tab">

				<?php
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', $tl["fb_section_tab"]["fbtab"], 'text');
				?>

			</a>
		</li>
		<li class="nav-item next">
			<a href="#cmsPage2" class="" data-toggle="tab">

				<?php
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', $tl["fb_section_tab"]["fbtab1"], 'text');
				?>

			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage3" class="" data-toggle="tab">

				<?php
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', $tl["fb_section_tab"]["fbtab2"], 'text');
				?>

			</a>
		</li>
		<li class='nav-item dropdown collapsed-menu hidden'>
			<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
				...

				<?php
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', '', 'glyphicon glyphicon-chevron-right');
				?>

			</a>
			<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton"></div>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tl["fb_box_title"]["fbbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-12 margin-bottom-20">
											<blockquote>
												<p><?= $tl["fb_box_content"]["fbbc6"] ?></p>
											</blockquote>
											<p><?= $tl["fb_box_content"]["fbbc7"] ?></p>
											<ul>
												<li><?= $tl["fb_box_content"]["fbbc8"] ?></li>
											</ul>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-12">

											<?php
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('envo_facebookconnect', $ENVO_SETTING_VAL["facebookconnect"], '10', '60', array ('class' => 'form-control txtautogrow'));
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tl["fb_box_title"]["fbbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?= (!$ENVO_FILECONTENT ? '"hidden"' : '') ?>">
										<div class="col-sm-12">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('h4');
											echo $tl["fb_box_content"]["fbbc9"];
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('small', $Html -> addTag('strong', $ENVO_FILEURL));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('h4');
											?>

										</div>
									</div>

									<?php if ($ENVO_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-sm-12">

												<?php
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_filecontent', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
												echo $Html -> addDiv('', 'txteditor');
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_filecontent', $ENVO_FILECONTENT, '', '', array ('id' => 'envo_filecontent', 'class' => 'form-control d-none'));
												?>

											</div>
										</div>
									<?php } ?>

								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('hidden', 'envo_file', $ENVO_FILEURL);
					?>

				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tl["fb_box_title"]["fbbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?= (!$ENVO_FILECONTENT ? '"hidden"' : '') ?>">
										<div class="col-sm-12">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('h4');
											echo $tl["fb_box_content"]["fbbc9"];
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('small', $Html -> addTag('strong', $ENVO_FILEURL1));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('h4');
											?>

										</div>
									</div>
									<?php if ($ENVO_FILECONTENT1) { ?>
										<div class="row-form">
											<div class="col-sm-12">

												<?php
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html -> addLabel('envo_filecontent1', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
												echo $Html -> addDiv('', 'txteditor1');
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_filecontent1', $ENVO_FILECONTENT1, '', '', array ('id' => 'envo_filecontent1', 'class' => 'form-control d-none'));
												?>

											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('hidden', 'envo_file1', $ENVO_FILEURL);
					?>

				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"; ?>


