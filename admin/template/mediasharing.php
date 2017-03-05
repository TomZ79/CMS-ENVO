<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
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
				message: '<?php echo $tl["general_error"]["generror1"];?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton hidden-xs">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
		?>

	</div>

	<!-- Form Content -->
	<div class="row tab-content-singel">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html->addTag('h3', $tl["sms_box_title"]["smsbt"], 'box-title');
					?>

				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_facebook', '1', ($JAK_SETTING["md_facebook"] == '1') ? TRUE : FALSE, 'jak_md_facebook1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_facebook1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_facebook', '0', ($JAK_SETTING["md_facebook"] == '0') ? TRUE : FALSE, 'jak_md_facebook2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_facebook2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc1"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_googleplus', '1', ($JAK_SETTING["md_googleplus"] == '1') ? TRUE : FALSE, 'jak_md_googleplus1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_googleplus1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_googleplus', '0', ($JAK_SETTING["md_googleplus"] == '0') ? TRUE : FALSE, 'jak_md_googleplus2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_googleplus2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc2"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_instagram', '1', ($JAK_SETTING["md_instagram"] == '1') ? TRUE : FALSE, 'jak_md_instagram1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_instagram1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_instagram', '0', ($JAK_SETTING["md_instagram"] == '0') ? TRUE : FALSE, 'jak_md_instagram2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_instagram2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc3"]);
											?>

										</div>
										<div class="col-md-7">

											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_twitter', '1', ($JAK_SETTING["md_twitter"] == '1') ? TRUE : FALSE, 'jak_md_twitter1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_twitter1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_twitter', '0', ($JAK_SETTING["md_twitter"] == '0') ? TRUE : FALSE, 'jak_md_twitter2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_twitter2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc4"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_youtube', '1', ($JAK_SETTING["md_youtube"] == '1') ? TRUE : FALSE, 'jak_md_youtube1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_youtube1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_youtube', '0', ($JAK_SETTING["md_youtube"] == '0') ? TRUE : FALSE, 'jak_md_youtube2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_youtube2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc5"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_vimeo', '1', ($JAK_SETTING["md_vimeo"] == '1') ? TRUE : FALSE, 'jak_md_vimeo1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_vimeo1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_vimeo', '0', ($JAK_SETTING["md_vimeo"] == '0') ? TRUE : FALSE, 'jak_md_vimeo2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_vimeo2', $tl["checkbox"]["chk1"]);
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc6"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<?php
												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_email', '1', ($JAK_SETTING["md_email"] == '1') ? TRUE : FALSE, 'jak_md_email1');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_email1', $tl["checkbox"]["chk"]);

												// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
												echo $Html->addRadio('jak_md_email', '0', ($JAK_SETTING["md_email"] == '0') ? TRUE : FALSE, 'jak_md_email2');
												// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
												echo $Html->addLabel('jak_md_email2', $tl["checkbox"]["chk1"]);
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
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc7"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="form-group no-margin">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('text', 'jak_mediaSize', $JAK_SETTING["md_mediaSize"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc8"]);
											?>

										</div>
										<div class="col-md-7">
											<div class="form-group no-margin">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('text', 'jak_iconSize', $JAK_SETTING["md_iconSize"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc9"]);
											?>

										</div>
										<div class="col-md-7">
											<select name="jak_mediatheme" class="form-control selectpicker" data-size="5">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('lee-gargano-circle-color', 'Lee-gargano-circle-color', ($JAK_SETTING["md_mediatheme"] == 'lee-gargano-circle-color') ? TRUE : FALSE);
												echo $Html->addOption('lee-gargano-square-color', 'Lee-gargano-square-color', ($JAK_SETTING["md_mediatheme"] == 'lee-gargano-square-color') ? TRUE : FALSE);
												echo $Html->addOption('mikymeg-color', 'Mikymeg-color', ($JAK_SETTING["md_mediatheme"] == 'mikymeg-color') ? TRUE : FALSE);
												echo $Html->addOption('mikymeg-grey', 'Mikymeg-grey', ($JAK_SETTING["md_mediatheme"] == 'mikymeg-grey') ? TRUE : FALSE);
												?>

											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5">

											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html->addTag('strong', $tl["sms_box_content"]["smsbc10"]);
											?>

										</div>
										<div class="col-md-7">
											<select name="jak_mediahover" class="form-control selectpicker" data-size="5">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('fade-out', 'Fade-out', ($JAK_SETTING["md_mediahover"] == 'fade-out') ? TRUE : FALSE);
												echo $Html->addOption('fade-in', 'Fade-in', ($JAK_SETTING["md_mediahover"] == 'fade-in') ? TRUE : FALSE);
												echo $Html->addOption('rise', 'Rise', ($JAK_SETTING["md_mediahover"] == 'rise') ? TRUE : FALSE);
												echo $Html->addOption('rotate', 'Rotate', ($JAK_SETTING["md_mediahover"] == 'rotate') ? TRUE : FALSE);
												echo $Html->addOption('shrink', 'Shrink', ($JAK_SETTING["md_mediahover"] == 'shrink') ? TRUE : FALSE);
												echo $Html->addOption('bounce', 'Bounce', ($JAK_SETTING["md_mediahover"] == 'bounce') ? TRUE : FALSE);
												echo $Html->addOption('grow', 'Grow', ($JAK_SETTING["md_mediahover"] == 'grow') ? TRUE : FALSE);
												?>

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

