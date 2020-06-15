<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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

<?php if ($page2 == "s1" || $page2 == "s2") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=($page2 == "s1" ? $tl["notification"]["n2"] : $tl["notification"]["n3"]);?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
	</script>
<?php } ?>

<?php if ($page1 == "e") { ?>
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
<?php } ?>

<?php if (isset($ENVO_LOGINLOG_ALL) && is_array($ENVO_LOGINLOG_ALL)) { ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table class="table table-hover table-expandable">
						<thead>
						<tr>
							<th>#</th>
							<th>
								<div class="checkbox-singel check-success">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('', '', FALSE, 'envo_delete_all');
									echo $Html -> addLabel('envo_delete_all', '');
									?>

								</div>
							</th>
							<th><?= $tl["logs_box_table"]["logstb"] ?></th>
							<th><?= $tl["logs_box_table"]["logstb1"] ?></th>
							<th><?= $tl["logs_box_table"]["logstb2"] ?></th>
							<th><?= $tl["logs_box_table"]["logstb3"] ?></th>
							<th><?= $tl["logs_box_table"]["logstb4"] ?></th>
							<th class="text-center"><?= $tl["logs_box_table"]["logstb5"] ?></th>
							<th>

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=logs&amp;sp=truncate&amp;ssp=go', '<i class="fa fa-exclamation-triangle"></i>', 'button_truncate', 'btn btn-warning btn-xs', array ('data-confirm-trunc' => $tl["notification"]["n4"]));
								?>

							</th>
							<th>

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array ('disabled' => 'disabled', 'data-confirm-del' => $tl["notification"]["n5"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
								?>

							</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach ($ENVO_LOGINLOG_ALL as $v) { ?>
							<tr class="userlogin-header">
								<td class="align-middle"><?= $v["id"] ?></td>
								<td class="align-middle">
									<div class="checkbox-singel check-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addCheckbox('envo_delete_log[]', $v["id"], FALSE, 'envo_delete_log' . $v["id"], 'highlight');
										echo $Html -> addLabel('envo_delete_log' . $v["id"], '');
										?>

									</div>
								</td>
								<td class="align-middle"><?= envo_cut_text($v["name"], 8, '...') ?></td>
								<td class="align-middle"><?= $v["fromwhere"] ?></td>
								<td class="align-middle"><?= $v["ip"] ?></td>
								<td class="align-middle"><?= envo_cut_text($v["usragent"], 20, '...') ?></td>
								<td class="align-middle"><?= date("d.m.Y - H:i:s", strtotime($v["time"])) ?></td>
								<td class="align-middle text-center">

									<?php
									if ($v["access"] == '1') {
										echo '<i class="fa fa-check"></i>';
									} else {
										echo '<i class="fa fa-exclamation"></i>';
									}
									?>

								</td>
								<td class="align-middle"></td>
								<td class="align-middle call-button">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=logs&amp;sp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm' => $tl["notification"]["n6"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
									?>

								</td>
							</tr>
							<!-- Detail of login user -->
							<tr class="userlogin-detail">
								<td colspan="11">
									<table style="width: 100%;">
										<tbody>
										<tr>
											<td style="padding: 5px; border: none;">
												<table style="width: 70%;">
													<tr>
														<!-- Name of user -->
														<td style="border: none;">
															<strong><?= $tl["logs_box_table"]["logstb"] ?> : </strong>
															<?= $v["name"] ?>
														</td>
														<!-- Login page -->
														<td style="border: none;">
															<strong><?= $tl["logs_box_table"]["logstb1"] ?> : </strong>
															<?= rtrim(BASE_URL_ORIG, "/") . $v["fromwhere"] ?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<!-- User Agent -->
										<tr>
											<td style="padding: 5px;">
												<strong><?= $tl["logs_box_table"]["logstb3"] ?> : </strong>
												<?= $v["usragent"] ?>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
						<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>

	<div class="col-sm-12 m-b-30">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('h3', $tl["icons"]["i"]);
			echo $Html -> addTag('i', '', 'fa fa-check', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i16"]));
			echo $Html -> addTag('i', '', 'fa fa-exclamation', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i17"]));
			echo $Html -> addTag('i', '', 'fa fa-exclamation-triangle', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i15"]));
			echo $Html -> addTag('i', '', 'fa fa-trash-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php } else { ?>

	<div class="col-sm-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

<?php include "footer.php"; ?>