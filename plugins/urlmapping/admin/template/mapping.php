<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page1 == "s") { ?>
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
// EN: Remove records from DB was successful
// CZ: Odstranění záznamu z DB bylo úspěšné
if ($page2 == "s1") { ?>
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

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page2 == "e" || $page2 == "ene") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php } ?>

	<!-- Fixed Button for save form --><div class="savebutton-medium hidden-xs">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('index.php?p=urlmapping&sp=new', $tl["button"]["btn37"], '', 'btn btn-info button');
	?>

</div>

<?php if (isset($ENVO_UM_ALL) && is_array($ENVO_UM_ALL)) { ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table id="url_table" class="table table-striped table-hover">
						<thead>
						<tr>
							<th class="no-sort" style="width:5%">#</th>
							<th class="no-sort" style="width:4%">
								<div class="checkbox-singel check-success" style="margin: 0 auto;">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('', '', FALSE, 'envo_delete_all');
									echo $Html -> addLabel('envo_delete_all', '');
									?>

								</div>
							</th>
							<th style="width: 20%"><?= $tlum["url_box_table"]["urltb"] ?></th>
							<th style="width: 20%"><?= $tlum["url_box_table"]["urltb1"] ?></th>
							<th style="width: 19%"><?= $tlum["url_box_table"]["urltb2"] ?></th>
							<th style="width: 8%"><?= $tlum["url_box_table"]["urltb3"] ?></th>
							<th style="width: 12%"><?= $tlum["url_box_table"]["urltb4"] ?></th>
							<th class="text-center no-sort" style="width: 4%">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
								?>

							</th>
							<th class="text-center no-sort" style="width: 4%"></th>
							<th class="text-center no-sort" style="width: 4%">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html -> addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array ('disabled' => 'disabled', 'data-confirm-del' => $tlum["url_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
								?>

							</th>
						</tr>
						</thead>
						<?php foreach ($ENVO_UM_ALL as $v) { ?>
							<tr>
								<td><?= $v["id"] ?></td>
								<td>
									<div class="checkbox-singel check-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html -> addCheckbox('envo_delete_urlmapping[]', $v["id"], FALSE, 'envo_delete_urlmapping' . $v["id"], 'highlight');
										echo $Html -> addLabel('envo_delete_urlmapping' . $v["id"], '');
										?>

									</div>
								</td>
								<td class="ellipsis">

									<?php
									// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
									// Add Html Element -> endTag (Arguments: tag)
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> startTag('span');
									echo $Html -> addAnchor('index.php?p=urlmapping&amp;sp=edit&amp;id=' . $v["id"], $v["urlold"], '', '', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $v["urlold"]));
									echo $Html -> endTag('span');
									?>

								</td>
								<td class="ellipsis">

									<?php
									// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
									// Add Html Element -> endTag (Arguments: tag)
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> startTag('span');
									echo $Html -> addAnchor('index.php?p=urlmapping&amp;sp=edit&amp;id=' . $v["id"], $v["urlnew"], '', '', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $v["urlnew"]));
									echo $Html -> endTag('span');
									?>

								</td>
								<td>

									<?php if ($v["redirect"] == '301') {
										echo $tlum["url_box_content"]["urlbc1"];
									} else {
										echo $tlum["url_box_content"]["urlbc2"];
									} ?>

								</td>
								<td><?= date("d.m.Y", strtotime($v["time"])) ?></td>
								<td>

									<?php
									if ($v["active"] == 1) {
										echo $tlum["url_box_content"]["urlbc4"];
									} else {
										echo $tlum["url_box_content"]["urlbc5"] . '<span class="small">  - ' . $tlum["url_box_content"]["urlbc6"] . '</span>';
									}
									?>

								</td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=urlmapping&amp;sp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
									?>

								</td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=urlmapping&amp;sp=edit&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
									?>

								</td>
								<td class="text-center">

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html -> addAnchor('index.php?p=urlmapping&amp;sp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm' => $tlum["url_notification"]["del"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
									?>

								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</form>

	<div class="icon_legend">

		<?php
		// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
		echo $Html -> addTag('h3', $tl["icons"]["i"]);
		echo $Html -> addTag('i', '', 'fa fa-check', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
		echo $Html -> addTag('i', '', 'fa fa-lock', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
		echo $Html -> addTag('i', '', 'fa fa-edit', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
		echo $Html -> addTag('i', '', 'fa fa-trash-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
		?>

	</div>


<?php } else { ?>

	<div class="col-sm-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>