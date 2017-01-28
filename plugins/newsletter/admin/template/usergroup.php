<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
if ($page2 == "e" || $page2 == "ene") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if ($page2 == "e") {
					$tl["general_error"]["generror1"];
				} elseif ($page2 == "ene") {
					echo $tl["general_error"]["generror2"];
				} else {
					echo $tlnl["newsletter_error"]["nlerror"];
				} ?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) { ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="box">
			<div class="box-body no-padding">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th><input type="checkbox" id="jak_delete_all"/></th>
							<th><?php echo $tl["user"]["u"]; ?></th>
							<th><?php echo $tl["user"]["u6"]; ?></th>
							<th></th>
							<th></th>
							<th>
								<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["user"]["al"]; ?>" disabled="disabled">
									<i class="fa fa-trash-o"></i>
								</button>
							</th>
						</tr>
						</thead>
						<?php foreach ($JAK_USERGROUP_ALL as $v) { ?>
							<tr>
								<td><?php echo $v["id"]; ?></td>
								<td>
									<input type="checkbox" name="jak_delete_usergroup[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
								</td>
								<td>
									<a href="index.php?p=newsletter&amp;sp=usergroup&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
								</td>
								<td><?php echo $v["description"]; ?></td>
								<td>
									<a href="index.php?p=newsletter&amp;sp=user&amp;ssp=group&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs">
										<i class="fa fa-user"></i>
									</a>
								</td>
								<td>
									<a href="index.php?p=newsletter&amp;sp=usergroup&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs">
										<i class="fa fa-edit"></i>
									</a>
								</td>
								<td>
									<?php if ($v["id"] != 1) { ?>
										<a href="index.php?p=newsletter&amp;sp=usergroup&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["user"]["alg"]; ?>" class="btn btn-default btn-xs">
											<i class="fa fa-trash-o"></i>
										</a>
									<?php } ?></td>
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
		<i title="<?php echo $tl["cmenu"]["c10"]; ?>" class="fa fa-user"></i>
		<i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
		<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
	</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>