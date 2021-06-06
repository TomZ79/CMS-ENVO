<?php if (ENVO_PLUGIN_ACCESS_TAGS && isset($ENVO_TAG_BLOG_DATA) && is_array($ENVO_TAG_BLOG_DATA)) foreach ($ENVO_TAG_BLOG_DATA as $bl) {
	$count++; ?>

	<div class="col-md-3 col-sm-6">
		<div class="service-wrapper">
			<i class="fa fa-commenting fa-4x"></i>
			<h3><a href="<?= $bl["parseurl"] ?>"><?= $bl["title"] ?></a></h3>
			<p><?= $bl["content"] ?></p>
			<a href="<?= $bl["parseurl"] ?>" class="btn btn-primary">
				<?= $tl["general"]["g3"] ?>
			</a>
		</div>
	</div>

<?php } ?>