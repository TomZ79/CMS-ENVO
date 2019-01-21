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

<?php if ($page2 == "s1") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?=$tl["notification"]["n2"]?>'
			}, {
				// settings
				type: 'info',
				delay: 5000,
				timer: 3000
			});
		}, 2000);
	</script>
<?php } ?>

<?php if ($page1 == "e" || $page1 == "ene") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if ($page1 == "e") {
					$tl["general_error"]["generror1"];
				} elseif ($page1 == "ene") {
					echo $tl["general_error"]["generror2"];
				} else {
					echo $tl["userg_error"]["usergerror"];
				} ?>',
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php } ?>

	<!-- Fixed Button for save form -->
	<div class="savebutton-medium hidden-xs">

		<?php
		// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
		echo $Html -> addAnchor('index.php?p=usergroup&amp;sp=newgroup', $tl["button"]["btn35"], '', 'btn btn-info button');
		?>

	</div>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table id="usergroups_table" class="table table-striped table-hover">
						<thead>
						<tr>
							<th class="no-sort">#</th>
							<th class="no-sort">
								<div class="checkbox-singel check-success">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('', '', false, 'envo_delete_all');
									echo $Html -> addLabel('envo_delete_all', '');
									?>

								</div>
							</th>
							<th><?= $tl["userg_box_table"]["usergtb"] ?></th>
							<th><?= $tl["userg_box_table"]["usergtb1"] ?></th>
							<th class="no-sort"></th>
							<th class="no-sort"></th>
							<th class="text-center no-sort">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array ('disabled' => 'disabled', 'data-confirm-del' => $tl["userg_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
								?>

							</th>
						</tr>
						</thead>
						<tbody>

						<?php if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) { ?>
							<tr>
								<td><?= $v["id"] ?></td>
								<td>
									<div class="checkbox-singel check-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addCheckbox('envo_delete_usergroup[]', $v["id"], false, 'envo_delete_usergroup' . $v["id"], 'highlight');
										echo $Html -> addLabel('envo_delete_usergroup' . $v["id"], '');
										?>

									</div>
								</td>
								<td>

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=usergroup&amp;sp=edit&amp;id=' . $v["id"], $v["name"]);
									?>

								</td>
								<td><?= $v["description"] ?></td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=usergroup&amp;sp=user&amp;id=' . $v["id"], '<i class="fa fa-user"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i20"]));
									?>

								</td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=usergroup&amp;sp=edit&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
									?>

								</td>
								<td class="text-center">

									<?php
									if ($v["id"] > 4) {

										// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
										echo $Html -> addAnchor('index.php?p=usergroup&amp;sp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm' => $tl["userg_notification"]["del"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
									}
									?>

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
			echo $Html -> addTag('i', '', 'fa fa-user', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i20"]));
			echo $Html -> addTag('i', '', 'fa fa-edit', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
			echo $Html -> addTag('i', '', 'fa fa-trash-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php include "footer.php"; ?>