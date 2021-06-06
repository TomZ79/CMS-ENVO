<?php if (isset($ENVO_SEARCH_RESULT_WIKI) && is_array($ENVO_SEARCH_RESULT_WIKI)) foreach ($ENVO_SEARCH_RESULT_WIKI as $w) {
	$count++; ?>

	<div class="col-md-3 col-sm-6">
		<div class="service-wrapper">
			<i class="fa fa-question-circle fa-4x"></i>
			<h3><a href="<?= $w["parseurl"] ?>"><?= $w["title"] ?></a></h3>
			<p><?= $w["content"] ?></p>
			<a href="<?= $w["parseurl"] ?>" class="btn btn-primary"><?= $tl["general"]["g3"] ?></a>
		</div>
	</div>

<?php } ?>