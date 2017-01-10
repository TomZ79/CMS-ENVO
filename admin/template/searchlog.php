<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general"]["g7"];?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php }
if ($page1 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["errorpage"]["sql"];?>',
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

<?php if ($page2 == "s1") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?php echo $tl["notification"]["n3"]; ?>',
			}, {
				// settings
				type: 'info',
				delay: 5000,
				timer: 3000,
			});
		}, 2000);
	</script>
<?php } ?>

<?php if (isset($JAK_SEARCHLOG_ALL) && is_array ($JAK_SEARCHLOG_ALL)) { ?>

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
									<input type="checkbox" id="jak_delete_all"/>
									<label for="jak_delete_all"></label>
								</div>
							</th>
							<th><?php echo $tl["slogs_box_table"]["slogstb"]; ?></th>
							<th><?php echo $tl["slogs_box_table"]["slogstb1"]; ?></th>
							<th><?php echo $tl["slogs_box_table"]["slogstb2"]; ?></th>
							<th>
								<a href="index.php?p=searchlog&amp;sp=truncate&amp;ssp=go" id="button_truncate" class="btn btn-warning btn-xs" data-confirm-trunc="<?php echo $tl["notification"]["n4"]; ?>">
									<i class="fa fa-exclamation-triangle"></i>
								</a>
							</th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["notification"]["n5"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_SEARCHLOG_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<div class="checkbox-singel check-success">
										<input type="checkbox" id="jak_delete_search<?php echo $v["id"]; ?>" name="jak_delete_search[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
										<label for="jak_delete_search<?php echo $v["id"]; ?>"></label>
									</div>
								</td>
								<td><?php echo $v["tag"]; ?></td>
								<td><?php echo $v["time"]; ?></td>
								<td><?php echo $v["count"]; ?></td>
								<td></td>
								<td>
									<a href="index.php?p=searchlog&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tl["notification"]["n6"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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
			<?php echo $tl["errorpage"]["data"]; ?>
		</div>
	</div>

<?php } ?>

	<div class="col-md-12 m-b-30">
		<div class="icon_legend">
			<h3><?php echo $tl["icons"]["i"]; ?></h3>
			<i title="<?php echo $tl["icons"]["i15"]; ?>" class="fa fa-exclamation-triangle"></i>
			<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
		</div>
	</div>

<?php if ($JAK_PAGINATE) {
	echo $JAK_PAGINATE;
} ?>

<?php include "footer.php"; ?>