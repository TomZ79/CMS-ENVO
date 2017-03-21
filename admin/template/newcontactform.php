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

	<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html->addAnchor('index.php?p=contactform',  $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["cform"]["c2"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_title', $_REQUEST["jak_title"], 'jak_title', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["cf_box_content"]["cfbc1"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_showtitle', '1', ((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '1')) ? TRUE : FALSE, 'jak_showtitle1');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_showtitle1', $tl["checkbox"]["chk"]);

											// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
											echo $Html->addRadio('jak_showtitle', '0', ((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '0') || !isset($_REQUEST["jak_showtitle"])) ? TRUE : FALSE, 'jak_showtitle2');
											// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
											echo $Html->addLabel('jak_showtitle2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["cform"]["c20"]);
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_email', $_REQUEST["jak_email"], '', 'form-control', array('placeholder'=>$tl["placeholder"]["p14"]));
											?>

										</div>
									</div>
								</div>
								<div class="row-form <?php if (isset($errors["e2"])) echo " has-error"; ?>">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["cform"]["c3"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
										echo $Html->addTextarea('jak_lcontent', jak_edit_safe_userpost($_REQUEST["jak_lcontent"]), '4', '', array ('id' => 'jakEditor', 'class' => 'jakEditorLight form-control', 'style' => 'width:100%;'));
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
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html->addTag('i', '', 'fa fa-plus-square');
						echo $Html->addTag('h3', $tl["cf_box_title"]["cfbt1"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<ul class="cform_drag">
							<li id="cform_drag">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">

											<?php
											echo $tl["cform"]["c6"];
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_option[]', '', '', 'form-control jakread', array('readonly' => 'readonly'));
											?>

										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?php echo $tl["cform"]["c9"]; ?>
											<select name="jak_optionmandatory[]" class="form-control selectpicker" data-size="5">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
												echo $Html->addOption('1', $tl["checkbox"]["chk"]);
												echo $Html->addOption('2', $tl["cform"]["c16"]);
												echo $Html->addOption('3', $tl["cform"]["c17"]);
												?>

											</select>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?php echo $tl["cform"]["c7"]; ?>
											<select name="jak_optiontype[]" class="form-control selectpicker" data-size="5">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('1', $tl["cform"]["c10"]);
												echo $Html->addOption('2', $tl["cform"]["c11"]);
												echo $Html->addOption('3', $tl["cform"]["c12"]);
												echo $Html->addOption('4', $tl["cform"]["c13"]);
												echo $Html->addOption('5', $tl["cform"]["c14"]);
												echo $Html->addOption('6', $tl["cform"]["c19"]);
												echo $Html->addOption('7', $tl["cform"]["c23"]);
												?>

											</select>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">

											<?php
											echo $tl["cform"]["c8"];
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_option[]', 'female,male', '', 'form-control jakread', array('readonly' => 'readonly'));
											?>

										</div>
									</div>

									<?php
									// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
									echo $Html->addInput('hidden', 'jak_optionsort[]', '', '', 'cforder-orig');
									?>

								</div>
							</li>
						</ul>

						<div class="callout callout-info">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('i', '', 'fa fa-arrow-up m-r-5');
							echo $tl["cform"]["c21"];
							echo $Html->addTag('i', '', 'fa fa-arrow-down m-l-5');
							?>

						</div>

						<ul id="cform_sort">
							<li class="jakcform">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">

											<?php
											echo $tl["cform"]["c6"];
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_option[]','', '', 'form-control');
											?>

										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?php echo $tl["cform"]["c9"]; ?>
											<select name="jak_optionmandatory[]" class="form-control selectpicker">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('0', $tl["checkbox"]["chk1"]);
												echo $Html->addOption('1', $tl["checkbox"]["chk"]);
												echo $Html->addOption('2', $tl["cform"]["c16"]);
												echo $Html->addOption('3', $tl["cform"]["c17"]);
												?>

											</select>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?php echo $tl["cform"]["c7"]; ?>
											<select name="jak_optiontype[]" class="form-control selectpicker" data-size="5">

												<?php
												// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
												echo $Html->addOption('1', $tl["cform"]["c10"]);
												echo $Html->addOption('2', $tl["cform"]["c11"]);
												echo $Html->addOption('3', $tl["cform"]["c12"]);
												echo $Html->addOption('4', $tl["cform"]["c13"]);
												echo $Html->addOption('5', $tl["cform"]["c14"]);
												echo $Html->addOption('6', $tl["cform"]["c19"]);
												echo $Html->addOption('7', $tl["cform"]["c23"]);
												?>

											</select>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">

											<?php
											echo $tl["cform"]["c8"];
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_options[]','', '', 'form-control');
											echo $Html->addInput('hidden', 'jak_optionsort[]','', '', 'cforder');
											?>

										</div>
									</div>
								</div>
							</li>
						</ul>
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