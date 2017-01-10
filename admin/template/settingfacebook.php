<?php include "header.php"; ?>

<?php if ($JAK_FILE_SUCCESS) { ?>
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
if ($JAK_FILE_ERROR) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["error"]["e37"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton hidden-xs">
		<button type="submit" name="save" class="btn btn-success button">
			<i class="fa fa-save margin-right-5"></i>
			<?php echo $tl["button"]["btn1"]; ?> !!
		</button>
	</div>

	<!-- Form Content -->
	<ul id="cmsTabSetFB" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
		<li role="presentation" class="active">
			<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab"]; ?></span>
			</a>
		</li>
		<li role="presentation" class="next">
			<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab1"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
				<span class="text"><?php echo $tl["fb_section_tab"]["fbtab2"]; ?></span>
			</a>
		</li>
	</ul>

	<div id="cmsTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-12 margin-bottom-20">
											<blockquote>
												<p><?php echo $tl["fb_box_content"]["fbbc6"]; ?></p>
											</blockquote>
											<p><?php echo $tl["fb_box_content"]["fbbc7"]; ?></p>
											<ul>
												<li><?php echo $tl["fb_box_content"]["fbbc8"]; ?></li>
											</ul>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<textarea name="jak_facebookconnect" cols="60" rows="10" class="form-control txtautogrow"><?php echo $jkv["facebookconnect"]; ?></textarea>
										</div>
									</div>
								</div>
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
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4><?php echo $tl["fb_box_content"]["fbbc9"]; ?>
												<small><strong><?php echo $JAK_FILEURL; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-md-12">
												<label for="jak_filecontent"><?php echo $tl["fb_box_content"]["fbbc10"]; ?></label>
												<div id="txteditor"></div>
												<textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" name="save" class="btn btn-success pull-right">
								<i class="fa fa-save margin-right-5"></i>
								<?php echo $tl["button"]["btn1"]; ?>
							</button>
						</div>
					</div>
					<input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["fb_box_title"]["fbbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT1) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4><?php echo $tl["fb_box_content"]["fbbc9"]; ?>
												<small><strong><?php echo $JAK_FILEURL1; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT1) { ?>
										<div class="row-form">
											<div class="col-md-12">
												<label for="jak_filecontent1"><?php echo $tl["fb_box_content"]["fbbc10"]; ?></label>
												<div id="txteditor1"></div>
												<textarea name="jak_filecontent1" id="jak_filecontent1" class="form-control hidden"><?php echo $JAK_FILECONTENT1; ?></textarea>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" name="save" class="btn btn-success pull-right">
								<i class="fa fa-save margin-right-5"></i>
								<?php echo $tl["button"]["btn1"]; ?>
							</button>
						</div>
					</div>
					<input type="hidden" name="jak_file1" value="<?php echo $JAK_FILEURL1; ?>"/>
				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"; ?>


