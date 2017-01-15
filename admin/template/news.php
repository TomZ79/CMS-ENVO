<?php include "header.php"; ?>

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
				delay: 5000,
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

<?php if (isset($JAK_NEWS) && is_array ($JAK_NEWS)) { ?>
	<div class="box box-success">
		<div class="box-body no-padding">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th><?php echo $tl["news_box_table"]["newstb"]; ?></th>
						<th><?php echo $tl["news_box_table"]["newstb1"]; ?></th>
						<th><?php echo $tl["news_box_table"]["newstb2"]; ?></th>
						<th><?php echo $tl["news_box_table"]["newstb3"]; ?></th>
						<th>
							<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs disabled">
								<i class="fa fa-lock"></i>
							</button>
						</th>
						<th></th>
						<th>
							<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs disabled">
								<i class="fa fa-trash-o"></i>
							</button>
						</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($JAK_NEWS as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td><a href="index.php?p=news&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
							</td>
							<td><?php echo $v["time"]; ?></td>
							<td><?php echo $v["hits"]; ?></td>
							<td>
								<?php
								// Time Control - variable
								$today = date ("Y-m-d H:i:s"); // Today time
								$expire = date ("Y-m-d H:i:s", $v["enddate"]); //End time of article or content from DB
								$today_time = strtotime ($today);
								$expire_time = strtotime ($expire);

								// Control Active of article or content ...
								if ($v["active"] == 1) {
									if (empty($v["enddate"])) {
										echo $tl["news_box_content"]["newsbc7"];
									} elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
										echo $tl["news_box_content"]["newsbc7"];
									} else {
										echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc10"] . '</span>';
									}
								} else {
									if (empty($v["enddate"])) {
										echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc9"] . '</span>';
									} elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
										echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc9"] . '</span>';
									} else {
										echo $tl["news_box_content"]["newsbc8"] . '<span class="small"> - ' . $tl["news_box_content"]["newsbc9"] . ', ' . $tl["news_box_content"]["newsbc10"] . '</span>';
									}
								}
								?>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=news&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') {
									echo $tl["icons"]["i5"];
								} else {
									echo $tl["icons"]["i6"];
								} ?>">
									<i class="fa fa-<?php if ($v["active"] == '0') { ?>lock<?php } else { ?>check<?php } ?>"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=news&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
									<i class="fa fa-edit"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=news&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["news_notification"]["del"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>

					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

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
	}
} else { ?>

	<div class="col-md-12">
		<div class="alert bg-info text-white">
			<?php echo $tl["general_error"]["generror3"]; ?>
		</div>
	</div>

<?php } ?>

<?php include "footer.php"; ?>