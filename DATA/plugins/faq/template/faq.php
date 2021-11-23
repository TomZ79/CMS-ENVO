<?php
/*
 * ALL VALUE for FRONTEND - faq.php
 *
 * $id 							číslo		|	- id souboru
 * $title						text			- Titulek souboru
 * $content					text			- Celý popis souboru
 * $contentshort		text			- Zkrácený popis souboru
 * $showtitle				ano/ne		- Zobrazení nadpisu
 * $showdate				ano/ne
 * $created					datum			- Datum vytvoření
 * $hits						číslo			- Počet zobrazení
 * $previmg
 * $parseurl
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=setting'; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="accordion">
				<div class="panel-group" id="accordionFaq">

					<?php if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) foreach ($ENVO_FAQ_ALL as $v) { ?>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionFaq" href="#collapse<?= $v["id"] ?>">
										<?= $v["title"] ?>
									</a>
								</h3>
							</div>
							<div id="collapse<?= $v["id"] ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<h4><?= $tlf["faq_frontend"]["faq"] ?></h4>
									<div>
										<p>
											<?= $v["contentshort"] ?>
										</p>
									</div>

									<div class="clearfix"></div>
									<div class="pull-right">

										<a href="<?= $v["parseurl"] ?>" class="btn btn-default btn-sm"><?= $tlf["faq_frontend"]["faq1"] ?></a>

										<?php if (ENVO_ACCESS) { ?>

											<a href="<?= BASE_URL ?>admin/index.php?p=faq&amp;sp=edit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn1"] ?>" class="btn btn-info btn-sm">
												<span class="visible-xs"><i class="fa fa-edit"></i></span>
												<span class="hidden-xs"><?= $tl["button"]["btn1"] ?></span>
											</a>
											<a class="btn btn-info btn-sm quickedit" href="<?= BASE_URL ?>admin/index.php?p=faq&amp;sp=quickedit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
												<span class="visible-xs"><i class="fa fa-pencil"></i></span>
												<span class="hidden-xs"><?= $tl["button"]["btn2"] ?></span>
											</a>

										<?php } ?>

									</div>

								</div>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>
		</div>
	</div>

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>