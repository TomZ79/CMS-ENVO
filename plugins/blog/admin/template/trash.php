<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>',
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
		<div class="box box-success">
			<div class="box-body no-padding">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>#</th>
						<th>
							<div class="checkbox-singel check-success">
								<input type="checkbox" id="jak_delete_all"/>
								<label for="jak_delete_all"></label>
							</div>
						</th>
						<th><?php echo $tlblog["blog_box_table"]["blogtb6"]; ?></th>
						<th><?php echo $tlblog["blog_box_table"]["blogtb7"]; ?></th>
						<th>
							<button type="submit" name="untrash" id="button_lock" class="btn btn-default btn-xs"
								onclick="if(!confirm('<?php echo $tlblog["blog_notification"]["untrash"]; ?>'))return false;">
								<i class="fa fa-thumbs-up"></i>
							</button>
						</th>
						<th>
							<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs"
								data-confirm-del="<?php echo $tlblog["blog_notification"]["codelall"]; ?>" disabled="disabled"><i
									class="fa fa-trash-o"></i></button>
						</th>
					</tr>
					</thead>
					<?php foreach ($JAK_TRASH_ALL as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td>
								<div class="checkbox-singel check-success">
									<input type="checkbox" id="jak_delete_trash<?php echo $v["id"]; ?>" name="jak_delete_trash[]"
										class="highlight" value="<?php echo $v["id"]; ?>"/>
									<label for="jak_delete_trash<?php echo $v["id"]; ?>"></label>
								</div>
							</td>
							<td><?php echo jak_clean_comment ($v["message"]); ?></td>
							<td><?php if ($v["userid"] == '0') {
									echo $tlblog["blog_box_content"]["blogbc40"];
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
	</form>

<?php } else { ?>

	<div class="col-md-12">
		<div class="alert bg-info text-white">
			<?php echo $tl["general_error"]["generror3"]; ?>
		</div>
	</div>

<?php } ?>

	<div class="col-md-12">
		<div class="icon_legend">
			<h3><?php echo $tl["icons"]["i"]; ?></h3>
			<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
			<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
			<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
		</div>
	</div>

<?php if ($JAK_PAGINATE) {
	echo $JAK_PAGINATE;
} ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>