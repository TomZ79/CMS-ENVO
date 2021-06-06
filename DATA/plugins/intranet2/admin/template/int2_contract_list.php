<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<!-- Action button block -->
<div class="actionbtn-block d-none d-sm-block">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=newcontract', 'Nová Zakázka', '', 'btn btn-info button');
	?>

</div>

<?php if (!empty($ENVO_CONTRACT_ALL) && is_array($ENVO_CONTRACT_ALL)) { ?>

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
						<th style="width:15%">Číslo Zakázky</th>
						<th style="width:31%">Subjekt</th>
						<th style="width:15%">Číslo Rozpočtu</th>
						<th style="width:10%">Cena</th>
						<th style="width:10%">Status</th>
						<th class="no-sort" style="width:5%"></th>
						<th class="no-sort" style="width:5%"></th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($ENVO_CONTRACT_ALL as $c) { ?>
						<tr>
							<td><?= $c["id"] ?></td>
							<td>
								<div class="checkbox-singel check-success">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html -> addCheckbox('envo_delete_int2[]', $c["id"], FALSE, 'envo_delete_int2_' . $c["id"], 'highlight');
									echo $Html -> addLabel('envo_delete_int2_' . $c["id"], '');
									?>

								</div>
							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=editcontract&amp;id=' . $c["id"], $c["number"]);
								?>

							</td>
							<td>
								<?= $c["object"] ?>
							</td>
							<td>
								<?= $c["contractbudget"] ?>
							</td>
							<td>
								<?= $c["contractprice"] ?>
							</td>
							<td>
								<?= $c["status"] ?>
							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								// EDIT
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=editcontract&amp;id=' . $c["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
								?>

							</td>
							<td class="text-center">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=delete&amp;id=' . $c["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm-control' => sprintf($tlint2["int2_notification"]["delhouse"], $c["object"]) . ' Odstraněním záznamu z databáze budou odstraněny i přidružené soubory (fotografie, videa, dokumenty, servisy, úkoly).', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
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
