<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
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
<?php }
if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
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
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html->addAnchor('index.php?p=user',  $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('h3', $tl["user_box_title"]["userbt"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc3"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_name', $_REQUEST["jak_name"], 'jak_name', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc4"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_email', $_REQUEST["jak_email"], '', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc5"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_username', $_REQUEST["jak_username"], '', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc6"]);
										?>

									</div>
									<div class="col-md-7">
										<select name="jak_usergroup" class="form-control selectpicker" data-size="5">

											<?php
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
												if ($v["id"] != "1") {
													echo $Html->addOption($v["id"], $v["name"], ($v["id"] == $_REQUEST["jak_usergroup"]) ? TRUE : FALSE);
												}
											}
											?>

										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc7"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_access', '1', ((isset($_REQUEST["jak_access"]) && $_REQUEST["jak_access"] == '1') || !isset($_REQUEST["jak_access"])) ? TRUE : FALSE, 'jak_access1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_access1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_access', '0', ((isset($_REQUEST["jak_access"]) && $_REQUEST["jak_access"] == '0')) ? TRUE : FALSE, 'jak_access2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_access2', $tl["checkbox"]["chk1"]);
											?>


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
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('h3', $tl["user_box_title"]["userbt1"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc12"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('text', 'jak_password', $_REQUEST["jak_password"], '', 'form-control');
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('span', '', 'label password-indicator-label-absolute');
												?>

											</div>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["user_box_content"]["userbc13"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('text', 'jak_confirm_password', $_REQUEST["jak_confirm_password"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonFuel (Arguments: fieldname, value, optional assoc. array)
						echo $Html->addButtonFuel('', $tl["button"]["btn24"], array('type' => 'button', 'class' => 'btn btn-info generate-label-absolute'));
						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
						?>

					</div>
				</div>
			</div>
		</div>
		<?php if (isset($JAK_HOOK_ADMIN_USER) && is_array ($JAK_HOOK_ADMIN_USER)) foreach ($JAK_HOOK_ADMIN_USER as $hsu) {
			include_once APP_PATH . $hsu['phpcode'];
		} ?>
	</form>

<?php include "footer.php"; ?>