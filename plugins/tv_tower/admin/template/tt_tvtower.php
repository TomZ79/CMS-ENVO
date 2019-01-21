<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
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
// EN: Remove records from DB was successful
// CZ: Odstranění záznamu z DB bylo úspěšné
if ($page3 == "s1" || $page3 == "s2") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo($page3 == "s2" ? 'Záznam úspěšně uzamčen' : $tl["notification"]["n2"]);?>'
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

<?php
// EN: Errors
// CZ: Výpis chyb při zpracování
if ($errors) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<?php
// EN: Errors
// CZ: Výpis chyb při zpracování
if ($page2 == "n") { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: 'Vysílač nelze odstanit, protože obsahuje kanál(y) nebo program(y). Odstraňte nejdříve všechny program(y) a kanál(y) pro vybraný vysílač.'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

<!-- Fixed Button for save form --><div class="savebutton-medium hidden-xs">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=newtvtower', $tltt["tt_button"]["ttbtn"], '', 'btn btn-info button');
	?>

</div>

<?php if (!empty($ENVO_TVTOWER_ALL) && is_array($ENVO_TVTOWER_ALL)) { ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<table id="tt_table" class="table table-striped table-hover">
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
						<th style="width:27%"><?= $tltt["tt_box_table"]["tttb"] ?></th>
						<th style="width:26%">Stanoviště</th>
						<th style="width:26%">Okres</th>
						<th class="text-center no-sort" style="width:4%"></th>
						<th class="text-center no-sort" style="width:4%"></th>
						<th class="text-center no-sort" style="width:4%"></th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($ENVO_TVTOWER_ALL as $tt) { ?>
						<tr>
							<td><?= $tt["id"] ?></td>
							<td>
								<div class="checkbox-singel check-success" style="margin: 0 auto;">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('envo_delete_tvtower[]', $tt["id"], FALSE, 'envo_delete_tvtower' . $tt["id"], 'highlight');
									echo $Html -> addLabel('envo_delete_tvtower' . $tt["id"], '');
									?>

								</div>
							</td>
							<td>

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=edittvtower&amp;id=' . $tt["id"], $tt["name"]);
								?>

							</td>
							<td>
								<?= $tt["station"] ?>
							</td>
							<td>
								<?= $tt["district"] ?>
							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// LOCK
								echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=lock&amp;id=' . $tt["id"], '<i class="fa fa-' . (($tt["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($tt["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
								?>

							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// EDIT
								echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=edittvtower&amp;id=' . $tt["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
								?>

							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// DELETE
								echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=delete&amp;id=' . $tt["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $tt["name"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));

								?>

							</td>
						</tr>
					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</form>

	<div class="col-sm-12 m-b-30">
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
