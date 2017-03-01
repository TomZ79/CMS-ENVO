<?php include "header.php"; ?>

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
if ($page2 == "e" || $page2 == "edn") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo ($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["hook_error"]["hookerror4"]);?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<div class="btn-toolbar m-b-20">
		<div class="btn-group">

			<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 100px;"><?php echo $tl["button"]["btn4"]; ?>
				<span class="caret"></span>
			</button>
			<div class="dropdown-menu livefilter">
				<div class="search-box">

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html->addInput('text', '', $JAK_FORM_DATA["catimg"], 'input-bts-ex-1', 'form-control live-search', array('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
					?>

				</div>
				<div class="list-to-filter">
					<ul class="list-unstyled overflow">
						<?php if (isset($JAK_HOOK_LOCATIONS) && is_array ($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
							<li class="filter-item" data-filter="<?php echo $h; ?>">
								<a href="index.php?p=plugins&sp=sorthooks&ssp=<?php echo $h; ?>"><?php echo $h; ?></a></li>
						<?php } ?>
					</ul>
					<div class="no-search-results">
						<div class="no-results" role="alert"><?php echo $tl["selection"]["sel6"]; ?></div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php if (isset($JAK_HOOKS) && is_array ($JAK_HOOKS)) { ?>

	<div class="box box-success">
		<div class="box-body">
			<ul class="jak_hooks_move">
				<?php foreach ($JAK_HOOKS as $v) { ?>

					<li id="hook-<?php echo $v["id"]; ?>" class="jakhooks">
						<div class="text">#<?php echo $v["id"]; ?>
							<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
						</div>
						<div class="show"><?php echo $tl["hook_box_content"]["hookbc1"]; ?>:
							<a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["hook_name"]; ?>"><?php echo $v["hook_name"]; ?></a>
							| <?php echo $tl["hook_box_content"]["hookbc4"] . ':';
							if ($v["pluginid"] != '0') { ?>
								<ahref="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["pluginid"]; ?>"><?php echo $v["pluginname"]; ?></a><?php } else {
								echo ' -';
							} ?></div>
						<div class="actions">

							<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') {
								echo $tl["icons"]["i5"];
							} else {
								echo $tl["icons"]["i6"];
							} ?>">
								<i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
							</a>
							<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
								<i class="fa fa-edit"></i>
							</a>
							<?php if ($v["id"] > 5) { ?>
								<a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf ($tl["hook_notification"]["del"], $v["name"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
									<i class="fa fa-trash-o"></i>
								</a>
							<?php } ?>

						</div>
					</li>

				<?php } ?>
			</ul>
		</div>
	</div>

<?php } else { ?>

	<div class="col-md-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

	<div class="col-md-12 m-b-30">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html->addTag('h3', $tl["icons"]["i"]);
			echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i6"]));
			echo $Html->addTag('i', '', 'fa fa-lock', array('title' => $tl["icons"]["i5"]));
			echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
			echo $Html->addTag('i', '', 'fa fa-pencil', array('title' => $tl["icons"]["i10"]));
			echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php include "footer.php"; ?>