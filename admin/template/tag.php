<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php }
if ($page1 == "e" || $page1 == "ene") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo ($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<?php if ($page2 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?php echo $tl["notification"]["n2"]; ?>'
			}, {
				// settings
				type: 'info',
				delay: 5000,
				timer: 3000
			});
		}, 2000);
	</script>
<?php } ?>

<?php if (isset($JAK_TAG_ALL) && is_array ($JAK_TAG_ALL)) { ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>#</th>
							<th>
								<div class="checkbox-singel check-success">

									<?php
									// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
									// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
									echo $Html->addCheckbox('', '', false, 'jak_delete_all');
									echo $Html->addLabel('jak_delete_all', '');
									?>

								</div>
							</th>
							<th>

								<?php
								echo $tl["tag_box_table"]["tagtb"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html->addAnchor('index.php?p=tags&amp;sp=sort&amp;ssp=tag&amp;sssp=DESC', '<i class="fa fa-arrow-up"></i>', '', 'btn btn-warning btn-xs sort');
								echo $Html->addAnchor('index.php?p=tags&amp;sp=sort&amp;ssp=tag&amp;sssp=ASC', '<i class="fa fa-arrow-down"></i>', '', 'btn btn-success btn-xs sort');
								?>

							</th>
							<th><?php echo $tl["tag_box_table"]["tagtb1"]; ?></th>
							<th>

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html->addAnchor('javascript:void(0);', '<i class="fa fa-lock"></i>', '', 'btn btn-default btn-xs');
								?>

							</th>
							<th>

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["tag_notification"]["delall"]));
								?>

							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_TAG_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<div class="checkbox-singel check-success">

										<?php
										// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
										// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
										echo $Html->addCheckbox('jak_delete_tag[]', $v["id"], false, 'jak_delete_tag' . $v["id"], 'highlight');
										echo $Html->addLabel('jak_delete_tag' . $v["id"], '');
										?>

									</div>
								</td>
								<td><?php echo $v["tag"]; ?></td>
								<td>

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html->addAnchor('index.php?p=tags&amp;sp=sort&amp;ssp=pluginid&amp;sssp=' . $v["pluginid"], $v["plugin"]);
									?>

								</td>
								<td>

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html->addAnchor('index.php?p=tags&amp;sp=lock&amp;ssp=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
									?>

								</td>
								<td>

									<?php
									// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
									echo $Html->addAnchor('index.php?p=tags&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => $tl["tag_notification"]["del"], 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
									?>

								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</form>

	<div class="col-md-12 m-b-30">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html->addTag('h3', $tl["icons"]["i"]);
			echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i6"]));
			echo $Html->addTag('i', '', 'fa fa-lock', array('title' => $tl["icons"]["i5"]));
			echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

	<?php if ($JAK_PAGINATE) {
		echo $JAK_PAGINATE;
	}
} else { ?>

	<div class="col-md-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

<?php include "footer.php"; ?>