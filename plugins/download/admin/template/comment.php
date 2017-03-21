<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

<?php if (isset($JAK_DOWNLOADCOM_ALL) && is_array ($JAK_DOWNLOADCOM_ALL)) { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="box box-success">
			<div class="box-body no-padding">
				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th><input type="checkbox" id="jak_delete_all"/></th>
						<th><?php echo $tl["page"]["p4"]; ?></th>
						<th class="admin-wrap"><?php echo $tld["dload"]["d8"]; ?></th>
						<th><?php echo $tl["user"]["u2"]; ?></th>
						<th>
							<button type="submit" name="approve" id="button_lock" class="btn btn-default btn-xs">
								<i class="fa fa-lock"></i></button>
						</th>
						<th>
							<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tld["dload"]["co"]; ?>" disabled="disabled">
								<i class="fa fa-trash-o"></i></button>
						</th>
					</tr>
					</thead>
					<?php foreach ($JAK_DOWNLOADCOM_ALL as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td><input type="checkbox" name="jak_delete_comment[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
							</td>
							<td><?php echo jak_clean_comment ($v["message"]); ?></td>
							<td>
								<?php if (isset($JAK_DOWNLOAD_ALL) && is_array ($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $z) {
									if ($v["fileid"] == $z["id"]) { ?>
										<a href="index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=download&amp;ssssp=<?php echo $z["id"]; ?>"><?php echo $z["title"]; ?></a>
									<?php }
								} ?>
							</td>
							<td>
								<?php if ($v["userid"] == '0') { ?><?php echo $tl["general"]["g28"]; ?><?php } else { ?>
									<a href="index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=user&amp;ssssp=<?php echo $v["userid"]; ?>"><?php echo $v["username"]; ?></a>
								<?php } ?>
							</td>
							<td>
								<a href="index.php?p=download&amp;sp=comment&amp;ssp=approve&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["approve"] == '0') {
									echo $tl["icons"]["i5"];
								} else {
									echo $tl["icons"]["i6"];
								} ?>">
									<i class="fa fa-<?php if ($v["approve"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
								</a>
							</td>
							<td>
								<a href="index.php?p=download&amp;sp=comment&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tld["dload"]["co"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
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
		<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
		<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
		<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
	</div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>