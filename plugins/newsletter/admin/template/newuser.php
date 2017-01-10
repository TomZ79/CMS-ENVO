<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "e") { ?>
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
<?php }
if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
		<!-- Fixed Button for save form -->
		<div class="savebutton">
			<button type="submit" name="save" class="btn btn-primary button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["general"]["g20"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["general"]["g67"]; ?></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user"]["u"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">
											<input type="text" name="jak_name" class="form-control" value="<?php if (isset($_REQUEST["jak_name"])) echo $_REQUEST["jak_name"]; ?>"/>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user"]["u1"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
											<input type="text" name="jak_email" class="form-control" value="<?php if (isset($_REQUEST["jak_name"])) echo $_REQUEST["jak_email"]; ?>"/>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["submenu"]["sm100"]; ?></strong></div>
									<div class="col-md-7">
										<select name="jak_usergroup" class="form-control selectpicker">
											<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
												<option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_usergroup"]) && $v["id"] == $_REQUEST["jak_usergroup"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-primary pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["general"]["g20"]; ?>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlnl["nletter"]["d20"]; ?></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d21"]; ?></strong></div>
									<div class="col-md-7">
										<div class="fileinput fileinput-new" data-provides="fileinput">
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new"><?php echo $tl["general"]["g133"]; ?></span>
                        <span class="fileinput-exists"><?php echo $tl["general"]["g131"]; ?></span>
                        <input type="file" name="jak_file" accept=".csv">
                      </span>
											<span class="fileinput-filename"></span>
											<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d22"]; ?></strong></div>
									<div class="col-md-7">
										<input type="text" class="form-control" name="jak_delimiter" value="<?php if (isset($_REQUEST["jak_delimiter"])) echo $_REQUEST["jak_delimiter"]; ?>" placeholder=","/>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlnl["nletter"]["d23"]; ?></strong></div>
									<div class="col-md-7">
										<input type="text" class="form-control" name="jak_start" value="<?php if (isset($_REQUEST["jak_start"])) echo $_REQUEST["jak_start"]; ?>" placeholder="1"/>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["submenu"]["sm100"]; ?></strong></div>
									<div class="col-md-7">
										<select name="jak_usergroupcsv" class="form-control selectpicker">
											<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
												<option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_usergroupcsv"]) && $v["id"] == $_REQUEST["jak_usergroupcsv"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-primary pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["general"]["g20"]; ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>