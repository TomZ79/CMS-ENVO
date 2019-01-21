<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?=$tl["notification"]["n7"]?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
			});
		}, 1000);
	</script>
<?php }
if ($page2 == "e" || $page2 == "edn") { ?>
	<script>
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["hook_error"]["hookerror4"]);?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
			});
		}, 1000);
	</script>
<?php } ?>

	<div class="btn-toolbar m-b-20">
		<div class="btn-group">

			<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 130px;"><?= $tl["button"]["btn4"] ?>
				<span class="caret"></span>
			</button>
			<div class="dropdown-menu livefilter">
				<div class="search-box">

					<?php
					// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
					echo $Html -> addInput('text', '', $ENVO_FORM_DATA["catimg"], 'input-bts-ex-1', 'form-control live-search', array ('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
					?>

				</div>
				<div class="list-to-filter">
					<ul class="list-unstyled overflow">

						<?php if (isset($ENVO_HOOK_LOCATIONS) && is_array($ENVO_HOOK_LOCATIONS)) foreach ($ENVO_HOOK_LOCATIONS as $h) { ?>
							<li class="filter-item" data-filter="<?= $h ?>">
								<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;sssp=<?= $h ?>"><?= $h ?></a>
							</li>
						<?php } ?>

					</ul>
					<div class="no-search-results">
						<div class="no-results" role="alert"><?= $tl["selection"]["sel6"] ?></div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php if (isset($ENVO_HOOKS) && is_array($ENVO_HOOKS)) { ?>

	<div class="box box-success">
		<div class="box-body">
			<ul class="envo_hooks_move">

				<?php foreach ($ENVO_HOOKS as $v) { ?>

					<li id="hook-<?= $v["id"] ?>" class="envohooks">

						<div>
							<span class="text">
								<span class="textid"># <?= $v["id"] ?></span>
								<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edithook&amp;id=<?= $v["id"] ?>"><?= $v["name"] ?></a>
							</span>
						</div>

						<div class="show">
							<?= $tl["hook_box_content"]["hookbc1"] ?>:
							<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;sssp=<?= $v["hook_name"] ?>"><?= $v["hook_name"] ?></a> |

							<?php
							echo $tl["hook_box_content"]["hookbc4"] . ':';
							if ($v["pluginid"] != '0') { ?>
								<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;id=<?= $v["pluginid"] ?>"><?= $v["pluginname"] ?></a><?php } else {
								echo ' -';
							}
							?>

						</div>
						<div class="actions">

							<?php
							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs mr-1', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));

							// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
							echo $Html -> addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs mr-1', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));

							if ($v["id"] > 5) {

								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html -> addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array ('data-confirm' => sprintf($tl["hook_notification"]["del"], $v["name"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));

							}
							?>

						</div>

					</li>

				<?php } ?>
			</ul>
		</div>
	</div>

<?php } else { ?>

	<div class="col-sm-12">

		<?php
		// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
		echo $Html -> addDiv($tl["general_error"]["generror3"], '', array ('class' => 'alert bg-info text-white'));
		?>

	</div>

<?php } ?>

	<div class="col-sm-12 m-b-30">
		<div class="icon_legend">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('h3', $tl["icons"]["i"]);
			echo $Html -> addTag('i', '', 'fa fa-check', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
			echo $Html -> addTag('i', '', 'fa fa-lock', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
			echo $Html -> addTag('i', '', 'fa fa-edit', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
			echo $Html -> addTag('i', '', 'fa fa-pencil', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i10"]));
			echo $Html -> addTag('i', '', 'fa fa-trash-o', array ('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
			?>

		</div>
	</div>

<?php include "footer.php"; ?>