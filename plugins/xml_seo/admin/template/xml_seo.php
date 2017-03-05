<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if (isset($succes1)) { ?>
	<script type="text/javascript">
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $succes1; ?>'
			}, {
				// settings
				type: 'success',
				delay: 7000
			});
		}, 1000);
	</script>
<?php }
if (isset($error1)) { ?>
	<script type="text/javascript">
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $error1; ?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php }
if (isset($error2)) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $error2; ?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php } ?>

<?php if (isset($xml_result)) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?php echo $tlxml["xml_notification"]["xmlnot"]; ?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);

		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?php echo $tlxml["xml_notification"]["xmlnot1"] . BASE_URL_ORIG . $XMLSEOPATH; ?>sitemap.xml'
			}, {
				// settings
				type: 'warning',
				delay: 5000,
				timer: 3000
			});
		}, 2000);
	</script>
	<div>
		<p><strong><?php echo $tlxml["xml_box_content"]["xmlbc23"]; ?></strong></p>
		<pre style="overflow: auto; max-height: 30em; white-space: pre;"><code class="language-xml"><?php echo htmlentities ($xml_result); ?></code></pre>
	</div>
<?php } else { ?>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $tlxml["xml_box_title"]["xmlbt"]; ?></h3>
				</div>
				<div class="box-body">
					<form id="xmlseo-wizard" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<input type="hidden" name="action" value="form1"/>
						<h3><?php echo $tlxml["xml_box_content"]["xmlbc"]; ?></h3>
						<section>
							<h4><?php echo $tlxml["xml_box_content"]["xmlbc3"]; ?></h4>
							<table class="table no-border">
								<tr>
									<td class="form-inline">
										<label for="folder"><?php echo BASE_URL_ORIG; ?></label>
										<input type="text" name="jak_xmlseopath" id="folder" value="<?php echo $XMLSEOPATH; ?>" class="form-control"/>
										sitemap.xml
									</td>
								</tr>
							</table>
						</section>
						<h3><?php echo $tlxml["xml_box_content"]["xmlbc1"]; ?></h3>
						<section>
							<?php
							// Content of file
							$file = APP_PATH . "robots.txt";
							if (file_exists ($file)) {
								// File exist, get content
								$content = file_get_contents ($file);
							} else {
								// File not exist, create new file
								file_put_contents ($file, '');
							}
							?>
							<h4><?php echo $tlxml["xml_box_content"]["xmlbc4"]; ?></h4>
							<div class="form-group">
								<label><?php echo $tlxml["xml_box_content"]["xmlbc5"]; ?></label>
								<textarea name="jak_filetxt" rows="8" placeholder="<?php echo $tlxml["xml_box_content"]["xmlbc6"]; ?>" class="form-control"><?php echo htmlspecialchars ($content); ?></textarea>
							</div>
							<div>
								<p><?php echo $tlxml["xml_box_content"]["xmlbc7"]; ?></p>
								<pre class="code"></pre>
							</div>
							<p>
								<a href="http://www.sitemaps.org/protocol.html#informing" target="_blank"><?php echo $tlxml["xml_box_content"]["xmlbc8"]; ?></a>
							</p>
						</section>
						<h3><?php echo $tlxml["xml_box_content"]["xmlbc2"]; ?></h3>
						<section>
							<h4><?php echo $tlxml["xml_box_content"]["xmlbc24"]; ?></h4>
							<table class="table table-striped">
								<tbody>
								<tr>
									<td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc9"]; ?></td>
									<td>
										<select name="jak_frepages" class="form-control selectpicker" data-size="3">
											<option value="always" <?php if ($FREQUENCYPAGES == "always") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc12"]; ?>
											</option>
											<option value="hourly" <?php if ($FREQUENCYPAGES == "hourly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc13"]; ?>
											</option>
											<option value="daily" <?php if ($FREQUENCYPAGES == "daily") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc14"]; ?>
											</option>
											<option value="weekly" <?php if ($FREQUENCYPAGES == "weekly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc15"]; ?>
											</option>
											<option value="monthly" <?php if ($FREQUENCYPAGES == "monthly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc16"]; ?>
											</option>
											<option value="yearly" <?php if ($FREQUENCYPAGES == "yearly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc17"]; ?>
											</option>
											<option value="never" <?php if ($FREQUENCYPAGES == "never") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc18"]; ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc10"]; ?></td>
									<td>
										<select name="jak_freblog" class="form-control selectpicker" data-size="3">
											<option value="always" <?php if ($FREQUENCYBLOG == "always") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc12"]; ?>
											</option>
											<option value="hourly" <?php if ($FREQUENCYBLOG == "hourly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc13"]; ?>
											</option>
											<option value="daily" <?php if ($FREQUENCYBLOG == "daily") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc14"]; ?>
											</option>
											<option value="weekly" <?php if ($FREQUENCYBLOG == "weekly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc15"]; ?>
											</option>
											<option value="monthly" <?php if ($FREQUENCYBLOG == "monthly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc16"]; ?>
											</option>
											<option value="yearly" <?php if ($FREQUENCYBLOG == "yearly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc17"]; ?>
											</option>
											<option value="never" <?php if ($FREQUENCYBLOG == "never") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc18"]; ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc11"]; ?></td>
									<td>
										<select name="jak_fredownload" class="form-control selectpicker" data-size="3">
											<option value="always" <?php if ($FREQUENCYDOWNLOAD == "always") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc12"]; ?>
											</option>
											<option value="hourly" <?php if ($FREQUENCYDOWNLOAD == "hourly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc13"]; ?>
											</option>
											<option value="daily" <?php if ($FREQUENCYDOWNLOAD == "daily") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc14"]; ?>
											</option>
											<option value="weekly" <?php if ($FREQUENCYDOWNLOAD == "weekly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc15"]; ?>
											</option>
											<option value="monthly" <?php if ($FREQUENCYDOWNLOAD == "monthly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc16"]; ?>
											</option>
											<option value="yearly" <?php if ($FREQUENCYDOWNLOAD == "yearly") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc17"]; ?>
											</option>
											<option value="never" <?php if ($FREQUENCYDOWNLOAD == "never") echo "selected=\"selected\""; ?> >
												<?php echo $tlxml["xml_box_content"]["xmlbc18"]; ?>
											</option>
										</select>
									</td>
								</tr>
								</tbody>
							</table>
						</section>
					</form>
				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="action" value="form2"/>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlxml["xml_box_title"]["xmlbt1"]; ?></h3>
					</div>
					<div class="box-body">
						<table class="table table-striped first-column">
							<tr>
								<td><?php echo $tlxml["xml_box_content"]["xmlbc19"]; ?></td>
								<td><?php echo $XMLSEODATE; ?></td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-block btn-primary"><?php echo $tlxml["xml_box_content"]["xmlbc20"]; ?></button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="action" value="form3"/>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlxml["xml_box_title"]["xmlbt2"]; ?></strong></h3>
					</div>
					<div class="box-body">
						<?php if (!isset($contentxml)) { ?>
							<div class="margin-bottom-10">
								<button type="submit" name="submit_one" class="btn btn-block btn-primary"><?php echo $tlxml["xml_box_content"]["xmlbc21"]; ?></button>
							</div>
						<?php } else { ?>
							<div class="margin-bottom-10">
								<button type="submit" name="submit_two" class="btn btn-block btn-primary"><?php echo $tlxml["xml_box_content"]["xmlbc22"]; ?></button>
							</div>
							<div>
								<p><strong><?php echo $tlxml["xml_box_content"]["xmlbc23"]; ?></strong></p>
								<pre style="overflow: auto; max-height: 30em; white-space: pre;"><code class="language-xml"><?php echo htmlentities ($contentxml); ?></code></pre>
							</div>
						<?php } ?>
					</div>
					<div class="box-footer">

					</div>
				</div>
			</div>
		</div>
	</form>
<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>