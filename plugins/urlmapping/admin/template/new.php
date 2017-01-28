<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

<?php if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton">
			<button type="submit" name="save" class="btn btn-success button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["button"]["btn1"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt"]; ?></h3>
					</div>
					<div class="box-body boxbody-height110">
						<div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">
							<input class="form-control" type="text" name="jak_oldurl" value="<?php if (isset($_REQUEST["jak_oldurl"])) echo $_REQUEST["jak_oldurl"]; ?>"/>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt1"]; ?></h3>
					</div>
					<div class="box-body boxbody-height110">
						<div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e3"])) echo " has-error"; ?>">
							<input class="form-control" type="text" name="jak_newurl" id="jak_newurl" value="<?php if (isset($_REQUEST["jak_newurl"])) echo $_REQUEST["jak_newurl"]; ?>"/>
						</div>
						<table class="table first-column v-text-center">
							<tr>
								<td><?php echo $tlum["url_box_content"]["urlbc"]; ?></td>
								<td>
									<div class="radio">
										<label class="checkbox-inline">
											<input type="radio" name="jak_baseurl" id="1" value="1"/> <?php echo $tl["checkbox"]["chk"]; ?>
										</label>
										<label class="checkbox-inline">
											<input type="radio" name="jak_baseurl" id="0" value="0" checked="checked"/> <?php echo $tl["checkbox"]["chk1"]; ?>
										</label>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt2"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="form-group no-margin">
							<select name="jak_redirect" class="form-control selectpicker">
								<option value="301"<?php if (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '301') { ?> selected="selected"<?php } ?>><?php echo $tlum["url_box_content"]["urlbc1"]; ?></option>
								<option value="302"<?php if (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '302') { ?> selected="selected"<?php } ?>><?php echo $tlum["url_box_content"]["urlbc2"]; ?></option>
							</select>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>