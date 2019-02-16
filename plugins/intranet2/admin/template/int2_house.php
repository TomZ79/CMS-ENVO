<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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

<?php if ($page3 == "s1") { ?>
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

<!-- Fixed Button for save form -->
<div class="savebutton-small hidden-xs">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=newhouse', 'Nový Dům', '', 'btn btn-info button');
	?>

</div>

<?php if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) { ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<table id="int2_table" class="table table-striped table-hover">
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
						<th style="width:36%">Název</th>
						<th style="width:20%">Sídlo</th>
						<th style="width:10%">Město</th>
						<th class="no-sort" style="width:20%">IČ</th>
						<th class="no-sort" style="width:5%"></th>
						<th class="no-sort" style="width:5%"></th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($ENVO_HOUSE_ALL as $h) { ?>
						<tr>
							<td><?= $h["id"] ?></td>
							<td>
								<div class="checkbox-singel check-success">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('envo_delete_int2[]', $h["id"], FALSE, 'envo_delete_int2' . $h["id"], 'highlight');
									echo $Html -> addLabel('envo_delete_int2' . $h["id"], '');
									?>

								</div>
							</td>
							<td>

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=edithouse&amp;id=' . $h["id"], $h["name"]);
								?>

							</td>
							<td>
								<?= $h["street"] ?>
							</td>
							<td>
								<?= $h["city_name"] ?>
							</td>
							<td>
								<?= $h["ic"] ?>
							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// EDIT
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=edithouse&amp;id=' . $h["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
								?>

							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=delete&amp;id=' . $h["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm-control' => sprintf($tlint2["int2_notification"]["delhouse"], $h["name"]) . ' Odstraněním záznamu z databáze budou odstraněny i přidružené soubory (fotografie, videa, dokumenty, servisy, úkoly).', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
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
