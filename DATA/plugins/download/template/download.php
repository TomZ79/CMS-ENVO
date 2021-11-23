<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU download.php
 * ----------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - download.php
 * ------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_ALL = pole s daty
 * foreach ($ENVO_DOWNLOAD_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"]             číslo		|	- id souboru
 * $v["title"]					text			- Titulek souboru
 * $v["content"]				text			- Celý popis souboru
 * $v["contentshort"]		text			- Zkrácený popis souboru
 * $v["showtitle"]			ano/ne		- Zobrazení nadpisu
 * $v["showdate"]				ano/ne
 * $v["created"]				datum			- Datum vytvoření
 * $v["hits"]						číslo			- Počet zobrazení
 * $v["countdl"]				číslo			- Počet stažení
 * $v["previmg"]
 * $v["parseurl"]       text      - Adresa URL
 * $v["file"]           text      - Url cesta k souboru
 * $v["extfile"]        text      - Url cesta k souboru
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting'; ?>

	<div class="col-md-12" style="margin: 10px 0 50px 0;">
		<?php if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) foreach ($ENVO_DOWNLOAD_ALL as $v) { ?>
			<!-- Post - Download -->      <div class="col-sm-6" style="margin-bottom: 30px ">
				<div>
					<!-- Post Title & Summary -->
					<div>
						<h3>
							<span>
								<a href="<?= $v["parseurl"] ?>"><?= envo_cut_text($v["title"], 30, "") ?></a>
							</span>
						</h3>
					</div>
					<div style="margin-bottom: 10px">

						<?php
						if ($v["showdate"]) {
							echo '<strong>' . $tld["downl_frontend"]["downl30"] . '</strong> : ' . $v["created"];
						}
						?>

						<span class="pull-right">
							<?= '<strong>' . $tld["downl_frontend"]["downl31"] . '</strong> : ' . $v["countdl"] ?>
						</span>
					</div>
					<div>
						<p><?= $v["contentshort"] ?></p>
					</div>
					<hr>

					<!-- Button -->
					<div class="pull-right">
						<a href="<?= $v["parseurl"] ?>" class="btn btn-default btn-sm">
							<?= $tld["downl_frontend"]["downl2"] ?>
						</a>

						<?php if (ENVO_ACCESS) { ?>

							<a href="<?= BASE_URL ?>admin/index.php?p=download&amp;sp=edit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn1"] ?>" class="btn btn-info btn-sm">
								<span class="visible-xs"><i class="fa fa-edit"></i></span>
								<span class="hidden-xs"><?= $tl["button"]["btn1"] ?></span>
							</a>

							<a class="btn btn-info btn-sm quickedit" href="<?= BASE_URL ?>admin/index.php?p=download&amp;sp=quickedit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
								<span class="visible-xs"><i class="fa fa-pencil"></i></span>
								<span class="hidden-xs"><?= $tl["button"]["btn2"] ?></span>
							</a>

						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>