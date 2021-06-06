<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

<div class="row">
	<div class="col-sm-12">

		<?php
		if (!empty($ENVO_NOTIFICATION_ALL) && is_array($ENVO_NOTIFICATION_ALL)) {
			foreach ($ENVO_NOTIFICATION_ALL as $n) { ?>

				<div class="card rounded-left-0 border-left-2 <?php echo(($n["type"] == 'info') ? 'border-left-info' : ($n["type"] == 'success' ? 'border-left-success' : ($n["type"] == 'success' ? 'border-left-danger' : ''))); ?>">
					<div class="card-header">
						<h3 class="card-title font-weight-semibold"><a href="<?= $n["parseurl"] ?>"><?= $n["name"] ?></a></h3>
					</div>

					<div class="card-body">
						<p><strong>Datum: </strong><i><?= $n["created"] ?></i></p>
						<p><?= envo_cut_text($n["content"], 400, '...') ?></p>
						<div class="float-right">
							<a href="<?= $n["parseurl"] ?>">Přečíst notifikaci <i class="icon-arrow-right13 ml-1"></i></a>
						</div>
					</div>
				</div>

			<?php }
		} else {

			// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
			echo $Html -> addDiv('Nejsou dostupné <strong>žádné</strong> notifikační zprávy.', '', array ('class' => 'alert alert-warning border-0'));
		} ?>

	</div>
</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>