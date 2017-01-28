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

<?php if (isset($JAK_DOWNLOAD_ALL) && is_array ($JAK_DOWNLOAD_ALL)) { ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="box">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>#</th>
							<th><input type="checkbox" id="jak_delete_all"/></th>
							<th><?php echo $tld["dload"]["d8"]; ?>
								<a class="btn btn-warning btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=title&amp;sssp=DESC">
									<i class="fa fa-arrow-up"></i>
								</a>
								<a class="btn btn-success btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=title&amp;sssp=ASC">
									<i class="fa fa-arrow-down"></i>
								</a>
							</th>
							<th><?php echo $tl["page"]["p1"]; ?></th>
							<th><?php echo $tl["page"]["p2"]; ?></th>
							<th><?php echo $tl["general"]["g56"]; ?>
								<a class="btn btn-warning btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC">
									<i class="fa fa-arrow-up"></i>
								</a>
								<a class="btn btn-success btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC">
									<i class="fa fa-arrow-down"></i>
								</a>
							</th>
							<th><?php echo $tld["dload"]["d9"]; ?>
								<a class="btn btn-warning btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=countdl&amp;sssp=DESC">
									<i class="fa fa-arrow-up"></i>
								</a>
								<a class="btn btn-success btn-xs" href="index.php?p=download&amp;sp=sort&amp;ssp=countdl&amp;sssp=ASC">
									<i class="fa fa-arrow-down"></i>
								</a>
							</th>
							<th><?php echo $tl["general_cmd"]["g9"]; ?></th>
							<th>
								<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
									<i class="fa fa-lock"></i>
								</button>
							</th>
							<th></th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tld["dload"]["al"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_DOWNLOAD_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<input type="checkbox" name="jak_delete_download[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
								</td>
								<td>
									<a href="index.php?p=download&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a><?php if ($v["password"]) { ?>
										<i class="fa fa-key"></i><?php } ?>
								</td>
								<td>
									<?php if ($v["catid"] != '0') {
										if (isset($JAK_CAT) && is_array ($JAK_CAT)) foreach ($JAK_CAT as $z) {
											if ($v["catid"] == $z["id"]) { ?>
												<a href="index.php?p=download&amp;sp=showcat&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a>
											<?php }
										}
									} else { ?><?php echo $tl["general"]["g24"]; ?><?php } ?>
								</td>
								<td><?php echo $v["time"]; ?></td>
								<td><?php echo $v["hits"]; ?></td>
								<td><?php echo $v["countdl"]; ?></td>
								<td>
									<?php
									if ($v["active"] == 1 && $v["catid"] != '0') {
										echo $tl["general_cmd"]["g10"];
									} else {
										echo $tl["general_cmd"]["g11"] . '<span class="small">  - Uzamčeno</span>';
									}
									?>
								</td>
								<td>
									<a href="index.php?p=download&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '1') {
										echo $tl["icons"]["i6"];
									} else {
										echo $tl["icons"]["i5"];
									} ?>">
										<i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
									</a>
								</td>
								<td>
									<a href="index.php?p=download&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="index.php?p=download&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tld["dload"]["al"]; ?>'))return false;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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
		<div class="alert bg-info text-white">
			<?php echo $tl["general_error"]["generror3"]; ?>
		</div>
	</div>

<?php } ?>

	<div class="icon_legend">
		<h3><?php echo $tl["icons"]["i"]; ?></h3>
		<i title="<?php echo $tl["page"]["p11"]; ?>" class="fa fa-key"></i>
		<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
		<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
		<i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
		<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
	</div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>