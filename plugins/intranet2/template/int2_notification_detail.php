<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">

			<?php if (!empty($ENVO_NOTIFICATION_DETAIL) && is_array($ENVO_NOTIFICATION_DETAIL)) { ?>

			<div class="card-header">
				<h3 class="card-title font-weight-semibold"><?= $ENVO_NOTIFICATION_DETAIL["name"] ?></h3>
			</div>

			<div class="card-body">
				<p><strong>Datum: </strong><i><?= $ENVO_NOTIFICATION_DETAIL["created"] ?></i></p>
				<p><?= $ENVO_NOTIFICATION_DETAIL["content"] ?></p>
				<form method="post" action="<?= $_SERVER["REQUEST_URI"] ?>">

					<?php
					if ($ENVO_NOTIFICATION_DETAIL["unread"] == 0) {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('btnRead', 'Označit jako přečtené', '', 'btn bg-teal-400 float-right');

					}
					?>

				</form>

				<?php } ?>

			</div>
		</div>
	</div>
</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>
