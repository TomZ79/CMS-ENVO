<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php }
if ($errors) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
					if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];
					?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<!-- Action button block -->
		<div class="actionbtn-block d-none d-sm-block">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=users', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-sm-6">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tl["user_box_title"]["userbt"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc3"]);
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_name', $_REQUEST["envo_name"], 'envo_name', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc4"]);
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_email', $_REQUEST["envo_email"], '', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc5"]);
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html -> addInput('text', 'envo_username', $_REQUEST["envo_username"], '', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc6"]);
										?>

									</div>
									<div class="col-sm-7">
										<select name="envo_usergroup" class="form-control selectpicker">

											<?php
											// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
											if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) {
												if ($v["id"] != "1") {
													echo $Html -> addOption($v["id"], $v["name"], ($v["id"] == $_REQUEST["envo_usergroup"]) ? TRUE : FALSE);
												}
											}
											?>

										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc7"]);
										?>

									</div>
									<div class="col-sm-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html -> addRadio('envo_access', '1', ((isset($_REQUEST["envo_access"]) && $_REQUEST["envo_access"] == '1') || !isset($_REQUEST["envo_access"])) ? TRUE : FALSE, 'envo_access1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('envo_access1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html -> addRadio('envo_access', '0', ((isset($_REQUEST["envo_access"]) && $_REQUEST["envo_access"] == '0')) ? TRUE : FALSE, 'envo_access2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html -> addLabel('envo_access2', $tl["checkbox"]["chk1"]);
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
						echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
						?>

					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tl["user_box_title"]["userbt1"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc12"]);
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_password', $_REQUEST["envo_password"], '', 'form-control');
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('span', '', 'label password-indicator-label-absolute');
												?>

											</div>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html -> addTag('strong', $tl["user_box_content"]["userbc13"]);
										echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-sm-7">
										<div class="form-group m-0<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html -> addInput('text', 'envo_confirm_password', $_REQUEST["envo_confirm_password"], '', 'form-control');
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
						// Add Html Element -> addButtonF (Arguments: fieldname, value, optional assoc. array)
						echo $Html -> addButtonF('', $tl["button"]["btn24"], array ('type' => 'button', 'class' => 'btn btn-info generate-label-absolute'));
						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
						?>

					</div>
				</div>
			</div>
		</div>

		<?php if (isset($ENVO_HOOK_ADMIN_USER) && is_array($ENVO_HOOK_ADMIN_USER)) foreach ($ENVO_HOOK_ADMIN_USER as $hsu) {
			include_once APP_PATH . $hsu['phpcode'];
		} ?>

	</form>

<?php include "footer.php"; ?>