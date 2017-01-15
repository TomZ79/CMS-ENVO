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

<?php if ($errors) { ?>
	<div class="alert bg-danger fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?php if (isset($errors["e"])) echo $errors["e"];
		if (isset($errors["e1"])) echo $errors["e1"];
		if (isset($errors["e2"])) echo $errors["e2"];
		if (isset($errors["e3"])) echo $errors["e3"];
		if (isset($errors["e4"])) echo $errors["e4"]; ?>
	</div>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton">
			<button type="submit" name="save" class="btn btn-primary button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["general"]["g20"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<div class="row">
			<div class="col-md-8">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["title"]["t11"]; ?></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["cat"]["c4"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
											<input type="text" name="jak_name" id="jak_name" class="form-control" value="<?php echo $JAK_FORM_DATA["name"]; ?>"/>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["cat"]["c5"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if ($errors["e2"] || $errors["e3"]) echo " has-error"; ?>">
											<input type="text" name="jak_varname" id="jak_varname" class="form-control" value="<?php echo $JAK_FORM_DATA["varname"]; ?>"/>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["page"]["p5"]; ?></strong></div>
									<div class="col-md-7">
										<textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content"]); ?></textarea>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tld["dload"]["d21"]; ?></strong></div>
									<div class="col-md-7">
										<div class="radio">
											<label class="checkbox-inline">
												<input type="radio" name="jak_active" value="1"<?php if ($JAK_FORM_DATA["active"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="jak_active" value="0"<?php if ($JAK_FORM_DATA["active"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
											</label>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["general"]["g87"]; ?></strong></div>
									<div class="col-md-7">
										<div class="input-group">
											<input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php echo $JAK_FORM_DATA["catimg"]; ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-default iconpicker" data-placement="top" role="iconpicker"></button>
                    </span>
										</div>
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
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["general"]["g88"]; ?>
							<a class="cms-help" data-content="<?php echo $tl["help"]["h"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
								<i class="fa fa-question-circle"></i>
							</a>
						</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-12">
										<select name="jak_permission[]" multiple="multiple" class="form-control">
											<option value="0"<?php if ($JAK_FORM_DATA["permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g84"]; ?></option>
											<?php if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
												<option value="<?php echo $v["id"]; ?>"<?php if (in_array ($v["id"], explode (',', $JAK_FORM_DATA["permission"]))) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
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