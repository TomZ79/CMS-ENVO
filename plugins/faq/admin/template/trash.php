<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
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

<?php if (isset($JAK_TRASH_ALL) && is_array ($JAK_TRASH_ALL)) { ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="box">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th><input type="checkbox" id="jak_delete_all"/></th>
							<th><?php echo $tl["page"]["p4"]; ?></th>
							<th><?php echo $tl["login"]["l1"]; ?></th>
							<th>
								<button type="submit" name="untrash" id="button_lock" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tlf["faq"]["ap"]; ?>'))return false;">
									<i class="fa fa-check"></i>
								</button>
							</th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tlf["faq"]["co"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_TRASH_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td><input type="checkbox" name="jak_delete_trash[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
								</td>
								<td><?php echo jak_clean_comment ($v["message"]); ?></td>
								<td><?php if ($v["userid"] == '0') {
										echo $tl["general"]["g28"];
									} else {
										if ($page1 != 'user') { ?><a
											href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["userid"]; ?>"><?php echo $v["username"]; ?></a><?php } else {
											echo $v["username"];
										}
									} ?></td>
								<td></td>
								<td></td>
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

	<div class="icon_legend">
		<h3><?php echo $tl["icons"]["i"]; ?></h3>
		<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
		<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
		<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
	</div>

<?php if ($JAK_PAGINATE) {
	echo $JAK_PAGINATE;
} ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>