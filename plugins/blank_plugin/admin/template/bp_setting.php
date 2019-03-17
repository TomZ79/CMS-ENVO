<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page2 == "s") { ?>
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
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
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
			?>

		</div>

		<!-- Form Content -->
		<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
			<li class="nav-item">
				<a href="#cmsPage1" class="active" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbp["bp_section_tab"]["bptab"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbp["bp_section_tab"]["bptab1"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbp["bp_section_tab"]["bptab2"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlbp["bp_section_tab"]["bptab3"], 'text');
					?>

				</a>
			</li>
			<li class='nav-item dropdown collapsed-menu hidden'>
				<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
					...

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', '', 'glyphicon glyphicon-chevron-right');
					?>

				</a>
				<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton"></div>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
				<div class="row">
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html -> addTag('h3', $tlbp["bp_box_title"]["bpbt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlbp["bp_box_content"]["bpbc"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', $ENVO_SETTING_VAL["blankplugintitle"], '', 'form-control');
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
				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
				<div class="row">

				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
				<div class="row">

				</div>
			</div>
			<div class="tab-pane fade" id="cmsPage4" role="tabpanel">
				<div class="row">

				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>