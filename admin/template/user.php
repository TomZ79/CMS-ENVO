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
if ($page1 == "e" || $page1 == "edp" || $page1 == "ene") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if ($page1 == "e") {
					$tl["general_error"]["generror1"];
				} elseif ($page1 == "ene") {
					echo $tl["general_error"]["generror2"];
				} else {
					echo $tl["user_error"]["usererror"];
				} ?>',
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

	<div class="row">
		<div class="col-md-6">
			<form role="form" method="post" action="/admin/index.php?p=user&amp;sp=search&amp;ssp=go">
				<div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-info" name="search" type="submit"><?php echo $tl["button"]["btn21"]; ?></button>
          </span>
					<input type="text" name="jakSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p2"]; ?>">
				</div><!-- /input-group -->
			</form>
		</div>

		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<div class="col-md-6">
				<div class="input-group">
					<select name="jak_group" class="form-control selectpicker" data-size="5">
						<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
							if ($z["id"] != 1) { ?>
								<option value="<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></option><?php }
						} ?>
					</select>
          <span class="input-group-btn">
            <button type="submit" name="move" class="btn btn-warning"><?php echo $tl["button"]["btn20"]; ?></button>
          </span>
				</div>
			</div>
	</div>

	<hr>

<?php if (isset($JAK_USER_ALL_APPROVE) && is_array ($JAK_USER_ALL_APPROVE)) { ?>

	<h3><?php echo $tl["user_box_table"]["usertb5"]; ?></h3>

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
						<th><?php echo $tl["user_box_table"]["usertb"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb1"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb2"]; ?></th>
						<th></th>
						<th>
							<button type="submit" name="password" id="button_key" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tl["user_notification"]["pass1"]; ?>'))return false;">
								<i class="fa fa-key"></i>
							</button>
						</th>
						<th></th>
						<th>
							<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" onclick="if(!confirm('<?php echo $tl["user_notification"]["delall"]; ?>'))return false;">
								<i class="fa fa-trash-o"></i>
							</button>
						</th>
					</tr>
					</thead>
					<?php foreach ($JAK_USER_ALL_APPROVE as $va) { ?>
						<tr>
							<td><?php echo $va["id"]; ?></td>
							<td>
								<div class="checkbox-singel check-success">
									<input type="checkbox" id="jak_delete_user<?php echo $va["id"]; ?>" name="jak_delete_user[]" class="highlight" value="<?php echo $va["id"]; ?>"/>
									<label for="jak_delete_user<?php echo $va["id"]; ?>"></label>
								</div>
							</td>
							<td>
								<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $va["id"]; ?>"><?php echo $va["username"]; ?></a>
							</td>
							<td>
								<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $va["id"]; ?>"><?php echo $va["email"]; ?></a>
							</td>
							<td>
								<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
									if ($va["usergroupid"] == $z["id"]) { ?>
										<a href="index.php?p=usergroup&amp;sp=user&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a><?php }
								} ?>
							</td>
							<td class="content-go">
								<a href="index.php?p=user&amp;sp=verify&amp;ssp=<?php echo $va["id"]; ?>" class="btn btn-default btn-xs">
									<i class="fa fa-<?php if ($va["access"] == 3 || $va["access"] == 2) { ?>envelope-o<?php } else { ?>lock<?php } ?>"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=password&amp;ssp=<?php echo $va["id"]; ?>" onclick="if(!confirm('<?php echo $tl["user_notification"]["pass"]; ?>'))return false;">
									<i class="fa fa-key"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $va["id"]; ?>">
									<i class="fa fa-edit"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=delete&amp;ssp=<?php echo $va["id"]; ?>" data-confirm="<?php echo sprintf ($tl["user_notification"]["del"], $va["username"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

<?php } ?>

	<h3><?php echo $tl["user_box_table"]["usertb4"]; ?></h3>

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
						<th>
							<?php echo $tl["user_box_table"]["usertb"]; ?>
							<a class="btn btn-warning btn-xs" href="index.php?p=user&amp;sp=sort&amp;ssp=username&amp;sssp=DESC">
								<i class="fa fa-arrow-up"></i>
							</a>
							<a class="btn btn-success btn-xs" href="index.php?p=user&amp;sp=sort&amp;ssp=username&amp;sssp=ASC">
								<i class="fa fa-arrow-down"></i>
							</a>
						</th>
						<th>
							<?php echo $tl["user_box_table"]["usertb1"]; ?>
							<a class="btn btn-warning btn-xs" href="index.php?p=user&amp;sp=sort&amp;ssp=email&amp;sssp=DESC">
								<i class="fa fa-arrow-up"></i>
							</a>
							<a class="btn btn-success btn-xs" href="index.php?p=user&amp;sp=sort&amp;ssp=email&amp;sssp=ASC">
								<i class="fa fa-arrow-down"></i>
							</a>
						</th>
						<th><?php echo $tl["user_box_table"]["usertb2"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb6"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb3"]; ?></th>
						<th>
							<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
								<i class="fa fa-lock"></i>
							</button>
						</th>
						<th>
							<button type="submit" name="password" id="button_key" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tl["user_notification"]["pass1"]; ?>'))return false;">
								<i class="fa fa-key"></i>
							</button>
						</th>
						<th></th>
						<th>
							<button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["user_notification"]["delall"]; ?>" disabled="disabled">
								<i class="fa fa-trash-o"></i>
							</button>
						</th>
					</tr>
					</thead>
					<?php if (isset($JAK_USER_ALL) && is_array ($JAK_USER_ALL)) foreach ($JAK_USER_ALL as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td>
								<div class="checkbox-singel check-success">
									<input type="checkbox" id="jak_delete_user<?php echo $v["id"]; ?>" name="jak_delete_user[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
									<label for="jak_delete_user<?php echo $v["id"]; ?>"></label>
								</div>
							</td>
							<td>
								<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["username"]; ?></a>
							</td>
							<td>
								<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["email"]; ?></a>
							</td>
							<td>
								<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
									if ($v["usergroupid"] == $z["id"]) { ?>
										<a href="index.php?p=usergroup&amp;sp=user&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a>
									<?php }
								} ?>
							</td>
							<td><?php echo date ("d.m.Y", strtotime ($v["time"])); ?></td>
							<td>
								<?php
								if ($v["access"] == 1) {
									echo $tl["user_box_content"]["userbc"];
								} else {
									echo $tl["user_box_content"]["userbc1"] . '<span class="small">  - ' . $tl["user_box_content"]["userbc2"] . '</span>';
								}
								?>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["access"] == '1') {
									echo $tl["icons"]["i6"];
								} else {
									echo $tl["icons"]["i5"];
								} ?>">
									<i class="fa fa-<?php if ($v["access"] == '1') { ?>check<?php } else { ?>lock<?php } ?>"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=password&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["user_notification"]["pass"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i14"]; ?>">
									<i class="fa fa-key"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
									<i class="fa fa-edit"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf ($tl["user_notification"]["del"], $v["username"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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
			<i title="<?php echo $tl["icons"]["i19"]; ?>" class="fa fa-envelope-o"></i>
			<i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
			<i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
			<i title="<?php echo $tl["icons"]["i14"]; ?>" class="fa fa-key"></i>
			<i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
			<i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
		</div>
	</div>

<?php if ($JAK_PAGINATE) {
	echo $JAK_PAGINATE;
} ?>

<?php include "footer.php"; ?>