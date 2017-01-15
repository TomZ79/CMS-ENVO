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

<?php if (isset($JAK_CONTACT_ALL) && is_array ($JAK_CONTACT_ALL)) { ?>

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
							<th><?php echo $tl["cf_box_table"]["cftb"]; ?></th>
							<th><?php echo $tl["cf_box_table"]["cftb1"]; ?></th>
							<th>
								<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
									<i class="fa fa-lock"></i>
								</button>
							</th>
							<th></th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["cf_notification"]["delall"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_CONTACT_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<div class="checkbox-singel check-success">
										<input type="checkbox" id="jak_delete_contact<?php echo $v["id"]; ?>" name="jak_delete_contact[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
										<label for="jak_delete_contact<?php echo $v["id"]; ?>"></label>
									</div>
								</td>
								<td>
									<a href="index.php?p=contactform&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
								</td>
								<td><?php echo $v["content"]; ?></td>
								<td>
									<a class="btn btn-default btn-xs" href="index.php?p=contactform&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') {
										echo $tl["icons"]["i5"];
									} else {
										echo $tl["icons"]["i6"];
									} ?>">
										<i class="fa fa-<?php if ($v["active"] == '0') { ?>lock<?php } else { ?>check<?php } ?>"></i>
									</a>
								</td>
								<td>
									<a class="btn btn-default btn-xs" href="index.php?p=contactform&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<a class="btn btn-default btn-xs" href="index.php?p=contactform&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["cf_notification"]["del"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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