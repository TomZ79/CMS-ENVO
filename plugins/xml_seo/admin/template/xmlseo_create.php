<?php

include_once APP_PATH . 'admin/template/header.php';

if (isset($xml_result)) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=$tlxml["xml_notification"]["xmlnot"]?>'
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
        message: '<?=$tlxml["xml_notification"]["xmlnot1"] . '<br>' . BASE_URL_ORIG . $XMLSEOPATH?>sitemap.xml'
      }, {
        // settings
        type: 'warning',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
	</script>

	<div>
		<p><strong><?= $tlxml["xml_box_content"]["xmlbc23"] ?></strong></p>
		<pre class="prettyprint linenums lang-xml" style="overflow: auto; max-height: 30em; white-space: pre;"><?= htmlentities($xml_result) ?></pre>
	</div>
<?php } else { ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tlxml["xml_box_title"]["xmlbt1"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<table class="table">
							<tr>
								<td><?= $tlxml["xml_box_content"]["xmlbc19"] ?></td>
								<td><?= $XMLSEODATE ?></td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-block btn-primary"><?= $tlxml["xml_box_content"]["xmlbc20"] ?></button>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php }

include_once APP_PATH . 'admin/template/footer.php';

?>
