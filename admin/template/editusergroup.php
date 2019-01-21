<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
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
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];?>'
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
		<div class="savebutton hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array ('data-loading-text' => $tl["button"]["btn41"]));
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=usergroup', $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tl["userg_section_tab"]["usergtab"], 'text');
					?>

				</a>
			</li>

			<?php if (isset($ENVO_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
				<li class="nav-item next">
					<a href="#cmsPage2" class="" data-toggle="tab">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', $tl["userg_section_tab"]["usergtab1"], 'text');
						?>

					</a>
				</li>
			<?php } ?>

			<li class='nav-item dropdown collapsed-menu hidden'>
				<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
					...

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', '', 'glyphicon glyphicon-chevron-right');
					?>


				</a>
				<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
				</div>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
				<div class="row">
					<div class="col-sm-8">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tl["userg_box_title"]["usergbt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tl["userg_box_content"]["usergbc1"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_name', $ENVO_FORM_DATA["name"], 'envo_name', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tl["userg_box_content"]["usergbc2"]);
												?>

											</div>
											<div class="col-sm-7">

												<?php
												// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
												echo $Html -> addTextarea('envo_lcontent', envo_edit_safe_userpost($ENVO_FORM_DATA["content"]), '4', '', array ('class' => 'form-control'));
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tl["userg_box_content"]["usergbc3"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_advs', '1', ($ENVO_FORM_DATA["advsearch"] == '1') ? TRUE : FALSE, 'envo_advs1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_advs1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html -> addRadio('envo_advs', '0', ($ENVO_FORM_DATA["advsearch"] == '0') ? TRUE : FALSE, 'envo_advs2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html -> addLabel('envo_advs2', $tl["checkbox"]["chk1"]);
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
								echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
								?>

							</div>
						</div>
					</div>
					<div class="col-sm-4">

						<?php if (ENVO_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html -> addTag('h3', $tl["userg_box_title"]["usergbt1"], 'box-title');
									?>

								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-sm-12">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_tags', '1', ($ENVO_FORM_DATA["tags"] == '1') ? TRUE : FALSE, 'envo_tags1');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_tags1', $tl["checkbox"]["chk"]);

														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														echo $Html -> addRadio('envo_tags', '0', ($ENVO_FORM_DATA["tags"] == '0') ? TRUE : FALSE, 'envo_tags2');
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html -> addLabel('envo_tags2', $tl["checkbox"]["chk1"]);
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
									echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array ('data-loading-text' => $tl["button"]["btn41"]));
									?>

								</div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>

			<?php if (isset($ENVO_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
				<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
					<div class="row">
						<div class="col-sm-12">

							<?php if (isset($ENVO_HOOK_ADMIN_USERGROUP_EDIT) && is_array($ENVO_HOOK_ADMIN_USERGROUP_EDIT)) foreach ($ENVO_HOOK_ADMIN_USERGROUP_EDIT as $hs) {
								include_once APP_PATH . $hs['phpcode'];
							} ?>
							
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</form>

<?php include "footer.php"; ?>