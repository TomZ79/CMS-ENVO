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
				message: '<?php echo $tl["general_error"]["generror1"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton hidden-xs">
		<button type="submit" name="save" class="btn btn-success button">
			<i class="fa fa-save margin-right-5"></i>
			<?php echo $tl["button"]["btn1"]; ?> !!
		</button>
	</div>

	<!-- Form Content -->
	<div class="row tab-content-singel">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $tl["sms_box_title"]["smsbt"]; ?></h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_facebook"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_facebook', 'jak_md_facebook1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_facebook1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_facebook"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_facebook', 'jak_md_facebook2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_facebook2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc1"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_googleplus"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_googleplus', 'jak_md_googleplus1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_googleplus1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_googleplus"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_googleplus', 'jak_md_googleplus2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_googleplus2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc2"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_instagram"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_instagram', 'jak_md_instagram1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_instagram1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_instagram"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_instagram', 'jak_md_instagram2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_instagram2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc3"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">

											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_twitter"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_twitter', 'jak_md_twitter1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_twitter1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_twitter"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_twitter', 'jak_md_twitter2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_twitter2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc4"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_youtube"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_youtube', 'jak_md_youtube1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_youtube1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_youtube"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_youtube', 'jak_md_youtube2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_youtube2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc5"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_vimeo"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_vimeo', 'jak_md_vimeo1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_vimeo1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_vimeo"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_vimeo', 'jak_md_vimeo2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_vimeo2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc6"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_email"] == 1) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_email', 'jak_md_email1', '', '1', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_email1', $tl["checkbox"]["chk"]);

												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												($jkv["md_email"] == 0) ? $checked = 'yes' : $checked = 'no';
												echo $htmlE->addInput ('radio', 'jak_md_email', 'jak_md_email2', '', '0', $checked);
												// Arguments: for (id of associated form element), text
												echo $htmlE->addLabelFor ('jak_md_email2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc7"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="form-group no-margin">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_mediaSize', '', 'form-control', $jkv["md_mediaSize"], '');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc8"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<div class="form-group no-margin">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_iconSize', '', 'form-control', $jkv["md_iconSize"], '');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc9"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<select name="jak_mediatheme" class="form-control selectpicker" data-size="5">
												<option value="lee-gargano-circle-color" <?php if ($jkv["md_mediatheme"] == 'lee-gargano-circle-color') { ?> selected="selected"<?php } ?>>Lee-gargano-circle-color</option>
												<option value="lee-gargano-square-color" <?php if ($jkv["md_mediatheme"] == 'lee-gargano-square-color') { ?> selected="selected"<?php } ?>>Lee-gargano-square-color</option>
												<option value="mikymeg-color" <?php if ($jkv["md_mediatheme"] == 'mikymeg-color') { ?> selected="selected"<?php } ?>>Mikymeg-color</option>
												<option value="mikymeg-grey" <?php if ($jkv["md_mediatheme"] == 'mikymeg-grey') { ?> selected="selected"<?php } ?>>Mikymeg-grey</option>
											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											// Add Html Element -> endTag (Arguments: tag)
											echo $htmlE->startTag('strong') . $tl["sms_box_content"]["smsbc10"] . $htmlE->endTag('strong');
											?>

										</div>
										<div class="col-md-7">
											<select name="jak_mediahover" class="form-control selectpicker" data-size="5">
												<option value="fade-out" <?php if ($jkv["md_mediahover"] == 'fade-out') { ?> selected="selected"<?php } ?>>Fade-out</option>
												<option value="fade-in" <?php if ($jkv["md_mediahover"] == 'fade-in') { ?> selected="selected"<?php } ?>>Fade-in</option>
												<option value="rise" <?php if ($jkv["md_mediahover"] == 'rise') { ?> selected="selected"<?php } ?>>Rise</option>
												<option value="rotate" <?php if ($jkv["md_mediahover"] == 'rotate') { ?> selected="selected"<?php } ?>>Rotate</option>
												<option value="shrink" <?php if ($jkv["md_mediahover"] == 'shrink') { ?> selected="selected"<?php } ?>>Shrink</option>
												<option value="bounce" <?php if ($jkv["md_mediahover"] == 'bounce') { ?> selected="selected"<?php } ?>>Bounce</option>
												<option value="grow" <?php if ($jkv["md_mediahover"] == 'grow') { ?> selected="selected"<?php } ?>>Grow</option>
											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<div style="position: relative;height: 200px;">
												<div id="sollist-sharing" style="position: absolute;display: table-cell;top: 30%;left: 10%;"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="box-footer">
					<button type="submit" name="save" class="btn btn-success pull-right">
						<i class="fa fa-save margin-right-5"></i>
						<?php echo $tl["button"]["btn1"]; ?>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"; ?>

