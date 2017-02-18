<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page1 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
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
				message: '<?php echo ($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
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
				message: '<?php echo $tl["notification"]["n2"]; ?>',
			}, {
				// settings
				type: 'info',
				delay: 5000,
				timer: 3000,
			});
		}, 2000);
	</script>
<?php } ?>

<?php if (isset($JAK_UM_ALL) && is_array ($JAK_UM_ALL)) { ?>

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
									// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
									echo $htmlE->addInput('checkbox', '', 'jak_delete_all', '', '', '');
									// Arguments: for (id of associated form element), text
									echo $htmlE->addLabelFor('jak_delete_all', '');
									?>

								</div>

							</th>
							<th><?php echo $tlum["url_box_table"]["urltb"]; ?></th>
							<th><?php echo $tlum["url_box_table"]["urltb1"]; ?></th>
							<th><?php echo $tlum["url_box_table"]["urltb2"]; ?></th>
							<th><?php echo $tlum["url_box_table"]["urltb3"]; ?></th>
							<th><?php echo $tlum["url_box_table"]["urltb4"]; ?></th>
							<th>

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
								echo $htmlE->addButtonSubmit('lock', 'button_lock', 'btn btn-default btn-xs', '<i class="fa fa-lock"></i>');
								?>

							</th>
							<th></th>
							<th>

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
								echo $htmlE->addButtonSubmit('delete', 'button_delete', 'btn btn-danger btn-xs', '<i class="fa fa-trash-o"></i>', array('data-confirm-del' => $tlum["url_notification"]["delall"], 'disabled' => 'disabled'));
								?>

							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_UM_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<div class="checkbox-singel check-success">
										<input type="checkbox" id="jak_delete_urlmapping<?php echo $v["id"]; ?>" name="jak_delete_urlmapping[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
										<label for="jak_delete_urlmapping<?php echo $v["id"]; ?>"></label>
									</div>
								</td>
								<td>
									<a href="index.php?p=urlmapping&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["urlold"]; ?></a>
								</td>
								<td>
									<a href="index.php?p=urlmapping&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["urlnew"]; ?></a>
								</td>
								<td><?php if ($v["redirect"] == '301') {
										echo $tlum["url_box_content"]["urlbc1"];
									} else {
										echo $tlum["url_box_content"]["urlbc2"];
									} ?></td>
								<td><?php echo date ("d.m.Y - H:i:s", strtotime ($v["time"])); ?></td>
								<td>
									<?php
									if ($v["active"] == 1) {
										echo $tlum["url_box_content"]["urlbc4"];
									} else {
										echo $tlum["url_box_content"]["urlbc5"] . '<span class="small">  - ' . $tlum["url_box_content"]["urlbc6"] . '</span>';
									}
									?>
								</td>
								<td>
									<a href="index.php?p=urlmapping&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') {
										echo $tl["icons"]["i5"];
									} else {
										echo $tl["icons"]["i6"];
									} ?>">
										<i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
									</a>
								</td>
								<td>
									<a href="index.php?p=urlmapping&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="index.php?p=urlmapping&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tlum["url_notification"]["del"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</form>

<?php } else { ?>

	<div class="col-md-12">

		<?php
		// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
		echo $htmlE->addSimpleDiv ('', $tl["general_error"]["generror3"],  array ('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

	<div class="icon_legend">
		<h3><?php echo $tl["icons"]["i"]; ?></h3>
		<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
		<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
		<i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
		<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>