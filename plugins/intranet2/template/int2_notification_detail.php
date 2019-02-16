<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

<div class="col-sm-12">
	<div class="grid simple">
		<div class="grid-body no-border padding-30">

			<?php
			if (!empty($ENVO_NOTIFICATION_DETAIL) && is_array($ENVO_NOTIFICATION_DETAIL)) {
				foreach ($ENVO_NOTIFICATION_DETAIL as $ndetail) {

					echo '<h3 class="all-caps">' . $ndetail["name"] . '</h3>';
					echo '<div class="m-b-30"><strong>Datum zadání: </strong><i>' . $ndetail["created"] . '</i></div>';
					echo '<div>' . $ndetail["content"] . '</div>';
					echo '<div class="m-t-30">';
					echo '<form method="post" action="' . $_SERVER["REQUEST_URI"] . '">';

					if ($ndetail["unread"] == 0) {

						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html -> addButtonSubmit('btnRead', 'Označit jako přečtené', '', 'btn btn-success btn-sm pull-right', array ('data-loading-text' => $tl["button"]["btn41"]));

					}

					echo '</form>';
					echo '</div>';

				}
			}
			?>

		</div>
	</div>
</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>
