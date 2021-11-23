<?php

include_once APP_PATH . 'plugins/faq/functions.php';

$showfaqarray = explode(":", $row['showfaq']);

if (is_array($showfaqarray) && in_array("ASC", $showfaqarray) || in_array("DESC", $showfaqarray)) {

	$ENVO_FAQ = envo_get_faq('LIMIT ' . $showfaqarray[1], 't1.id ' . $showfaqarray[0], '', 't1.id', $setting["faqurl"], $tl['global_text']['gtxt4']);

} else {

	$ENVO_FAQ = envo_get_faq('', 't1.id ASC', $row['showfaq'], 't1.id', $setting["faqurl"], $tl['global_text']['gtxt4']);
}

?>

<hr><h3 class="text-color"><?= ENVO_PLUGIN_NAME_FAQ ?></h3>

<div class="row">
	<div class="col-md-12 faq-wrapper">
		<div class="panel-group" id="accordion2">
			<?php if (isset($ENVO_FAQ) && is_array($ENVO_FAQ)) foreach ($ENVO_FAQ as $f) { ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="<?= $f["parseurl"] ?>"><i class="fa fa-eye"></i></a>
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?= $f["id"] ?>">
							<?= $f["title"] ?>
						</a>
					</div>
					<div id="collapse<?= $f["id"] ?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<div class="answer"><?= $tlf["faq"]["d3"] ?></div>
							<p><?= $f["contentshort"] ?></p>
							<div class="pull-right">
								<?php if (ENVO_ACCESS) { ?>

									<a href="<?= BASE_URL ?>admin/index.php?p=faq&amp;sp=edit&amp;id=<?= $f["id"] ?>" title="<?= $tl["button"]["btn1"] ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>

									<a class="btn btn-default btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=faq&amp;sp=quickedit&amp;id=<?= $f["id"] ?>" title="<?= $tl["button"]["btn2"] ?>"><i class="fa fa-edit"></i></a>

								<?php } ?>

								<a href="<?= $f["parseurl"] ?>" class="btn btn-color btn-xs"><?= $tl["general"]["g3"] ?></a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>