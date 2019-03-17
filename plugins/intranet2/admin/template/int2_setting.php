<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
/**
 * @description Check if key is null
 * @param $var
 * @return string
 */
function nonzero ($var)
{
	$i = '0';
	foreach ($var as $v) {
		if ($v["int2analytics"] == '1') {
			$i++;
		}
	}

	return $i;
}

?>

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
					echo $Html -> addTag('span', $tlint2["int2_section_tab"]["int2tab"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item next">
				<a href="#cmsPage2" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlint2["int2_section_tab"]["int2tab1"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage3" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlint2["int2_section_tab"]["int2tab2"], 'text');
					?>

				</a>
			</li>
			<li class="nav-item">
				<a href="#cmsPage4" class="" data-toggle="tab">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $tlint2["int2_section_tab"]["int2tab3"], 'text');
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
								echo $Html -> addTag('h3', $tlint2["int2_box_title"]["int2bt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlint2["int2_box_content"]["int2bc"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html -> addInput('text', 'envo_title', $ENVO_SETTING_VAL["int2title"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlint2["int2_box_content"]["int2bc1"]);
												echo $Html -> addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">
													<select name="envo_date" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['int2dateformat'] == '') ? TRUE : FALSE);

														echo $Html -> addOption('d.m.Y', 'd.m.Y (01.01.2017)', ($ENVO_SETTING_VAL['int2dateformat'] == 'd.m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('d F Y', 'd F Y (01 January 2017)', ($ENVO_SETTING_VAL['int2dateformat'] == 'd F Y') ? TRUE : FALSE);
														echo $Html -> addOption('l m.Y', 'l m.Y (Monday 01.2017)', ($ENVO_SETTING_VAL['int2dateformat'] == 'l m.Y') ? TRUE : FALSE);
														echo $Html -> addOption('l F Y', 'l F Y (Monday January 2017)', ($ENVO_SETTING_VAL['int2dateformat'] == 'l F Y') ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-sm-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html -> addTag('strong', $tlint2["int2_box_content"]["int2bc2"]);
												?>

											</div>
											<div class="col-sm-7">
												<div class="form-group m-0">
													<select name="envo_time" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html -> addOption('', $tl["selection"]["sel110"], ($ENVO_SETTING_VAL['int2timeformat'] == '') ? TRUE : FALSE);
														?>

														<optgroup label="<?= $tl["selection"]["sel111"] ?>">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption(' - h:i A', ' - h:i A ( - 01:00 PM)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - h:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - h:i:s A', ' - h:i:s A ( - 01:00:00 PM)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - h:i:s A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i A', ' - g:i A ( - 1:00 PM)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - g:i A') ? TRUE : FALSE);
															echo $Html -> addOption(' - g:i:s A', ' - g:i:s A ( - 1:00:00 PM)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - g:i:s A') ? TRUE : FALSE);
															?>

														</optgroup>
														<optgroup label="<?= $tl["selection"]["sel112"] ?>">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html -> addOption(' - H:i', ' - H:i ( - 13:00)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - H:i') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s', ' - H:i:s ( - 13:00:00)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - H:i:s') ? TRUE : FALSE);
															echo $Html -> addOption(' - H:i:s T O', ' - H:i:s T O ( - 13:00:00 CEST +0200)', ($ENVO_SETTING_VAL['int2timeformat'] == ' - H:i:s T O') ? TRUE : FALSE);
															?>

														</optgroup>

													</select>

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
					<div class="col-sm-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html -> startTag('h3', array ('class' => 'box-title'));
								echo 'Přístupová práva';
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => 'Stiskněte a držte <br>klávesu CTRL nebo SHIFT <br>pro výběr více položek', 'data-original-title' => 'Nápověda'));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html -> endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<p>Přístupová práva jednotlivých uživatelů podle uživatelské skupiny do frontend rozhraní analýzy bytových domů.</p>
										<div class="row-form">
											<div class="col-sm-12">
												<select name="envo_permission[]" multiple="multiple" class="form-control" size="10">

													<?php
													// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = (empty($ENVO_SETTING_PERMISSION) || empty(nonzero($ENVO_SETTING_PERMISSION))) ? TRUE : FALSE;

													echo $Html -> addOption('0', 'Žádná skupina', $selected);
													if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {

														if (isset($ENVO_SETTING_PERMISSION) && is_array($ENVO_SETTING_PERMISSION)) foreach ($ENVO_SETTING_PERMISSION as $ep) {

															if ($v["id"] == $ep["id"]) {

																// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
																$selected = ($ep["int2analytics"] == '1') ? TRUE : FALSE;

																echo $Html -> addOption($v["id"], $v["name"], $selected);
															}

														}

													}
													?>

												</select>
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