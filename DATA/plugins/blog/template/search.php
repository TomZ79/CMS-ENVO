<?php if (isset($ENVO_SEARCH_RESULT_BLOG) && is_array($ENVO_SEARCH_RESULT_BLOG)) foreach ($ENVO_SEARCH_RESULT_BLOG as $bl) {
	$count++; ?>

	<div class="col-md-3 col-sm-6">
		<div class="service-wrapper">
			<i class="fa fa-commenting fa-4x"></i>
			<h3><a href="<?= $bl["parseurl"] ?>"><?= $bl["title"] ?></a></h3>
			<p><?= $bl["content"] ?></p>
			<a href="<?= $bl["parseurl"] ?>" class="btn btn-primary"><?= $tl["general"]["g3"] ?></a>
		</div>
	</div>

<?php } ?>