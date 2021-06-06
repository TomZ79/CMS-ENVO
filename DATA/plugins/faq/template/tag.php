<?php if (ENVO_PLUGIN_ACCESS_TAGS && isset($ENVO_TAG_FAQ_DATA) && is_array($ENVO_TAG_FAQ_DATA)) foreach ($ENVO_TAG_FAQ_DATA as $fq) {
	$count++; ?>

	<div class="col-md-3 col-sm-6">
		<div class="service-wrapper">
			<i class="fa fa-question-circle fa-4x"></i>
			<h3><a href="<?= $fq["parseurl"] ?>"><?= $fq["title"] ?></a></h3>
			<p><?= $fq["content"] ?></p>
			<a href="<?= $fq["parseurl"] ?>" class="btn btn-primary"><?= $tl["general"]["g3"] ?></a>
		</div>
	</div>

<?php } ?>