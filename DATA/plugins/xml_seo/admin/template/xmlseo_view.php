<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-success">
				<div class="box-header with-border">

					<?php
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('h3', $tlxml["xml_box_title"]["xmlbt2"], 'box-title');
					?>

				</div>
				<div class="box-body">
					<?php if (!isset($contentxml)) { ?>
						<div>

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('submit_one', $tlxml["xml_box_content"]["xmlbc21"], '', 'btn btn-block btn-primary');
							?>

						</div>
					<?php } else { ?>
						<div>

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('submit_two', $tlxml["xml_box_content"]["xmlbc22"], '', 'btn btn-block btn-primary');
							?>

						</div><div class="m-t-20">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('p', $Html -> addTag('strong', $tlxml["xml_box_content"]["xmlbc23"]));
							?>

							<pre class="prettyprint linenums lang-xml" style="overflow: auto; max-height: 30em; white-space: pre;"><?= htmlentities($contentxml) ?></pre>
						</div>
					<?php } ?>
				</div>
				<div class="box-footer">

				</div>
			</div>
		</div>
	</div>
</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
