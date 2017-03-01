<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"]; ?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php }
if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"]; ?>',
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
		<div class="row tab-content-singel">
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["site_box_title"]["sitebt"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_online', '1', ($jkv["offline"] == '1') ? TRUE : FALSE, 'jak_online1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_online1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_online', '0', ($jkv["offline"] == '0') ? TRUE : FALSE, 'jak_online2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_online2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc1"]);
										?>

									</div>
									<div class="col-md-7">
										<select name="jak_offpage" class="form-control selectpicker" data-live-search="true" data-size="5">
											<option value="0"<?php if ($jkv["offline_page"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel"]; ?></option>
											<?php if (isset($JAK_CAT) && is_array ($JAK_CAT)) foreach ($JAK_CAT as $c) {
												if ($c["pluginid"] == '0' && $c["pageid"] > '0') { ?>
													<option value="<?php echo $c["id"]; ?>"<?php if ($jkv["offline_page"] == $c["id"]) { ?> selected="selected"<?php } ?>><?php echo $c["name"]; ?></option><?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc2"]);
										?>

									</div>
									<div class="col-md-7">
										<select name="jak_pagenotfound" class="form-control selectpicker" data-live-search="true" data-size="5">
											<option value="0"<?php if ($jkv["notfound_page"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel"]; ?></option>
											<?php if (isset($JAK_CAT) && is_array ($JAK_CAT)) foreach ($JAK_CAT as $nf) {
												if ($nf["pluginid"] == '0' && $nf["pageid"] > '0') { ?>
													<option value="<?php echo $nf["id"]; ?>"<?php if ($jkv["notfound_page"] == $nf["id"]) { ?> selected="selected"<?php } ?>><?php echo $nf["name"]; ?></option><?php }
											} ?>
										</select>
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
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["site_box_title"]["sitebt1"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc3"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_title', $jkv["title"], 'sitetitle', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc4"]);
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html->addInput('text', 'jak_description', $jkv["metadesc"], 'metadesc', 'form-control');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-12">

										<?php
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html->addLabel('', '<strong>' . $tl["site_box_content"]["sitebc5"] . '</strong>');
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html->addInput('text', 'jak_keywords', $jkv["metakey"], 'metakey', 'form-control');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc6"]);
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
										echo $Html->addInput('text', 'jak_author', $jkv["metaauthor"], 'metaauthor', 'form-control');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc7"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_robots', '1', ($jkv["robots"] == '1') ? TRUE : FALSE, 'jak_robots1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_robots1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_robots', '0', ($jkv["robots"] == '0') ? TRUE : FALSE, 'jak_robots2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_robots2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["site_box_content"]["sitebc8"]);
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
										echo $Html->addTextarea('jak_copy', jak_edit_safe_userpost($jkv["copyright"]), '4', '', array('id' => 'copyright', 'class' => 'form-control'));
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
	</form>

<?php include "footer.php"; ?>