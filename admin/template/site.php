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
									<div class="col-md-5"><strong><?php echo $tl["site_box_content"]["sitebc"]; ?></strong></div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($jkv["offline"] == '1') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput('radio', 'jak_online', 'jak_online1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor('jak_online1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($jkv["offline"] == '0') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput('radio', 'jak_online', 'jak_online2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor('jak_online2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc1"] . $htmlE->endTag('strong');
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
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc2"] . $htmlE->endTag('strong');
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
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc3"] . $htmlE->endTag('strong');
										echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput('text', 'jak_title', 'sitetitle', 'form-control', $jkv["title"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc4"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput('text', 'jak_description', 'metadesc', 'form-control', $jkv["metadesc"], '');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-12">

										<?php
										// Arguments: for (id of associated form element), text
										echo $htmlE->addLabelFor('', '<strong>' . $tl["site_box_content"]["sitebc5"] . '</strong>');
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput('text', 'jak_keywords', 'metakey', 'form-control', $jkv["metakey"], '');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc6"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput('text', 'jak_author', 'metaauthor', 'form-control', $jkv["metaauthor"], '');
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc7"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($jkv["robots"] == '1') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput('radio', 'jak_robots', 'jak_robots1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor('jak_robots1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($jkv["robots"] == '0') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput('radio', 'jak_robots', 'jak_robots2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor('jak_robots2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tl["site_box_content"]["sitebc8"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
										echo $htmlE->addTextArea('jak_copy', '4', '', jak_edit_safe_userpost($jkv["copyright"]), array('id' => 'copyright', 'class' => 'form-control'));
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