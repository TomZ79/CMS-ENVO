<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="col-sm-12">

		<?php
		if (!empty($ENVO_NOTIFICATION_ALL) && is_array($ENVO_NOTIFICATION_ALL)) {
			foreach ($ENVO_NOTIFICATION_ALL as $n) { ?>

				<div class="grid simple vertical <?php echo(($n["type"] == 'info' || $n["type"] == 'success') ? 'green' : 'red'); ?>">
					<div class="grid-title no-border">
						<h4><a href="<?= $n["parseurl"] ?>"><?= $n["name"] ?></a></h4>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
							<a href="javascript:;" class="remove"></a>
						</div>
					</div>
					<div class="grid-body no-border">
						<div class="row-fluid">
							<p><strong>Datum zadání: </strong><i><?= $n["created"] ?></i></p>
							<p><?= envo_cut_text($n["content"], 400, '...') ?></p>
							<div class="pull-right">
								<a href="<?= $n["parseurl"] ?>">Přečíst notifikaci <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>

			<?php }
		} else {
			// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
			echo $Html -> addDiv('Nejsou dostupné žádné notifikační zprávy.', '', array ('class' => 'alert'));
		} ?>

	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>