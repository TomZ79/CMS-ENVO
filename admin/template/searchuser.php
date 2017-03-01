<?php include "header.php"; ?>

<?php if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<div class="row">
		<div class="col-md-6">
			<form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
				<div class="input-group">
          <span class="input-group-btn">
              <button class="btn btn-info" name="search" type="submit"><?php echo $tl["button"]["btn21"]; ?></button>
          </span>
					<input type="text" name="jakSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p2"]; ?>">
				</div>
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

<?php if ($JAK_SEARCH || $JAK_LIST_USER) { ?>

	<div class="box box-success">
		<div class="box-body no-padding">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>#</th>
						<th>
							<div class="checkbox-singel check-success">

								<?php
								// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
								// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
								echo $Html->addCheckbox('', '', false, 'jak_delete_all');
								echo $Html->addLabel('jak_delete_all', '');
								?>

							</div>
						</th>
						<th><?php echo $tl["user_box_table"]["usertb"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb1"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb2"]; ?></th>
						<th><?php echo $tl["user_box_table"]["usertb3"]; ?></th>
						<th>
							<button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
								<i class="fa fa-lock"></i>
							</button>
						</th>
						<th>
							<button type="submit" name="password" id="button_key" class="btn btn-default btn-xs" data-confirm="<?php echo $tl["user_notification"]["pass1"]; ?>">
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
					<?php if ($JAK_SEARCH) { ?><?php if (isset($JAK_SEARCH) && is_array ($JAK_SEARCH)) foreach ($JAK_SEARCH as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td>
								<div class="checkbox-singel check-success">
									<input type="checkbox" id="jak_delete_user<?php echo $v["id"]; ?>" name="jak_delete_user[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
									<label for="jak_delete_user<?php echo $v["id"]; ?>"></label>
								</div>
							</td>
							<td><a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
							</td>
							<td><?php echo $v["email"]; ?></td>
							<td><?php echo $v["username"]; ?></td>
							<td>
								<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $y) {
									if ($v["usergroupid"] == $y["id"]) { ?>
										<a href="index.php?p=usergroup&amp;sp=user&amp;ssp=<?php echo $y["id"]; ?>"><?php echo $y["name"]; ?></a>
									<?php }
								} ?>
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
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf ($tl["user_notification"]["del"], $v["name"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
					<?php }
					} ?>
					<?php if ($JAK_LIST_USER) { ?><?php if (isset($JAK_LIST_USER) && is_array ($JAK_LIST_USER)) foreach ($JAK_LIST_USER as $v) { ?>
						<tr>
							<td><?php echo $v["id"]; ?></td>
							<td>
								<div class="checkbox-singel check-success">
									<input type="checkbox" id="jak_delete_user<?php echo $v["id"]; ?>" name="jak_delete_user[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
									<label for="jak_delete_user<?php echo $v["id"]; ?>"></label>
								</div>
							</td>
							<td><a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
							</td>
							<td><?php echo $v["email"]; ?></td>
							<td><?php echo $v["username"]; ?></td>
							<td><?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $y) {
									if ($v["usergroupid"] == $y["id"]) { ?>
										<ahref="index.php?p=usergroup&amp;sp=user&amp;ssp=<?php echo $y["id"]; ?>"><?php echo $y["name"]; ?></a><?php }
								} ?></td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>">
									<i class="fa fa-<?php if ($v["access"] == '1') { ?>check<?php } else { ?>lock<?php } ?>"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=password&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["user_notification"]["pass"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i14"]; ?>">
									<i class="fa fa-key"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>">
									<i class="fa fa-edit"></i>
								</a>
							</td>
							<td>
								<a class="btn btn-default btn-xs" href="index.php?p=user&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf ($tl["user_notification"]["del"], $v["username"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
					<?php }
					} ?>
				</table>
			</div>
		</div>
	</div>
	</form>

	<div class="col-md-12 m-b-30">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html->addTag('h3', $tl["icons"]["i"]);
			echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i6"]));
			echo $Html->addTag('i', '', 'fa fa-lock', array('title' => $tl["icons"]["i5"]));
			echo $Html->addTag('i', '', 'fa fa-key', array('title' => $tl["icons"]["i14"]));
			echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
			echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php } else if ($SEARCH_WORD) { ?>

	<?php
	// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
	echo $Html->addDiv($tl["search"]["s6"] . $Html->addTag('strong', $SEARCH_WORD) , '', array('class' => 'alert bg-danger text-white'));
	?>

<?php } ?>

<?php include "footer.php"; ?>