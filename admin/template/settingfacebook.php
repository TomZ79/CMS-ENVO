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
				message: '<?php echo $tl["error"]["e37"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton hidden-xs">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
		echo $htmlE->addButtonSubmit('save', '', 'btn btn-success button', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ');
		?>

	</div>

	<!-- Form Content -->
	<ul id="cmsTabSetFB" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
		<li role="presentation" class="active">
			<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab"]; ?></span>
			</a>
		</li>
		<li role="presentation" class="next">
			<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab1"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab2"]; ?></span>
			</a>
		</li>
	</ul>

	<div id="cmsTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-12 margin-bottom-20">
											<blockquote>
												<p><?php echo $tl["fb_box_content"]["fbbc6"]; ?></p>
											</blockquote>
											<p><?php echo $tl["fb_box_content"]["fbbc7"]; ?></p>
											<ul>
												<li><?php echo $tl["fb_box_content"]["fbbc8"]; ?></li>
											</ul>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">

											<?php
											// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
											echo $htmlE->addTextArea('jak_facebookconnect', '10', '60', $jkv["facebookconnect"], array('class' => 'form-control txtautogrow'));
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
							echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4><?php echo $tl["fb_box_content"]["fbbc9"]; ?>
												<small><strong><?php echo $JAK_FILEURL; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-md-12">

												<?php
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_filecontent', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
												echo $htmlE->addSimpleDiv ('txteditor', '');
												// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
												echo $htmlE->addTextArea ('jak_filecontent', '', '', $JAK_FILECONTENT, array ('id' => 'jak_filecontent', 'class' => 'form-control hidden'));
												?>

											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
							echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
							?>

						</div>
					</div>

					<?php
					// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
					echo $htmlE->addInput('hidden', 'jak_file', '', '', $JAK_FILEURL, '');
					?>

				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT1) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4><?php echo $tl["fb_box_content"]["fbbc9"]; ?>
												<small><strong><?php echo $JAK_FILEURL1; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT1) { ?>
										<div class="row-form">
											<div class="col-md-12">

												<?php
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_filecontent1', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
												echo $htmlE->addSimpleDiv ('txteditor1', '');
												// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
												echo $htmlE->addTextArea ('jak_filecontent1', '', '', $JAK_FILECONTENT1, array ('id' => 'jak_filecontent1', 'class' => 'form-control hidden'));
												?>

											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
							echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
							?>

						</div>
					</div>
					<input type="hidden" name="jak_file1" value="<?php echo $JAK_FILEURL1; ?>"/>
				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"; ?>


