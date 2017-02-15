<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e" || $page2 == "edn") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo ($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["hook_error"]["hookerror4"]);?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<div class="btn-toolbar m-b-20">
		<div class="btn-group">

			<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 100px;"><?php echo $tl["button"]["btn4"]; ?>
				<span class="caret"></span>
			</button>
			<div class="dropdown-menu livefilter">
				<div class="search-box">

					<?php
					// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
					echo $htmlE->addInput ('text', 'jak_tags', 'input-bts-ex-1', 'form-control live-search', '', '', array ('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
					?>

				</div>
				<div class="list-to-filter">
					<ul class="list-unstyled overflow">
						<?php if (isset($JAK_HOOK_LOCATIONS) && is_array ($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
							<li class="filter-item" data-filter="<?php echo $h; ?>">
								<a href="index.php?p=plugins&sp=sorthooks&ssp=<?php echo $h; ?>"><?php echo $h; ?></a></li>
						<?php } ?>
					</ul>
					<div class="no-search-results">
						<div class="no-results" role="alert"><?php echo $tl["selection"]["sel6"]; ?></div>
					</div>
				</div>
			</div>

		</div>
	</div>

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
									echo $htmlE->addInput('checkbox', 'jak_delete_all', '', '', '', '');
									// Arguments: for (id of associated form element), text
									echo $htmlE->addLabelFor('jak_delete_all', '');
									?>

								</div>
							</th>
							<th><?php echo $tl["hook_box_table"]["hooktb"]; ?></th>
							<th><?php echo $tl["hook_box_table"]["hooktb1"]; ?></th>
							<th><?php echo $tl["hook_box_table"]["hooktb2"]; ?></th>
							<th>
								<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
									<i class="fa fa-lock"></i>
								</button>
							</th>
							<th></th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["hook_notification"]["delall"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php if (isset($JAK_HOOKS) && is_array ($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<div class="checkbox-singel check-success">

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput('checkbox', 'jak_delete_hook[]', 'jak_delete_hook' . $v["id"], 'highlight', $v["id"], '');
										// Arguments: for (id of associated form element), text
										echo $htmlE->addLabelFor('jak_delete_hook' . $v["id"], '');
										?>

									</div>
								</td>
								<td>
									<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
								</td>
								<td>
									<a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["hook_name"]; ?>"><?php echo $v["hook_name"]; ?></a>
								</td>
								<td>
									<?php if ($v["pluginid"] != '0') { ?>
										<a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["pluginid"]; ?>"><?php echo $v["pluginid"]; ?></a><?php } else { ?><?php echo $v["pluginid"];
									} ?>
								</td>
								<td>
									<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') {
										echo $tl["icons"]["i5"];
									} else {
										echo $tl["icons"]["i6"];
									} ?>">
										<i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
									</a>
								</td>
								<td>
									<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<?php if ($v["id"] > 5) { ?>
										<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf ($tl["hook_notification"]["del"], $v["name"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
											<i class="fa fa-trash-o"></i>
										</a>
									<?php } ?>
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
			<h3><?php echo $tl["icons"]["i"]; ?></h3>
			<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
			<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
			<i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
			<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
		</div>
	</div>

<?php if ($JAK_PAGINATE) {
	echo $JAK_PAGINATE;
} ?>

<?php include "footer.php"; ?>