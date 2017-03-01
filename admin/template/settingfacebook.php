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
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
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
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html->addTextarea('jak_facebookconnect', $jkv["facebookconnect"], '10', '60', array('class' => 'form-control txtautogrow'));
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_filecontent', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
												echo $Html->addDiv('', 'txteditor');
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html->addTextarea('jak_filecontent', $JAK_FILECONTENT, '', '', array('id' => 'jak_filecontent', 'class' => 'form-control hidden'));
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
							echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html->addInput('hidden', 'jak_file', $JAK_FILEURL);
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
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_filecontent1', $tl["fb_box_content"]["fbbc10"]);
												// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
												echo $Html->addDiv('', 'txteditor1');
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html->addTextarea('jak_filecontent1', $JAK_FILECONTENT1, '', '', array('id' => 'jak_filecontent1', 'class' => 'form-control hidden'));
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
							echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html->addInput('hidden', 'jak_file1', $JAK_FILEURL);
					?>

				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"; ?>


